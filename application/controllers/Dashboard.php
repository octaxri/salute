<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

 
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_Dashboard');
		
	}
	
	
	public function index()
	{
		$data['title'] = "SALUTE | Dashboard";
		
		$data['jumlah_peserta']=$this->m_Dashboard->jumlah_peserta();
		$data['jumlah_pengajar']=$this->m_Dashboard->jumlah_pengajar();
		$data['jumlah_pelatihan']=$this->m_Dashboard->jumlah_pelatihan();

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('dashboard/index',$data);
		$this->load->view('templates/footer');

    }
    
    
}
