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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_kejuruan/rekap_kuisioner/2/<?= $kejuruan; ?>" ><span class="icon icon-backward"></span></a> LAPORAN KUISIONER B - SARPRAS | PER KEJURUAN : <?= $detail_kejuruan['nama_kejuruan']; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Hasil Nilai Responden Sarana Dan Prasarana Per Kejuruan</strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="<?= base_url(); ?>laporan/cetak_perkejuruan_kuisioner_b_sarpras/<?= $kejuruan; ?>" target="_blank" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="<?= base_url(); ?>laporan/export_excel_perkejuruan_kuisioner_b_sarpras/<?= $kejuruan; ?>" class="btn btn-success icon icon-file-excel-o"> Excel</a>
                    </center>
                    <br><br>

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr align="center">
                          <th rowspan="2" width="15">No Responden</th>
                          <th colspan="<?= $jml_workshop;?>" align="center">WORKSHOP/BENGKEL</th>
                          <th colspan="<?= $jml_ruang_teori;?>" align="center">RUANG TEORI</th>
                          <th colspan="<?= $jml_listrik;?>" align="center">LISTRIK</th>
                          <th colspan="<?= $jml_km;?>" align="center">KAMAR MANDI/TOILET</th>
                          <th colspan="<?= $jml_sarana;?>" align="center">SARANA PENUNJANG</th>
                          <th rowspan="3" align="center" ><center>ID Peserta</center></th>
                        </tr>
                        
                        <tr>
                        <?php 
                               $soal=1;
                              foreach($workshop as $w){
                              ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php } ?>
                                <!--  -->
                              <?php 
                              $soal1=1;
                              foreach ($teori as $t) { ?>
                                <th align="center"><?= $soal1++;?></th>
                              <?php } ?>
                                <!--  -->
                              <?php 
                              $soal2=1;
                              foreach ($listrik as $l) { ?>
                                <th align="center"><?= $soal2++;?></th>
                              <?php } ?>
                                <!--  -->
                              <?php 
                              $soal3=1;
                              foreach ($km as $k) { ?>
                                <th align="center"><?= $soal3++;?></th>
                              <?php } ?>
                                <!--  -->
                              <?php 
                              $soal4=1;
                              foreach ($sarana as $key) { ?>
                                <th align="center"><?= $soal4++;?></th>
                              <?php } ?>
                        </tr>
                      
                      </thead>
                      <tbody>
                        <?php $i1=1;  foreach($pelatihan as $p){ 
                          $kd_pelatihan = $p['kd_pelatihan'];
                          $responden = $this->db->query("SELECT DISTINCT id_user FROM penilaian_b WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                        ?>
                          <?php foreach($responden as $r){ 
                            $id_user = $r['id_user'];
                            $soal_workshop = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=1 ")->result_array();
                            $soal_teori = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=2 ")->result_array(); 
                            $soal_listrik = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=5 ")->result_array(); 
                            $soal_km = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=6")->result_array(); 
                            $soal_sarpen = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=7")->result_array(); 
                          ?>
                          <tr>
                              <td align="center"><?= $i1++; ?></td>
                          
                          <!-- loop soal workshop -->
                          <?php 
                            foreach($soal_workshop as $s1){
                              $id_soal1 = $s1['id_soalB'];
                              $nilainya1 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal1' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          ?>  
                            <td><?= $nilainya1['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal workshop -->

                          <!-- loop soal ruang teori -->
                          <?php 
                            foreach($soal_teori as $s2){
                              $id_soal2 = $s2['id_soalB'];
                              $nilainya2 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal2' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          ?>  
                            <td><?= $nilainya2['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal ruang teori -->

                           <!-- loop soal listrik -->
                           <?php 
                            foreach($soal_listrik as $s3){
                              $id_soal3 = $s3['id_soalB'];
                              $nilainya3 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal3' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          ?>  
                            <td><?= $nilainya3['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal listrik -->

                          <!-- loop soal km -->
                          <?php 
                            foreach($soal_km as $s4){
                              $id_soal4 = $s4['id_soalB'];
                              $nilainya4 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal4' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          ?>  
                            <td><?= $nilainya4['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal km -->

                          <!-- loop soal sarpren -->
                          <?php 
                            foreach($soal_sarpen as $s5){
                              $id_soal5 = $s5['id_soalB'];
                              $nilainya5 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal5' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          ?>  
                            <td><?= $nilainya5['jawaban']; ?></td>
                          <?php } ?>

                          <?php if($soal_workshop != NULL && $soal_teori != NULL && $soal_listrik != NULL && $soal_km != NULL && $soal_sarpen !=NULL){ ?>
                                <td class="text-center"><?= $nilainya1['id_user']; ?></td>
                              <?php } ?>

                          <!-- akhir loop soal sarpren --> 
                          </tr>
                        <?php } ?>
                        <!-- akhir loop responden -->
                        <?php } ?>
                        <tr align="center">
                          <td>Jumlah</td>
                          <!-- Jumlah Workshop -->
                          <!-- loop soal workshop -->
                          <?php 
                            foreach($workshop as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=1")->row_array();
                          ?>  
                            <td><?= $total1['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal workshop -->

                          <!-- loop soal ruang teori -->
                          <?php 
                            foreach($teori as $s2){
                              $id_soal2 = $s2['id_kuisionerB'];
                              $total2 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=2")->row_array();
                          ?>  
                            <td><?= $total2['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal ruang teori -->

                          <!-- loop soal listrik -->
                          <?php 
                            foreach($listrik as $s3){
                              $id_soal3 = $s3['id_kuisionerB'];
                              $total3 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=5")->row_array();
                          ?>  
                            <td><?= $total3['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal listrik -->

                          <!-- loop soal km -->
                          <?php 
                            foreach($km as $s4){
                              $id_soal4 = $s4['id_kuisionerB'];
                              $total4 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=6")->row_array();
                          ?>  
                            <td><?= $total4['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal km -->

                          <!-- loop soal sarprun -->
                          <?php 
                            foreach($sarana as $s5){
                              $id_soal5 = $s5['id_kuisionerB'];
                              $total5 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal5' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=7")->row_array();
                          ?>  
                            <td><?= $total5['total']; ?></td>
                          <?php } ?>
                          <!-- akhir loop soal sarprun -->
                        </tr>
                        <tr align="center">
                            <td>Nilai Rata-Rata</td>
                            <!-- loop soal workshop -->
                          <?php 
                            foreach($workshop as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=1")->row_array();
                          ?>  
                            <td><?= number_format($total1['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal workshop -->

                          <!-- loop soal ruang teori -->
                          <?php 
                            foreach($teori as $s2){
                              $id_soal2 = $s2['id_kuisionerB'];
                              $total2 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=2")->row_array();
                          ?>  
                            <td><?= number_format($total2['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal ruang teori -->

                          <!-- loop soal listrik -->
                          <?php 
                            foreach($listrik as $s3){
                              $id_soal3 = $s3['id_kuisionerB'];
                              $total3 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=5")->row_array();
                          ?>  
                            <td><?= number_format($total3['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal listrik -->

                          <!-- loop soal km -->
                          <?php 
                            foreach($km as $s4){
                              $id_soal4 = $s4['id_kuisionerB'];
                              $total4 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=6")->row_array();
                          ?>  
                            <td><?= number_format($total4['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal km -->

                          <!-- loop soal sarprun -->
                          <?php 
                            foreach($sarana as $s5){
                              $id_soal5 = $s5['id_kuisionerB'];
                              $total5 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal5' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=7")->row_array();
                          ?>  
                            <td><?= number_format($total5['total'],2); ?></td>
                          <?php } ?>
                          <!-- akhir loop soal sarprun -->
                        </tr>
                        <tr align="center">
                            <td>NRR X Bobot</td>
                            <!-- loop soal workshop -->
                          <?php 
                          $jml_semua1=0;
                            foreach($workshop as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=1")->row_array();
                          ?>  
                            <td><?= number_format($total1['total']/$jml_workshop,2); ?></td>
                          <?php $jml_semua1=$jml_semua1+(number_format($total1['total']/$jml_workshop,2)); } ?>
                          <!-- akhir loop soal workshop -->

                          <!-- loop soal ruang teori -->
                          <?php 
                            $jml_semua2=0;
                            foreach($teori as $s2){
                              $id_soal2 = $s2['id_kuisionerB'];
                              $total2 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=2")->row_array();
                          ?>  
                            <td><?= number_format($total2['total']/$jml_ruang_teori,2); ?></td>
                          <?php $jml_semua2=$jml_semua2+(number_format($total2['total']/$jml_ruang_teori,2)); } ?>
                          <!-- akhir loop soal ruang teori -->

                          <!-- loop soal listrik -->
                          <?php 
                            $jml_semua3=0;
                            foreach($listrik as $s3){
                              $id_soal3 = $s3['id_kuisionerB'];
                              $total3 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=5")->row_array();
                          ?>  
                            <td><?= number_format($total3['total']/$jml_listrik,2); ?></td>
                            <?php $jml_semua3=$jml_semua3+(number_format($total3['total']/$jml_listrik,2)); } ?>
                          <!-- akhir loop soal listrik -->

                          <!-- loop soal km -->
                          <?php 
                            $jml_semua4=0;
                            foreach($km as $s4){
                              $id_soal4 = $s4['id_kuisionerB'];
                              $total4 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=6")->row_array();
                          ?>  
                            <td><?= number_format($total4['total']/$jml_km,2); ?></td>
                            <?php $jml_semua4=$jml_semua4+(number_format($total4['total']/$jml_km,2)); } ?>
                          <!-- akhir loop soal km -->

                          <!-- loop soal sarprun -->
                          <?php 
                          $jml_semua5=0;
                            foreach($sarana as $s5){
                              $id_soal5 = $s5['id_kuisionerB'];
                              $total5 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                WHERE penilaian_b.id_soalB='$id_soal5' AND pelatihan.id_kejuruan='$kejuruan' AND kuisioner_b.jenis_soal=3 AND kuisioner_b.sub_soal=7")->row_array();
                          ?>  
                            <td><?= number_format($total5['total']/$jml_sarana,2); ?></td>
                            <?php $jml_semua5=$jml_semua5+(number_format($total5['total']/$jml_sarana,2)); } ?>
                          <!-- akhir loop soal sarprun -->
                        </tr>
                        <tr>
                          <td>Jumlah</td>
                          <td colspan="<?= $jml_workshop;?>" class="text-center"><h4><?= number_format($jml_semua1,2);?></h4></td>
                          <td colspan="<?= $jml_ruang_teori;?>" class="text-center"><h4><?= number_format($jml_semua2,2);?></h4></td>
                          <td colspan="<?= $jml_listrik;?>" class="text-center"><h4><?= number_format($jml_semua3,2);?></h4></td>
                          <td colspan="<?= $jml_km;?>" class="text-center"><h4><?= number_format($jml_semua4,2);?></h4></td>
                          <td colspan="<?= $jml_sarana;?>" class="text-center"><h4><?= number_format($jml_semua5,2);?></h4></td>
                        </tr>
                        <tr>
                          <td>Jumlah X 20</td>
                          <td colspan="<?= $jml_workshop;?>" class="text-center"><h4><?= number_format($jml_semua1*20,2);?></h4></td>
                          <td colspan="<?= $jml_ruang_teori;?>" class="text-center"><h4><?= number_format($jml_semua2*20,2);?></h4></td>
                          <td colspan="<?= $jml_listrik;?>" class="text-center"><h4><?= number_format($jml_semua3*20,2);?></h4></td>
                          <td colspan="<?= $jml_km;?>" class="text-center"><h4><?= number_format($jml_semua4*20,2);?></h4></td>
                          <td colspan="<?= $jml_sarana;?>" class="text-center"><h4><?= number_format($jml_semua5*20,2);?></h4></td>
                        </tr>
                    </table>
                    <br>
                    </div>
                    <br>
                  <div class="table-responsive">
                    <table>
                        <tr>
                        <td><h4> WORKSHOP / BENGKEL  <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua1*20,2);?></h4></td></h4></td>
                        </tr>
                        <tr>
                        <td><h4> RUANG TEORI <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua2*20,2);?></h4></td></h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> LISTRIK <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua3*20,2);?></h4></td></h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> KAMAR MANDI / TOILET <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua4*20,2);?></h4></td> </h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> SARANA PENUNJANG <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua5*20,2);?></h4></td> </h4></td>
                        </tr>
                        <tr>
                        <?php 
                        $rata=(number_format($jml_semua1*20,2))+(number_format($jml_semua2*20,2))+(number_format($jml_semua3*20,2))+(number_format($jml_semua4*20,2))+(number_format($jml_semua5*20,2));
                        ?>
                        <td><h4> RATA-RATA <td></td><td></td><td><h4>&emsp;=&emsp;<?= $hasil_akhir = number_format($rata/5,2);?>
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
                      <?php $no=1; foreach($pelatihan as $pl){
                            $kd = $pl['kd_pelatihan']; 
                            $tampung = $this->db->query("SELECT * FROM penilaian_b LEFT JOIN kuisioner_b ON kuisioner_b.id_kuisionerB=penilaian_b.id_soalB WHERE kuisioner_b.jenis_soal=3 AND kuisioner_b.tipe_soal='uraian' AND penilaian_b.kd_pelatihan='$kd'")->result_array();
                          
                            foreach($tampung as $t){
                          ?>
                            
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $t['soalB']; ?></td>
                              <td><?= $t['jawaban']; ?></td>
                              <td><?= $t['id_user']; ?></td>
                            </tr>
                          <?php } } ?>
                      </tbody>
                    </table>
                    <br>
                  </div>
                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>