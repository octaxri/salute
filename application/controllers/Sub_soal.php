<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_soal extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('level') != 1){
			redirect(base_url());
		}
		
		$this->load->model('M_sub_soal');
		///$this->load->library('barcode');
	}
	
	public function index()
	{
		$data['title'] = "SALUTE | SUB SOAL";
		
		$data['data']=$this->M_sub_soal->tampil_sub_soal();

        $data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);		
		$this->load->view('v_subsoal/index', $data);		
		$this->load->view('templates/footer');			
	}
	
	public function tambah_sub_soal()
	{
		$this->M_sub_soal->tambah_sub_soal();
		$this->session->set_flashdata('msg', 'Berhasil Ditambahkan');
		redirect('sub_soal');
	}

	public function edit_sub_soal()
	{
		$data=array(

			"nama_sub_soal" => $_POST['nama_sub_soal']
		);

		$this->db->where('id_sub_soal', $_POST['id_sub_soal']);
		$this->db->update('sub_soal', $data);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
		redirect('sub_soal');
	
	}


	public function hapus_sub_soal()
	{
		$id=$this->input->post('id_sub_soal',TRUE);
		$this->M_sub_soal->hapus_sub_soal($id);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
		redirect('sub_soal');
	}
    
    
}
