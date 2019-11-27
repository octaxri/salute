<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profile extends CI_Model {

    function editProfile(){
        $data = [
            "email" => $this->input->post('email',TRUE),
        ];

        $this->db->where('id_user',$this->input->post('id',TRUE));
        $this->db->update('user',$data);
    }

}

