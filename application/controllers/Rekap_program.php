<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_program extends CI_Controller {
    	
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
        $data['program']= $this->M_progam->tampil_progam();

        $this->form_validation->set_rules('program','Program','trim|required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_program/index',$data);
            $this->load->view('templates/footer');
        }
        else{
            $program = $this->input->post('program',TRUE);

            $cek = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->row_array();

            if($cek['kd_pelatihan'] != NULL){
                redirect('rekap_program/in_detail_program/'.$program);
            }
            else{
                $this->session->set_flashdata('msg2','Laporan program yang anda cari tidak ditemukan!');
                redirect('rekap_program');
            }
        }
    }

    function in_detail_program($program){

        $data['title']= "SALUTE | Detail Per Program Pelatihan ";
        $data['program'] = $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
        

        $pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        
        // materi pelatihan
        $kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_materi_pelatihan = 0;
        $jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        foreach($kuisioner_b_materi_pelatihan as $sl){ 
            $id_soalnya1 = $sl['id_kuisionerB'];
        
            $total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.id_program='$program'")->row_array();
            
            $jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
            $hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;


        $kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
        $jml_kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();;
        $jml_keseluruhan_tenaga_pelatih=0;

        foreach ($kuisioner_b_tenaga_pelatih as $k) {
            $id_soalnyaku=$k['id_kuisionerB'];
            $total_tenaga_pelatih = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnyaku' AND pelatihan.id_program='$program'")->row_array();

            $jml_keseluruhan_tenaga_pelatih=$jml_keseluruhan_tenaga_pelatih+(number_format($total_tenaga_pelatih['total']/$jml_kuisioner_b_tenaga_pelatih,2));
            $hasil_akhir_tenaga_pelatih=number_format($jml_keseluruhan_tenaga_pelatih*20,2);

        }

        $data['hasil_kuisioner_b_tenaga_pelatih']=$hasil_akhir_tenaga_pelatih;

        /////menampilkan per tenaga pelatih 

        $data['daftar_pengajar']= $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
        LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
        WHERE pelatihan.id_program='$program'")->result_array();



        // foreach ($pelatihan as $k) {
        //     $kd_pelatihan=$k['kd_pelatihan'];
        //     $data['pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();
        //     $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();

        // }

        ///pemahaman
        $data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();
        $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();

        ///kemampuan dalam membawa materi
        $data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();
        $data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
        
        ///memahami masalah
        $data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();
        $data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
        
        // PENAMPILAN TENAGA PELATIH
        $data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();
        $data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();
       



        // bahan latihan
        $jml_kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_bahan_pelatihan = 0;
        foreach($kuisioner_b_bahan_latihan as $sl2){ 
            $id_soalnya2 = $sl2['id_kuisionerB'];
            $total_bahan_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya2' AND pelatihan.id_program='$program'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya3' AND pelatihan.id_program='$program'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya4' AND pelatihan.id_program='$program'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya5' AND pelatihan.id_program='$program'")->row_array();
            
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_program='$program'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_program='$program'")->row_array();

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
            WHERE penilaian_b.id_soalB='$id_soalnya7' AND pelatihan.id_program='$program'")->row_array();
            
            $jmlh_keseluruhan_sarpras = $jmlh_keseluruhan_sarpras+(number_format($total_sarpras['total']/$jml_kuisioner_b_sarpras,2));
            $hasil_akhir_sarpras = number_format($jmlh_keseluruhan_sarpras*20,2);
        }
        $data['hasil_kuisioner_b_sarpras'] = $hasil_akhir_sarpras;


        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_program/detail_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    
    function rekap_kuisioner($jenis,$program)
    {
        
        $data['program'] = $program;

        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
        if($jenis==1)
        {
            $data['title'] = "SALUTE | Rekap Kuisioner A";
            // custome

            $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
    
            $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
            $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
    
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_program/detail_kuisioner_a',$data);
            $this->load->view('templates/footer');
        }
        elseif ($jenis==2) 
        {
            $data['title'] = "SALUTE | Detail Rekap Kuisioner B";

            $data['daftar_pengajar'] = $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
            LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
            WHERE pelatihan.id_program='$program'")->result_array();
            

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_program/detail_kuisioner_b',$data);
            $this->load->view('templates/footer');
        }elseif ($jenis==3) 
        {
            $data['title'] = "SALUTE | Detail Rekap Kuisioner C";
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_program/detail_kuisioner_c',$data);
            $this->load->view('templates/footer');
        }

    }

    function in_detail_pelatihan_pengajar_kuisioner_b($program, $id_pengajar)
    {
        $data['title'] = "SALUTE | Rekap Per Program Kuisioner C";

        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();

        $data['uraian'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='uraian'")->result_array();

        $data['program'] = $program;
        $data['program1']=$this->M_progam->tampil_detail_progam($program);
        $data['id_pengajar'] = $id_pengajar;
        $data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();

        // PENGETAHUAN PEMAHAMAN
        $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();
        $data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();

        // KEMAMPUAN DALAM MEMBAWAKAN MATERI
        $data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
        $data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();

        // KEMAMPUAN DALAM MEMAHAMI MASALAH
        $data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
        $data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();

        // PENAMPILAN TENAGA PELATIH
        $data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();
        $data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_program/detail_kuisioner_b_tenaga_pelatih',$data);
        $this->load->view('templates/footer');
    }
    
    function rekap_kuisioner_b_materi_pelatihan($program){
        $data['title'] = "SALUTE | Rekap Per Program Kuisioner B Materi Pelatihan";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();

        $data['program'] = $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        $data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='uraian'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_program/detail_kuisioner_b_materi_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    function rekap_kuisioner_b_bahan_pelatihan($program)
    {
        $data['title'] = "SALUTE | Rekap Per Program Kuisioner B Bahan Pelatihan ";
        $data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();

        $data['uraian'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='uraian'")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

        $data['jml_kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_program/detail_kuisioner_b_bahan_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    function rekap_kuisioner_b_unit_kompetensi($program)
    {
        $data['title'] = "SALUTE | Rekap Per Program Kuisioner B Unit Kompetensi ";
        $data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

        $data['jml_kuisioner_b_unit_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=5 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_unit_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=5 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_program/detail_kuisioner_b_unit_kompetensi',$data);
        $this->load->view('templates/footer');

    }

    function rekap_kuisioner_b_sapras($program){
     $data['title']="SALUTE | Rekap Per Program Kuisioner B Sarana dan Prasarana";
     $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();

     $data['uraian']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='uraian'")->result_array();

     $data['program']= $program;
     $data['program1'] = $this->M_progam->tampil_detail_progam($program);
     $data['jml_kuisioner_b_sapras1']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
     $data['jml_kuisioner_b_sapras2']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
     $data['jml_kuisioner_b_sapras3']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
     $data['jml_kuisioner_b_sapras4']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
     $data['jml_kuisioner_b_sapras5']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();

     $data['kuisioner_b_sapras1']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
     $data['kuisioner_b_sapras2']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
     $data['kuisioner_b_sapras3']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
     $data['kuisioner_b_sapras4']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
     $data['kuisioner_b_sapras5']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();

     $this->load->view('templates/header',$data);
     $this->load->view('templates/sidebar',$data);
     $this->load->view('v_rekap_program/detail_kuisioner_b_sapras',$data);
     $this->load->view('templates/footer');

    }

    ////Rekap program 
    function rekap_kuisioner_c_rekrut($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Rekruitmen, Perjalanan, Persyaratan Peserta";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

        $data['soal_uraian']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='uraian'")->result_array();

         $data['jml_kuisioner_c_rekrut']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_rekrut']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_rekrut',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_penyambutan($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Penyambutan, Pembagian Kamar Peserta";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

        $data['soal_uraian']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='uraian'")->result_array();

         $data['jml_kuisioner_c_penyambutan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_penyambutan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_penyambutan',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_sapras($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Sarana Dan Prasarana Asrama";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;

        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
        $data['jml_kuisioner_c_sapras']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_sapras']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();

        $data['soal_uraian']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='uraian'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_sapras',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_konsumsi($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Konsumsi";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

        $data['soal_uraian']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='uraian'")->result_array();

         $data['jml_kuisioner_c_konsumsi']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_konsumsi']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_konsumsi',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_pelaksanaan($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Pelaksanaan Uji Kompetensi";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;

        $data['soal_uraian']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='uraian'")->result_array();

        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
         $data['jml_kuisioner_c_pelaksanaan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_pelaksanaan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_pelaksanaan',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_secara_umum($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Secara Umum Pelaksanaan Pelatihan";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

        $data['soal_uraian']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='uraian'")->result_array();

         $data['jml_kuisioner_c_umum']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_umum']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_secara_umum',$data);
         $this->load->view('templates/footer');
    }

}

/* End of file Rekap_progam.php */
