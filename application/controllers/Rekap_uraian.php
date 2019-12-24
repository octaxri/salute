<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_uraian extends CI_Controller {

 

        
    public function tampil_uraian_materi_pelatihan()
    {



        
		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['title']="SALUTE | Rekap Uraian Materi Pelatihan";
        $data['materi']=$this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB INNER JOIN user ON penilaian_b.id_user=user.id_user where
         kd_pelatihan AND jenis_soal=1 AND tipe_soal='uraian' ")->result_array();

        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_uraian/materi',$data);
		$this->load->view('templates/footer');
        
    }


    public function tampil_uraian_tenaga_pelatih()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['title']="SALUTE | Rekap Uraian Tenaga Pelatih";
        $data['pelatih']=$this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB INNER JOIN user ON penilaian_b.id_user=user.id_user where
         kd_pelatihan AND jenis_soal=2 AND tipe_soal='uraian' ")->result_array();

        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_uraian/tenaga_pelatih',$data);
		$this->load->view('templates/footer');
    }

    function tampil_uraian_sapras()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['title']="SALUTE | Rekap Uraian Sarana Prasarana";
        $data['sapras']=$this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB INNER JOIN user ON penilaian_b.id_user=user.id_user where
         kd_pelatihan AND jenis_soal=3 AND tipe_soal='uraian' ")->result_array();

        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_uraian/sapras',$data);
		$this->load->view('templates/footer');
    }

    function tampil_uraian_bahan_pelatihan()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['title']="SALUTE | Rekap Uraian Bahan Pelatihan";
        $data['bahan']=$this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB INNER JOIN user ON penilaian_b.id_user=user.id_user where
         kd_pelatihan AND jenis_soal=4 AND tipe_soal='uraian' ")->result_array();

        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_uraian/bahan_pelatihan',$data);
		$this->load->view('templates/footer');
    }

    function tampil_uraian_rekrut()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['title']="SALUTE | Rekap Uraian Rekruitment";
        $data['rekrut']=$this->db->query("SELECT * FROM penilaian_c INNER JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC INNER JOIN user ON penilaian_c.id_user=user.id_user where
         kd_pelatihan AND jenis_soal=1 AND tipe_soal='uraian' ")->result_array();

        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_uraian/rekrut',$data);
		$this->load->view('templates/footer');
    }

    function tampil_uraian_sambut()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['title']="SALUTE | Rekap Uraian Penyambutan";
        $data['sambut']=$this->db->query("SELECT * FROM penilaian_c INNER JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC INNER JOIN user ON penilaian_c.id_user=user.id_user where
         kd_pelatihan AND jenis_soal=2 AND tipe_soal='uraian' ")->result_array();

        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_uraian/sambut',$data);
		$this->load->view('templates/footer');
    }

    function tampil_uraian_sapras_asrama()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['title']="SALUTE | Rekap Uraian Sarana Prasarana Asrama";
        $data['asrama']=$this->db->query("SELECT * FROM penilaian_c INNER JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC INNER JOIN user ON penilaian_c.id_user=user.id_user where
         kd_pelatihan AND jenis_soal=3 AND tipe_soal='uraian' ")->result_array();

        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_uraian/sapras_asrama',$data);
		$this->load->view('templates/footer');
    }

    function tampil_uraian_konsumsi()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['title']="SALUTE | Rekap Uraian Konsumsi";
        $data['konsumsi']=$this->db->query("SELECT * FROM penilaian_c INNER JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC INNER JOIN user ON penilaian_c.id_user=user.id_user where
         kd_pelatihan AND jenis_soal=4 AND tipe_soal='uraian' ")->result_array();

        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_uraian/konsumsi',$data);
		$this->load->view('templates/footer');
    }

    function tampil_uraian_umum()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $data['title']="SALUTE | Rekap Uraian Secara Umum";
        $data['umum']=$this->db->query("SELECT * FROM penilaian_c INNER JOIN kuisioner_c ON penilaian_c.id_soalC=kuisioner_c.id_kuisionerC INNER JOIN user ON penilaian_c.id_user=user.id_user where
         kd_pelatihan AND jenis_soal=7 AND tipe_soal='uraian' ")->result_array();

        
        $this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_uraian/umum',$data);
		$this->load->view('templates/footer');
    }

}

/* End of file Rekap_uraian.php */
