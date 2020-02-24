<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('level') != 1){
			redirect(base_url());
		}
		
		$this->load->model('M_peserta');
		///$this->load->library('barcode');
	}

	public function index(){
		$data['title'] = "SALUTE | Daftar Peserta";

		$data['data'] = $this->M_peserta->tampil_data();

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_peserta/index',$data);
		$this->load->view('templates/footer');

	}

	public function edit_peserta()
	{
		$data= array(

			"nama" => $_POST['nama'],
			"email" => $_POST['email'],
			"jk" => $_POST['jk'],
			"tgl_lahir" => $_POST['tgl_lahir'],
			"pendidikan" => $_POST['pendidikan'],
			"pekerjaan" => $_POST['pekerjaan'],
			"tipe_peserta" => $_POST['tipe_peserta'],


		);

		$this->db->where('id_user', $_POST['id_user']);
		$this->db->update('user', $data);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
		redirect('peserta');

	}
	
	public function hapus_peserta()
	{
		$id= $this->input->post('id_user',TRUE);
		$this->M_peserta->hapus_peserta($id);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
		redirect('peserta');
	}
    
    
}
