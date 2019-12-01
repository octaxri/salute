<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Progam extends CI_Model {

    
    public function tampil_progam()
    {
        $this->db->select('*');
        $this->db->from('program');
        $this->db->join('kejuruan', 'kejuruan.id_kejuruan=program.id_kejuruan');
        

        $query= $this->db->get()->result_array();

        return $query;
    }

    public function tambah_progam()
    {
        $data= array(
            "id_kejuruan" =>  $this->input->post('id_kejuruan',TRUE),
            "nama_program" => $this->input->post('nama_progam',TRUE)
        );

        $this->db->insert('program', $data);
    }


    public function hapus_progam($id)
    {
        $this->db->delete('program', ['id_program' => $id]);
        
    }
    

    function get_kopro()
    {
		$q = $this->db->query("SELECT MAX(RIGHT(id_progrm,6)) AS kd_max FROM program");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "PR".$kd;
	}
    
}
