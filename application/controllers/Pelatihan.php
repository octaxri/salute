<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Controller {

	function __construct(){
		parent::__construct();
		
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

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/detail_kuisioner_a',$data);
			$this->load->view('templates/footer');
		}
		else if($a == 4){
			$data['title'] = "SALUTE | Data Kuisioner B Pelatihan";

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/detail_kuisioner_b',$data);
			$this->load->view('templates/footer');
		}
		else if($a == 5){
			$data['title'] = "SALUTE | Data Kuisioner C Pelatihan";
		}
	}

	function in_detail_pelatihan_kuisionerb_materi_pelatihan($kd_pelatihan){
		$data['title'] = "SALUTE | Data Kuisioner B Pelatihan";

		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_materi_pelatihan',$data);
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

	public function ambil_data(){
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');

		if($modul=="program"){
            echo $this->M_pelatihan->program($id);
        }
	}
    
    
}
