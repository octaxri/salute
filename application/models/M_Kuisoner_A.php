<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kuisoner_a extends CI_Model 
{

	
	public function tampil_kuisoner()
	{
		$this->db->select('*');
		$this->db->from('kuisioner_a');
		$query= $this->db->get()->result_array();

		return $query;
			
	}

	public function tambah_kuisoner()
	{
		$data=array(

			"soalA" => $this->input->post('soalA',TRUE),
			"jawaban1A" => $this->input->post('jawaban1A',TRUE),
			"jawaban2A" => $this->input->post('jawaban2A',TRUE),
			"jawaban3A" => $this->input->post('jawaban3A',TRUE),
			"jawaban4A" => $this->input->post('jawaban4A',TRUE)
		);

		$this->db->insert('kuisioner_a', $data);
		
	}

	public function hapus_kuisoner($id)
	{
		$this->db->delete('kuisioner_a',['id_kuisionerA' => $id]);
		
	}
    
    
}
