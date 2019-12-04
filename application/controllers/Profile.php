<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	
	function __construct(){
        parent::__construct();
        
        // if($this->session->userdata('username') != TRUE){
		// 	redirect('blocked');
		// }
		$this->load->model('M_Profile');
    }


    function index(){
        $data['title'] = "SALUTE | Profile";
        
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['jk'] = ['L','P'];
        $data['pendidikan'] = ['SD','SMP/SLTP','SMA/SMK/SLTA','DIPLOMA','S1','S2','S3'];
        $data['tipe_peserta'] = ['Menginap','Pulang'];

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_profile/index',$data);
		$this->load->view('templates/footer');
    }

    function edit_profile(){
        $this->M_Profile->editProfile();
        $this->session->set_flashdata('msg','Data Berhasil Diubah');
        redirect('profile');
    }

    
    function change_password(){

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password','Current Password','required|trim');
        $this->form_validation->set_rules('new_password1',' New Password','required|trim|min_length[5]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2','Confirm New Password','required|trim|min_length[5]|matches[new_password1]');

        if($this->form_validation->run() == FALSE){

            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

            $data['title'] = "SALUTE | Profile";

            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('v_profile/index',$data);
            $this->load->view('templates/footer');
        }
        else{
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if(!password_verify($current_password,$data['user']['password'])){
                $this->session->set_flashdata('msg2','Data gagal ditambahkan! Password lama salah');
                redirect('profile/change_password');
            }
            else{
                if($current_password == $new_password){
                    $this->session->set_flashdata('msg2','Data gagal ditambahkan! Password lama tidak boleh sama dengan password baru');
                    redirect('profile/change_password');
                }
                else{
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password',$password_hash);
                    $this->db->where('username',$this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('msg','Data berhasil diupdate');
                    redirect('profile');
                }
            }
        }
    }
    
}