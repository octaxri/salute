<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

 
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_dashboard');
		
	}
	
	
	public function index()
	{
		$data['title'] = "SALUTE | Dashboard";
		
		$data['jumlah_peserta']=$this->M_dashboard->jumlah_peserta();
		$data['jumlah_pengajar']=$this->M_dashboard->jumlah_pengajar();
		$data['jumlah_pelatihan']=$this->M_dashboard->jumlah_pelatihan();

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('dashboard/index',$data);
		$this->load->view('templates/footer');

    }
    
    
}
