<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pelatihan extends CI_Model {

	function tampil_data(){
		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->join('kejuruan','pelatihan.id_kejuruan=kejuruan.id_kejuruan');
		$this->db->join('program','pelatihan.id_program=program.id_program');

		$this->db->order_by("pelatihan.kd_pelatihan","desc");
		return $this->db->get()->result_array();
	}

	function tambah_data(){

		$data = [
			"kd_pelatihan" => $this->get_kode_pelatihan(),
			"id_kejuruan" => $this->input->post('kejuruan',TRUE),
			"id_program" => $this->input->post('program',TRUE),
			"tgl_mulai_pelatihan" => $this->input->post('tgl_mulai',TRUE),
			"tgl_akhir_pelatihan" => $this->input->post('tgl_akhir',TRUE),
			"tahap_pelatihan" => $this->input->post('tahap_pelatihan',TRUE),
			"kelas_pelatihan" => $this->input->post('kelas_pelatihan',TRUE),
		];

		$this->db->insert('pelatihan',$data);
	}

	function get_kode_pelatihan(){
		date_default_timezone_set('Asia/Jakarta');
		$tahun = date('Y');

		$q = $this->db->query("SELECT MAX(RIGHT(kd_pelatihan,8)) AS kd_pel FROM pelatihan ");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_pel)+1;
                $kd = sprintf("%08s", $tmp);
            }
        }else{
            $kd = "00000001";
        }
        return "".$tahun."-".$kd;
	}


	function program($id){
		$program="<option value='0'>----- Pilih -----</pilih>";

		$prog= $this->db->get_where('program',array('id_kejuruan'=>$id));
        
		foreach ($prog->result_array() as $data ){
            $nama = strtoupper($data['nama_program']);
            $program.= "<option value='$data[id_program]'>$nama</option>";
		}

		return $program;
	}
	
	function hapus_data(){
        $this->db->delete('pelatihan',['kd_pelatihan' => $this->input->post('kd_pelatihan',TRUE)]);
    }
    
}
