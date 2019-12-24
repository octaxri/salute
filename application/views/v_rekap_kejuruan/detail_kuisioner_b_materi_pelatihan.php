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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_kejuruan/rekap_kuisioner/2/<?= $kejuruan; ?>"><span class="icon icon-backward"></span></a> LAPORAN KUISIONER B - MATERI PELATIHAN | PER KEJURUAN : <?= $detail_kejuruan['nama_kejuruan']; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Hasil Nilai Responden Materi Pelatihan (Kurikulum Silabus Dan Modul)</strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="<?= base_url(); ?>laporan/rekap_pertahap_kuisioner_b_materi_pelatihan/<?= $kejuruan; ?>" class="btn btn-danger icon icon-file-pdf-o" target="_blank"> PDF</a> | <a href="<?= base_url(); ?>laporan/export_exel_rekap_tahap_kuisioner_b_materi_pelatihan/<?= $kejuruan; ?>" class="btn btn-success icon icon-file-excel-o"> Excel</a> 
                    </center>
                    <br><br>

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        
                      <tr>
                          <th rowspan="2" width="15" class="text-center">No Responden</th>
                          <th colspan="<?= $jml_kuisioner_b_materi_pelatihan; ?>" class="text-center">Materi Pelatihan</th>
                        
                      </tr>

                        <tr>
                              <?php 
                               $soal=1;
                              foreach ($kuisioner_b_materi_pelatihan as $key) { ?>
                                <th class="text-center"><?= $soal++;?></th>
                              <?php }?>
                        </tr>        
                      </thead>
                      <tbody>
                      <?php $i1=1;  foreach($pelatihan as $pl){ ?>
                        <?php 
                            $kd_pelatihan = $pl['kd_pelatihan'];
                            $responden = $this->db->query("SELECT DISTINCT id_user FROM penilaian_b WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                        ?>

                      <?php foreach($responden as $r){ ?>
                          <?php 
                            $id_user = $r['id_user'];
                            $soal = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE penilaian_b.id_user='$id_user' AND penilaian_b.kd_pelatihan='$kd_pelatihan' AND kuisioner_b.jenis_soal=1 AND kuisioner_b.tipe_soal='pg'")->result_array(); 
                          ?>
                          <tr>
                          <td class="text-center"><?= $i1++ ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; 
                          foreach($soal as $s){
                            
                            $id_soal = $s['id_soalB']; 
                            $nilainya = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 AND tipe_soal='pg'")->row_array();  
                            // 
                          ?>
                          <td class="text-center"><?= $nilainya['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop 2 -->
                          </tr>
                        <?php } ?>
                        <?php } ?>
                        <tr>
                          <td class="text-center">Jumlah</td>
                          <?php foreach($kuisioner_b_materi_pelatihan as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td class="text-center"><?= $total['total']; ?></td>
                          <?php } ?>
                        </tr>
                        
                        <tr>
                          <td class="text-center">Nilai Rata-Rata</td>
                          <?php foreach($kuisioner_b_materi_pelatihan as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td class="text-center"><?= number_format($total['total'],2); ?></td>
                        <?php } ?>
                        </tr>

                        <tr>
                          <td class="text-center">NRR X Bobot</td>
                          <?php  $jmlh_keseluruhan = 0; foreach($kuisioner_b_materi_pelatihan as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_kejuruan='$kejuruan'")->row_array();
                          ?>
                            <td class="text-center"><?= number_format($total['total']/$jml_kuisioner_b_materi_pelatihan,2); ?></td>
                          <?php $jmlh_keseluruhan = $jmlh_keseluruhan+(number_format($total['total']/$jml_kuisioner_b_materi_pelatihan,2)); } ?>
                        </tr>
                        <tr>
                          <td class="text-center">Jumlah</td>
                          <td colspan="<?= $jml_kuisioner_b_materi_pelatihan;?>" class="text-center"><h4><?= number_format($jmlh_keseluruhan,2) ;?></h4></td>
                        </tr>
                        <tr>
                          <td class="text-center">Jumlah X 20</td>
                          <td colspan="<?= $jml_kuisioner_b_materi_pelatihan; ?>" class="text-center"><h4><?= $hasil_akhir = number_format($jmlh_keseluruhan*20,2);?> 
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
                  </div>

                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>