<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengajar extends CI_Model 
{

	function tampil_pengajar()
	{
		$this->db->select('*');
		$this->db->from('pengajar');

		$query= $this->db->get()->result_array();

		return $query;
	}	

	function tambah_pengajar()
	{
		$data= array(

			"id_pengajar" => $this->m_pengajar->get_kopeng(),
			"nama_pengajar" => $this->input->post('nama_pengajar',TRUE),
			
		);

		$this->db->insert('pengajar', $data);
		
	}

	function hapus_pengajar($id)
	{
		$this->db->delete('pengajar',['id_pengajar' => $id]);
		
	}


	function get_kopeng()
    {
		$q = $this->db->query("SELECT MAX(RIGHT(id_pengajar,6)) AS kd_max FROM pengajar");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "PJR".$kd;
	}
    
    
}
