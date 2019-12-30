<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('level') != 1){
			redirect(base_url());
		}
		
		$this->load->model('M_pelatihan');
		$this->load->model('M_progam');
		$this->load->model('M_kejuruan');

	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	// PDF

	function cetak_kuisioner_a_pdf($kd_pelatihan){
		$data['kd_pelatihan'] = $kd_pelatihan;

		$data['data'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();
		$data['graph']= $this->db->query("SELECT DISTINCT * FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();	
		
		$this->load->view('v_laporan/pdf/kuisioner_a',$data);
	}

	function cetak_kuisioner_b_materi_pelatihan($kd_pelatihan){
		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_b_materi_pelatihan',$data);
	}

	
	function cetak_kuisioner_b_pelatihan_pengajarku($kd_pelatihan, $id_pengajar)
	{
		$data['kd_pelatihan'] = $kd_pelatihan;

		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();
		
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal,tipe_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b  WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' ")->result_array();
		$data['id_pengajar'] = $id_pengajar;
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
		

		$this->load->view('v_laporan/pdf/kuisioner_b_pelatihan_pengajar',$data);
	}


	

	function cetak_kuisioner_b_sarpras($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB  WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_b_sarpras',$data);
	}

	function cetak_kuisioner_b_bahan_latihan($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_b_bahan_latihan',$data);
	}

	function cetak_kuisioner_c_rekrut($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_c_rekrut',$data);
	}

	function cetak_kuisioner_c_penyambutan($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_c_penyambutan',$data);
	}

	function cetak_kuisioner_c_sarpras($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();
		
		$this->load->view('v_laporan/pdf/kuisioner_c_sarpras',$data);
	}

	function cetak_kuisioner_c_konsumsi($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();

		
		$this->load->view('v_laporan/pdf/kuisioner_c_konsumsi',$data);
	}

	function kuisioner_c_bahan_pelatihan($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=5 ")->result_array();

		
		$this->load->view('v_laporan/pdf/kuisioner_c_bahan_pelatihan',$data);
	}

	function cetak_kuisioner_c_secara_umum($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 ")->result_array();
		
		$this->load->view('v_laporan/pdf/kuisioner_c_secara_umum',$data);
	}

	function cetak_kuisioner_c_pelaksanaan_uji($kd_pelatihan){
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 ")->result_array();

		$this->load->view('v_laporan/pdf/kuisioner_c_pelaksanaan_uji',$data);
	}

	function cetak_rekap_tahap_kuisioner_a($tahap){
        $data['tahap'] = $tahap;
        // custome
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
        $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_a',$data);
	}

	function rekap_pertahap_kuisioner_b_materi_pelatihan($tahap){
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_b_materi_pelatihan',$data);
	}

	function rekap_pertahap_kuisioner_c_kamar($tahap){
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();
		$data['tahap'] = $tahap;
        $data['jml_kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
		$data['kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_c_kamar',$data);
	}

	function rekap_pertahap_kuisioner_c_sarpras($tahap){
		$data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_sarpras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_sarpras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_c_sarpras',$data);
	}

	function rekap_pertahap_kuisioner_c_konsumsi($tahap){
		$data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_c_konsumsi',$data);
	}

	function rekap_pertahap_kuisioner_c_secara_umum($tahap){
		$data['title'] = "SALUTE | Rekap Per Tahap Kuisioner C";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_secara_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_secara_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_c_secara_umum',$data);
	}

	function rekap_kejuruan_kuisioner_b_materi_pelatihan($kejuruan){
		$data['title'] = "SALUTE | Rekap Per Kejuruan Kuisioner B Materi Pelatihan";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();

        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
		$data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_b_materi_pelatihan',$data);
	}

	function rekap_kejuruan_kuisioner_c_rekrut($kejuruan){
		$data['title'] = "SALUTE | Rekap Per Kejuruan Kuisioner C Rekruitmen";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_c_rekrut',$data);
	}

	function cetak_kejuruan_hasil_analisa_angket($kejuruan){
		$data['kejuruan']=$kejuruan;
		$data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

		$pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        
        // materi pelatihan
        $kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_materi_pelatihan = 0;
        $jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        foreach($kuisioner_b_materi_pelatihan as $sl){ 
            $id_soalnya1 = $sl['id_kuisionerB'];
        
            $total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
            
            $jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
            $hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;


        $kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
        $jml_kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();;
        $jml_keseluruhan_tenaga_pelatih=0;

        foreach ($kuisioner_b_tenaga_pelatih as $k) {
            $id_soalnyaku=$k['id_kuisionerB'];
            $total_tenaga_pelatih = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnyaku' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

            $jml_keseluruhan_tenaga_pelatih=$jml_keseluruhan_tenaga_pelatih+(number_format($total_tenaga_pelatih['total']/$jml_kuisioner_b_tenaga_pelatih,2));
            $hasil_akhir_tenaga_pelatih=number_format($jml_keseluruhan_tenaga_pelatih*20,2);

        }

        $data['hasil_kuisioner_b_tenaga_pelatih']=$hasil_akhir_tenaga_pelatih;

        /////menampilkan per tenaga pelatih 

        $data['daftar_pengajar']= $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
        LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
        WHERE pelatihan.id_kejuruan='$kejuruan'")->result_array();



        // foreach ($pelatihan as $k) {
        //     $kd_pelatihan=$k['kd_pelatihan'];
        //     $data['pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();
        //     $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();

        // }

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
       



        // bahan latihan
        $jml_kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_bahan_pelatihan = 0;
        foreach($kuisioner_b_bahan_latihan as $sl2){ 
            $id_soalnya2 = $sl2['id_kuisionerB'];
            $total_bahan_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya2' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya3' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya4' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya5' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
            
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

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
            WHERE penilaian_b.id_soalB='$id_soalnya7' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
            
            $jmlh_keseluruhan_sarpras = $jmlh_keseluruhan_sarpras+(number_format($total_sarpras['total']/$jml_kuisioner_b_sarpras,2));
            $hasil_akhir_sarpras = number_format($jmlh_keseluruhan_sarpras*20,2);
        }
        $data['hasil_kuisioner_b_sarpras'] = $hasil_akhir_sarpras;

		$this->load->view('v_laporan/pdf/rekap_kejuruan_hasil_analisa_angket',$data);
	}

	function cetak_kejuruan_kuisioner_b_tenaga_pelatih($kejuruan, $id_pengajar){
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['kejuruan'] = $kejuruan;
        $data['id_pengajar'] = $id_pengajar;
		$data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();
		$data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        // PENGETAHUAN PEMAHAMAN
        $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();
        $data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();

        // KEMAMPUAN DALAM MEMBAWAKAN MATERI
        $data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
        $data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();

        // KEMAMPUAN DALAM MEMAHAMI MASALAH
        $data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
        $data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();

        // PENAMPILAN TENAGA PELATIH
        $data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();
        $data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_b_tenaga_pelatih',$data);
	}

	/// per program
	 function cetak_rekap_program_kuisioner_a($program)
	 {
		$data['program'] = $program;
		$data['program1'] = $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();

        $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
        $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_a',$data);
     }
     
     function rekap_program_kuisioner_b_unit_kompetensi($program)
     {
        $data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_b_unit_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=5 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_unit_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=5 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_b_unit_kompetensi',$data);
     }

	 function rekap_program_kuisioner_b_materi_pelatihan($program)
	 {

		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_b_materi_pelatihan',$data);
	 }
	 
	 function rekap_program_kuisioner_b_sapras($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->num_rows();
        $data['jml_kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->num_rows();
        $data['jml_kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->num_rows();
        $data['jml_kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();
		
		$data['kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
        $data['kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
        $data['kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
        $data['kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
        $data['kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_b_sapras',$data);
	 }

	 function rekap_program_kuisioner_b_bahan_pelatihan($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_b_bahan_pelatihan',$data);
	 }

	 function cetak_program_kuisioner_c_rekrut($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_rekrut'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekrut'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_rekrut',$data);
	 }

	 function cetak_program_kuisioner_c_sambut($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_penyambutan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_penyambutan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_penyambutan',$data);
	 }

	function cetak_program_kuisioner_c_sapras($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_sapras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_sapras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_sapras',$data);
	 }

	 function cetak_program_kuisioner_c_konsumsi($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_konsumsi',$data);
	 }

	 function cetak_program_kuisioner_c_pelaksanaan($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_pelaksanaan',$data);
	 }

	 function cetak_program_kuisioner_c_umum($program)
	 {
		$data['program'] = $program;
		$data['program1']= $this->M_progam->tampil_detail_progam($program);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['jml_kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_c_umum',$data);
	 }

	 function cetak_pertahap_kuisioner_b_sarpras($tahap){
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
        $data['jml_ruang_teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
        $data['jml_km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
        $data['jml_sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();

        $data['workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
        $data['teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
        $data['listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
        $data['km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
        $data['sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_b_sarpras',$data);
	 }

	 function rekap_pertahap_kuisioner_b_bahan_pelatihan($tahap){

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
		$data['kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_b_bahan_pelatihan',$data);
	}

	function rekap_pertahap_kuisioner_c_rekruitmen($tahap){

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_c_rekruitmen',$data);
	}

	function rekap_pertahap_kuisioner_c_uji_kompetensi($tahap){
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_uji_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_uji_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_tahap_kuisioner_c_uji_kompetensi',$data);
	}

	// akhir per tahap

	function cetak_rekap_kejuruan_kuisioner_a($id_kejuruan){

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$id_kejuruan'")->result_array();
		$data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$id_kejuruan'")->row_array();

		$data['kejuruan'] = $id_kejuruan;
		$data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
		$data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();

		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_a',$data);
	}

	function cetak_perkejuruan_kuisioner_b_sarpras($kejuruan)
	{
		$data['kejuruan'] = $kejuruan;
		$data['kejuruan1']= $this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['jml_kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->num_rows();
        $data['jml_kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->num_rows();
        $data['jml_kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->num_rows();
        $data['jml_kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();
		
		$data['kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
        $data['kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
        $data['kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
        $data['kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
        $data['kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_b_sapras',$data);
	}

	function rekap_kejuruan_kuisioner_b_bahan_pelatihan($kejuruan)
	{
		$data['kejuruan'] = $kejuruan;
		$data['kejuruan1']= $this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['jml_kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_b_bahan_pelatihan',$data);
	}

	function cetak_kejuruan_kuisioner_c_konsumsi($kejuruan)
	{
		$data['kejuruan'] = $kejuruan;
		$data['kejuruan1']= $this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['jml_kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_c_konsumsi',$data);
	}


	function cetak_kejuruan_kuisioner_c_pelaksanaan($kejuruan)
	{
		$data['kejuruan'] = $kejuruan;
		$data['kejuruan1']= $this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['jml_kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_c_pelaksanaan',$data);
	}

	function cetak_kejuruan_kuisioner_c_umum($kejuruan)
	{
		$data['kejuruan'] = $kejuruan;
		$data['kejuruan1']= $this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['jml_kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_c_umum',$data);
	}

	function cetak_kejuruan_kuisioner_c_kamar($kejuruan){

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/pdf/rekap_kejuruan_kuisioner_c_kamar',$data);
	}
	
	function cetak_pertahap_kuisioner_b_tenaga_pelatih($tahap, $id_pengajar){
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();
        $data['tahap'] = $tahap;
        $data['id_pengajar'] = $id_pengajar;
        $data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();

        // PENGETAHUAN PEMAHAMAN
        $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();
        $data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();

        // KEMAMPUAN DALAM MEMBAWAKAN MATERI
        $data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
        $data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();

        // KEMAMPUAN DALAM MEMAHAMI MASALAH
        $data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
        $data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();

        // PENAMPILAN TENAGA PELATIH
        $data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();
        $data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_pertahap_kuisioner_b_tenaga_pelatih',$data);
	}

	function cetak_program_kuisioner_b_tenaga_pelatih($program, $id_pengajar)
	{
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['program'] = $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
        $data['id_pengajar'] = $id_pengajar;
        $data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();

        // PENGETAHUAN PEMAHAMAN
        $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();
        $data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();

        // KEMAMPUAN DALAM MEMBAWAKAN MATERI
        $data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
        $data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();

        // KEMAMPUAN DALAM MEMAHAMI MASALAH
        $data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
        $data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();

        // PENAMPILAN TENAGA PELATIH
        $data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();
        $data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();
		
		$this->load->view('v_laporan/pdf/rekap_program_kuisioner_b_tenaga_pelatih',$data);
	}

	function rekap_kelas_hasil_analis_angket($kd_pelatihan)
	{
		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();
        
        // materi pelatihan
        $kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_materi_pelatihan = 0;
        $jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        foreach($kuisioner_b_materi_pelatihan as $sl){ 
            $id_soalnya1 = $sl['id_kuisionerB'];
        
            $total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.kd_pelatihan")->row_array();
            
            $jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
            $hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;


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

        /////menampilkan per tenaga pelatih 

        $data['daftar_pengajar']= $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
        LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
        WHERE pelatihan.kd_pelatihan='$kd_pelatihan'")->result_array();



        // foreach ($pelatihan as $k) {
        //     $kd_pelatihan=$k['kd_pelatihan'];
        //     $data['pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();
        //     $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();

        // }

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


		$this->load->view('v_laporan/pdf/rekap_kelas_hasil_analis_angket',$data);

	}


	function cetak_program_hasil_analisa_angket($program)
	{
		$data['program']=$program;
		$data['program1']=$this->M_progam->tampil_detail_progam($program);

		$pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        
        // materi pelatihan
        $kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_materi_pelatihan = 0;
        $jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        foreach($kuisioner_b_materi_pelatihan as $sl){ 
            $id_soalnya1 = $sl['id_kuisionerB'];
        
            $total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.id_program='$program'")->row_array();
            
            $jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
            $hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;


        $kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
        $jml_kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();;
        $jml_keseluruhan_tenaga_pelatih=0;

        foreach ($kuisioner_b_tenaga_pelatih as $k) {
            $id_soalnyaku=$k['id_kuisionerB'];
            $total_tenaga_pelatih = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnyaku' AND pelatihan.id_program='$program'")->row_array();

            $jml_keseluruhan_tenaga_pelatih=$jml_keseluruhan_tenaga_pelatih+(number_format($total_tenaga_pelatih['total']/$jml_kuisioner_b_tenaga_pelatih,2));
            $hasil_akhir_tenaga_pelatih=number_format($jml_keseluruhan_tenaga_pelatih*20,2);

        }

        $data['hasil_kuisioner_b_tenaga_pelatih']=$hasil_akhir_tenaga_pelatih;

        /////menampilkan per tenaga pelatih 

        $data['daftar_pengajar']= $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
        LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
        WHERE pelatihan.id_program='$program'")->result_array();



        // foreach ($pelatihan as $k) {
        //     $kd_pelatihan=$k['kd_pelatihan'];
        //     $data['pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();
        //     $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();

        // }

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
       



        // bahan latihan
        $jml_kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_bahan_pelatihan = 0;
        foreach($kuisioner_b_bahan_latihan as $sl2){ 
            $id_soalnya2 = $sl2['id_kuisionerB'];
            $total_bahan_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya2' AND pelatihan.id_program='$program'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya3' AND pelatihan.id_program='$program'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya4' AND pelatihan.id_program='$program'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya5' AND pelatihan.id_program='$program'")->row_array();
            
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_program='$program'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_program='$program'")->row_array();

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
            WHERE penilaian_b.id_soalB='$id_soalnya7' AND pelatihan.id_program='$program'")->row_array();
            
            $jmlh_keseluruhan_sarpras = $jmlh_keseluruhan_sarpras+(number_format($total_sarpras['total']/$jml_kuisioner_b_sarpras,2));
            $hasil_akhir_sarpras = number_format($jmlh_keseluruhan_sarpras*20,2);
        }
        $data['hasil_kuisioner_b_sarpras'] = $hasil_akhir_sarpras;

		$this->load->view('v_laporan/pdf/rekap_program_hasil_analisa_angket',$data);

	}
	// akhir pdf

 function rekap_kelas_excel_hasil_analis_angket($kd_pelatihan)
 {
	$data['title'] = "Kuisioner B - Hasil Rekap Analisa Angket | Kelas : .$kd_pelatihan.";
	$data['kd_pelatihan']=$kd_pelatihan;
	$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

	$pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE kd_pelatihan='$kd_pelatihan'")->result_array();
	
	// materi pelatihan
	$kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
	
	$jmlh_keseluruhan_materi_pelatihan = 0;
	$jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
	foreach($kuisioner_b_materi_pelatihan as $sl){ 
		$id_soalnya1 = $sl['id_kuisionerB'];
	
		$total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
		WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.kd_pelatihan")->row_array();
		
		$jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
		$hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
	}
	$data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;


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

	/////menampilkan per tenaga pelatih 

	$data['daftar_pengajar']= $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
	LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
	WHERE pelatihan.kd_pelatihan='$kd_pelatihan'")->result_array();



	// foreach ($pelatihan as $k) {
	//     $kd_pelatihan=$k['kd_pelatihan'];
	//     $data['pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();
	//     $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();

	// }

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

	$this->load->view('v_laporan/excel/rekap_kelas_hasil_analisa_angket',$data);


 }

	function rekap_program_excel_hasil_analisa_angket($program)
	{
		$data['title'] = "Kuisioner B - Hasil Rekap Analisa Angket | Program : .$program.";
		$data['program']=$program;
		$data['program1']=$this->M_progam->tampil_detail_progam($program);

		$pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        
        // materi pelatihan
        $kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_materi_pelatihan = 0;
        $jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        foreach($kuisioner_b_materi_pelatihan as $sl){ 
            $id_soalnya1 = $sl['id_kuisionerB'];
        
            $total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.id_program='$program'")->row_array();
            
            $jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
            $hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;


        $kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
        $jml_kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();;
        $jml_keseluruhan_tenaga_pelatih=0;

        foreach ($kuisioner_b_tenaga_pelatih as $k) {
            $id_soalnyaku=$k['id_kuisionerB'];
            $total_tenaga_pelatih = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnyaku' AND pelatihan.id_program='$program'")->row_array();

            $jml_keseluruhan_tenaga_pelatih=$jml_keseluruhan_tenaga_pelatih+(number_format($total_tenaga_pelatih['total']/$jml_kuisioner_b_tenaga_pelatih,2));
            $hasil_akhir_tenaga_pelatih=number_format($jml_keseluruhan_tenaga_pelatih*20,2);

        }

        $data['hasil_kuisioner_b_tenaga_pelatih']=$hasil_akhir_tenaga_pelatih;

        /////menampilkan per tenaga pelatih 

        $data['daftar_pengajar']= $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
        LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
        WHERE pelatihan.id_program='$program'")->result_array();



        // foreach ($pelatihan as $k) {
        //     $kd_pelatihan=$k['kd_pelatihan'];
        //     $data['pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();
        //     $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();

        // }

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
       



        // bahan latihan
        $jml_kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_bahan_pelatihan = 0;
        foreach($kuisioner_b_bahan_latihan as $sl2){ 
            $id_soalnya2 = $sl2['id_kuisionerB'];
            $total_bahan_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya2' AND pelatihan.id_program='$program'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya3' AND pelatihan.id_program='$program'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya4' AND pelatihan.id_program='$program'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya5' AND pelatihan.id_program='$program'")->row_array();
            
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_program='$program'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_program='$program'")->row_array();

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
            WHERE penilaian_b.id_soalB='$id_soalnya7' AND pelatihan.id_program='$program'")->row_array();
            
            $jmlh_keseluruhan_sarpras = $jmlh_keseluruhan_sarpras+(number_format($total_sarpras['total']/$jml_kuisioner_b_sarpras,2));
            $hasil_akhir_sarpras = number_format($jmlh_keseluruhan_sarpras*20,2);
        }
		$data['hasil_kuisioner_b_sarpras'] = $hasil_akhir_sarpras;
		
		$this->load->view('v_laporan/excel/rekap_program_hasil_analisa_angket',$data);
	}

	function export_excel_program_kuisioner_b_tenaga_pelatih($program, $id_pengajar)
	{
		$data['title'] = "Kuisioner B - Tenaga Pelatih | Program : .$program.";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['program'] = $program;
        $data['program1'] = $this->M_progam->tampil_detail_progam($program);
        $data['id_pengajar'] = $id_pengajar;
        $data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();

        // PENGETAHUAN PEMAHAMAN
        $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();
        $data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();

        // KEMAMPUAN DALAM MEMBAWAKAN MATERI
        $data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
        $data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();

        // KEMAMPUAN DALAM MEMAHAMI MASALAH
        $data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
        $data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();

        // PENAMPILAN TENAGA PELATIH
        $data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();
        $data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();


		$this->load->view('v_laporan/excel/rekap_program_kuisioner_b_tenaga_pelatih',$data);
	}

	function export_exel_kuisioner_a($kd_pelatihan){
		$data['title'] = "Kuisioner A";
		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
				
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();
		$data['graph']= $this->db->query("SELECT DISTINCT * FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array();			

		$this->load->view('v_laporan/excel/kuisioner_a',$data);
	}

	function export_exel_kuisioner_b_materi_pelatihan($kd_pelatihan){
		$data['title'] = "Kuisioner B | Materi Pelatihan";

		$data['kd_pelatihan'] = $kd_pelatihan;
		$data['data1'] = $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 ")->result_array();

		$this->load->view('v_laporan/excel/kuisioner_b_materi_pelatihan',$data);
    }
    


	function export_exel_kuisioner_b_sarpras($kd_pelatihan){
		$data['title'] = "Kuisioner B | Sarpras";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB  WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();

		$this->load->view('v_laporan/excel/kuisioner_b_sarpras',$data);
	}

	function export_exel_kuisioner_b_bahan_pelatihan($kd_pelatihan){
		$data['title'] = "Kuisioner B | Bahan Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_b_bahan_pelatihan',$data);
	}

	function export_exel_kuisioner_b_pelatihan_pengajar($kd_pelatihan,$id_pengajar){
		$data['title'] = "Kuisioner B | Pengajar Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);
		$data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();
		$data['id_pengajar']= $id_pengajar;
		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal,tipe_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b  WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' ")->result_array();
		
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
		
		
		$this->load->view('v_laporan/excel/kuisioner_b_pelatihan_pengajar',$data);
	}

	
	function export_exel_kuisioner_c_rekrut($kd_pelatihan){
		$data['title'] = "Kuisioner B | Bahan Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_rekrut',$data);
	}

	function export_exel_kuisioner_c_penyambutan($kd_pelatihan){
		$data['title'] = "Kuisioner B | Bahan Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_penyambutan',$data);
	}
	
	function export_exel_kuisioner_c_sarpras($kd_pelatihan){
		$data['title'] = "Kuisioner B | Bahan Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_sarpras',$data);
	}
	

	function export_exel_kuisioner_c_konsumsi($kd_pelatihan){
		$data['title'] = "Kuisioner C | Konsumsi";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=4 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_konsumsi',$data);
	}

	function export_exel_kuisioner_c_pelaksanaan_uji($kd_pelatihan){
		$data['title'] = "Kuisioner C | Pelaksanaan Uji Kompetensi";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_pelaksanaan_uji',$data);
	}

	function export_exel_kuisioner_c_secara_umum_pel($kd_pelatihan){
		$data['title'] = "Kuisioner C | Secara Umum Pelatihan";

		$data['kd_pelatihan']=$kd_pelatihan;
		$data['data1']= $this->M_pelatihan->tampil_detail_pelatihan($kd_pelatihan);

		$data['responden'] = $this->db->query("SELECT DISTINCT id_user,jenis_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 ")->result_array();
		$this->load->view('v_laporan/excel/kuisioner_c_secara_umum',$data);
	}

	function export_exel_rekap_tahap_kuisioner_a($tahap){
		$data['title'] = "Kuisioner A | Per Tahap : .$tahap.";

		$data['tahap'] = $tahap;
        // custome
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
        $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_a',$data);
	}

	function export_exel_rekap_tahap_kuisioner_b_materi_pelatihan($tahap){
		$data['title'] = "Kuisioner B - Materi Pelatihan | Tahap : .$tahap.";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_b_materi_pelatihan',$data);
	}

	function export_exel_kuisioner_c_kamar($tahap){
		$data['title'] = "Kuisioner C - Penyambutan dan Pembagian Kamar Peserta | Tahap : .$tahap.";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

		$data['tahap'] = $tahap;
        $data['jml_kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
		$data['kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_c_kamar',$data);
	}

	///perprogram excel
	function export_excel_rekap_program_kuisioner_a($program)
	{
		$data['title'] = "Kuisioner A | Per Program : .$program.";
		$data['program']=$program;
		$data['program1']=$this->M_progam->tampil_detail_progam($program);

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();

        $data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
        $data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_a',$data);

    }
    
    function export_excel_program_kuisioner_b_unit_kompetensi($program)
    {
        $data['title'] = "Kuisioner B | Per Program : .$program.";
        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
        $data['program']=$program;
		$data['program1']=$this->M_progam->tampil_detail_progam($program);

        $data['jml_kuisioner_b_unit_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=5 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_unit_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=5 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_program_kuisioner_b_unit_kompetensi',$data);


    }

	function export_exel_program_kuisioner_b_materi_pelatihan($program)
	{
		$data['title'] = "Kuisioner B - Materi Pelatihan | Program : .$program.";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
        $data['program'] = $program;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_b_materi_pelatihan',$data);
	}
	
	function export_exel_pertahap_kuisioner_b_sarpras($tahap){
		$data['title'] = "Kuisioner B - Sarpras | Program : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
        $data['jml_ruang_teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
        $data['jml_km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
        $data['jml_sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();

        $data['workshop'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
        $data['teori'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
        $data['listrik'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
        $data['km'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
		$data['sarana'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_b_sarpras',$data);
	}

	function export_exel_program_kuisioner_b_sapras($program)
	{
		$data['title'] = "Kuisioner B - Sarana / Prasarana | Program : .$program.";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_program='$program'")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
        $data['program'] = $program;
        $data['jml_kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
        $data['jml_kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
        $data['jml_kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
        $data['jml_kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();
		
		$data['kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
		$data['kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
		$data['kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
		$data['kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
		$data['kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_b_sapras',$data);

	}

	function export_excel_perkejuruan_kuisioner_b_sarpras($kejuruan)
	{
		$data['title'] = "Kuisioner B - Sarana / Prasarana | Program : .$kejuruan.";
		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
		$data['kejuruan1']=$this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->num_rows();
        $data['jml_kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->num_rows();
        $data['jml_kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->num_rows();
        $data['jml_kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->num_rows();
        $data['jml_kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->num_rows();
		
		$data['kuisioner_b_sapras1'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1")->result_array();
		$data['kuisioner_b_sapras2'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2")->result_array();
		$data['kuisioner_b_sapras3'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5")->result_array();
		$data['kuisioner_b_sapras4'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6")->result_array();
		$data['kuisioner_b_sapras5'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7")->result_array();
		
		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_b_sapras',$data);
	}

	function export_exel_program_kuisioner_b_bahan_pelatihan($program)
	{
		$data['title'] = "Kuisioner B - Bahan Pelatihan | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_b_bahan_pelatihan',$data);
	}

	function export_excel_rekap_kejuruan_kuisioner_a($kejuruan){
		$detail_kejuruan = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();
		$nama_kejuruan = $detail_kejuruan['nama_kejuruan'];
		$data['title'] = "Kuisioner A | Laporan Kejuruan : .$nama_kejuruan.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
		$data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

		$data['kejuruan'] = $kejuruan;
		$data['jml_kuisioner_a'] = $this->db->get('kuisioner_a')->num_rows();
		$data['kuisioner_a'] = $this->db->get('kuisioner_a')->result_array();

		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_a',$data);
	}

	function export_exel_rekap_kejuruan_kuisioner_b_materi_pelatihan($kejuruan){
		$detail_kejuruan = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();
		$nama_kejuruan = $detail_kejuruan['nama_kejuruan'];
		$data['title'] = "Kuisioner B | Laporan Kejuruan : .$nama_kejuruan.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();

        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_materi_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_b_materi_pelatihan',$data);
	}

	function export_exel_rekap_kejuruan_kuisioner_c_rekrut($kejuruan){
		$detail_kejuruan = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();
		$nama_kejuruan = $detail_kejuruan['nama_kejuruan'];
		$data['title'] = "Kuisioner C Rekruitmen | Laporan Kejuruan : .$nama_kejuruan.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_c_rekruitmen',$data);
	}

	function export_excel_kejuruan_kuisioner_b_bahan_pelatihan($kejuruan)
	{
		$data['title'] = "Kuisioner B - Bahan Pelatihan | Kejuruan : .$kejuruan.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan=$kejuruan ")->result_array();
		$data['kejuruan1']=$this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
		$data['kejuruan']= $kejuruan;

		$data['jml_kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_pelatihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_b_bahan_pelatihan',$data);
	}

	function export_excel_kejuruan_kuisioner_c_kamar($kejuruan){

		$detail_kejuruan = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();
		$nama_kejuruan = $detail_kejuruan['nama_kejuruan'];
		$data['title'] = "Kuisioner C Penyambutan dan Pembagian Kamar Peserta | Laporan Kejuruan : .$nama_kejuruan.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['kejuruan'] = $kejuruan;
        $data['jml_kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
		$data['kuisioner_c_kamar'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
		
		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_c_kamar',$data);
	}

	function export_exel_kejuruan_kuisioner_b_tenaga_pelatih($kejuruan, $id_pengajar){
		$detail_kejuruan = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();
		$nama_kejuruan = $detail_kejuruan['nama_kejuruan'];

		$data['title'] = "Kuisioner B Tenaga Pelatih | Laporan Kejuruan : .$nama_kejuruan.";

		$data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

        $data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        $data['kejuruan'] = $kejuruan;
        $data['id_pengajar'] = $id_pengajar;
        $data['pengajar'] = $this->db->query("SELECT * FROM pengajar WHERE id_pengajar='$id_pengajar'")->row_array();

        // PENGETAHUAN PEMAHAMAN
        $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();
        $data['pengetahuan_pemahaman'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();

        // KEMAMPUAN DALAM MEMBAWAKAN MATERI
        $data['jml_kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->num_rows();
        $data['kemampuan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10")->result_array();

        // KEMAMPUAN DALAM MEMAHAMI MASALAH
        $data['jml_memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
        $data['memahami_masalah'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->result_array();

        // PENAMPILAN TENAGA PELATIH
        $data['jml_penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->num_rows();
        $data['penampilan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12")->result_array();

		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_b_tenaga_pelatih',$data);
	}

	function rekap_kejuruan_excel_hasil_analisa_angket($kejuruan){
		$detail_kejuruan = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();
		$nama_kejuruan = $detail_kejuruan['nama_kejuruan'];

		$data['title'] = "Kuisioner B - Hasil Rekap Analisa Angket | Kejuruan : .$nama_kejuruan.";
		$data['kejuruan']=$kejuruan;

		$data['detail_kejuruan'] = $this->db->query("SELECT * FROM kejuruan WHERE id_kejuruan='$kejuruan'")->row_array();

		$pelatihan = $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan='$kejuruan'")->result_array();
        
        // materi pelatihan
        $kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
        
        $jmlh_keseluruhan_materi_pelatihan = 0;
        $jml_kuisioner_b_materi_pelatihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        foreach($kuisioner_b_materi_pelatihan as $sl){ 
            $id_soalnya1 = $sl['id_kuisionerB'];
        
            $total_materi_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnya1' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
            
            $jmlh_keseluruhan_materi_pelatihan = $jmlh_keseluruhan_materi_pelatihan+(number_format($total_materi_pelatihan['total']/$jml_kuisioner_b_materi_pelatihan,2));
            $hasil_akhir_materi_pelatihan = number_format($jmlh_keseluruhan_materi_pelatihan*20,2);
        }
        $data['hasil_kuisioner_b_materi_pelatihan'] = $hasil_akhir_materi_pelatihan;


        $kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
        $jml_kuisioner_b_tenaga_pelatih=$this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();;
        $jml_keseluruhan_tenaga_pelatih=0;

        foreach ($kuisioner_b_tenaga_pelatih as $k) {
            $id_soalnyaku=$k['id_kuisionerB'];
            $total_tenaga_pelatih = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
            WHERE penilaian_b.id_soalB='$id_soalnyaku' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

            $jml_keseluruhan_tenaga_pelatih=$jml_keseluruhan_tenaga_pelatih+(number_format($total_tenaga_pelatih['total']/$jml_kuisioner_b_tenaga_pelatih,2));
            $hasil_akhir_tenaga_pelatih=number_format($jml_keseluruhan_tenaga_pelatih*20,2);

        }

        $data['hasil_kuisioner_b_tenaga_pelatih']=$hasil_akhir_tenaga_pelatih;

        /////menampilkan per tenaga pelatih 

        $data['daftar_pengajar']= $this->db->query("SELECT DISTINCT pengajar.id_pengajar,pengajar.nama_pengajar FROM detail_pengajar LEFT JOIN pelatihan ON detail_pengajar.kd_pelatihan=pelatihan.kd_pelatihan
        LEFT JOIN pengajar ON pengajar.id_pengajar=detail_pengajar.id_pengajar
        WHERE pelatihan.id_kejuruan='$kejuruan'")->result_array();



        // foreach ($pelatihan as $k) {
        //     $kd_pelatihan=$k['kd_pelatihan'];
        //     $data['pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->result_array();
        //     $data['jml_pengetahuan_pemahaman'] = $this->db->query("SELECT  DISTINCT * FROM kuisioner_b INNER JOIN penilaian_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB INNER JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b WHERE kd_pelatihan=$kd_pelatihan AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9")->num_rows();

        // }

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
       



        // bahan latihan
        $jml_kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $kuisioner_b_bahan_latihan = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

        $jmlh_keseluruhan_bahan_pelatihan = 0;
        foreach($kuisioner_b_bahan_latihan as $sl2){ 
            $id_soalnya2 = $sl2['id_kuisionerB'];
            $total_bahan_pelatihan = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                          WHERE penilaian_b.id_soalB='$id_soalnya2' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya3' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya4' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
        
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya5' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
            
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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

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
                                            WHERE penilaian_c.id_soalC='$id_soalnya6' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();

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
            WHERE penilaian_b.id_soalB='$id_soalnya7' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
            
            $jmlh_keseluruhan_sarpras = $jmlh_keseluruhan_sarpras+(number_format($total_sarpras['total']/$jml_kuisioner_b_sarpras,2));
            $hasil_akhir_sarpras = number_format($jmlh_keseluruhan_sarpras*20,2);
        }
		$data['hasil_kuisioner_b_sarpras'] = $hasil_akhir_sarpras;
		
		$this->load->view('v_laporan/excel/rekap_kejuruan_hasil_analisa_angket',$data);
	}

	
	///perpogram c 
	function export_program_excel_kuisioner_c_rekrut($program)
	{
		$data['title'] = "Kuisioner C - Rekruitmen | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_rekrut'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekrut'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_rekrut',$data);
	}

	function export_program_excel_kuisioner_c_sambut($program)
	{
		$data['title'] = "Kuisioner C - Penyambutan | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_penyambutan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_penyambutan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=2 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_penyambutan',$data);
	}

	function export_program_excel_kuisioner_c_sapras($program)
	{
		$data['title'] = "Kuisioner C - Sarana / Prasarana | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_sapras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_sapras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_sapras',$data);
	}

	function export_program_excel_kuisioner_c_konsumsi($program)
	{
		$data['title'] = "Kuisioner C - Konsumsi | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_konsumsi',$data);
	}

	function export_kejuruan_excel_kuisioner_c_konsumsi($kejuruan)
	{
		$data['title'] = "Kuisioner C - Konsumsi | Kejuruan: .$kejuruan.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan=$kejuruan ")->result_array();
		$data['kejuruan1']=$this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
		$data['kejuruan']= $kejuruan;
		$data['jml_kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_c_konsumsi',$data);
	}

	function export_program_excel_kuisioner_c_pelaksanaan($program)
	{
		$data['title'] = "Kuisioner C - Pelaksanaan | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_pelaksanaan',$data);
	}

	function export_kejuruan_excel_kuisioner_c_pelaksanaan($kejuruan)
	{
		$data['title'] = "Kuisioner C - Pelaksanaan | Kejuruan : .$kejuruan.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan=$kejuruan ")->result_array();
		$data['kejuruan1']=$this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
		$data['kejuruan']= $kejuruan;

		$data['jml_kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_pelaksanaan'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_c_pelaksanaan',$data);
	}


	function export_program_excel_kuisioner_c_umum($program)
	{
		$data['title'] = "Kuisioner C - Secara Umum | Program : .$program.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_program=$program ")->result_array();
		$data['program1']=$this->M_progam->tampil_detail_progam($program);
		$data['program']= $program;

		$data['jml_kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_program_kuisioner_c_umum',$data);
	}

	function export_kejuruan_excel_kuisioner_c_umum($kejuruan)
	{
		$data['title'] = "Kuisioner C - Secara Umum | Kejuruan : .$kejuruan.";
		$data['pelatihan']= $this->db->query("SELECT * FROM pelatihan WHERE id_kejuruan=$kejuruan ")->result_array();
		$data['kejuruan1']=$this->M_kejuruan->tampil_detail_kejuruan($kejuruan);
		$data['kejuruan']= $kejuruan;

		$data['jml_kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();
	
		$this->load->view('v_laporan/excel/rekap_kejuruan_kuisioner_c_umum',$data);
	}

	function export_exel_rekap_tahap_kuisioner_b_bahan_pelatihan($tahap){
		$data['title'] = "Kuisioner B - Bahan Pelatihan | Tahap : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_b_bahan_latihan'] = $this->db->query("SELECT * FROM kuisioner_b WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_b_bahan_pelatihan',$data);
	}

	function export_exel_rekap_tahap_kuisioner_c_rekruitmen($tahap){
		$data['title'] = "Kuisioner C - Rekruitmen | Tahap : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_rekruitmen'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=1 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_c_rekruitmen',$data);
	}


	function export_exel_rekap_tahap_kuisioner_c_sarpras($tahap){
		$data['title'] = "Kuisioner C - Sarpras | Tahap : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_sarpras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_sarpras'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=3 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_c_sarpras',$data);
	}

	function export_exel_rekap_tahap_kuisioner_c_konsumsi($tahap){
		$data['title'] = "Kuisioner C - Konsumsi | Tahap : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_konsumsi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=4 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_c_konsumsi',$data);
	}

	function export_exel_rekap_tahap_kuisioner_c_uji_kompetensi($tahap){
		$data['title'] = "Kuisioner C - Pelaksanaan Uji Kompetensi | Tahap : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_uji_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_uji_kompetensi'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=6 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_c_uji_kompetensi',$data);
	}

	function export_exel_rekap_tahap_kuisioner_c_secara_umum($tahap){
		$data['title'] = "Kuisioner C - Secara Umum | Tahap : .$tahap.";

		$data['pelatihan'] = $this->db->query("SELECT * FROM pelatihan WHERE tahap_pelatihan='$tahap'")->result_array();

        $data['tahap'] = $tahap;
        $data['jml_kuisioner_c_secara_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->num_rows();
        $data['kuisioner_c_secara_umum'] = $this->db->query("SELECT * FROM kuisioner_c WHERE jenis_soal=7 AND tipe_soal='pg'")->result_array();

		$this->load->view('v_laporan/excel/rekap_tahap_kuisioner_c_secara_umum',$data);
	}
    
}
