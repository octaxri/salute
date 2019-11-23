<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kuisoner_B extends CI_Model {

	
	public function index()
	{
		$this->load->view('welcome_message');
    }
    
    
}
