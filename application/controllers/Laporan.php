<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->load->model('M_pelatihan');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function cetak_kuisioner_a_pdf($kd_pelatihan){
		$data['kd_pelatihan'] = $kd_pelatihan;

		$data['data'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();
		$data['graph']= $this->db->query("SELECT DISTINCT * FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();	
		
		$this->load->view('v_laporan/pdf/kuisioner_a',$data);
	}

	function cetak_kuisioner_b_materi_pelatihan($kd_pelatihan){
		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_b_materi_pelatihan',$data);
	}
	

    
    
}
