<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progam extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('level') != 1){
			redirect(base_url());
		}
		
        $this->load->model('M_progam');
        $this->load->model('M_kejuruan');
		///$this->load->library('barcode');
	}
    
    
	public function index()
	{
        $data['title'] = "SALUTE | Progam Pelatihan";
        $data['data'] = $this->M_progam->tampil_progam();
        $data['kej'] = $this->M_kejuruan->tampil_kejuruan();

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_progam/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_progam()
    {
        $this->M_progam->tambah_progam();
        $this->session->set_flashdata('msg', 'Berhasil Ditambahkan');
        redirect('progam');
        
    }

    public function edit_progam()
    {
        $data= array(

            "id_kejuruan" => $_POST['id_kejuruan'],
            "nama_progam" => $_POST['nama_progam'] 
        );
        
        $this->db->where('id_program', $_POST['id_program']);
        $this->db->update('program', $data);
        $this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
        redirect('progam');
    }

    public function hapus_progam()
    {
        $id=$this->input->post('id_program',TRUE);
        $this->M_progam->hapus_progam($id);
        $this->session->set_flashdata('msg', 'Data Berhasil Di Hapus');
        redirect('progam');
        
    }
    
    
}
