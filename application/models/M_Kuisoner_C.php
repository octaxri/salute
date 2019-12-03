<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kuisoner_C extends CI_Model 
{

    public function tampil_rekrut()
    {
        $this->db->select('*');
        $this->db->from('kuisioner_c');
        $this->db->where('jenis_soal', 1);
        $query= $this->db->get()->result_array();
        return $query;
    }    

    public function tampil_penyambutan()
    {
        $this->db->select('*');
        $this->db->from('kuisioner_c');
        $this->db->where('jenis_soal', 2);
        $query=$this->db->get()->result_array();
        return $query;
    }

    public function tampil_sarana()
    {
        $this->db->select('*');
        $this->db->from('kuisioner_c');
        $this->db->where('jenis_soal', 3);
        $query=$this->db->get()->result_array();
        return $query;    
    }
    
    public function tampil_konsumsi()
    {
        $this->db->select('*');
        $this->db->from('kuisioner_c');
        $this->db->where('jenis_soal', 4);
        $query=$this->db->get()->result_array();
        return $query;
    }

    public function tampil_bahan_latihan()
    {
        $this->db->select('*');
        $this->db->from('kuisioner_c');
        $this->db->where('jenis_soal', 5);
        $query=$this->db->get()->result_array();
        return $query;
    }

    public function tampil_pelaksanaan()
    {
        $this->db->select('*');
        $this->db->from('kuisioner_c');
        $this->db->where('jenis_soal', 6);
        $query=$this->db->get()->result_array();
        return $query;
    }

    public function tampil_pelaksanaan_pel()
    {
        $this->db->select('*');
        $this->db->from('kuisioner_c');
        $this->db->where('jenis_soal', 7);
        $query=$this->db->get()->result_array();
        return $query;
    }

    public function tambah_data()
    {
        $data=array(

            "jenis_soal" => $this->input->post('jenis_soal',TRUE),
            "soalC" => $this->input->post('soalC',TRUE),
            "jawaban1C" => $this->input->post('jawaban1C',TRUE),
            "jawaban2C" => $this->input->post('jawaban2C',TRUE),
            "jawaban3C" => $this->input->post('jawaban3C',TRUE),
            "jawaban4C" => $this->input->post('jawaban4C',TRUE),
            "tipe_soal" => $this->input->post('tipe_soal',TRUE)
            
        );

        $this->db->insert('kuisioner_c', $data);
    }

    public function hapus_data($id)
    {
        $this->db->delete('kuisioner_c',['id_kuisionerC' => $id]);
    }


}


