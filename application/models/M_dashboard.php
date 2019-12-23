<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function jumlah_peserta()
    {
        $query=$this->db->get('detail_peserta');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else 
        {
            return 0;    
        }
        
    }

    public function jumlah_pengajar()
    {
        $query=$this->db->get('pengajar');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else 
        {
            return 0;    
        }
        
    }

    public function jumlah_pelatihan()
    {
        $query=$this->db->get('pelatihan');

        if($query->num_rows() > 0)
        {
            return $query->num_rows();
        }
        else 
        {
            return 0;    
        }
        
    }

    public function jumlah_pesan_masuk()
    {
        $a=$this->db->get('penilaian_a');
        $b=$this->db->get('penilaian_b');
        $c=$this->db->get('penilaian_c');

        if($a->num_rows() >0 && $b->num_rows()>0 ) 
        {


            return $a->num_rows()+$b->num_rows()+$c->num_rows();
        }
        else
        {
            return 0;
        }
    }

}


