<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_program extends CI_Controller {
    	
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

        $this->form_validation->set_rules('program','Program','trim|required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_program/index',$data);
            $this->load->view('templates/footer');
        }
        else{
            $program = $this->input->post('program',TRUE);

            $cek = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->row_array();

            if($cek['kd_pelatihan'] != NULL){
                redirect('rekap_program/in_detail_program/'.$program);
            }
            else{
                $this->session->set_flashdata('msg2','Laporan program yang anda cari tidak ditemukan!');
                redirect('rekap_program');
            }
        }
    }

    function in_detail_program($program){

        $data['title']= "SALUTE | Detail Per Program Pelatihan ";
        $data['program'] = $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_program/detail_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    
    function rekap_kuisioner($jenis,$program)
    {
        
        $data['program'] = $program;

        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
        if($jenis==1)
        {
            $data['title'] = "SALUTE | Rekap Kuisioner A";
            // custome

            $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
    
            $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
            $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
    
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_program/detail_kuisioner_a',$data);
            $this->load->view('templates/footer');
        }
        elseif ($jenis==2) 
        {
            $data['title'] = "SALUTE | Detail Rekap Kuisioner B";

            $data['daftar_pengajar'] = $this->db->query("SELECT * FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
                                                                    LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
                                                                    WHERE pelatihan.id_program='$program'")->result_array();
            

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_program/detail_kuisioner_b',$data);
            $this->load->view('templates/footer');
        }elseif ($jenis==3) 
        {
            $data['title'] = "SALUTE | Detail Rekap Kuisioner C";
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_rekap_program/detail_kuisioner_c',$data);
            $this->load->view('templates/footer');
        }

    }
    
    function rekap_kuisioner_b_materi_pelatihan($program){
        $data['title'] = "SALUTE | Rekap Per Program Kuisioner B Materi Pelatihan";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();

        $data['program'] = $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_program/detail_kuisioner_b_materi_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    function rekap_kuisioner_b_bahan_pelatihan($program)
    {
        $data['title'] = "SALUTE | Rekap Per Program Kuisioner B Bahan Pelatihan ";
        $data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

        $data['jml_kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_rekap_program/detail_kuisioner_b_bahan_pelatihan',$data);
        $this->load->view('templates/footer');
    }

    function rekap_kuisioner_b_sapras($program)
    {
     $data['title']="SALUTE | Rekap Per Program Kuisioner B Sarana dan Prasarana";
     $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
     $data['program']= $program;
     $data['program1'] = $this->M_progam->tampil_detail_progam($program);
     $data['jml_kuisioner_b_sapras1']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
     $data['jml_kuisioner_b_sapras2']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
     $data['jml_kuisioner_b_sapras3']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
     $data['jml_kuisioner_b_sapras4']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
     $data['jml_kuisioner_b_sapras5']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();

     $data['kuisioner_b_sapras1']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
     $data['kuisioner_b_sapras2']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
     $data['kuisioner_b_sapras3']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
     $data['kuisioner_b_sapras4']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
     $data['kuisioner_b_sapras5']=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();

     $this->load->view('templates/header',$data);
     $this->load->view('templates/sidebar',$data);
     $this->load->view('v_rekap_program/detail_kuisioner_b_sapras',$data);
     $this->load->view('templates/footer');

    }

    ////Rekap program 
    function rekap_kuisioner_c_rekrut($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Rekruitmen, Perjalanan, Persyaratan Peserta";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

         $data['jml_kuisioner_c_rekrut']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_rekrut']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_rekrut',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_penyambutan($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Penyambutan, Pembagian Kamar Peserta";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

         $data['jml_kuisioner_c_penyambutan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_penyambutan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_penyambutan',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_sapras($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Sarana Dan Prasarana Asrama";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;

        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
         $data['jml_kuisioner_c_sapras']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_sapras']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_sapras',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_konsumsi($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Konsumsi";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

         $data['jml_kuisioner_c_konsumsi']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_konsumsi']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_konsumsi',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_pelaksanaan($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Pelaksanaan Uji Kompetensi";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;

        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
         $data['jml_kuisioner_c_pelaksanaan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_pelaksanaan']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_pelaksanaan',$data);
         $this->load->view('templates/footer');
    }

    function rekap_kuisioner_c_secara_umum($program)
    {
        $data['title']="SALUTE | Rekap Per Program Kuisioner C Secara Umum Pelaksanaan Pelatihan";
        $data['pelatihan']=$this->db->query("SELECT * FROM pelatihan WHERE id_program='$program' ")->result_array();
        $data['program']= $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);

         $data['jml_kuisioner_c_umum']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
         $data['kuisioner_c_umum']=$this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
    
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('v_rekap_program/detail_kuisioner_c_secara_umum',$data);
         $this->load->view('templates/footer');
    }

}

/* End of file Rekap_progam.php */
