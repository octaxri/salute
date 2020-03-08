<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SALUTE | Cetak Laporan</title>
</head>
<style>
    p{
        font-family: "Times New Roman", Times, serif;
        font-size: 10px;
    }

    @media print {
      h4 {page-break-before: always;}
      }
</style>

<body onload="window.print()">

<table style="margin-left:10px; margin-bottom:0px;" width="100%">

<tr>
            <td><h4>III. SARANA / PRASARANA</h4></td>
        </tr>
        <tr>
            <td><center><h4>HASIL ANALISIS <br> PELATIHAN BERBASIS KOMPETENSI <br>PER KEJURUAN : <?= strtoupper($kejuruan1['nama_kejuruan']); ?></h4>
            </center></td>
        </tr>

<tr>
            <td align="center">
    <table border="1"  width="90%">
                   
                        
                      <tr>
                          <th rowspan="2" width="15" align="center" align="center">No Responden</th>
                          <th colspan="<?= $jml_kuisioner_b_sapras1; ?>" align="center">Workshop/Bengkel</th>
                          <th colspan="<?= $jml_kuisioner_b_sapras2; ?>" align="center">Ruang Teori</th>
                          <th colspan="<?= $jml_kuisioner_b_sapras3; ?>" align="center">Listrik</th>
                          <th colspan="<?= $jml_kuisioner_b_sapras4; ?>" align="center">Kamar Mandi / Toilet</th>
                          <th colspan="<?= $jml_kuisioner_b_sapras5; ?>" align="center">Sarana Penunjang</th>
                          <th rowspan="3" align="center" ><center>ID Peserta</center></th>
                      </tr>

                        <tr>
                              <?php 
                               $soal=1;
                              foreach ($kuisioner_b_sapras1 as $key) { ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php }?>

                              <?php 
                               $soal=1;
                              foreach ($kuisioner_b_sapras2 as $key) { ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php }?>

                              <?php 
                               $soal=1;
                              foreach ($kuisioner_b_sapras3 as $key) { ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php }?>

                              <?php 
                               $soal=1;
                              foreach ($kuisioner_b_sapras4 as $key) { ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php }?>

                              <?php 
                               $soal=1;
                              foreach ($kuisioner_b_sapras5 as $key) { ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php }?>
                        </tr>        
                  
                      <tbody>
                      
                      <?php $i1=1;  foreach($pelatihan as $pl){ ?>
                        <?php 
                            $kd_pelatihan = $pl['kd_pelatihan'];
                            $responden = $this->db->query("SELECT DISTINCT id_user FROM penilaian_b WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                        ?>

                      <?php foreach($responden as $r){ ?>
                          <?php 
                            $id_user = $r['id_user'];
                            $soal = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->result_array(); 
                            $soal1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2 ")->result_array(); 
                            $soal2 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->result_array(); 
                            $soal3 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->result_array(); 
                            $soal4 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7 ")->result_array(); 
                          ?>
                          <tr>
                          <td align="center"><?= $i1++; ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; 
                          foreach($soal as $s){
                            
                            $id_soal = $s['id_soalB']; 
                            $nilainya = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->row_array();  
                            // 
                          ?>
                          <td align="center"><?= $nilainya['jawaban']; ?></td>
                          <?php } ?>

                            <!-- Ruang TEori -->
                          <?php foreach ($soal1 as $k) {
                              
                              $id_soal = $k['id_soalB']; 
                              $nilainya1 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2 ")->row_array();
                              
                              ?>

                              <td align="center"><?= $nilainya1['jawaban']; ?></td>
                          <?php }?>

                        <!-- LIstrik  -->
                          <?php foreach ($soal2 as $k) {
                              
                              $id_soal = $k['id_soalB']; 
                              $nilainya1 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->row_array();
                              
                              ?>

                              <td align="center"><?= $nilainya1['jawaban']; ?></td>
                          <?php }?>


                          
                        <!-- Kamar Mandi  -->
                        <?php foreach ($soal3 as $k) {
                              
                              $id_soal = $k['id_soalB']; 
                              $nilainya1 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->row_array();
                              
                              ?>

                              <td align="center"><?= $nilainya1['jawaban']; ?></td>
                          <?php }?>

                          
                        <!-- Sarana Penunjang -->
                        <?php foreach ($soal4 as $k) {
                              
                              $id_soal = $k['id_soalB']; 
                              $nilainya1 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7 ")->row_array();
                              
                              ?>

                              <td align="center"><?= $nilainya1['jawaban']; ?></td>
                          <?php }?>


                          <?php if($soal != NULL && $soal1 != NULL && $soal2 != NULL && $soal3 != NULL && $soal4 !=NULL){ ?>
                                <td align="center"><?= $nilainya1['id_user']; ?></td>
                              <?php } ?>
                          <!-- akhir loop 2 -->
                          </tr>
                        <?php } ?>
                       
                       
                        <?php } ?>


                        <tr>
                          <td align="center">Jumlah</td>
                          <?php foreach($kuisioner_b_sapras1 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= $total['total']; ?></td>
                          <?php } ?>

                            <!-- Ruang Teori -->
                          <?php foreach($kuisioner_b_sapras2 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= $total1['total']; ?></td>
                          <?php } ?>
                          <td rowspan="5"></td>

                            <!-- Listrik -->
                          <?php foreach($kuisioner_b_sapras3 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= $total1['total']; ?></td>
                          <?php } ?>


                                                      <!-- Kamar Mandi -->
                          <?php foreach($kuisioner_b_sapras4 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= $total1['total']; ?></td>
                          <?php } ?>


                            <!-- Sarana Penunjang -->
                          <?php foreach($kuisioner_b_sapras5 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= $total1['total']; ?></td>
                          <?php } ?>

                        </tr>
                        
                        <tr>
                          <td align="center">Nilai Rata-Rata</td>
                          <?php foreach($kuisioner_b_sapras1 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total['total'],2); ?></td>
                        <?php } ?>

                        <?php foreach($kuisioner_b_sapras2 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total1['total'],2); ?></td>
                        <?php } ?>

                        <?php foreach($kuisioner_b_sapras3 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total1['total'],2); ?></td>
                        <?php } ?>

                        <?php foreach($kuisioner_b_sapras4 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total1['total'],2); ?></td>
                        <?php } ?>

                        <?php foreach($kuisioner_b_sapras5 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total1['total'],2); ?></td>
                        <?php } ?>


                        </tr>

                        <tr>
                          <td align="center">NRR X Bobot</td>
                       <!-- WOrkshop -->
                          <?php  $jmlh_keseluruhan = 0; foreach($kuisioner_b_sapras1 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total['total']/$jml_kuisioner_b_sapras1,2); ?></td>
                          <?php $jmlh_keseluruhan = $jmlh_keseluruhan+(number_format($total['total']/$jml_kuisioner_b_sapras1,2)); } ?>
                       
                       <!-- Ruang Teori -->
                       
                       <?php  $jmlh_keseluruhan1 = 0; foreach($kuisioner_b_sapras2 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total1['total']/$jml_kuisioner_b_sapras2,2); ?></td>
                          <?php $jmlh_keseluruhan1 = $jmlh_keseluruhan1+(number_format($total1['total']/$jml_kuisioner_b_sapras2,2)); } ?>


                          <?php  $jmlh_keseluruhan2 = 0; foreach($kuisioner_b_sapras3 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total1['total']/$jml_kuisioner_b_sapras3,2); ?></td>
                          <?php $jmlh_keseluruhan2 = $jmlh_keseluruhan2+(number_format($total1['total']/$jml_kuisioner_b_sapras3,2)); } ?>
                        
                          <?php  $jmlh_keseluruhan3 = 0; foreach($kuisioner_b_sapras4 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total1['total']/$jml_kuisioner_b_sapras4,2); ?></td>
                          <?php $jmlh_keseluruhan3 = $jmlh_keseluruhan3+(number_format($total1['total']/$jml_kuisioner_b_sapras4,2)); } ?>

                          <?php  $jmlh_keseluruhan4 = 0; foreach($kuisioner_b_sapras5 as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td align="center"><?= number_format($total1['total']/$jml_kuisioner_b_sapras5,2); ?></td>
                          <?php $jmlh_keseluruhan4 = $jmlh_keseluruhan4+(number_format($total1['total']/$jml_kuisioner_b_sapras5,2)); } ?>

                        </tr>
                        <tr>
                          <td align="center">Jumlah</td>
                          <td colspan="<?= $jml_kuisioner_b_sapras1;?>" align="center"><h4><?= number_format($jmlh_keseluruhan,2) ;?></h4></td>
                          <td colspan="<?= $jml_kuisioner_b_sapras2;?>" align="center"><h4><?= number_format($jmlh_keseluruhan1,2) ;?></h4></td>
                          <td colspan="<?= $jml_kuisioner_b_sapras3;?>" align="center"><h4><?= number_format($jmlh_keseluruhan2,2) ;?></h4></td>
                          <td colspan="<?= $jml_kuisioner_b_sapras4;?>" align="center"><h4><?= number_format($jmlh_keseluruhan3,2) ;?></h4></td>
                          <td colspan="<?= $jml_kuisioner_b_sapras5;?>" align="center"><h4><?= number_format($jmlh_keseluruhan4,2) ;?></h4></td>
                        
                        </tr>
                        <tr>
                          <td align="center">Jumlah X 20</td>
                          <td colspan="<?= $jml_kuisioner_b_sapras1; ?>" align="center"><h4><?= number_format($jmlh_keseluruhan*20,2);?> </h4></td>
                          <td colspan="<?= $jml_kuisioner_b_sapras2; ?>" align="center"><h4><?= number_format($jmlh_keseluruhan1*20,2);?></h4></td>
                          <td colspan="<?= $jml_kuisioner_b_sapras3; ?>" align="center"><h4><?= number_format($jmlh_keseluruhan2*20,2);?></h4></td>
                          <td colspan="<?= $jml_kuisioner_b_sapras4; ?>" align="center"><h4><?= number_format($jmlh_keseluruhan3*20,2);?></h4></td>
                          <td colspan="<?= $jml_kuisioner_b_sapras5; ?>" align="center"><h4><?= number_format($jmlh_keseluruhan4*20,2);?></h4></td>
                        </tr>
                      </tbody>
                    </table>
                  
                  </div>
                <br>
                  
                    <table style="margin-left:10px; margin-bottom:0px;" width="100%">
                        <tr>
                        <td><b> WORKSHOP / BENGKEL  <td></td><td></td><td><b>&emsp;=&emsp;<?= number_format($jmlh_keseluruhan*20,2);?></b></td></b></td>
                        </tr>
                        <tr>
                        <td><b> RUANG TEORI <td></td><td></td><td><b>&emsp;=&emsp;<?= number_format($jmlh_keseluruhan1*20,2);?></b></td></b></td>
                        </tr>                        
                        <tr>
                        <td><b> LISTRIK <td></td><td></td><td><b>&emsp;=&emsp;<?= number_format($jmlh_keseluruhan2*20,2);?></b></td></b></td>
                        </tr>                        
                        <tr>
                        <td><b> KAMAR MANDI / TOILET <td></td><td></td><td><b>&emsp;=&emsp;<?= number_format($jmlh_keseluruhan3*20,2);?></b></td> </b></td>
                        </tr>                        
                        <tr>
                        <td><b> SARANA PENUNJANG <td></td><td></td><td><b>&emsp;=&emsp;<?= number_format($jmlh_keseluruhan4*20,2);?></b></td> </b></td>
                        </tr>
                        <tr>
                        <?php 
                        $rata=(number_format($jmlh_keseluruhan*20,2))+(number_format($jmlh_keseluruhan1*20,2))+(number_format($jmlh_keseluruhan2*20,2))+(number_format($jmlh_keseluruhan3*20,2))+(number_format($jmlh_keseluruhan4*20,2));
                        ?>
                        <td><b> RATA-RATA <td></td><td></td><td><b>&emsp;=&emsp;<?= $hasil_akhir = number_format($rata/5,2);?>
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
                        </b></td> </b></td>
                        </tr>
                    </table>

                    </td>
            
            </tr>
                    </table>

                    <br><br>
    <center><h4>URAIAN</h4>
    <table border="1" width="100%" cellspacing=0>
    
            <th>No</th>
            <th>Soal</th>
            <th>Saran / Komentar</th>
            <th>ID Peserta</th>
     
      <tbody>
        <?php $no=1;  
          foreach($pelatihan as $pl){
            $kd = $pl['kd_pelatihan']; 
            $tampung = $this->db->query("SELECT * FROM penilaian_b LEFT JOIN kuisioner_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB WHERE kuisioner_b.jenis_soal=3 AND kuisioner_b.tipe_soal='uraian' AND penilaian_b.kd_pelatihan='$kd'")->result_array();
          
            foreach($tampung as $r){
        ?>
            <tr>
              <td align="center"><?= $no++; ?></td>
              <td><?= $r['soalB']; ?></td>
              <td><?= $r['jawaban']; ?></td>
              <td align="center"><?= $r['id_user']; ?></td>
            </tr>
        <?php } } ?>
      </tbody>
    </table>
    </center>


</body>
</html>