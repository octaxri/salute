<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelatihan_peserta extends CI_Model {

    function tampil_data(){
        $id = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('detail_peserta');
        $this->db->join('pelatihan as a','detail_peserta.kd_pelatihan=a.kd_pelatihan');
        $this->db->join('kejuruan as b','a.id_kejuruan=b.id_kejuruan');
        $this->db->join('program as c','a.id_program=c.id_program');
        $this->db->where('detail_peserta.id_user',$id);
        // $this->db->order_by("history_kirim.id","desc");

        return $this->db->get()->result_array();
    }

    function tambah_data(){
        $data = [
            "kd_pelatihan" => $this->input->post('kd_pelatihan'),
            "id_user" => $this->session->userdata('id')
        ];

        $this->db->insert('detail_peserta',$data);
    }

}