<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('level') != 1 ){
			redirect(base_url());
		}
		
		$this->load->model('M_pelatihan');
	}

	
	public function index(){
		$data['title'] = "SALUTE | Pelatihan";

		$data['data'] = $this->M_pelatihan->tampil_data();
		$data['kejuruan'] = $this->db->get('kejuruan')->result_array();
		$data['program'] = $this->db->get('program')->result_array();

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/index',$data);
		$this->load->view('templates/footer');
	}

	function tambah_data(){
		$this->M_pelatihan->tambah_data();
		$this->session->set_flashdata('msg','Data berhasil ditambahkan');
		redirect('pelatihan');
	}

	function hapus_data(){
		$this->M_pelatihan->hapus_data();
		$this->session->set_flashdata('msg','Data berhasil dihapus');
		redirect('pelatihan');
	}

	function detail_pelatihan($kd_pelatihan){
		$data['title'] = "SALUTE | Detail Pelatihan";

		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$data['jml_peserta'] = $this->db->query("SELECT * FROM detail_peserta WHERE kd_pelatihan='$kd_pelatihan'")->num_rows();
		$data['jml_pengajar'] = $this->db->query("SELECT * FROM detail_pengajar WHERE kd_pelatihan='$kd_pelatihan'")->num_rows();
		

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/detail_pelatihan',$data);
		$this->load->view('templates/footer');
	}

	function detail_pelatihan2($a, $kd_pelatihan){
		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		if($a == 1){
			$data['title'] = "SALUTE | Data Peserta Pelatihan";
			$data['data'] = $this->M_pelatihan->tampil_peserta($kd_pelatihan);
			$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/daftar_peserta',$data);
			$this->load->view('templates/footer');
			
		}
		else if($a == 2){
			$data['title'] = "SALUTE | Data Pengajar Pelatihan";
			$data['data'] = $this->M_pelatihan->tampil_pengajar($kd_pelatihan);
			$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
			$data['pengajar'] = $this->M_pelatihan->daftar_pengajar($kd_pelatihan);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/daftar_pengajar',$data);
			$this->load->view('templates/footer');
		}
		else if($a == 3){
			$data['title'] = "SALUTE | Data Kuisioner A Pelatihan";
			$data['data'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
			
			
			$data['responden'] = $this->db->query("SELECT DISTINCT id_user FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();
			$data['graph']= $this->db->query("SELECT DISTINCT * FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();			

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/detail_kuisioner_a',$data);
			$this->load->view('templates/footer');
		}
		else if($a == 4){
			$data['title'] = "SALUTE | Data Kuisioner B Pelatihan";

			$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
			$data['daftar_pengajar'] = $this->M_pelatihan->tampil_pengajar($kd_pelatihan);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/detail_kuisioner_b',$data);
			$this->load->view('templates/footer');
		}
		else if($a == 5)
		{
			$data['title'] = "SALUTE | Data Kuisioner C Pelatihan";

			$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
			$data['daftar_pengajar'] = $this->M_pelatihan->tampil_pengajar($kd_pelatihan);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/detail_kuisioner_c',$data);
			$this->load->view('templates/footer');
		}
	}

	function in_detail_pelatihan_kuisionerb_materi_pelatihan($kd_pelatihan){
		$data['title'] = "SALUTE | Data Kuisioner B Pelatihan";

		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 ")->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_materi_pelatihan',$data);
		$this->load->view('templates/footer');
	}

	function in_detail_pelatihan_pengajar_kuisioner_b($kd_pelatihan,$id_pengajar){
		$data['title'] = "SALUTE | Data Kuisioner B Pelatihan";

		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_pengajar',$data);

	}
	///detail pelatihan kuisione b sarana dan prasarana
	function in_detail_pelatihan_kuisionerb_sapras($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner B Sarana dan Prasarana ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB  WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_sapras',$data);
		$this->load->view('templates/footer');
	}

	//detail pelatihan kuisioner b bahan latihan
	function in_detail_pelatihan_kuisionerb_bahan_latihan($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner B Bahan Pelatihan ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_bahan_latihan',$data);
		$this->load->view('templates/footer');
	}

	//detail pelatihan unit kompetensi
	function in_detail_pelatihan_kuisionerb_unit_kompetensi($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner B Unit Kompetensi ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_unit_kompetensi',$data);
		$this->load->view('templates/footer');
	}

	///detail kuisioner c rekrut
	function in_detail_pelatihan_kuisionerc_rekrut($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Rekruitmen, Perjalanan, Persayaratan Peserta ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_rekrut',$data);
		$this->load->view('templates/footer');
	}

	//detail kuisioner C penyambutan
	function in_detail_pelatihan_kuisionerc_pemnyambutan($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Penyambutan, Pembagian Kamar Peserta ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 ")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_penyambutan',$data);
		$this->load->view('templates/footer');	
	}

	//deatal kuisioner sarana dan prasarana asrama
	function in_detail_pelatihan_kuisionerc_sapras($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Sarana dan Prasarana Asrama ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_sapras',$data);
		$this->load->view('templates/footer');	
	}

	//detail kuisioner C konsumsi
	function in_detail_pelatihan_kuisionerc_konsumsi($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Konsumsi ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_konsumsi',$data);
		$this->load->view('templates/footer');	
	}

	///detail kuisioner c Bahan Pelatihan

	
	////detail kuisioner C pelaksanaan pelatihan uji kompetensi
	function in_detail_pelatihan_kuisionerc_pelaksanaan_uji($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Pelaksanaan Uji Kompetensi ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 ")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_pelaksanaan_uji',$data);
		$this->load->view('templates/footer');
	}

	///detail kuisioner C Pelaksanaan Pelatihan
	function in_detail_pelatihan_kuisionerc_pelaksanaan_pel($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Pelaksanaan Uji Kompetensi ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 ")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_pelaksanaan_pel',$data);
		$this->load->view('templates/footer');
	}


	function tambah_pengajar_pelatihan(){
		$a = 2;
		$kd_pelatihan = $this->input->post('kd_pelatihan',TRUE);
		$this->M_pelatihan->tambah_pengajar_pelatihan();
		$this->session->set_flashdata('msg','Data berhasil ditambahkan');

		redirect('pelatihan/detail_pelatihan2/'.$a.'/'.$kd_pelatihan);
	}

	function hapus_pengajar_pelatihan(){
		$a = 2;
		$kd_pelatihan = $this->input->post('kd_pelatihan',TRUE);

		$this->M_pelatihan->hapus_pengajar_pelatihan();
		$this->session->set_flashdata('msg','Data berhasil dihapus');

		redirect('pelatihan/detail_pelatihan2/'.$a.'/'.$kd_pelatihan);
	}

	function hapus_peserta_pelatihan(){
		$a = 1;
		$kd_pelatihan = $this->input->post('kd_pelatihan',TRUE);

		$this->M_pelatihan->hapus_peserta_pelatihan();
		$this->session->set_flashdata('msg','Data berhasil dihapus');

		redirect('pelatihan/detail_pelatihan2/'.$a.'/'.$kd_pelatihan);
	}

	public function ambil_data()
	{
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');

		if($modul=="program"){
            echo $this->M_pelatihan->program($id);
        }
	}
    
    
}
