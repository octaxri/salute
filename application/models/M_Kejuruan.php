<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kejuruan extends CI_Model {

	
	public function tampil_kejuruan()
	{
		$this->db->select('*');
		$this->db->from('kejuruan');
		
		$query= $this->db->get()->result_array();

		return $query;
	}
    
    
}
