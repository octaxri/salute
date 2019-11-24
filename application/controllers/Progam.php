<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progam extends CI_Controller {

	
	public function index()
	{
        $data['title'] = "Progam Pelatihan";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_progam/index',$data);
        $this->load->view('templates/footer');
    }
    
    
}
