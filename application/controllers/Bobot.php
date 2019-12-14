<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot extends CI_Controller {

    
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_bobot');
		
    }
    
    public function index()
    {
        $data['title'] = "SALUTE | Bobot";
		
		

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();
        
        $data['data']=$this->M_bobot->tampil_bobot();
        
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_bobot/index',$data);
		$this->load->view('templates/footer');
    }
    
    public function tambah_data()
    {
        $this->M_bobot->tambah_data();
        $this->$this->session->set_flashdata('msg', 'Berhasil Ditambahkan');
        redirect('bobot');
    }

    public function edit_data()
    {
        $data=array(
            "nilai" => $_POST['bobot']
        );

        $this->$this->db->where('id_bobot', $_POST['id_bobot']);
        $this->db->update('bobot', $data);
        $this->session->set_flashdata('msg', 'Data Berhasil Di Edit');
        redirect('bobot');
        

        
    }

    public function hapus_data()
    {
        $id= $this->input->post('id_bobot',TRUE);
        $this->M_bobot->hapus_data($id);
        $this->session->set_flashdata('msg', 'Data Berhasil Dihapus');
        redirect('bobot','refresh');
    }
}

/* End of file Bobot.php */
