<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
    }
    
    public function index()
	{
		$data['title'] = 'Login Page';

		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run()==FALSE){
			$this->load->view('v_auth/login',$data);
		}else{
			// validasinya success
			$this->_login();
		}
    }
    
    public function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['username' => $username])->row_array();
            $user2 = $this->db->get_where('user', ['email' => $username])->row_array();

            // jika usernya ada
            if($user != NULL || $user2 != NULL){
                    // cek password
                    if(password_verify($password, $user['password']) || password_verify($password, $user2['password'])){
                        if($user['username'] != NULL){
                            $data= [
                                'id' => $user['id_user'],
                                'username' => $user['username'],
                                'level' => $user['is_level'],
                            ];
                        }
                        else{
                            $data= [
                                'id' => $user2['id_user'],
                                'username' => $user2['username'],
                                'level' => $user2['is_level'],
                            ];
                        }
                        
                        $this->session->set_userdata($data);
                        if($user['level']=='1'){
                            redirect('profile');
                        }
                        else{
                            redirect('profile');
                        }
                    }	
                    else{
                        $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
					    Login failed! Wrong password.</div>');
                        redirect('auth');
                    }
            }
            else{
                $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
			    Account is not registered</div>');
                redirect('auth');
            }
    }

    public function forgotPassword(){

        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        
		if($this->form_validation->run()==FALSE){
			$this->load->view('v_auth/forgotPassword');
		}
		else{
			$email = $this->input->post('email');
			$user = $this->db->get_where('user',['email' => $email])->row_array();

			if($user){
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token',$user_token);
				$this->_sendEmail($token,'forgot');

				$this->session->set_flashdata('msg',' Pleace check your email to reset your password!');
                redirect('auth/forgotPassword');
			}
			else{
                
                $this->session->set_flashdata('msg2','Email is not registered!');
                redirect('auth/forgotPassword');
			}

		}
		
    }

    private function _sendEmail($token,$type){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'satpolpp.provjateng@gmail.com',
            'smtp_pass' => 'satpolpp@30',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];


        $this->load->library('email',$config);  
        $this->email->initialize($config); 

        $this->email->from('satpolpp.provjateng@gmail.com','Akademi Kepolisian Indonesia');
        $this->email->to($this->input->post('email'));

        if($type == 'forgot'){
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="'. base_url() . 'auth/resetpassword?email=' .$this->input->post('email') . '&token=' .urlencode($token). '">Reset Password</a>');
        }

        if($this->email->send()){
            return true;
        }
        else{
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetPassword(){
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user',['email' => $email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token',['token' => $token])->row_array();
		
			if($user_token){
                $this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			}
			else{
                
                $this->session->set_flashdata('msg2','Reset password failed! Wrong token.');
                redirect('auth');
			}
		}
		else{
            
            $this->session->set_flashdata('msg2','Reset password failed! Wrong email.');
            redirect('auth');
		}
    }

    public function changePassword(){

		if(!$this->session->userdata('reset_email')){
			redirect('auth');
		}

		$this->form_validation->set_rules('password1','Password','trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2','Password','trim|required|min_length[5]|matches[password1]');

		if($this->form_validation->run()==FALSE){
			$data['title'] = 'Change Password!';
			$this->load->view('v_auth/change-password',$data);
		}
		else{
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

			$this->db->set('password',$password);
			$this->db->where('email',$email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');
        
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Password has been changed! Please login.</div>');
			redirect('auth');

		}
			
    }
    
    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			  You have been logout</div>');
			redirect('auth');
    }
    
    function signup(){
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
        
		if($this->form_validation->run()==FALSE){
            $this->load->view('v_auth/signup');
        }
        else{
            $data = [
                "username" => $this->input->post('username',TRUE),
                "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                "nama" => $this->input->post('nama',TRUE),
                "email" => $this->input->post('email',TRUE),
                "jk" => $this->input->post('jk',TRUE),
                "usia" => $this->input->post('usia',TRUE),
                "pendidikan" => $this->input->post('pendidikan',TRUE),
                "pekerjaan" => $this->input->post('pekerjaan',TRUE),
                "is_level" => 0,
                "tipe_peserta" => $this->input->post('tipe_peserta',TRUE),
            ];
            $this->db->insert('user',$data);


			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			  Pendaftaran berhasil</div>');
			redirect('auth');
        }
    }

}