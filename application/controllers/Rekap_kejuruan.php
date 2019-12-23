<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_kejuruan extends CI_Controller {

    	
	function __construct(){
        parent::__construct();
        
        if($this->session->userdata('level') != 1){
			redirect(base_url());
        }
        
        $this->load->model('M_progam');
        $this->load->model('M_kejuruan');
        $this->load->model('M_pelatihan');
    }

    public function index()
    {
        $data['title'] = "SALUTE | Progam Pelatihan";

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kejuruan'] = $this->M_kejuruan->tampil_kejuruan();
        $data['program']= $this->M_progam->tampil_progam();

        $this->form_validation->set_rules('kejuruan','Kejuruan','trim|required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_kejuruan/index',$data);
            $this->load->view('templates/footer');
        }
        else{
            $kejuruan = $this->input->post('kejuruan',TRUE);

            $cek = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->row_array();

            if($cek['kd_pelatihan'] != NULL){
                redirect('rekap_kejuruan/in_detail_program/'.$kejuruan);
            }
            else{
                $this->session->set_flashdata('msg2','Laporan tahap yang anda cari tidak ditemukan!');
                redirect('rekap_kejuruan');
            }
        }
    }

    function in_detail_program($kejuruan){

        $data['title']= "SALUTE | Detail Per Kejuruan Pelatihan ";
        $data['kejuruan'] = $kejuruan;
    

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_kejuruan/detail_pelatihan',$data);
        $this->load->view('templates/footer');
    }


    function rekap_kuisioner($jenis,$kejuruan)
    {
        
        $data['kejuruan'] = $kejuruan;

        if($jenis==1)
        {
            $data['title'] = "SALUTE | Rekap Kuisioner A";
            // custome
            $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
    
            $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
            $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
    
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_kejuruan/detail_kuisioner_a',$data);
            $this->load->view('templates/footer');
        }
        elseif ($jenis==2) 
        {
            $data['title'] = "SALUTE | Detail Rekap Kuisioner B";

            $data['daftar_pengajar'] = $this->db->query("SELECT * FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
                                                                    LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
                                                                    WHERE pelatihan.id_kejuruan='$kejuruan'")->result_array();
            

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_kejuruan/detail_kuisioner_b',$data);
            $this->load->view('templates/footer');
        }elseif ($jenis==3) 
        {
            $data['title'] = "SALUTE | Detail Rekap Kuisioner C";
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_kejuruan/detail_kuisioner_c',$data);
            $this->load->view('templates/footer');
        }

    }

}

/* End of file Rekap_kejuruan.php */
