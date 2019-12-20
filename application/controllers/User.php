<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
		parent::__construct();

		if($this->session->userdata('level') != 1){
			redirect(base_url());
		}
		
        $this->load->model('M_user');
		///$this->load->library('barcode');
	}

	public function index(){
		$data['title'] = "User";

        $data['data'] = $this->M_user->tampil_data();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('v_user/index',$data);
        $this->load->view('templates/footer');
	}

	function tambah_data(){
		$this->form_validation->set_rules('username','Username','required|trim|min_length[3]|is_unique[user.username]',[
            'is_unique' => 'This username has already registered!'
        ]);

        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
            'matches' => 'Password dont match!',
            'min_length' => 'Password to short!'
        ]);

        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
        
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'This email has already registered!'
		]);

		if($this->form_validation->run() == FALSE){
			$data['title'] = "User";

       		$data['data'] = $this->M_user->tampil_data();

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_user/index',$data);
			$this->load->view('templates/footer');
		}
		else{
			$this->M_user->tambah_data();
			$this->session->set_flashdata('msg', 'Berhasil Ditambahkan');
			redirect('user');
		}
	}

	public function edit_data(){
		$this->M_user->edit_data();
		$this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
		redirect('user');
	}

	function hapus_data(){
		$this->M_user->hapusData();
		$this->session->set_flashdata('msg',"Data Berhasil Dihapus");
		redirect('user');
	}
}
