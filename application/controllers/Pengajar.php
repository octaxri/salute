<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller {

	
	public function index()
	{
		$data['title'] ="Pengajar";
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pengajar/index',$data);
		$this->load->view('templates/footer');
    }
    
    
}
