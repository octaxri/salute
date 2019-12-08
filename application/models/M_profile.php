<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profile extends CI_Model {

    function editProfile(){
        if($this->session->userdata('level') == 1){ 
            $data = [
                "email" => $this->input->post('email',TRUE),
            ];
        }
        else{
            $data = [
                "nama" => $this->input->post('nama',TRUE),
                "email" => $this->input->post('email',TRUE),
                "jk" => $this->input->post('jk',TRUE),
                "tgl_lahir" => $this->input->post('tgl_lahir',TRUE), 
                "pendidikan" => $this->input->post('pendidikan',TRUE),
                "pekerjaan" => $this->input->post('pekerjaan',TRUE),
                "tipe_peserta" => $this->input->post('tipe_peserta',TRUE),
            ];
        }
        
        $this->db->where('id_user',$this->input->post('id',TRUE));
        $this->db->update('user',$data);
    }

}

