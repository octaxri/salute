<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kejuruan extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model('M_kejuruan');
		///$this->load->library('barcode');
	}

	public function index(){
		$data['title'] = "SALUTE | Kejuruan";

		$data['data'] = $this->M_kejuruan->tampil_kejuruan();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_kejuruan/index',$data);
		$this->load->view('templates/footer');

	}
	
	function tambah_data(){
		$this->M_kejuruan->tambah_data();
		$this->session->set_flashdata('msg', 'Berhasil ditambahkan');
		redirect('kejuruan');
	}

	public function edit_data()
	{
		$this->M_kejuruan->edit_data();
		$this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
		redirect('kejuruan');

	}

	public function hapus_data()
	{
		$this->M_kejuruan->hapus_data();
		$this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
		redirect('kejuruan');
	}
    
    
}
