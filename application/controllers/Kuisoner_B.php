<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuisoner_B extends CI_Controller {

	
 
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_Kuisoner_B');
		$this->load->model('m_sub_soal');

	}
	
	public function index()
	{
		$data['title']="SALUTE | Kuisioner B";
		
		$data['data']= $this->m_Kuisoner_B->tampil_materi_pel();
		$data['data1']= $this->m_Kuisoner_B->tampil_tenaga_pel();
		$data['data2']= $this->m_Kuisoner_B->tampil_sapras();
		$data['data3']= $this->m_Kuisoner_B->tampil_bahan_latihan();
		$data['data4']= $this->m_Kuisoner_B->tampil_unit_kompetensi();
		$data['sub']= $this->m_sub_soal->tampil_sub_soal();

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_kuisoner/kuisoner_B',$data);
		$this->load->view('templates/footer');
	}
	
	public function tambah_data()
	{
		$this->m_Kuisoner_B->tambah_data();
		$this->session->set_flashdata('msg', 'Berhasil Ditambahkan');
		redirect('kuisoner_b','refresh');
	}

	public function edit_data()
	{
		$data=array(

			"soalB" => $_POST['soalB'],
			"jawaban1B" => $_POST['jawaban1B'],
			"jawaban2B" => $_POST['jawaban2B'],
			"jawaban3B" => $_POST['jawaban3B'],
			"jawaban4B" => $_POST['jawaban4B'],
			"jawaban5B" => $_POST['jawaban5B'],
			"tipe_soal" => $_POST['tipe_soal'],
			"sub_soal" => $_POST['sub_soal']
		);

		$this->db->where('id_kuisionerB', $_POST['id_kuisionerB']);
		$this->db->update('kuisioner_b', $data);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
		redirect('kuisoner_b','refresh');
	}

	public function hapus_data()
	{
		$id=$this->input->post('id_kuisionerB',TRUE);
		$this->m_Kuisoner_B->hapus_data($id);
		$this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
		redirect('kuisoner_b','refresh');
		
	}

    
    
}
