<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisoner_A extends CI_Controller {

	
	public function index()
	{
		$data['title'] = "Kuisoner A";
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_kuisoner/kuisoner_A',$data);
		$this->load->view('templates/footer');
    }
    
    
}
