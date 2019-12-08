<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelatihan extends CI_Model {

	function tampil_data(){
		$this->db->select('*');
		$this->db->from('pelatihan');
		$this->db->join('kejuruan','pelatihan.id_kejuruan=kejuruan.id_kejuruan');
		$this->db->join('program','pelatihan.id_program=program.id_program');

		$this->db->order_by("pelatihan.kd_pelatihan","desc");
		return $this->db->get()->result_array();
	}

	function tampil_pengajar($kd_pelatihan){
		$this->db->select('*');
		$this->db->from('detail_pengajar');
		$this->db->join('pelatihan','pelatihan.kd_pelatihan=detail_pengajar.kd_pelatihan');
		$this->db->join('pengajar','pengajar.id_pengajar=detail_pengajar.id_pengajar');
		$this->db->where('detail_pengajar.kd_pelatihan',$kd_pelatihan);

		$this->db->order_by("detail_pengajar.id","desc");
		return $this->db->get()->result_array();
	}

	function tampil_peserta($kd_pelatihan){
		$this->db->select('*');
		$this->db->from('detail_peserta');
		$this->db->join('pelatihan','pelatihan.kd_pelatihan=detail_peserta.kd_pelatihan');
		$this->db->join('user','user.id_user=detail_peserta.id_user');
		$this->db->where('detail_peserta.kd_pelatihan',$kd_pelatihan);

		$this->db->order_by("detail_peserta.id","desc");
		return $this->db->get()->result_array();
	}

	function daftar_pengajar($kd_pelatihan){
		$data = $this->db->query("SELECT * FROM detail_pengajar a LEFT JOIN pengajar b ON a.id_pengajar=b.id_pengajar WHERE a.kd_pelatihan='$kd_pelatihan'")->result_array();

		$this->db->select('*');
		$this->db->from('pengajar');
		foreach($data as $d){
			$i = $d['id_pengajar'];
			$this->db->where("id_pengajar!='$i'");
		}

		return $this->db->get()->result_array();
	}

	function tambah_pengajar_pelatihan(){
		$i=0;
		$n = count( $_POST['pengajar'] );
		while($i<$n){

			$data = [
				"kd_pelatihan" => $this->input->post('kd_pelatihan',TRUE),
				"id_pengajar" => $_POST['pengajar'][$i],
			];
			$this->db->insert('detail_pengajar',$data);

			$i++;
		}
	}

	function hapus_pengajar_pelatihan(){
		$this->db->delete('detail_pengajar',['id' => $this->input->post('id',TRUE)]);
	}

	function hapus_peserta_pelatihan(){
		$this->db->delete('detail_peserta',['id' => $this->input->post('id',TRUE)]);
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
