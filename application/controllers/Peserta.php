<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		
		$this->load->model('M_peserta');
		///$this->load->library('barcode');
	}

	public function index(){
		$data['title'] = "SALUTE | Daftar Peserta";

		$data['data'] = $this->M_peserta->tampil_data();

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_peserta/index',$data);
		$this->load->view('templates/footer');

	}
    
    
}
