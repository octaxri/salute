<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisoner_a extends CI_Controller {
	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('M_kuisoner_a');
		
	}
////ko
	public function index()
	{
		$data['title'] = " SALUTE | Kuisoner A";
		$data['data']=$this->M_kuisoner_a->tampil_kuisoner();

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_kuisoner/kuisoner_a',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_kuisoner()
	{
		$this->M_kuisoner_a->tambah_kuisoner();
		$this->session->set_flashdata('msg', 'Berhasil Ditambahkan');
		redirect('kuisoner_a');
		
		
	}
	
	public function edit_kuisoner()
	{
		$data=array(

			"soalA" => $_POST['soalA'],
			"jawaban1A" => $_POST['jawaban1A'],
			"jawaban2A" => $_POST['jawaban2A'],
			"jawaban3A" => $_POST['jawaban3A'],
			"jawaban4A" => $_POST['jawaban4A']
		);

		$this->db->where('id_kuisionerA', $_POST['id_kuisionerA']);
		$this->db->update('kuisioner_a', $data);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
		redirect('kuisoner_a');
		
	}


	public function hapus_kuisoner()
	{
		$id= $this->input->post('id_kuisionerA');
		$this->M_kuisoner_a->hapus_kuisoner($id);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
		redirect('kuisoner_a');
	}
    
    
}
