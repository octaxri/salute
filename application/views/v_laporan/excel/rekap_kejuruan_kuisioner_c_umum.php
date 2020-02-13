<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table align="center" cellspacing="5">
	
    <tr>
    <td></td>
        <td colspan="3"><h4>X. SECARA UMUM PELAKSANAAN PELATIHAN </h4></td>
    </tr>
    <tr>
    <td></td>
        <td colspan="3"><center><h4> HASIL ANALISIS ANGKET<br> PELATIHAN BERBASIS KOMPETENSI <br> PER KEJURUAN : <?= strtoupper($kejuruan1['nama_kejuruan']);?> </h4></center></td>
    </tr>
    
          <tr>
          <td></td>
            <td colspan="3">
                <!-- tabel -->  
                <table border="1" width="90%">
                <thead>
                <tr align="center">
                  <th rowspan="2" width="15">No Responden</th>
                  <th colspan="<?= $jml_kuisioner_c_umum;?>" align="center">Secara Umum Pelaksanaan Pelatihan</th>
                  <th rowspan="2" align="center" ><center>ID Peserta</center></th>
                </tr>

                <tr align="center">
                <?php 
                       $soal=1;
                      foreach ($kuisioner_c_umum as $key) { ?>
                        <th align="center"><?= $soal++;?></th>
                      <?php }?>
                </tr>

              </thead>
              <tbody>
              <?php $i1=1;  foreach($pelatihan as $pl){ ?>
                <?php 
                    $kd_pelatihan = $pl['kd_pelatihan'];
                    $responden = $this->db->query("SELECT DISTINCT id_user FROM penilaian_c WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                ?>

              <?php foreach($responden as $r){ ?>
                  <?php 
                    $id_user = $r['id_user'];
                    $soal = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg'")->result_array(); 
                  ?>
                  <tr>
                  <td align="center"><?= $i1++; ?></td>
                  <!-- loop 2 -->
                  <?php $i2=1; 
                  foreach($soal as $s){
                    
                    $id_soal = $s['id_soalC']; 
                    $nilainya = $this->db->query("SELECT * FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND id_soalC='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg'")->row_array();  
                    // 
                  ?>
                  <td align="center"><?= $nilainya['jawaban']; ?></td>
                  <?php } ?>
                  <?php if($soal != NULL){ ?>
                                <td align="center"><?= $nilainya['id_user']; ?></td>
                              <?php } ?>
                  <!-- akhir loop 2 -->
                  </tr>
                <?php } ?>
                <?php } ?>
            
                <tr align="center">
                  <td>Jumlah</td>
                  <?php foreach($kuisioner_c_umum as $sl){ 
                      $id_soalnya = $sl['id_kuisionerC'];
                      $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                                    WHERE penilaian_c.id_soalC='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                  ?>
                    <td align="center"><?= $total['total']; ?></td>
                  <?php } ?>
                
                </tr>

                <tr align="center">
                  <td>Nilai Rata-Rata</td>
                  <?php foreach($kuisioner_c_umum as $sl){ 
                      $id_soalnya = $sl['id_kuisionerC'];
                      $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                                    WHERE penilaian_c.id_soalC='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                  ?>
                    <td align="center"><?= number_format($total['total'],2); ?></td>
                <?php } ?>
                </tr>

                <tr align="center">
                  <td>NRR X Bobot</td>
                  <?php  $jmlh_keseluruhan = 0; foreach($kuisioner_c_umum as $sl){ 
                      $id_soalnya = $sl['id_kuisionerC'];
                      $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c LEFT JOIN pelatihan ON penilaian_c.kd_pelatihan=pelatihan.kd_pelatihan 
                                                    WHERE penilaian_c.id_soalC='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                  ?>
                    <td align="center"><?= number_format($total['total']/$jml_kuisioner_c_umum,2); ?></td>
                  <?php $jmlh_keseluruhan = $jmlh_keseluruhan+(number_format($total['total']/$jml_kuisioner_c_umum,2)); } ?>
                
                </tr>
                <tr align="center">
                  <td>Jumlah</td>
                  <td colspan="<?= $jml_kuisioner_c_umum;?>" align="center"><h4><?= number_format($jmlh_keseluruhan,2) ;?></h4></td>
                </tr>
                <tr align="center">
                  <td>Jumlah X 25</td>
                  <td colspan="<?= $jml_kuisioner_c_umum;?>" align="center"><h4><?= $hasil_akhir= number_format($jmlh_keseluruhan*25,2) ;?>
                  
                  <?php 
                      if($hasil_akhir <= 64.99){  
                          echo '(Tidak Baik)';
                      }
                      else if($hasil_akhir>= 65.00 && $hasil_akhir<= 76.60){
                          echo '(Kurang Baik)';
                      }
                      else if($hasil_akhir>= 76.61 && $hasil_akhir<= 88.30){
                          echo '(Baik)';
                      }
                      else if($hasil_akhir>= 88.31 && $hasil_akhir<= 100){
                          echo '(Sangat Baik)';
                      }   
                    ?>
                  
                  </h4></td>
                </tr>
              </tbody>
                </table>

                <br>
    <center><h4>URAIAN</h4>
    <table border="1" width="100%" cellspacing=0>
      <thead>
            <th align="center">No</th>
            <th>No</th>
            <th>Saran / Komentar</th>
            <th align="center">ID Peserta</th>
      </thead>
      <tbody>
        <?php $no=1;  
          foreach($soal_uraian as $ur){
            $id_c = $ur['id_kuisionerC'];
            $uraian = $this->db->query("SELECT * FROM penilaian_c LEFT JOIN user ON penilaian_c.id_user=user.id_user LEFT JOIN kuisioner_c ON kuisioner_c.id_kuisionerC=penilaian_c.id_soalC  WHERE id_soalC='$id_c'")->result_array();

            foreach($uraian as $r){
        ?>
            <tr>
              <td align="center"><?= $no++; ?></td>
              <td><?= $r['soalC']; ?></td>
              <td><?= $r['jawaban']; ?></td>
              <td align="center"><?= $r['id_user']; ?></td>
            </tr>
        <?php } } ?>
      </tbody>
    </table>
    </center>
            </td>	
        </tr>

</table>
