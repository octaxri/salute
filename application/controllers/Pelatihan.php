<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('level') != 1 ){
			redirect(base_url());
		}
		
		$this->load->model('M_pelatihan');
	}

	
	public function index(){
		$data['title'] = "SALUTE | Pelatihan";

		$data['data'] = $this->M_pelatihan->tampil_data();
		$data['kejuruan'] = $this->db->get('kejuruan')->result_array();
		$data['program'] = $this->db->get('program')->result_array();

		$data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/index',$data);
		$this->load->view('templates/footer');
	}

	function tambah_data(){
		$this->M_pelatihan->tambah_data();
		$this->session->set_flashdata('msg','Data berhasil ditambahkan');
		redirect('pelatihan');
	}

	function hapus_data(){
		$this->M_pelatihan->hapus_data();
		$this->session->set_flashdata('msg','Data berhasil dihapus');
		redirect('pelatihan');
	}

	function detail_pelatihan($kd_pelatihan){
		$data['title'] = "SALUTE | Detail Pelatihan";

		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		$data['daftar_pengajar']= $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
        LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
		WHERE pelatihan.kd_pelatihan='$kd_pelatihan'")->result_array();
		
		        ///pemahaman
				$data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();
				$data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();
		
				///kemampuan dalam membawa materi
				$data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();
				$data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
				
				///memahami masalah
				$data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();
				$data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
				
				// PENAMPILAN TENAGA PELATIH
				$data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();
				$data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();

				
		
		$data['jml_peserta'] = $this->db->query("SELECT * FROM detail_peserta WHERE kd_pelatihan='$kd_pelatihan'")->num_rows();
		$data['jml_pengajar'] = $this->db->query("SELECT * FROM detail_pengajar WHERE kd_pelatihan='$kd_pelatihan'")->num_rows();
		

		$kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
        $jml_kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();;
        $jml_keseluruhan_tenaga_pelatih=0;

        foreach ($kuisioner_b_tenaga_pelatih as $k) {
            $id_soalnyaku=$k['id_kuisionerB'];
            $total_tenaga_pelatih = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnyaku' AND pelatihan.kd_pelatihan")->row_array();

            $jml_keseluruhan_tenaga_pelatih=$jml_keseluruhan_tenaga_pelatih+(number_format($total_tenaga_pelatih['total']/$jml_kuisioner_b_tenaga_pelatih,2));
            $hasil_akhir_tenaga_pelatih=number_format($jml_keseluruhan_tenaga_pelatih*20,2);

        }

        $data['hasil_kuisioner_b_tenaga_pelatih']=$hasil_akhir_tenaga_pelatih;
        
		// materi pelatihan
		$jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_materi_pelatihan = 0;
        
        foreach($kuisioner_b_materi_pelatihan as $sl){ 
            $id_soalnya1 = $sl['id_kuisionerB'];
        
            $total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.kd_pelatihan")->row_array();
			
			
			

            $jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
            $hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;

		//   rekruitmen
		//   $jml_kuisioner_c_rekruitmen = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
		//   $kuisioner_c_rekruitmen = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
  
		//   $jmlh_keseluruhan_rekruitmen = 0;
		//   foreach($kuisioner_c_rekruitmen as $sl3){
		// 	  $id_soalnya3 = $sl3['id_kuisionerC'];
		// 	  $total_rekruitmen = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
		// 									  WHERE penilaian_c.id_soalC='$id_soalnya3' AND pelatihan.kd_pelatihan")->row_array();
  
		// 	  $jmlh_keseluruhan_rekruitmen=$jmlh_keseluruhan_rekruitmen+(number_format($total_rekruitmen['total']/$jml_kuisioner_c_rekruitmen,2));
		// 	  $hasil_akhir_rekruitmen = number_format($jmlh_keseluruhan_rekruitmen*25,2);
		//   }
		//   $data['hasil_kuisioner_b_rekruitmen'] = $hasil_akhir_rekruitmen;

        // bahan latihan
        $jml_kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_bahan_pelatihan = 0;
        foreach($kuisioner_b_bahan_latihan as $sl2){ 
            $id_soalnya2 = $sl2['id_kuisionerB'];
            $total_bahan_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya2' AND pelatihan.kd_pelatihan")->row_array();
        
        $jmlh_keseluruhan_bahan_pelatihan = $jmlh_keseluruhan_bahan_pelatihan+(number_format($total_bahan_pelatihan['total']/$jml_kuisioner_b_bahan_latihan,2));
        $hasil_akhir_bahan_pelatihan = number_format($jmlh_keseluruhan_bahan_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_bahan_pelatihan'] = $hasil_akhir_bahan_pelatihan;


        // rekruitmen
        $jml_kuisioner_c_rekruitmen = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_rekruitmen = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_rekruitmen = 0;
        foreach($kuisioner_c_rekruitmen as $sl3){
            $id_soalnya3 = $sl3['id_kuisionerC'];
            $total_rekruitmen = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya3' AND pelatihan.kd_pelatihan")->row_array();

            $jmlh_keseluruhan_rekruitmen=$jmlh_keseluruhan_rekruitmen+(number_format($total_rekruitmen['total']/$jml_kuisioner_c_rekruitmen,2));
            $hasil_akhir_rekruitmen = number_format($jmlh_keseluruhan_rekruitmen*25,2);
        }
        $data['hasil_kuisioner_b_rekruitmen'] = $hasil_akhir_rekruitmen;


        // penyambutan
        $jml_kuisioner_c_kamar = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_kamar = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_kamar = 0;
        foreach($kuisioner_c_kamar as $sl4){
            $id_soalnya4 = $sl4['id_kuisionerC'];

            $total_kamar = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya4' AND pelatihan.kd_pelatihan")->row_array();
        
            $jmlh_keseluruhan_kamar=$jmlh_keseluruhan_kamar+(number_format($total_kamar['total']/$jml_kuisioner_c_kamar,2));
            $hasil_akhir_kamar = number_format($jmlh_keseluruhan_kamar*25,2);
        }
        $data['hasil_kuisioner_b_kamar'] = $hasil_akhir_kamar;


        // sarpras asrama
        $jml_kuisioner_c_sarpras = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_sarpras = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_sarpras_asrama = 0;
        foreach($kuisioner_c_sarpras as $sl5){
            $id_soalnya5 = $sl5['id_kuisionerC'];

            $total_sarpras_asrama = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya5' AND pelatihan.kd_pelatihan")->row_array();
            
            $jmlh_keseluruhan_sarpras_asrama=$jmlh_keseluruhan_sarpras_asrama+(number_format($total_sarpras_asrama['total']/$jml_kuisioner_c_sarpras,2));
            $hasil_akhir_sarpras_asrama = number_format($jmlh_keseluruhan_sarpras_asrama*25,2);
        }
        $data['hasil_kuisioner_b_sarpras_asrama'] = $hasil_akhir_sarpras_asrama;


        // konsumsi
        $jml_kuisioner_c_konsumsi = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_konsumsi = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_konsumsi = 0;
        foreach($kuisioner_c_konsumsi as $sl6){
            $id_soalnya6 = $sl6['id_kuisionerC'];

            $total_konsumsi = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.kd_pelatihan")->row_array();

            $jmlh_keseluruhan_konsumsi=$jmlh_keseluruhan_konsumsi+(number_format($total_konsumsi['total']/$jml_kuisioner_c_konsumsi,2));
            $hasil_akhir_konsumsi = number_format($jmlh_keseluruhan_konsumsi*25,2);
        }
        $data['hasil_kuisioner_b_konsumsi'] = $hasil_akhir_konsumsi;


        // secara umum
        $jml_kuisioner_c_secara_umum = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $kuisioner_c_secara_umum = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_secara_umum = 0;
        foreach($kuisioner_c_secara_umum as $sl6){
            $id_soalnya6 = $sl6['id_kuisionerC'];

            $total_secara_umum = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.kd_pelatihan")->row_array();

            $jmlh_keseluruhan_secara_umum=$jmlh_keseluruhan_secara_umum+(number_format($total_secara_umum['total']/$jml_kuisioner_c_secara_umum,2));
            $hasil_akhir_secara_umum = number_format($jmlh_keseluruhan_secara_umum*25,2);
        }
        $data['hasil_kuisioner_b_secara_umum'] = $hasil_akhir_secara_umum;


        // sarpras
        $kuisioner_b_sarpras = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_sarpras = 0;
        $jml_kuisioner_b_sarpras = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        foreach($kuisioner_b_sarpras as $sl7){ 
            $id_soalnya7 = $sl7['id_kuisionerB'];
        
            $total_sarpras = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya7' AND pelatihan.kd_pelatihan")->row_array();
            
            $jmlh_keseluruhan_sarpras = $jmlh_keseluruhan_sarpras+(number_format($total_sarpras['total']/$jml_kuisioner_b_sarpras,2));
            $hasil_akhir_sarpras = number_format($jmlh_keseluruhan_sarpras*20,2);
        }
		$data['hasil_kuisioner_b_sarpras'] = $hasil_akhir_sarpras;
		
		$penilaian_a = $this->db->query("SELECT * FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->num_rows();
		$penilaian_b = $this->db->query("SELECT * FROM penilaian_b WHERE kd_pelatihan='$kd_pelatihan'")->num_rows();
		$penilaian_c = $this->db->query("SELECT * FROM penilaian_c WHERE kd_pelatihan='$kd_pelatihan'")->num_rows();

		$data['tot'] = $penilaian_a+$penilaian_b+$penilaian_c;
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/detail_pelatihan',$data);
		$this->load->view('templates/footer');
	}

	function detail_pelatihan2($a, $kd_pelatihan){
		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['user'] = $this->db->get_where('user', ['username' =>
		$this->session->userdata('username')])->row_array();

		if($a == 1){
			$data['title'] = "SALUTE | Data Peserta Pelatihan";
			$data['data'] = $this->M_pelatihan->tampil_peserta($kd_pelatihan);
			$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/daftar_peserta',$data);
			$this->load->view('templates/footer');
			
		}
		else if($a == 2){
			$data['title'] = "SALUTE | Data Pengajar Pelatihan";
			$data['data'] = $this->M_pelatihan->tampil_pengajar($kd_pelatihan);
			$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
			$data['pengajar'] = $this->M_pelatihan->daftar_pengajar($kd_pelatihan);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/daftar_pengajar',$data);
			$this->load->view('templates/footer');
		}
		else if($a == 3){
			$data['title'] = "SALUTE | Data Kuisioner A Pelatihan";
			$data['data'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
			
			
			$data['responden'] = $this->db->query("SELECT DISTINCT id_user FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();
			$data['graph']= $this->db->query("SELECT DISTINCT * FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();			

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/detail_kuisioner_a',$data);
			$this->load->view('templates/footer');
		}
		else if($a == 4){
			$data['title'] = "SALUTE | Data Kuisioner B Pelatihan";

			$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
			$data['daftar_pengajar'] = $this->M_pelatihan->tampil_pengajar($kd_pelatihan);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/detail_kuisioner_b',$data);
			$this->load->view('templates/footer');
		}
		else if($a == 5)
		{
			$data['title'] = "SALUTE | Data Kuisioner C Pelatihan";

			$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
			$data['daftar_pengajar'] = $this->M_pelatihan->tampil_pengajar($kd_pelatihan);

			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('v_pelatihan/detail_kuisioner_c',$data);
			$this->load->view('templates/footer');
		}
	}

	function in_detail_pelatihan_kuisionerb_materi_pelatihan($kd_pelatihan){
		$data['title'] = "SALUTE | Data Kuisioner B Pelatihan";
		
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();


		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 ")->result_array();

		$data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='uraian'")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_materi_pelatihan',$data);
		$this->load->view('templates/footer');
	}


	function in_detail_pelatihan_pengajar_kuisioner_b($kd_pelatihan,$id_pengajar){
		$data['title'] = "SALUTE | Data Kuisioner B Pelatihan Pengajar";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();

		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal,tipe_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b  WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' ")->result_array();
		$data['id_pengajar']=$id_pengajar;

		
        // PENGETAHUAN PEMAHAMAN
        $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();
        $data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();

        // KEMAMPUAN DALAM MEMBAWAKAN MATERI
        $data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
        $data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();

        // KEMAMPUAN DALAM MEMAHAMI MASALAH
        $data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
        $data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();

        // PENAMPILAN TENAGA PELATIH
        $data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();
		$data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b  WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();
		
		
		$data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='uraian'")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_pengajar',$data);

	}
	///detail pelatihan kuisione b sarana dan prasarana
	function in_detail_pelatihan_kuisionerb_sapras($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner B Sarana dan Prasarana ";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB  WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();
		
		$data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='uraian'")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_sapras',$data);
		$this->load->view('templates/footer');
	}

	//detail pelatihan kuisioner b bahan latihan
	function in_detail_pelatihan_kuisionerb_bahan_latihan($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner B Bahan Pelatihan ";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();

		$data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='uraian'")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_bahan_latihan',$data);
		$this->load->view('templates/footer');
	}

	//detail pelatihan unit kompetensi
	function in_detail_pelatihan_kuisionerb_unit_kompetensi($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner B Unit Kompetensi ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();

		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=5 ")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerb_unit_kompetensi',$data);
		$this->load->view('templates/footer');
	}

	///detail kuisioner c rekrut
	function in_detail_pelatihan_kuisionerc_rekrut($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Rekruitmen, Perjalanan, Persayaratan Peserta ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();

		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1")->result_array();

		$data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='uraian'")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_rekrut',$data);
		$this->load->view('templates/footer');
	}

	//detail kuisioner C penyambutan
	function in_detail_pelatihan_kuisionerc_pemnyambutan($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Penyambutan, Pembagian Kamar Peserta ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();

		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 ")->result_array();
		$data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='uraian'")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_penyambutan',$data);
		$this->load->view('templates/footer');	
	}

	//deatal kuisioner sarana dan prasarana asrama
	function in_detail_pelatihan_kuisionerc_sapras($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Sarana dan Prasarana Asrama ";
		
		$data['kd_pelatihan']=$kd_pelatihan;
		
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();

		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();
		
		$data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='uraian'")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_sapras',$data);
		$this->load->view('templates/footer');	
	}

	//detail kuisioner C konsumsi
	function in_detail_pelatihan_kuisionerc_konsumsi($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Konsumsi ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();
		$data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='uraian'")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_konsumsi',$data);
		$this->load->view('templates/footer');	
	}

	///detail kuisioner c Bahan Pelatihan

	
	////detail kuisioner C pelaksanaan pelatihan uji kompetensi
	function in_detail_pelatihan_kuisionerc_pelaksanaan_uji($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Pelaksanaan Uji Kompetensi ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();


		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 ")->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_pelaksanaan_uji',$data);
		$this->load->view('templates/footer');
	}

	///detail kuisioner C Pelaksanaan Pelatihan
	function in_detail_pelatihan_kuisionerc_pelaksanaan_pel($kd_pelatihan)
	{
		$data['title']= "SALUTE | Data Kuisioner C Pelaksanaan Uji Kompetensi ";
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();


		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 ")->result_array();
		$data['soal_uraian'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='uraian'")->result_array();


		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('v_pelatihan/dt_pelatihan_kuisionerc_pelaksanaan_pel',$data);
		$this->load->view('templates/footer');
	}


	function tambah_pengajar_pelatihan(){
		$a = 2;
		$kd_pelatihan = $this->input->post('kd_pelatihan',TRUE);
		$this->M_pelatihan->tambah_pengajar_pelatihan();
		$this->session->set_flashdata('msg','Data berhasil ditambahkan');

		redirect('pelatihan/detail_pelatihan2/'.$a.'/'.$kd_pelatihan);
	}

	function hapus_pengajar_pelatihan(){
		$a = 2;
		$kd_pelatihan = $this->input->post('kd_pelatihan',TRUE);

		$this->M_pelatihan->hapus_pengajar_pelatihan();
		$this->session->set_flashdata('msg','Data berhasil dihapus');

		redirect('pelatihan/detail_pelatihan2/'.$a.'/'.$kd_pelatihan);
	}

	function hapus_peserta_pelatihan(){
		$a = 1;
		$kd_pelatihan = $this->input->post('kd_pelatihan',TRUE);

		$this->M_pelatihan->hapus_peserta_pelatihan();
		$this->session->set_flashdata('msg','Data berhasil dihapus');

		redirect('pelatihan/detail_pelatihan2/'.$a.'/'.$kd_pelatihan);
	}

	public function ambil_data()
	{
		$modul=$this->input->post('modul');
		$id=$this->input->post('id');

		if($modul=="program"){
            echo $this->M_pelatihan->program($id);
        }
	}
    
    
}
