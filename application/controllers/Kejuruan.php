<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kejuruan extends CI_Controller {

	
	public function index(){
		$data['title'] = "SALUTE | Kejuruan";
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_kejuruan/index',$data);
		$this->load->view('templates/footer');

    }
    
    
}
