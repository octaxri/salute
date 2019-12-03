<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisoner_C extends CI_Controller {

	

	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('m_Kuisoner_C');
		
	}

	

	public function index()
	{
		$data['title']="SALUTE | Kuisioner C";
		$data['data']=$this->m_Kuisoner_C->tampil_rekrut();
		$data['data1']=$this->m_Kuisoner_C->tampil_penyambutan();
		$data['data2']=$this->m_Kuisoner_C->tampil_sarana();
		$data['data3']=$this->m_Kuisoner_C->tampil_konsumsi();
		$data['data4']=$this->m_Kuisoner_C->tampil_bahan_latihan();
		$data['data5']=$this->m_Kuisoner_C->tampil_pelaksanaan();
		$data['data6']=$this->m_Kuisoner_C->tampil_pelaksanaan_pel();

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data ,FALSE);
		$this->load->view('templates/sidebar', $data, FALSE);
		$this->load->view('v_kuisoner/kuisoner_C', $data, FALSE);
		$this->load->view('templates/footer');
			
	}
	
	public function tambah_data()
	{
		$this->m_Kuisoner_C->tambah_data();
		$this->session->set_flashdata('msg', 'Berhasil Ditambahkan');
		redirect('kuisoner_c','refresh');		
	}

	public function edit_data()
	{
		$data=array(

			"soalC" => $_POST['soalC'],
			"jawaban1C" => $_POST['jawaban1C'],
			"jawaban2C" => $_POST['jawaban2C'],
			"jawaban3C" => $_POST['jawaban3C'],
			"jawaban4C" => $_POST['jawaban4C'],
			"tipe_soal" => $_POST['tipe_soal']
			
		);

		$this->db->where('id_kuisionerC', $_POST['id_kuisionerC']);
		$this->db->update('kuisioner_c', $data);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
		redirect('kuisoner_c','refresh');
	}


	public function hapus_data()
	{
		$id=$this->input->post('id_kuisionerC',TRUE);
		$this->m_Kuisoner_C->hapus_data($id);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
		redirect('kuisoner_c','refresh');
	}
	
	
    
}
