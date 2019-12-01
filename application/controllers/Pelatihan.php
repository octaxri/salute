<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model('M_Pelatihan');
	}

	
	public function index(){
		$data['title'] = "SALUTE | Pelatihan";

		$data['data'] = $this->M_Pelatihan->tampil_data();
		$data['kejuruan'] = $this->db->get('kejuruan')->result_array();
		$data['program'] = $this->db->get('program')->result_array();

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/index',$data);
		$this->load->view('templates/footer');
	}

	function tambah_data(){
		$this->M_Pelatihan->tambah_data();
		$this->session->set_flashdata('msg','Data berhasil ditambahkan');
		redirect('pelatihan');
	}

	function hapus_data(){
		$this->M_Pelatihan->hapus_data();
		$this->session->set_flashdata('msg','Data berhasil dihapus');
		redirect('pelatihan');
	}

	function detail_pelatihan($kd_pelatihan){
		$data['title'] = "SALUTE | Detail Pelatihan";

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/detail_pelatihan',$data);
		$this->load->view('templates/footer');
	}

	public function ambil_data(){
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');

		if($modul=="program"){
            echo $this->M_Pelatihan->program($id);
        }
	}
    
    
}
