<div class="layout-content">
        <div class="layout-content-body">

        <?php 
                $dat = $this->session->flashdata('msg');
                    if($dat!=""){ ?>
                          <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?></div>
                <?php } ?> 
                <!-- Akhir flashdata  -->
      
            <?php 
            $dat = $this->session->flashdata('msg2');
                if($dat!=""){ ?>
                      <div id="notifikasi" class="alert alert-danger"><strong> </strong> <?=$dat;?></div>
        <?php } ?> 

          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_tahap/rekap_kuisioner/2/<?= $tahap; ?>" ><span class="icon icon-backward"></span></a> LAPORAN KUISIONER B - TENAGA PELATIH | PER TAHAP : <?= $tahap; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Hasil Analisis Angket Pengajar | <?= $pengajar['nama_pengajar']; ?></strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="<?= base_url(); ?>laporan/cetak_pertahap_kuisioner_b_tenaga_pelatih/<?= $tahap; ?>/<?= $id_pengajar; ?>" target="_blank" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="<?= base_url(); ?>laporan/export_exel_pertahap_kuisioner_b_tenaga_pelatih/<?= $tahap; ?>/<?= $id_pengajar; ?>" class="btn btn-success icon icon-file-excel-o" target="_blank"> Excel</a>
                    </center>
                    <br><br>

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2" width="15"><center>No Responden</center></th>
                          <th colspan="<?= $jml_pengetahuan_pemahaman;?>">PENGETAHUAN/PEMAHAMAN</th>
                          <th colspan="<?= $jml_kemampuan;?>">KEMAMPUAN DALAM MEMBAWAKAN MATERI</th>
                          <th colspan="<?= $jml_memahami_masalah;?>">KEMAMPUAN MEMAHAMI MASALAH PESERTA</th>
                          <th colspan="<?= $jml_penampilan;?>">PENAMPILAN TENAGA PELATIH</th>
                          <th rowspan="2">ID Peserta</th>
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
                      </thead>
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
                          <tr>
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
                          <!-- akhir loop soal penampilan -->
                          <td><?= $nilainya4['id_user']; ?></td>
                          </tr>
                        <?php } ?>
                        <!-- akhir loop responden -->
                        <?php } ?>
                        <tr>
                          <td>Jumlah</td>
                          <!-- Jumlah pengetahuan_pemahaman -->
                          <!-- loop soal pengetahuan_pemahaman -->
                          <?php 
                            foreach($pengetahuan_pemahaman as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=9 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=10 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=11 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=12 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= $total4['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal penampilan -->
                          <td rowspan="5"></td>
                        </tr>
                        <tr>
                            <td>Nilai Rata-Rata</td>
                            <!-- loop soal pengetahuan_pemahaman -->
                          <?php 
                            foreach($pengetahuan_pemahaman as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=9 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=10 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=11 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=12 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total4['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal penampilan -->

                        </tr>
                        <tr>
                            <td>NRR X Bobot</td>
                            <!-- loop soal pengetahuan_pemahaman -->
                          <?php 
                          $jml_semua1=0;
                            foreach($pengetahuan_pemahaman as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=9 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=10 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=11 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=12 AND detail_penilaian_b.id_pengajar='$id_pengajar'")->row_array();
                          ?>  
                            <td><?= number_format($total4['total']/$jml_penampilan,2); ?></td>
                            <?php $jml_semua4=$jml_semua4+(number_format($total4['total']/$jml_penampilan,2)); } ?>
                          <!-- akhir loop soal penampilan -->
                        </tr>
                        <tr>
                          <td>Jumlah</td>
                          <td colspan="<?= $jml_pengetahuan_pemahaman;?>" class="text-center"><h4><?= number_format($jml_semua1,2);?></h4></td>
                          <td colspan="<?= $jml_kemampuan;?>" class="text-center"><h4><?= number_format($jml_semua2,2);?></h4></td>
                          <td colspan="<?= $jml_memahami_masalah;?>" class="text-center"><h4><?= number_format($jml_semua3,2);?></h4></td>
                          <td colspan="<?= $jml_penampilan;?>" class="text-center"><h4><?= number_format($jml_semua4,2);?></h4></td>
                        </tr>
                        <tr>
                          <td>Jumlah X 20</td>
                          <td colspan="<?= $jml_pengetahuan_pemahaman;?>" class="text-center"><h4><?= number_format($jml_semua1*20,2);?></h4></td>
                          <td colspan="<?= $jml_kemampuan;?>" class="text-center"><h4><?= number_format($jml_semua2*20,2);?></h4></td>
                          <td colspan="<?= $jml_memahami_masalah;?>" class="text-center"><h4><?= number_format($jml_semua3*20,2);?></h4></td>
                          <td colspan="<?= $jml_penampilan;?>" class="text-center"><h4><?= number_format($jml_semua4*20,2);?></h4></td>
                        </tr>
                    </table>
                    <br>
                    </div>
                    <br>
                  <div class="table-responsive">
                    <table>
                        <tr>
                        <td><h4> PENGETAHUAN / PEMAHAMAN  <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua1*20,2);?></h4></td></h4></td>
                        </tr>
                        <tr>
                        <td><h4> KEMAMPUAN DALAM MEMBAWAKAN MATERI <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua2*20,2);?></h4></td></h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> KEMAMPUAN MEMAHAMI MASALAH PESERTA <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua3*20,2);?></h4></td></h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> PENAMPILAN TENAGA PELATIH <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua4*20,2);?></h4></td> </h4></td>
                        </tr>                        
                        <tr>
                        <?php 
                        $rata=(number_format($jml_semua1*20,2))+(number_format($jml_semua2*20,2))+(number_format($jml_semua3*20,2))+(number_format($jml_semua4*20,2));
                        ?>
                        <td><h4> RATA-RATA <td></td><td></td><td><h4>&emsp;=&emsp;<?= $hasil_akhir = number_format($rata/4,2);?>
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
                        </h4></td> </h4></td>
                        </tr>
                    </table>
                    </div>

                    <!-- codingan graifk -->
                    <script>
                        window.onload = function () {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2", // "light1", "light2", "dark1", "dark2"
                            title: {
                                text: "GRAFIK HASIL ANALISIS ANGKET ",
                                fontSize: 25,
                               
                              },
                              subtitles:[
                              {
                                text: "LAPORAN PER TAHAP : <?= $tahap; ?>",
                                //Uncomment properties below to see how they behave
                                //fontColor: "red",
                                fontSize: 25,
                                fontWeight: "bold",
                              
                              },
                              {
                                text: "NAMA INSTRUKTUR : <?= strtoupper($pengajar['nama_pengajar']); ?>",
                                fontSize: 16,
                                fontWeight: "bold",
                                margin:10,
                                padding: 5,
                                horizontalAlign : "left",
                              }
                              ],
                            axisY: {
                                title: "Grafik Hasil Analisis Angket"
                            },
                            data: [{        
                                type: "column",  
                                showInLegend: true, 
                                legendMarkerColor: "grey",
                                legendText: "Jumlah Penilaian",
                                dataPoints: [      
                                    { y: <?= number_format($jml_semua1*20,2);?>, label: "PENGETAHUAN/PEMAHAMAN",indexLabel: "<?= number_format($jml_semua1*20,2);?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= number_format($jml_semua2*20,2);?>,  label: "KEMAMPUAN DALAM MEMBAWAKAN MATERI",indexLabel: "<?= number_format($jml_semua2*20,2);?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= number_format($jml_semua3*20,2);?>,  label: "KEMAMPUAN MEMAHAMI MASALAH PESERTA",indexLabel: "<?= number_format($jml_semua3*20,2);?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= number_format($jml_semua4*20,2);?>,  label: "PENAMPILAN TENAGA PELATIH",indexLabel: "<?= number_format($jml_semua4*20,2);?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" }
                                ]
                            }]
                        });
                        chart.render();
                        document.getElementById("printChart").addEventListener("click",function(){
                            chart.print();
                        });  	
                        }
                        </script>


                    <!-- akhir -->

                    <br><br><br><br>
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    <button id="printChart">Print Chart</button>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    <br><br><br><br>
                    <!-- AKHIR ISI -->
                    <hr>
                  <h4 class="text-center">URAIAN</h4>
                  <!-- table uraian -->
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                            <th>No</th>
                            <th>Soal</th>
                            <th>Saran / Komentar</th>
                            <th>ID Peserta</th>
                      </thead>
                      <tbody>
                        <?php $no=1;  
                          foreach($uraian as $ur){
                            $id_b = $ur['id_kuisionerB'];
                            $uraian = $this->db->query("SELECT * FROM penilaian_b LEFT JOIN user ON penilaian_b.id_user=user.id_user 
                                                                                  LEFT JOIN detail_penilaian_b ON penilaian_b.idku=detail_penilaian_b.id_penilaian_b
                                                                      WHERE id_soalB='$id_b' AND id_pengajar='$id_pengajar'")->result_array();

                            foreach($uraian as $r){
                        ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $ur['soalB']; ?></td>
                              <td><?= $r['jawaban']; ?></td>
                              <td><?= $r['id_user']; ?></td>
                            </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>