<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sub_soal extends CI_Model {

	
	public function tampil_sub_soal()
	{
		
		$this->db->select('*');
		$this->db->from('sub_soal');
		$query=$this->db->get()->result_array();

		return $query;
		
	}


	public function tambah_sub_soal()
	{
		$data=array(

			"nama_sub_soal" => $this->input->post('nama_sub_soal',TRUE)
			
		);

		$this->db->insert('sub_soal', $data);
		
	}


	public function hapus_sub_soal($id)
	{
		$this->db->delete('sub_soal',['id_sub_soal' => $id]);
	}
    
    
}
