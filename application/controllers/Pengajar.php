<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller {

	function __construct()
    {
		parent::__construct();

		if($this->session->userdata('level') != 1){
			redirect(base_url());
		}
		
		$this->load->model('M_pengajar');
		///$this->load->library('barcode');
	}
	
	public function index()
	{
		$data['title'] ="SALUTE | Pengajar";
		$data['data'] = $this->M_pengajar->tampil_pengajar();

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pengajar/index',$data);
		$this->load->view('templates/footer');
	}
	
	public function tambah_pengajar()
	{
		$this->M_pengajar->tambah_pengajar();
		$this->session->set_flashdata('msg', 'Berhasil ditambahkan');
		redirect('pengajar');
		
	}

	public function edit_pengajar()
	{
		$data= array(

			"nama_pengajar" => $_POST['nama_pengajar']

		);

		$this->db->where('id_pengajar', $_POST['id_pengajar']);
		$this->db->update('pengajar', $data);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
		redirect('pengajar');

	}

	public function hapus_pengajar()
	{
		$id= $this->input->post('id_pengajar',TRUE);
		$this->M_pengajar->hapus_pengajar($id);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
		redirect('pengajar');
	}


    
    
}
