<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_tahap extends CI_Controller {

	
	function __construct(){
        parent::__construct();
        
        if($this->session->userdata('level') != 1){
			redirect(base_url());
        }
        
        $this->load->model('M_progam');
        $this->load->model('M_kejuruan');
        $this->load->model('M_pelatihan');
    }

    function index(){
        $data['title'] = "SALUTE | Progam Pelatihan";

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kejuruan'] = $this->M_kejuruan->tampil_kejuruan();

        $this->form_validation->set_rules('tahap','Tahap','trim|required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_tahap/index',$data);
            $this->load->view('templates/footer');
        }
        else{
            $tahap = $this->input->post('tahap',TRUE);

            $cek = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->row_array();

            if($cek['kd_pelatihan'] != NULL){
                redirect('rekap_tahap/in_detail_rekap/'.$tahap);
            }
            else{
                $this->session->set_flashdata('msg2','Laporan tahap yang anda cari tidak ditemukan!');
                redirect('rekap_tahap');
            }
        }
    }

    function in_detail_rekap($tahap){

        $data['tahap'] = $tahap;

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_tahap/detail_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    function rekap_kuisioner($tahap){
            $data['title'] = "SALUTE | Rekap Kuisioner A";

            $data['tahap'] = $tahap;

            // custome
            $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

            $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
            $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();

            $this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_rekap_tahap/detail_kuisioner_a',$data);
			$this->load->view('templates/footer');
    }


}