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
            $kejuruan = $this->input->post('kejuruan',TRUE);
            $program = $this->input->post('program',TRUE);
            $tahap = $this->input->post('tahap',TRUE);

            $cek = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan' AND id_program='$program' AND tahap_pelatihan='$tahap'")->row_array();

            if($cek['kd_pelatihan'] != NULL){
                $data['kd_pelatihan'] = $cek['kd_pelatihan'];
                $data['kejuruan'] = $kejuruan;
                $data['program'] = $program;
                $data['tahap'] = $tahap;

                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar',$data);
                $this->load->view('v_rekap_tahap/detail_pelatihan',$data);
                $this->load->view('templates/footer');
            }
            else{
                $this->session->set_flashdata('msg2','Tahap yang dicari sesuai dengan kejuruan dan program yang dipilih tidak ditemukan!');
                redirect('rekap_tahap');
            }
        }
    }

    function rekap_kuisioner($kuisioner, $kd_pelatihan, $kejuruan, $program, $tahap){
            $data['title'] = "SALUTE | Rekap Kuisioner A";
            $data['data'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
            $data['kd_pelatihan'] = $kd_pelatihan;
            $data['kejuruan'] = $kejuruan;
            $data['program'] = $program;
            $data['tahap'] = $tahap;

            $data['responden'] = $this->db->query("SELECT DISTINCT id_user FROM penilaian_a LEFT JOIN pelatihan ON penilaian_a.kd_pelatihan=pelatihan.kd_pelatihan
                                                            WHERE pelatihan.id_kejuruan='$kejuruan' AND pelatihan.id_program='$program' AND pelatihan.tahap_pelatihan='$tahap'")->result_array();

            $data['graph'] = $this->db->query("SELECT DISTINCT * FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();			

            $this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_rekap_tahap/detail_kuisioner_a',$data);
			$this->load->view('templates/footer');
    }


}