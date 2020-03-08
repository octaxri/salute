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
    <table align="center" cellspacing="5" width="100%">
            <tr>
                <td colspan="3"><h4>II. TENAGA PELATIH</h4></td>
            </tr>
            <tr>
                <td colspan="3"><center><h4>
                HASIL ANALISIS ANGKET <br> PELATIHAN BERBASIS KOMPETENSI <br>
                PER KEJURUAN : <?= strtoupper($detail_kejuruan['nama_kejuruan']); ?>
                </h4></center></td>
            </tr>
            <tr>
                <td colspan="3"><h4>NAMA INSTRUKTUR : <?= strtoupper($pengajar['nama_pengajar']); ?> </h4></td>
            </tr>
            <tr>
                <td colspan="3">
                        <!-- tabel -->  
                        <table border="1" width="100%">

                        <tr>
                          <th rowspan="2" width="15"><center>No Responden</center></th>
                          <th colspan="<?= $jml_pengetahuan_pemahaman;?>">PENGETAHUAN/PEMAHAMAN</th>
                          <th colspan="<?= $jml_kemampuan;?>">KEMAMPUAN DALAM MEMBAWAKAN MATERI</th>
                          <th colspan="<?= $jml_memahami_masalah;?>">KEMAMPUAN MEMAHAMI MASALAH PESERTA</th>
                          <th colspan="<?= $jml_penampilan;?>">PENAMPILAN TENAGA PELATIH</th>
                          <th rowspan="3" align="center" ><center>ID Peserta</center></th>
                        </tr>     
                        <tr>
                        <?php 
                               $soal=1;
                              foreach($pengetahuan_pemahaman as $w){
                              ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php } ?>
                                <!--  -->
                              <?php 
                              $soal1=1;
                              foreach ($kemampuan as $t) { ?>
                                <th align="center"><?= $soal1++;?></th>
                              <?php } ?>
                                <!--  -->
                              <?php 
                              $soal2=1;
                              foreach ($memahami_masalah as $l) { ?>
                                <th align="center"><?= $soal2++;?></th>
                              <?php } ?>
                                <!--  -->
                              <?php 
                              $soal3=1;
                              foreach ($penampilan as $k) { ?>
                                <th align="center"><?= $soal3++;?></th>
                              <?php } ?>
                                <!--  -->
                        </tr>     
                      
                      <tbody>
                        <?php $i1=1;  foreach($pelatihan as $p){ 
                          $kd_pelatihan = $p['kd_pelatihan'];
                          $responden = $this->db->query("SELECT DISTINCT id_user FROM penilaian_b WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                        ?>
                          <?php foreach($responden as $r){ 
                            $id_user = $r['id_user'];
                            $soal_pengetahuan_pemahaman = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg'AND sub_soal=9 ")->result_array();
                            $soal_kemampuan = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg'AND sub_soal=10 ")->result_array(); 
                            $soal_memahami_masalah = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg'AND sub_soal=11 ")->result_array(); 
                            $soal_penampilan = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg'AND sub_soal=12")->result_array(); 
                          ?>
                          <tr align="center">
                              <td ><?= $i1++; ?></td>
                          
                          <!-- loop soal pengetahuan_pemahaman -->
                          <?php 
                            foreach($soal_pengetahuan_pemahaman as $s1){
                              $id_soal1 = $s1['id_soalB'];
                              $nilainya1 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB 
                                                                    LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                    WHERE id_user='$id_user' AND id_soalB='$id_soal1' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg' AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();  
                          ?>  
                            <td><?= $nilainya1['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal pengetahuan_pemahaman -->

                          <!-- loop soal ruang kemampuan -->
                          <?php 
                            foreach($soal_kemampuan as $s2){
                              $id_soal2 = $s2['id_soalB'];
                              $nilainya2 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB 
                                                                    LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                    WHERE id_user='$id_user' AND id_soalB='$id_soal2' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg' AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();  
                          ?>  
                            <td><?= $nilainya2['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal ruang kemampuan -->

                           <!-- loop soal memahami_masalah -->
                           <?php 
                            foreach($soal_memahami_masalah as $s3){
                              $id_soal3 = $s3['id_soalB'];
                              $nilainya3 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB 
                                                                    LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                    WHERE id_user='$id_user' AND id_soalB='$id_soal3' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg' AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();  
                          ?>  
                            <td><?= $nilainya3['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal memahami_masalah -->

                          <!-- loop soal penampilan -->
                          <?php 
                            foreach($soal_penampilan as $s4){
                              $id_soal4 = $s4['id_soalB'];
                              $nilainya4 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB 
                                                                    LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                    WHERE id_user='$id_user' AND id_soalB='$id_soal4' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg' AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();  
                          ?>  
                            <td><?= $nilainya4['jawaban']; ?></td>
                          <?php } ?>
                          
                          <?php if($soal_pengetahuan_pemahaman != NULL && $soal_kemampuan != NULL && $soal_memahami_masalah !=NULL && $soal_penampilan != NULL){ ?>
                                <td class="text-center"><?= $nilainya1['id_user']; ?></td>
                              <?php } ?>
                          <!-- akhir loop soal penampilan -->

                          </tr>
                        <?php } ?>
                        <!-- akhir loop responden -->
                        <?php } ?>
                        <tr align="center">
                          <td>Jumlah</td>
                          <!-- Jumlah pengetahuan_pemahaman -->
                          <!-- loop soal pengetahuan_pemahaman -->
                          <?php 
                            foreach($pengetahuan_pemahaman as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=9 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= $total1['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal pengetahuan_pemahaman -->

                          <!-- loop soal ruang kemampuan -->
                          <?php 
                            foreach($kemampuan as $s2){
                              $id_soal2 = $s2['id_kuisionerB'];
                              $total2 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=10 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= $total2['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal ruang kemampuan -->

                          <!-- loop soal memahami_masalah -->
                          <?php 
                            foreach($memahami_masalah as $s3){
                              $id_soal3 = $s3['id_kuisionerB'];
                              $total3 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=11 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= $total3['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal memahami_masalah -->

                          <!-- loop soal penampilan -->
                          <?php 
                            foreach($penampilan as $s4){
                              $id_soal4 = $s4['id_kuisionerB'];
                              $total4 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=12 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= $total4['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal penampilan -->
                        </tr>
                        <tr align="center">
                            <td>Nilai Rata-Rata</td>
                            <!-- loop soal pengetahuan_pemahaman -->
                          <?php 
                            foreach($pengetahuan_pemahaman as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=9 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total1['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal pengetahuan_pemahaman -->

                          <!-- loop soal ruang kemampuan -->
                          <?php 
                            foreach($kemampuan as $s2){
                              $id_soal2 = $s2['id_kuisionerB'];
                              $total2 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=10 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total2['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal ruang kemampuan -->

                          <!-- loop soal memahami_masalah -->
                          <?php 
                            foreach($memahami_masalah as $s3){
                              $id_soal3 = $s3['id_kuisionerB'];
                              $total3 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=11 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total3['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal memahami_masalah -->

                          <!-- loop soal penampilan -->
                          <?php 
                            foreach($penampilan as $s4){
                              $id_soal4 = $s4['id_kuisionerB'];
                              $total4 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=12 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total4['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal penampilan -->

                        </tr>
                        <tr align="center">
                            <td>NRR X Bobot</td>
                            <!-- loop soal pengetahuan_pemahaman -->
                          <?php 
                          $jml_semua1=0;
                            foreach($pengetahuan_pemahaman as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=9 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total1['total']/$jml_pengetahuan_pemahaman,2); ?></td>
                          <?php $jml_semua1=$jml_semua1+(number_format($total1['total']/$jml_pengetahuan_pemahaman,2)); } ?>
                          <!-- akhir loop soal pengetahuan_pemahaman -->

                          <!-- loop soal ruang kemampuan -->
                          <?php 
                            $jml_semua2=0;
                            foreach($kemampuan as $s2){
                              $id_soal2 = $s2['id_kuisionerB'];
                              $total2 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=10 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total2['total']/$jml_kemampuan,2); ?></td>
                          <?php $jml_semua2=$jml_semua2+(number_format($total2['total']/$jml_kemampuan,2)); } ?>
                          <!-- akhir loop soal ruang kemampuan -->

                          <!-- loop soal memahami_masalah -->
                          <?php 
                            $jml_semua3=0;
                            foreach($memahami_masalah as $s3){
                              $id_soal3 = $s3['id_kuisionerB'];
                              $total3 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=11 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total3['total']/$jml_memahami_masalah,2); ?></td>
                            <?php $jml_semua3=$jml_semua3+(number_format($total3['total']/$jml_memahami_masalah,2)); } ?>
                          <!-- akhir loop soal memahami_masalah -->

                          <!-- loop soal penampilan -->
                          <?php 
                            $jml_semua4=0;
                            foreach($penampilan as $s4){
                              $id_soal4 = $s4['id_kuisionerB'];
                              $total4 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=12 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total4['total']/$jml_penampilan,2); ?></td>
                            <?php $jml_semua4=$jml_semua4+(number_format($total4['total']/$jml_penampilan,2)); } ?>
                          <!-- akhir loop soal penampilan -->
                        </tr>
                        <tr align="center">
                          <td>Jumlah</td>
                          <td colspan="<?= $jml_pengetahuan_pemahaman;?>"><h4><?= number_format($jml_semua1,2);?></h4></td>
                          <td colspan="<?= $jml_kemampuan;?>"><h4><?= number_format($jml_semua2,2);?></h4></td>
                          <td colspan="<?= $jml_memahami_masalah;?>"><h4><?= number_format($jml_semua3,2);?></h4></td>
                          <td colspan="<?= $jml_penampilan;?>"><h4><?= number_format($jml_semua4,2);?></h4></td>
                        </tr>
                        <tr align="center">
                          <td>Jumlah X 20</td>
                          <td colspan="<?= $jml_pengetahuan_pemahaman;?>"><h4><?= number_format($jml_semua1*20,2);?></h4></td>
                          <td colspan="<?= $jml_kemampuan;?>"><h4><?= number_format($jml_semua2*20,2);?></h4></td>
                          <td colspan="<?= $jml_memahami_masalah;?>"><h4><?= number_format($jml_semua3*20,2);?></h4></td>
                          <td colspan="<?= $jml_penampilan;?>"><h4><?= number_format($jml_semua4*20,2);?></h4></td>
                        </tr>
                    </table>
                    <br>
                    </div>
                    <br>
                  <div class="table-responsive">
                    <table>
                        <tr>
                        <td><b> PENGETAHUAN / PEMAHAMAN  <td></td><td></td><td><b>&emsp;=&emsp;<?= number_format($jml_semua1*20,2);?></b></td></b></td>
                        </tr>
                        <tr>
                        <td><b> KEMAMPUAN DALAM MEMBAWAKAN MATERI <td></td><td></td><td><b>&emsp;=&emsp;<?= number_format($jml_semua2*20,2);?></b></td></b></td>
                        </tr>                        
                        <tr>
                        <td><b> KEMAMPUAN MEMAHAMI MASALAH PESERTA <td></td><td></td><td><b>&emsp;=&emsp;<?= number_format($jml_semua3*20,2);?></b></td></b></td>
                        </tr>                        
                        <tr>
                        <td><b> PENAMPILAN TENAGA PELATIH <td></td><td></td><td><b>&emsp;=&emsp;<?= number_format($jml_semua4*20,2);?></b></td> </b></td>
                        </tr>                        
                        <tr>
                        <?php 
                        $rata=(number_format($jml_semua1*20,2))+(number_format($jml_semua2*20,2))+(number_format($jml_semua3*20,2))+(number_format($jml_semua4*20,2));
                        ?>
                        <td><b> RATA-RATA <td></td><td></td><td><b>&emsp;=&emsp;<?= $hasil_akhir = number_format($rata/4,2);?>
                        <?php 
                              if($hasil_akhir <= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_akhir>= 65.00 && $hasil_akhir<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_akhir>= 76.61 && $hasil_akhir<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_akhir>= 88.31 && $hasil_akhir<= 100){
                                  echo 'Sangat Baik';
                              }   
                            ?>
                        </b></td> </b></td>
                        </tr>                    
                    </table>
                    <table>
                    <tr>
                <td colspan="3">
                <br>Menurut Peraturan Menteri PAN-RB Republik Indonesia No.14 Tahun 2017 tentang Pedoman Pnyusunan Survei Kepuasan Masyarakat di Unit Penyelenggara Pelayanan Publik : <br><br>       
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="90%" align="center" border="1" cellpadding="3">
                        <tr>
                          <td align="center">NILAI PERSEPSI</td>
                          <td align="center">NILAI INTERVAL KONVERSI IKM</td>
                          <td align="center">MUTU PELAYANAN</td>
                          <td align="center">KINERJA UNIT PELAYANAN</td>
                        </tr>
                          <tr align="center" <?php if($hasil_akhir <= 64.99){ ?>style="background-color:BurlyWood;" <?php }?>>
                          <td>1</td>
                          <td>25.00 - 64.99</td>
                          <td>D</td>
                          <td>Tidak Baik</td>
                        </tr>
                        <tr align="center" <?php if($hasil_akhir>= 65.00 && $hasil_akhir<= 76.60){ ?>style="background-color:BurlyWood;" <?php }?>>
                          <td>2</td>
                          <td>65.00 - 76.60</td>
                          <td>C</td>
                          <td>Kurang Baik</td>
                        </tr>
                        <tr align="center" <?php if($hasil_akhir>= 76.61 && $hasil_akhir<= 88.30){ ?>style="background-color:BurlyWood;" <?php }?>>
                          <td>3</td>
                          <td>76.61 - 88.30</td>
                          <td>B</td>
                          <td>Baik</td>
                        </tr>
                        <tr align="center" <?php if($hasil_akhir>= 88.31 && $hasil_akhir<= 100){ ?>style="background-color:BurlyWood;" <?php }?>>
                          <td>4</td>
                          <td>88.31 - 100.00</td>
                          <td>A</td>
                          <td>Sangat Baik</td>
                        </tr>
                    </table>
                </td>
            </tr>
                    
                    </table>
                        <!-- akhir tabel -->
                </td>
            </tr>
            
    </table>


    <br><br><br>
    <center><h4>URAIAN</h4>
    <table border="1" width="100%" cellspacing=0 >
      
      <th align="center">No</th>
                            <th>Soal</th>
                            <th>Saran / Komentar</th>
                            <th align="center">ID Peserta</th>
      
      <tbody>
      <?php $no=1;  
        foreach($pelatihan as $ur){
          $kd = $ur['kd_pelatihan']; 
          $tampung = $this->db->query("SELECT * FROM penilaian_b LEFT JOIN kuisioner_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku WHERE kuisioner_b.jenis_soal=2 AND kuisioner_b.tipe_soal='uraian' AND penilaian_b.kd_pelatihan='$kd' AND detail_penilaian_b.id_pengajar='$id_pengajar'")->result_array();
        

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