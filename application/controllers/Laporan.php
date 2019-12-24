<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('level') != 1){
			redirect(base_url());
		}
		
		$this->load->model('M_pelatihan');
		$this->load->model('M_progam');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	// PDF

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

	function cetak_kuisioner_b_pelatihan_pengajar($kd_pelatihan,$id_pengajar){
		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal,tipe_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b  WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_b_pelatihan_pengajar',$data);
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

	function cetak_rekap_tahap_kuisioner_a($tahap){
        $data['tahap'] = $tahap;
        // custome
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
        $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_a',$data);
	}

	function rekap_pertahap_kuisioner_b_materi_pelatihan($tahap){
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_b_materi_pelatihan',$data);
	}

	/// per program
	 function cetak_rekap_program_kuisioner_a($program)
	 {
		$data['program'] = $program;
		$data['program1'] = $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();

        $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
        $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_a',$data);
	 }

	 function rekap_program_kuisioner_b_materi_pelatihan($program)
	 {

		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_b_materi_pelatihan',$data);
	 }
	 
	 function rekap_program_kuisioner_b_sapras($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->num_rows();
        $data['jml_kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->num_rows();
        $data['jml_kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->num_rows();
        $data['jml_kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();
		
		$data['kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
        $data['kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
        $data['kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
        $data['kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
        $data['kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_b_sapras',$data);
	 }

	 function rekap_program_kuisioner_b_bahan_pelatihan($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_b_bahan_pelatihan',$data);
	 }

	 function cetak_program_kuisioner_c_rekrut($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_rekrut'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekrut'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_rekrut',$data);
	 }

	 function cetak_program_kuisioner_c_sambut($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_penyambutan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_penyambutan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_penyambutan',$data);
	 }

	function cetak_program_kuisioner_c_sapras($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_sapras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_sapras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_sapras',$data);
	 }

	 function cetak_program_kuisioner_c_konsumsi($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_konsumsi',$data);
	 }

	 function cetak_program_kuisioner_c_pelaksanaan($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_pelaksanaan',$data);
	 }

	 function cetak_program_kuisioner_c_umum($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_umum',$data);
	 }

	 function cetak_pertahap_kuisioner_b_sarpras($tahap){
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
        $data['jml_ruang_teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
        $data['jml_km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
        $data['jml_sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();

        $data['workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
        $data['teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
        $data['listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
        $data['km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
        $data['sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_b_sarpras',$data);
	 }

	 function rekap_pertahap_kuisioner_b_bahan_pelatihan($tahap){

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
		$data['kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_b_bahan_pelatihan',$data);
	}

	function rekap_pertahap_kuisioner_c_rekruitmen($tahap){

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_c_rekruitmen',$data);
	}
	
	// akhir pdf

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

	function export_exel_kuisioner_b_pelatihan_pengajar($kd_pelatihan){
		$data['title'] = "Kuisioner B | Pengajar Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_b_pelatihan_pengajar',$data);
	}

	
	function export_exel_kuisioner_c_rekrut($kd_pelatihan){
		$data['title'] = "Kuisioner B | Bahan Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_rekrut',$data);
	}

	function export_exel_kuisioner_c_penyambutan($kd_pelatihan){
		$data['title'] = "Kuisioner B | Bahan Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_penyambutan',$data);
	}
	
	function export_exel_kuisioner_c_sarpras($kd_pelatihan){
		$data['title'] = "Kuisioner B | Bahan Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_sarpras',$data);
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

	function export_exel_rekap_tahap_kuisioner_a($tahap){
		$data['title'] = "Kuisioner A | Per Tahap : .$tahap.";

		$data['tahap'] = $tahap;
        // custome
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
        $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_a',$data);
	}

	function export_exel_rekap_tahap_kuisioner_b_materi_pelatihan($tahap){
		$data['title'] = "Kuisioner B - Materi Pelatihan | Tahap : .$tahap.";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_b_materi_pelatihan',$data);
	}

	///perprogram excel
	function export_excel_rekap_program_kuisioner_a($program)
	{
		$data['title'] = "Kuisioner A | Per Program : .$program.";
		$data['program']=$program;
		$data['program1']=$this->M_progam->tampil_detail_progam($program);

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();

        $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
        $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_a',$data);

	}

	function export_exel_program_kuisioner_b_materi_pelatihan($program)
	{
		$data['title'] = "Kuisioner B - Materi Pelatihan | Program : .$program.";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
        $data['program'] = $program;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_b_materi_pelatihan',$data);
	}
	
	function export_exel_pertahap_kuisioner_b_sarpras($tahap){
		$data['title'] = "Kuisioner B - Sarpras | Program : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
        $data['jml_ruang_teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
        $data['jml_km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
        $data['jml_sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();

        $data['workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
        $data['teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
        $data['listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
        $data['km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
		$data['sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_b_sarpras',$data);
	}

	function export_exel_program_kuisioner_b_sapras($program)
	{
		$data['title'] = "Kuisioner B - Sarana / Prasarana | Program : .$program.";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
        $data['program'] = $program;
        $data['jml_kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
        $data['jml_kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
        $data['jml_kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
        $data['jml_kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();
		
		$data['kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
		$data['kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
		$data['kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
		$data['kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
		$data['kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_b_sapras',$data);

	}

	function export_exel_program_kuisioner_b_bahan_pelatihan($program)
	{
		$data['title'] = "Kuisioner B - Bahan Pelatihan | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_b_bahan_pelatihan',$data);
	}

	///perpogram c 
	function export_program_excel_kuisioner_c_rekrut($program)
	{
		$data['title'] = "Kuisioner C - Rekruitmen | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_rekrut'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekrut'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_rekrut',$data);
	}

	function export_program_excel_kuisioner_c_sambut($program)
	{
		$data['title'] = "Kuisioner C - Penyambutan | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_penyambutan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_penyambutan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_penyambutan',$data);
	}

	function export_program_excel_kuisioner_c_sapras($program)
	{
		$data['title'] = "Kuisioner C - Sarana / Prasarana | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_sapras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_sapras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_sapras',$data);
	}

	function export_program_excel_kuisioner_c_konsumsi($program)
	{
		$data['title'] = "Kuisioner C - Konsumsi | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_konsumsi',$data);
	}

	function export_program_excel_kuisioner_c_pelaksanaan($program)
	{
		$data['title'] = "Kuisioner C - Pelaksanaan | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_pelaksanaan',$data);
	}


	function export_program_excel_kuisioner_c_umum($program)
	{
		$data['title'] = "Kuisioner C - Secara Umum | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_umum',$data);
	}

	function export_exel_rekap_tahap_kuisioner_b_bahan_pelatihan($tahap){
		$data['title'] = "Kuisioner B - Bahan Pelatihan | Tahap : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_b_bahan_pelatihan',$data);
	}

	function export_exel_rekap_tahap_kuisioner_c_rekruitmen($tahap){
		$data['title'] = "Kuisioner C - Rekruitmen | Tahap : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_c_rekruitmen',$data);
	}
    
}
