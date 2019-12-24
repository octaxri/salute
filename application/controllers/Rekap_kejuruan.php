<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_kejuruan extends CI_Controller { 

    	
	function __construct(){
        parent::__construct();
        
        if($this->session->userdata('level') != 1){
			redirect(base_url());
        }
        
        $this->load->model('M_progam');
        $this->load->model('M_kejuruan');
        $this->load->model('M_pelatihan');
    }

    public function index()
    {
        $data['title'] = "SALUTE | Progam Pelatihan";

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kejuruan'] = $this->M_kejuruan->tampil_kejuruan();
        $data['kejuruan']= $this->M_progam->tampil_progam();

        $this->form_validation->set_rules('kejuruan','Kejuruan','trim|required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_kejuruan/index',$data);
            $this->load->view('templates/footer');
        }
        else{
            $kejuruan = $this->input->post('kejuruan',TRUE);

            $cek = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->row_array();

            if($cek['kd_pelatihan'] != NULL){
                redirect('rekap_kejuruan/in_detail_kejuruan/'.$kejuruan);
            }
            else{
                $this->session->set_flashdata('msg2','Laporan kejuruan yang anda cari tidak ditemukan!');
                redirect('rekap_kejuruan');
            }
        }
    }

    function in_detail_kejuruan($kejuruan){

        $data['title']= "SALUTE | Detail Per Kejuruan Pelatihan ";
        $data['kejuruan'] = $kejuruan;
    
        // MATERI PELATIHAN
        $jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_materi_pelatihan = 0; 
        
        foreach($kuisioner_b_materi_pelatihan as $sl1){ 
            $id_soalnya1 = $sl1['id_kuisionerB'];
            $total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
        
            $jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
            $hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;

        // SARPRAS
        $jml_kuisioner_b_sarpras = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_sarpras = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_sarpras = 0; 
        
        foreach($kuisioner_b_sarpras as $sl2){ 
            $id_soalnya2 = $sl2['id_kuisionerB'];
            $total_sarpras = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya2' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
        
            $jmlh_keseluruhan_sarpras = $jmlh_keseluruhan_sarpras+(number_format($total_sarpras['total']/$jml_kuisioner_b_sarpras,2));
            $hasil_akhir_sarpras = number_format($jmlh_keseluruhan_sarpras*20,2);
        }
        $data['hasil_kuisioner_b_sarpras'] = $hasil_akhir_sarpras;


        // BAHAN LATIHAN
        $jml_kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_bahan_latihan = 0; 
        
        foreach($kuisioner_b_bahan_latihan as $sl3){ 
            $id_soalnya3 = $sl3['id_kuisionerB'];
            $total_bahan_latihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya3' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
        
            $jmlh_keseluruhan_bahan_latihan = $jmlh_keseluruhan_bahan_latihan+(number_format($total_bahan_latihan['total']/$jml_kuisioner_b_bahan_latihan,2));
            $hasil_akhir_bahan_latihan = number_format($jmlh_keseluruhan_bahan_latihan*20,2);
        }
        $data['hasil_kuisioner_b_bahan_latihan'] = $hasil_akhir_bahan_latihan;


        // REKRUITMEN
        $jml_kuisioner_c_rekruitmen = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_rekruitmen = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_rekruitmen = 0; 
        
        foreach($kuisioner_c_rekruitmen as $sl4){ 
            $id_soalnya4 = $sl4['id_kuisionerC'];
            $total_rekruitmen = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya4' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

            $jmlh_keseluruhan_rekruitmen=$jmlh_keseluruhan_rekruitmen+(number_format($total_rekruitmen['total']/$jml_kuisioner_c_rekruitmen,2));
            $hasil_akhir_rekruitmen = number_format($jmlh_keseluruhan_rekruitmen*25,2);
        }
        $data['hasil_kuisioner_c_rekruitmen'] = $hasil_akhir_rekruitmen;


        // PENYAMBUTAN
        $jml_kuisioner_c_penyambutan = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_penyambutan = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_penyambutan = 0; 
        
        foreach($kuisioner_c_penyambutan as $sl5){ 
            $id_soalnya5 = $sl5['id_kuisionerC'];
            $total_penyambutan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya5' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

            $jmlh_keseluruhan_penyambutan=$jmlh_keseluruhan_penyambutan+(number_format($total_penyambutan['total']/$jml_kuisioner_c_penyambutan,2));
            $hasil_akhir_penyambutan = number_format($jmlh_keseluruhan_penyambutan*25,2);
        }
        $data['hasil_kuisioner_c_penyambutan'] = $hasil_akhir_penyambutan;


        // SARPRAS ASRAMA
        $jml_kuisioner_c_sarpras_asrama = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_sarpras_asrama = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_sarpras_asrama = 0; 
        
        foreach($kuisioner_c_sarpras_asrama as $sl6){ 
            $id_soalnya6 = $sl6['id_kuisionerC'];
            $total_sarpras_asrama = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

            $jmlh_keseluruhan_sarpras_asrama=$jmlh_keseluruhan_sarpras_asrama+(number_format($total_sarpras_asrama['total']/$jml_kuisioner_c_sarpras_asrama,2));
            $hasil_akhir_sarpras_asrama = number_format($jmlh_keseluruhan_sarpras_asrama*25,2);
        }
        $data['hasil_kuisioner_c_sarpras_asrama'] = $hasil_akhir_sarpras_asrama;


        // KONSUMSI
        $jml_kuisioner_c_konsumsi = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_konsumsi = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_konsumsi = 0; 
        
        foreach($kuisioner_c_konsumsi as $sl7){ 
            $id_soalnya7 = $sl7['id_kuisionerC'];
            $total_konsumsi = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya7' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

            $jmlh_keseluruhan_konsumsi=$jmlh_keseluruhan_konsumsi+(number_format($total_konsumsi['total']/$jml_kuisioner_c_konsumsi,2));
            $hasil_akhir_konsumsi = number_format($jmlh_keseluruhan_konsumsi*25,2);
        }
        $data['hasil_kuisioner_c_konsumsi'] = $hasil_akhir_konsumsi;


        // SECARA UMUM
        $jml_kuisioner_c_secara_umum = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_secara_umum = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_secara_umum = 0; 
        
        foreach($kuisioner_c_secara_umum as $sl8){ 
            $id_soalnya7 = $sl8['id_kuisionerC'];
            $total_secara_umum = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya7' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

            $jmlh_keseluruhan_secara_umum=$jmlh_keseluruhan_secara_umum+(number_format($total_secara_umum['total']/$jml_kuisioner_c_secara_umum,2));
            $hasil_akhir_secara_umum = number_format($jmlh_keseluruhan_secara_umum*25,2);
        }
        $data['hasil_kuisioner_c_secara_umum'] = $hasil_akhir_secara_umum;



        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_kejuruan/detail_pelatihan',$data);
        $this->load->view('templates/footer');
    }


    function rekap_kuisioner($jenis,$kejuruan)
    {
        
        $data['kejuruan'] = $kejuruan;

        if($jenis==1)
        {
            $data['title'] = "SALUTE | Rekap Kuisioner A";
            // custome
            $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
            $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

            $data['kejuruan'] = $kejuruan;
            $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
            $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
    
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_kejuruan/detail_kuisioner_a',$data);
            $this->load->view('templates/footer');
        }
        elseif ($jenis==2) 
        {
            $data['title'] = "SALUTE | Detail Rekap Kuisioner B";

            $data['daftar_pengajar'] = $this->db->query("SELECT * FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
                                                                    LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
                                                                    WHERE pelatihan.id_kejuruan='$kejuruan'")->result_array();
            
            $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

            $data['kejuruan'] = $kejuruan;

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_kejuruan/detail_kuisioner_b',$data);
            $this->load->view('templates/footer');
        }elseif ($jenis==3) 
        {
            $data['title'] = "SALUTE | Detail Rekap Kuisioner C";
            $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_kejuruan/detail_kuisioner_c',$data);
            $this->load->view('templates/footer');
        }
    }

    function rekap_kuisioner_b_materi_pelatihan($kejuruan){
        $data['title'] = "SALUTE | Rekap Per Kejuruan Kuisioner B Materi Pelatihan";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();

        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_kejuruan/detail_kuisioner_b_materi_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    function rekap_kuisioner_b_sarpras($kejuruan){
        $data['title'] = "SALUTE | Rekap Per Kejuruan Kuisioner B Sarpras";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
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
        $this->load->view('v_rekap_kejuruan/detail_kuisioner_b_sarpras',$data);
        $this->load->view('templates/footer');
    }

///// bagian dhimas
       function rekap_kuisioner_b_bahan_latihan($kejuruan){
        $data['title'] = "SALUTE | Rekap Per kejuruan Kuisioner B Bahan Pelatihan";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();

        $data['kejuruan'] = $kejuruan;
        $data['kejuruan1'] = $this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
        $data['jml_kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_kejuruan/detail_kuisioner_b_bahan_pelatihan',$data);
        $this->load->view('templates/footer');
    }




    ////akhir kuisioner b

    function kuisioner_c_rekruitmen($kejuruan){
        $data['title'] = "SALUTE | Rekap Per Kejuruan Kuisioner C";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_kejuruan/detail_kuisioner_c_rekruitmen',$data);
        $this->load->view('templates/footer');
    }

    function kuisioner_c_kamar($kejuruan){
        $data['title'] = "SALUTE | Rekap Per Kejuruan Kuisioner C";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_kejuruan/detail_kuisioner_c_kamar',$data);
        $this->load->view('templates/footer');
    }

    function kuisioner_c_sarpras($kejuruan){
        $data['title'] = "SALUTE | Rekap Per Kejuruan Kuisioner C";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_c_sarpras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_sarpras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_kejuruan/detail_kuisioner_c_sarpras',$data);
        $this->load->view('templates/footer');
    }


    ///bagian dhimas 
    function kuisioner_c_konsumsi($kejuruan)
    {
        $data['title']="SALUTE | Rekap Per kejuruan Kuisioner C Konsumsi";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan' ")->result_array();
        $data['kejuruan']= $kejuruan;
        $data['kejuruan1'] = $this->M_kejuruan->tampil_detail_kejuruan($kejuruan);

         $data['jml_kuisioner_c_konsumsi']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_konsumsi']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_kejuruan/detail_kuisioner_c_konsumsi',$data);
         $this->load->view('templates/footer');
    }

    function kuisioner_c_uji_kompetensi($kejuruan)
    {
        $data['title']="SALUTE | Rekap Per kejuruan Kuisioner C Pelaksanaan Uji Kompetensi";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan' ")->result_array();
        $data['kejuruan']= $kejuruan;

        $data['kejuruan1'] = $this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
         $data['jml_kuisioner_c_pelaksanaan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_pelaksanaan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_kejuruan/detail_kuisioner_c_pelaksanaan',$data);
         $this->load->view('templates/footer');
    }

    function kuisioner_c_secara_umum($kejuruan)
    {
        $data['title']="SALUTE | Rekap Per kejuruan Kuisioner C Secara Umum Pelatihan";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan' ")->result_array();
        $data['kejuruan']= $kejuruan;

        $data['kejuruan1'] = $this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
         $data['jml_kuisioner_c_umum']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_umum']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_kejuruan/detail_kuisioner_c_umum',$data);
         $this->load->view('templates/footer');
    }



}