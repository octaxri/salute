<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('level') != 1){
			redirect(base_url());
		}
		
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

	function cetak_kuisioner_b_sarpras($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB  WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_b_sarpras',$data);
	}

	function cetak_kuisioner_b_bahan_latihan($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_b_bahan_latihan',$data);
	}

	function cetak_kuisioner_c_rekrut($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_c_rekrut',$data);
	}

	function cetak_kuisioner_c_penyambutan($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_c_penyambutan',$data);
	}

	function cetak_kuisioner_c_sarpras($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();
		
		$this->load->view('v_laporan/pdf/kuisioner_c_sarpras',$data);
	}

	function cetak_kuisioner_c_konsumsi($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();

		
		$this->load->view('v_laporan/pdf/kuisioner_c_konsumsi',$data);
	}

	function kuisioner_c_bahan_pelatihan($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=5 ")->result_array();

		
		$this->load->view('v_laporan/pdf/kuisioner_c_bahan_pelatihan',$data);
	}

	function cetak_kuisioner_c_secara_umum($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 ")->result_array();
		
		$this->load->view('v_laporan/pdf/kuisioner_c_secara_umum',$data);
	}

	function cetak_kuisioner_c_pelaksanaan_uji($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_c_pelaksanaan_uji',$data);
	}

	function export_exel_kuisioner_a($kd_pelatihan){
		$data['title'] = "Kuisioner A";
		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
				
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();
		$data['graph']= $this->db->query("SELECT DISTINCT * FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();			

		$this->load->view('v_laporan/excel/kuisioner_a',$data);
	}

	function export_exel_kuisioner_b_materi_pelatihan($kd_pelatihan){
		$data['title'] = "Kuisioner B | Materi Pelatihan";

		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 ")->result_array();

		$this->load->view('v_laporan/excel/kuisioner_b_materi_pelatihan',$data);
	}

	function export_exel_kuisioner_b_sarpras($kd_pelatihan){
		$data['title'] = "Kuisioner B | Sarpras";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB  WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();

		$this->load->view('v_laporan/excel/kuisioner_b_sarpras',$data);
	}

	function export_exel_kuisioner_b_bahan_pelatihan($kd_pelatihan){
		$data['title'] = "Kuisioner B | Bahan Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_b_bahan_pelatihan',$data);
	}

	function export_exel_kuisioner_c_konsumsi($kd_pelatihan){
		$data['title'] = "Kuisioner C | Konsumsi";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_konsumsi',$data);
	}

	function export_exel_kuisioner_c_pelaksanaan_uji($kd_pelatihan){
		$data['title'] = "Kuisioner C | Pelaksanaan Uji Kompetensi";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_pelaksanaan_uji',$data);
	}

	function export_exel_kuisioner_c_secara_umum_pel($kd_pelatihan){
		$data['title'] = "Kuisioner C | Secara Umum Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_secara_umum',$data);
	}

	

	

    
    
}
