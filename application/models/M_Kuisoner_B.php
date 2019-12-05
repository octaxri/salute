<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kuisoner_B extends CI_Model {

	
		public function tampil_materi_pel()
		{
			$this->db->select('*');
			$this->db->from('kuisioner_b');
			$this->db->where('jenis_soal', 1);
			$this->db->join('sub_soal', 'sub_soal.id_sub_soal = kuisioner_b.sub_soal');
			

			$query=$this->db->get()->result_array();
			
			return $query;
			
		}

		public function tampil_tenaga_pel()
		{
			$this->db->select('*');
			$this->db->from('kuisioner_b');
			$this->db->where('jenis_soal', 2);
			$this->db->join('sub_soal', 'sub_soal.id_sub_soal = kuisioner_b.sub_soal');

			$query=$this->db->get()->result_array();
			
			return $query;
		}

		public function tampil_sapras()
		{
			$this->db->select('*');
			$this->db->from('kuisioner_b');
			$this->db->where('jenis_soal', 3);
			$this->db->join('sub_soal', 'sub_soal.id_sub_soal = kuisioner_b.sub_soal');

			$query=$this->db->get()->result_array();
			
			return $query;
		}

		public function tampil_bahan_latihan()
		{
			$this->db->select('*');
			$this->db->from('kuisioner_b');
			$this->db->where('jenis_soal', 4);
			$this->db->join('sub_soal', 'sub_soal.id_sub_soal = kuisioner_b.sub_soal');
			
			$query=$this->db->get()->result_array();
			
			return $query;
		}

		public function tampil_unit_kompetensi()
		{
			$this->db->select('*');
			$this->db->from('kuisioner_b');
			$this->db->where('jenis_soal', 5);
			$this->db->join('sub_soal', 'sub_soal.id_sub_soal = kuisioner_b.sub_soal');

			$query=$this->db->get()->result_array();
			
			return $query;
		}


		public function tambah_data()
		{
			$data=array(

				"jenis_soal" => $this->input->post('jenis_soal',TRUE),
				"soalB" => $this->input->post('soalB',TRUE),
				"jawaban1B" => $this->input->post('jawaban1B',TRUE),
				"jawaban2B" => $this->input->post('jawaban2B',TRUE),
				"jawaban3B" => $this->input->post('jawaban3B',TRUE),
				"jawaban4B" => $this->input->post('jawaban4B',TRUE),
				"jawaban5B" => $this->input->post('jawaban5B',TRUE),		
				"tipe_soal" => $this->input->post('tipe_soal',TRUE),		
				"sub_soal" => $this->input->post('sub_soal',TRUE),		
			);

			$this->db->insert('kuisioner_b', $data);
		}

		
		public function hapus_data($id)
		{
			$this->db->delete('kuisioner_b',['id_kuisionerB' => $id]);			
		}



    
    
}
