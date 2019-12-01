<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Peserta extends CI_Model {

	
	public function tampil_data(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where("is_level != 1");
		
		$query= $this->db->get()->result_array();

		return $query;
	}
    
    
}
