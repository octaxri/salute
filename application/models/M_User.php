<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	
	public function tampil_data(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('is_level',1);

		return $this->db->get()->result_array();
	}
	
	function tambah_data(){
		$data = [
			"username" => $this->input->post('username',TRUE),
			"password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			"email" => $this->input->post('email',TRUE),
			"is_level" => 1
		];

		$this->db->insert('user',$data);
	}

	function edit_data(){
		$data = [
			"email" => $this->input->post('email',TRUE)
		];

		$this->db->where('id_user',$this->input->post('id_user',TRUE));
		$this->db->update('user',$data);
	}

	function hapusData(){
        $this->db->delete('user',['id_user' => $this->input->post('id_user',TRUE)]);
    }
    
    
}
