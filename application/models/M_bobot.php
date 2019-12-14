<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bobot extends CI_Model {

    function tampil_bobot()
    {
        $this->db->select('*');
        $this->db->from('bobot');
        $query=$this->db->get()->result_array();

        return $query;
        
        
    }

    function tambah_data()
    {
        $data=array(
            
            "nilai" => $this->input->post('bobot',TRUE)
            
        );

        $this->db->insert('bobot', $data);
        
    }

    function hapus_data($id)
    {
       
        $this->db->delete('bobot', array('id_bobot' => $id));
        
        
    }
    

}

/* End M_bobot.php */
