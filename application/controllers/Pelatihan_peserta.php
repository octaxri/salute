<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan_peserta extends CI_Controller {

 
	public function __construct(){
		parent::__construct();
		//Do your magic here
		$this->load->model('M_Pelatihan_Peserta');
        $this->load->model('m_Kuisoner_A');
        $this->load->model('m_Kuisoner_B');
        $this->load->model('m_Kuisoner_C');
    }
    
    public function index(){
		$data['title'] = "SALUTE | Pelatihan Peserta";

		$data['data'] = $this->M_Pelatihan_Peserta->tampil_data();

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
                $this->M_Pelatihan_Peserta->tambah_data();
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

		// $data['data'] = $this->M_Pelatihan_Peserta->tampil_data();

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->m_Kuisoner_A->tampil_kuisoner();

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

    // kuisioner B, Materi pelatihan
    function in_materi_pelatihan_kuisioner_b($kd){
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg = date("Y-m-d", time()); 

        $id = $this->session->userdata('id');
        // $tampung = $this->db->query("SELECT * FROM penilaian_a WHERE id_user='$id' AND kd_pelatihan='$kd'")->num_rows();
        // $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        // $tgl = $get_pelatihan['tgl_akhir_pelatihan'];
        
        // if($tampung != 0){
        //     $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
        //     redirect('pelatihan_peserta');
        // }
        // else if($tgl_skrg>$tgl){
        //     $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
        //     redirect('pelatihan_peserta');
        // }

        $data['title'] = "SALUTE | Kuisioner B";

		// $data['data'] = $this->M_Pelatihan_Peserta->tampil_data();

        $data['kd_pelatihan'] = $kd;
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data'] = $this->m_Kuisoner_B->tampil_materi_pel();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_b_materi_pelatihan',$data);
        $this->load->view('templates/footer');
    }


    function proses_kuisioner_b()
    {
        $post = $this->input->post();
        $item = $post['pertanyaan'];

        foreach($item as $v) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalB" => $v['id'],
                "jawaban" => $v['jawaban'],
            ];

            $this->db->insert('penilaian_b',$data);
        }
        $this->session->set_flashdata('msg','Kuisioner B berhasil dikirim');
        redirect('pelatihan_peserta');
    }

    function in_sarana_dan_prasarana_b($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg= date("Y-m-d",time());

        $id= $this->session->userdata('id');

        $data['title'] = "SALUTE | Kuisioner Sarana dan Prasarana";

        $data['kd_pelatihan']= $kd;

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data']=$this->m_Kuisoner_B->tampil_sapras();

        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_b_sarana_dan_prasarana_b',$data);
        $this->load->view('templates/footer');
    }

    function in_bahan_pelatihan_b($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_skrg=date("Y-m-d",time());

        $id=$this->session->userdata('id');

        $data['title']="SALUTE | Kuisioner Bahan Pelatihan, Modul, ATK, dan Seragam Peserta";

        $data['kd_pelatihan']= $kd;

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data']=$this->m_Kuisoner_B->tampil_bahan_latihan();

        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_b_bahan_latihan',$data);
        $this->load->view('templates/footer');

    }

    function kirim_kuisioner_c($kd)
    {
        date_default_timezone_set('Asia/Jakarta');
            $tgl_skrg=date("Y-m-d",time());

        $id = $this->session->userdata('id');
        // $tampung = $this->db->query("SELECT * FROM penilaian_a WHERE id_user='$id' AND kd_pelatihan='$kd'")->num_rows();
        // $get_pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd'")->row_array();
        // $tgl = $get_pelatihan['tgl_akhir_pelatihan'];

        // if($tampung != 0){
        //     $this->session->set_flashdata('msg2','Anda sudah mengisi kuisioner ini!');
        //     redirect('pelatihan_peserta');
        // }
        // else if($tgl_skrg>$tgl){
        //     $this->session->set_flashdata('msg2','Waktu pelatihan telah berakhir!');
        //     redirect('pelatihan_peserta');
        // }

        $data['title']="SALUTE | Kuisioner C";

        $data['kd_pelatihan']= $kd;

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['data']=$this->m_Kuisoner_C->tampil_rekrut();
        $data['data1']=$this->m_Kuisoner_C->tampil_penyambutan();
        $data['data2']=$this->m_Kuisoner_C->tampil_sarana();
        $data['data3']=$this->m_Kuisoner_C->tampil_konsumsi();
        $data['data4']=$this->m_Kuisoner_C->tampil_bahan_latihan();
        $data['data5']=$this->m_Kuisoner_C->tampil_pelaksanaan();
        $data['data6']=$this->m_Kuisoner_C->tampil_pelaksanaan_pel();

        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan_peserta/kuisioner_c',$data);
        $this->load->view('templates/footer');

    }

    function proses_kuisioner_c(){
        $post = $this->input->post();
        $item = $post['pertanyaan'];

        foreach($item as $v) {
            $data = [
                "kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
                "id_user" => $this->session->userdata('id'),
                "id_soalC" => $v['id'],
                "jawaban" => $v['jawaban'],
            ];

            $this->db->insert('penilaian_c',$data);
        }
        $this->session->set_flashdata('msg','Kuisioner C berhasil dikirim');
        redirect('pelatihan_peserta');
    }




}