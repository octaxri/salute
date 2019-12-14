<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan_peserta extends CI_Controller {

 
	public function __construct(){
		parent::__construct();
		//Do your magic here
		$this->load->model('M_pelatihan_peserta');
        $this->load->model('M_kuisoner_a');
        $this->load->model('M_kuisoner_b');
        $this->load->model('M_kuisoner_c');
        $this->load->model('M_pengajar');
    }
    
    public function index(){
		$data['title'] = "SALUTE | Pelatihan Peserta";
		
        $data['data'] = $this->M_pelatihan_peserta->tampil_data();
        $data['data1']=$this->M_pengajar->tampil_pengajar();

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/index',$data);
		$this->load->view('templates/footer');
    }
    
    function tambah_data(){
        $inputan = $this->input->post('kd_pelatihan');
        $id_peserta = $this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM detail_peserta WHERE kd_pelatihan='$inputan' AND id_user='$id_peserta'")->num_rows();

        if($tampung==0){
            $cek = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$inputan'")->num_rows();

            if($cek == 0){
                $this->session->set_flashdata('msg2','Gagal menambahkan pelatihan! Kode pelatihan tidak ditemukan');
                redirect('pelatihan_peserta');
            }
            else{
                $this->M_pelatihan_peserta->tambah_data();
                $this->session->set_flashdata('msg','Data berhasil ditambahkan');
                redirect('pelatihan_peserta');
            }       
        }
        else{
            $this->session->set_flashdata('msg2','Gagal menambahkan pelatihan! Pelatihan dengan kode yang diinputkan sudah pernah diikuti');
            redirect('pelatihan_peserta');
        }
		
    }
    
    function kirim_kuisioner_a($kd){
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg = date("Y-m-d", time()); 

        $id = $this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM penilaian_a WHERE id_user='$id' AND kd_pelatihan='$kd'")->num_rows();
        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];
        
        if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
            $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
            redirect('pelatihan_peserta');
        }

        $data['title'] = "SALUTE | Kuisioner A";

		// $data['data'] = $this->M_pelatihan_peserta->tampil_data();

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->M_kuisoner_a->tampil_kuisoner();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_a',$data);
        $this->load->view('templates/footer');
    }

    function proses_kuisioner_a(){
        $post = $this->input->post();
        $item = $post['pertanyaan'];

        foreach($item as $v) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalA" => $v['id'],
                "jawaban" => $v['jawaban'],
            ];

            $this->db->insert('penilaian_a',$data);
        }
        $this->session->set_flashdata('msg','Kuisioner A berhasil dikirim');
        redirect('pelatihan_peserta');
    }


    // kuisioner B, Tenaga pelatih
    function in_tenaga_pelatih_b($id, $kd)
    {
        date_default_timezone_set('Asia/Jakarta');

            $data['title']= "SALUTE | Kuisioner B";

            $data['kd_pelatihan'] = $kd;
            $data['id_pengajar'] = $id;
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

            $data['data'] = $this->M_kuisoner_b->tampil_tenaga_pel();

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_pelatihan_peserta/kuisioner_b_tenaga_pelatih',$data);
            $this->load->view('templates/footer');
    }

    // kuisioner B, Materi pelatihan
    function in_materi_pelatihan_kuisioner_b($kd){
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg = date("Y-m-d", time()); 

        $id=$this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM penilaian_b LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB 
                                        WHERE penilaian_b.id_user='$id' AND penilaian_b.kd_pelatihan='$kd' AND kuisioner_b.jenis_soal=1")->num_rows();
        
        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];

        if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
            $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
            redirect('pelatihan_peserta');
        }

        $data['title'] = "SALUTE | Kuisioner B";

		// $data['data'] = $this->M_pelatihan_peserta->tampil_data();

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->M_kuisoner_b->tampil_materi_pel();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_b_materi_pelatihan',$data);
        $this->load->view('templates/footer');
    }


    function proses_kuisioner_b()
    {
        $post = $this->input->post();
        $item = $post['pertanyaan'];
        $item2 = $post['pertanyaan2'];

        foreach($item as $v) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalB" => $v['id'],
                "jawaban" => $v['jawaban'],
            ];

            $this->db->insert('penilaian_b',$data);
        }

        foreach($item2 as $v2) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalB" => $v2['id'],
                "jawaban" => $v2['jawaban'],
            ];

            $this->db->insert('penilaian_b',$data);


        }
        $this->session->set_flashdata('msg','Kuisioner B berhasil dikirim');
        redirect('pelatihan_peserta');
    }

    function proses_kuisioner_b1()
    {
        $post = $this->input->post();
        $item = $post['pertanyaan'];
        $item2 = $post['pertanyaan2'];

        foreach($item as $v) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalB" => $v['id'],
                "jawaban" => $v['jawaban'],
            ];

            $this->db->insert('penilaian_b',$data);
        }

        foreach($item2 as $v2) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalB" => $v2['id'],
                "jawaban" => $v2['jawaban'],
            ];

            $this->db->insert('penilaian_b',$data);

            
            $tampung=$this->db->query('SELECT * FROM penilaian_b order by id DESC')->row_array();
        
            $data1=[
                "id_penilaian_b" => $tampung['id'],
                "id_pengajar" => $this->input->post('id_pengajar',TRUE)
            ];

            $this->db->insert('detail_penilaian_b', $data1);
        }
        $this->session->set_flashdata('msg','Kuisioner B berhasil dikirim');
        redirect('pelatihan_peserta');
    }
    // END MATERI PELATIHAN

    // ISI KUISIONER C1
    function in_materi_pelatihan_kuisioner_c1($kd){
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg = date("Y-m-d", time()); 

        $id=$this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM penilaian_c LEFT JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC 
                                        WHERE penilaian_c.id_user='$id' AND penilaian_c.kd_pelatihan='$kd' AND kuisioner_c.jenis_soal=1")->num_rows();
        
        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];

        if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
            $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
            redirect('pelatihan_peserta');
        }

        $data['title'] = "SALUTE | Kuisioner C";

		// $data['data'] = $this->M_pelatihan_peserta->tampil_data();

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->M_kuisoner_c->tampil_rekrut();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_c_1',$data);
        $this->load->view('templates/footer');
    }

    function proses_kuisioner_c1(){
        $post = $this->input->post();
        $item = $post['pertanyaan'];
        $item2 = $post['pertanyaan2'];

        foreach($item as $v) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalC" => $v['id'],
                "jawaban" => $v['jawaban'],
            ];

            $this->db->insert('penilaian_c',$data);
        }

        foreach($item2 as $v2) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalC" => $v2['id'],
                "jawaban" => $v2['jawaban'],
            ];

            $this->db->insert('penilaian_c',$data);
        }
        $this->session->set_flashdata('msg','Kuisioner C berhasil dikirim');
        redirect('pelatihan_peserta');
    }
    // AKHIR ISI KUISIONER C

    // ISI KUISIONER C2
    function in_materi_pelatihan_kuisioner_c2($kd){
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg = date("Y-m-d", time()); 

        $id=$this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM penilaian_c LEFT JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC 
                                        WHERE penilaian_c.id_user='$id' AND penilaian_c.kd_pelatihan='$kd' AND kuisioner_c.jenis_soal=2")->num_rows();
        
        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];

        if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
            $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
            redirect('pelatihan_peserta');
        }

        $data['title'] = "SALUTE | Kuisioner C";

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->M_kuisoner_c->tampil_penyambutan();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_c_2',$data);
        $this->load->view('templates/footer');
    }

    function in_sarana_prasarana_c($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg=date("Y-m-d",time());

        $this->session->userdata('id');
        
        $id=$this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM penilaian_c LEFT JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC 
                                        WHERE penilaian_c.id_user='$id' AND penilaian_c.kd_pelatihan='$kd' AND kuisioner_c.jenis_soal=3")->num_rows();
        
        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];   

           if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
            $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
            redirect('pelatihan_peserta');
        }
        
        $data['title'] = "SALUTE | Kuisioner C";

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->M_kuisoner_c->tampil_sarana();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_c_3',$data);
        $this->load->view('templates/footer');

    }

    function in_konsumsi_c($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg=date("Y-m-d",time());
        
        $id=$this->session->userdata('id');

        $tampung = $this->db->query("SELECT * FROM penilaian_c LEFT JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC 
        WHERE penilaian_c.id_user='$id' AND penilaian_c.kd_pelatihan='$kd' AND kuisioner_c.jenis_soal=4")->num_rows();
        
        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];   

           if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
            $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
            redirect('pelatihan_peserta');
        }

        $data['title'] = "SALUTE | Kuisioner C";

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['data'] = $this->M_kuisoner_c->tampil_konsumsi();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_c_4',$data);
        $this->load->view('templates/footer');

    }

    function in_bahan_pelatihan_c($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg=date("Y-m-d",time());

        $id=$this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM penilaian_c LEFT JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC 
        WHERE penilaian_c.id_user='$id' AND penilaian_c.kd_pelatihan='$kd' AND kuisioner_c.jenis_soal=5")->num_rows();
       
       $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];   

           if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
            $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
            redirect('pelatihan_peserta');
        }

        $data['title'] = "SALUTE | Kuisioner C";

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        
        $data['data'] = $this->M_kuisoner_c->tampil_bahan_latihan();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_c_5',$data);
        $this->load->view('templates/footer');

    }

    function in_pelaksanaan_uji_c($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg=date("Y-m-d",time());

        $id=$this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM penilaian_c LEFT JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC 
        WHERE penilaian_c.id_user='$id' AND penilaian_c.kd_pelatihan='$kd' AND kuisioner_c.jenis_soal=6")->num_rows();
        
        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];   

           if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
            $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
            redirect('pelatihan_peserta');
        }

        $data['title'] = "SALUTE | Kuisioner C";

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->M_kuisoner_c->tampil_pelaksanaan();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_c_6',$data);
        $this->load->view('templates/footer');

    }

    function in_umum_pelaksanaan_c($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg=date("Y-m-d",time());

        $id=$this->session->userdata('id');
        $tampung = $this->db->query("SELECT * FROM penilaian_c LEFT JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC 
        WHERE penilaian_c.id_user='$id' AND penilaian_c.kd_pelatihan='$kd' AND kuisioner_c.jenis_soal=7")->num_rows();
        
        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];   

           if($tampung != 0){
            $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
            redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
            $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
            redirect('pelatihan_peserta');
        }

        $data['title'] = "SALUTE | Kuisioner C";

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->M_kuisoner_c->tampil_pelaksanaan_pel();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_c_7',$data);
        $this->load->view('templates/footer');

    }

    ///kuisioner B uni kompetensi
    function in_unit_kompetensi_b($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg=date("Y-m-d",time());
        
        $id=$this->session->userdata('id');

        $tampung = $this->db->query("SELECT * FROM penilaian_b LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB 
        WHERE penilaian_b.id_user='$id' AND penilaian_b.kd_pelatihan='$kd' AND kuisioner_b.jenis_soal=5")->num_rows();

        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];

        if($tampung != 0){
        $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
        redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
        $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
        redirect('pelatihan_peserta');
        }

        $data['title']="SALUTE | Kuisioner Unit KOmpetensi";
        
        $data['kd_pelatihan']= $kd;
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data']=$this->M_kuisoner_b->tampil_unit_kompetensi();
        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_b_unit_kompetensi',$data);
        $this->load->view('templates/footer');

    }

    ///Kuisioner B sarana dan prasarana
    function in_sarana_dan_prasarana_b($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg= date("Y-m-d",time());

        $id= $this->session->userdata('id');

        $tampung = $this->db->query("SELECT * FROM penilaian_b LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB 
        WHERE penilaian_b.id_user='$id' AND penilaian_b.kd_pelatihan='$kd' AND kuisioner_b.jenis_soal=3")->num_rows();

        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];

        if($tampung != 0){
        $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
        redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
        $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
        redirect('pelatihan_peserta');
        }

        $data['title'] = "SALUTE | Kuisioner Sarana dan Prasarana";

        $data['kd_pelatihan']= $kd;

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data']=$this->M_kuisoner_b->tampil_sapras();
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_b_sarana_dan_prasarana_b',$data);
        $this->load->view('templates/footer');
    }

    ///Kuisioner Bahan Pelatihan B
    function in_bahan_pelatihan_b($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg=date("Y-m-d",time());

        $id= $this->session->userdata('id'); 

        $tampung = $this->db->query("SELECT * FROM penilaian_b LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB 
        WHERE penilaian_b.id_user='$id' AND penilaian_b.kd_pelatihan='$kd' AND kuisioner_b.jenis_soal=4")->num_rows();

        $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        $tgl = $get_pelatihan['tgl_akhir_pelatihan'];

        if($tampung != 0){
        $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
        redirect('pelatihan_peserta');
        }
        else if($tgl_skrg>$tgl){
        $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
        redirect('pelatihan_peserta');
        }

        $data['title']="SALUTE | Kuisioner Bahan Pelatihan, Modul, ATK, dan Seragam Peserta";

        $data['kd_pelatihan']= $kd;

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data']=$this->M_kuisoner_b->tampil_bahan_latihan();

        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_b_bahan_latihan',$data);
        $this->load->view('templates/footer');

    }


    




}