<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_tahap extends CI_Controller {

	
	function __construct(){
        parent::__construct();
        
        if($this->session->userdata('level') != 1){
			redirect(base_url());
     }
        
        $this->load->model('M_progam');
        $this->load->model('M_kejuruan');
        $this->load->model('M_pelatihan');
    }

    function index(){
        $data['title'] = "SALUTE | Progam Pelatihan";

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kejuruan'] = $this->M_kejuruan->tampil_kejuruan();

        $this->form_validation->set_rules('tahap','Tahap','trim|required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_tahap/index',$data);
            $this->load->view('templates/footer');
        }
        else{
            $tahap = $this->input->post('tahap',TRUE);

            $cek = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->row_array();

            if($cek['kd_pelatihan'] != NULL){
                redirect('rekap_tahap/in_detail_rekap/'.$tahap);
            }
            else{
                $this->session->set_flashdata('msg2','Laporan tahap yang anda cari tidak ditemukan!');
                redirect('rekap_tahap');
            }
        }
    }

    function in_detail_rekap($tahap){
        $data['title'] = "SALUTE | Rekap Kuisioner : $tahap";
        $data['tahap'] = $tahap;

        $pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();
        
        // materi pelatihan
        $kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_materi_pelatihan = 0;
        $jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        foreach($kuisioner_b_materi_pelatihan as $sl){ 
            $id_soalnya1 = $sl['id_kuisionerB'];
        
            $total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
            
            $jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
            $hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;


        // bahan latihan
        $jml_kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_bahan_pelatihan = 0;
        foreach($kuisioner_b_bahan_latihan as $sl2){ 
            $id_soalnya2 = $sl2['id_kuisionerB'];
            $total_bahan_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya2' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
        
        $jmlh_keseluruhan_bahan_pelatihan = $jmlh_keseluruhan_bahan_pelatihan+(number_format($total_bahan_pelatihan['total']/$jml_kuisioner_b_bahan_latihan,2));
        $hasil_akhir_bahan_pelatihan = number_format($jmlh_keseluruhan_bahan_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_bahan_pelatihan'] = $hasil_akhir_bahan_pelatihan;


        // rekruitmen
        $jml_kuisioner_c_rekruitmen = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_rekruitmen = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_rekruitmen = 0;
        foreach($kuisioner_c_rekruitmen as $sl3){
            $id_soalnya3 = $sl3['id_kuisionerC'];
            $total_rekruitmen = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya3' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();

            $jmlh_keseluruhan_rekruitmen=$jmlh_keseluruhan_rekruitmen+(number_format($total_rekruitmen['total']/$jml_kuisioner_c_rekruitmen,2));
            $hasil_akhir_rekruitmen = number_format($jmlh_keseluruhan_rekruitmen*25,2);
        }
        $data['hasil_kuisioner_b_rekruitmen'] = $hasil_akhir_rekruitmen;


        // penyambutan
        $jml_kuisioner_c_kamar = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_kamar = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_kamar = 0;
        foreach($kuisioner_c_kamar as $sl4){
            $id_soalnya4 = $sl4['id_kuisionerC'];

            $total_kamar = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya4' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
        
            $jmlh_keseluruhan_kamar=$jmlh_keseluruhan_kamar+(number_format($total_kamar['total']/$jml_kuisioner_c_kamar,2));
            $hasil_akhir_kamar = number_format($jmlh_keseluruhan_kamar*25,2);
        }
        $data['hasil_kuisioner_b_kamar'] = $hasil_akhir_kamar;


        // sarpras asrama
        $jml_kuisioner_c_sarpras = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_sarpras = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_sarpras_asrama = 0;
        foreach($kuisioner_c_sarpras as $sl5){
            $id_soalnya5 = $sl5['id_kuisionerC'];

            $total_sarpras_asrama = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya5' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
            
            $jmlh_keseluruhan_sarpras_asrama=$jmlh_keseluruhan_sarpras_asrama+(number_format($total_sarpras_asrama['total']/$jml_kuisioner_c_sarpras,2));
            $hasil_akhir_sarpras_asrama = number_format($jmlh_keseluruhan_sarpras_asrama*25,2);
        }
        $data['hasil_kuisioner_b_sarpras_asrama'] = $hasil_akhir_sarpras_asrama;


        // konsumsi
        $jml_kuisioner_c_konsumsi = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_konsumsi = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_konsumsi = 0;
        foreach($kuisioner_c_konsumsi as $sl6){
            $id_soalnya6 = $sl6['id_kuisionerC'];

            $total_konsumsi = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();

            $jmlh_keseluruhan_konsumsi=$jmlh_keseluruhan_konsumsi+(number_format($total_konsumsi['total']/$jml_kuisioner_c_konsumsi,2));
            $hasil_akhir_konsumsi = number_format($jmlh_keseluruhan_konsumsi*25,2);
        }
        $data['hasil_kuisioner_b_konsumsi'] = $hasil_akhir_konsumsi;


        // secara umum
        $jml_kuisioner_c_secara_umum = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_secara_umum = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_secara_umum = 0;
        foreach($kuisioner_c_secara_umum as $sl6){
            $id_soalnya6 = $sl6['id_kuisionerC'];

            $total_secara_umum = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();

            $jmlh_keseluruhan_secara_umum=$jmlh_keseluruhan_secara_umum+(number_format($total_secara_umum['total']/$jml_kuisioner_c_secara_umum,2));
            $hasil_akhir_secara_umum = number_format($jmlh_keseluruhan_secara_umum*25,2);
        }
        $data['hasil_kuisioner_b_secara_umum'] = $hasil_akhir_secara_umum;


        // sarpras
        $kuisioner_b_sarpras = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_sarpras = 0;
        $jml_kuisioner_b_sarpras = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        foreach($kuisioner_b_sarpras as $sl7){ 
            $id_soalnya7 = $sl7['id_kuisionerB'];
        
            $total_sarpras = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya7' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
            
            $jmlh_keseluruhan_sarpras = $jmlh_keseluruhan_sarpras+(number_format($total_sarpras['total']/$jml_kuisioner_b_sarpras,2));
            $hasil_akhir_sarpras = number_format($jmlh_keseluruhan_sarpras*20,2);
        }
        $data['hasil_kuisioner_b_sarpras'] = $hasil_akhir_sarpras;


        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    function rekap_kuisioner($jenis,$tahap){

            $data['tahap'] = $tahap;

            if($jenis == 1){
                $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner A";
                $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

                $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
                $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
    
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('v_rekap_tahap/detail_kuisioner_a',$data);
                $this->load->view('templates/footer');
            }
            else if($jenis == 2){
                $data['title'] = "SALUTE | Detail Rekap Kuisioner B";

                $data['daftar_pengajar'] = $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
                                                                        LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
                                                                        WHERE pelatihan.tahap_pelatihan='$tahap'")->result_array();
                

                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('v_rekap_tahap/detail_kuisioner_b',$data);
                $this->load->view('templates/footer');
            }
            else if($jenis == 3){
                $data['title'] = "SALUTE | Detail Rekap Kuisioner C";

                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('v_rekap_tahap/detail_kuisioner_c',$data);
                $this->load->view('templates/footer');
            }
    }

    function rekap_kuisioner_b_materi_pelatihan($tahap){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner B Materi Pelatihan";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_b_materi_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    function rekap_kuisioner_b_sarpras($tahap){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner B Sarpras";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
        $data['jml_ruang_teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
        $data['jml_km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
        $data['jml_sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();

        $data['workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
        $data['teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
        $data['listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
        $data['km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
        $data['sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_b_sarpras',$data);
        $this->load->view('templates/footer');
    }

    function rekap_kuisioner_b_bahan_latihan($tahap){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner B Bahan Latihan";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_b_bahan_latihan',$data);
        $this->load->view('templates/footer');
    }

    function kuisioner_c_rekruitmen($tahap){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_c_rekruitmen',$data);
        $this->load->view('templates/footer');
    }

    function kuisioner_c_kamar($tahap){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_c_kamar',$data);
        $this->load->view('templates/footer');
    }

    function kuisioner_c_sarpras($tahap){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_sarpras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_sarpras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_c_sarpras',$data);
        $this->load->view('templates/footer');
    }

    function kuisioner_c_konsumsi($tahap){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_c_konsumsi',$data);
        $this->load->view('templates/footer');
    }

    function kuisioner_c_uji_kompetensi($tahap){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_uji_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_uji_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_c_uji_kompetensi',$data);
        $this->load->view('templates/footer');
    }

    function kuisioner_c_secara_umum($tahap){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_secara_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_secara_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_c_secara_umum',$data);
        $this->load->view('templates/footer');
    }

    function in_detail_pelatihan_pengajar_kuisioner_b($tahap, $id_pengajar){
        $data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";

        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();
        $data['tahap'] = $tahap;
        $data['id_pengajar'] = $id_pengajar;
        $data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();

        // PENGETAHUAN PEMAHAMAN
        $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();
        $data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();

        // KEMAMPUAN DALAM MEMBAWAKAN MATERI
        $data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
        $data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();

        // KEMAMPUAN DALAM MEMAHAMI MASALAH
        $data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
        $data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();

        // PENAMPILAN TENAGA PELATIH
        $data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();
        $data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_kuisioner_b_tenaga_pelatih',$data);
        $this->load->view('templates/footer');
    }

}