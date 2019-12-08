<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kejuruan extends CI_Model {

	
	public function tampil_kejuruan(){
		$this->db->select('*');
		$this->db->from('kejuruan');
		
		$query= $this->db->get()->result_array();

		return $query;
	}

	function tambah_data(){
		$data = [
			"nama_kejuruan" => $this->input->post('nama_kejuruan',TRUE)
		];

		$this->db->insert('kejuruan',$data);
	}

	function edit_data(){
		$data = [
			"nama_kejuruan" => $this->input->post('nama_kejuruan',TRUE)
		];

		$this->db->where('id_kejuruan',$this->input->post('id_kejuruan',TRUE));
		$this->db->update('kejuruan',$data);
	}

	function hapus_data(){
		$this->db->delete('kejuruan',['id_kejuruan' => $this->input->post('id_kejuruan',TRUE)]);
	}
    
    
}
