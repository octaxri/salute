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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>pelatihan/detail_pelatihan2/5/<?= $kd_pelatihan; ?>"><span class="icon icon-backward"></span></a> DETAIL KUISIONER C SECARA UMUM PELAKSANAAN PELATIHAN | Kejuruan <?= $data1['nama_kejuruan']; ?>, Program <?= $data1['nama_program']; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Hasil Nilai Responden Secara Umum Pelaksanaan Pelatihan</strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="<?= base_url(); ?>laporan/cetak_kuisioner_c_secara_umum/<?= $kd_pelatihan; ?>" target="_blank" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="<?= base_url();?>laporan/export_exel_kuisioner_c_secara_umum_pel/<?= $kd_pelatihan;?>" class="btn btn-success icon icon-file-excel-o"> Excel</a>
                        
                    </center>
                    <br><br>

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2" width="15">No Responden</th>
                          <?php $i1 =1; $jml=0; foreach($responden as $r){ ?>
                            
                            <?php 
                              $id_user = $r['id_user'];
                              $jml = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg' ")->num_rows(); 
                            ?>

                          <?php } ?>
                          <th colspan="<?=$jml;?>" class="text-center">Secara Umum Pelaksanaan Pelatihan</th>
                          <th rowspan="2" align="center" ><center>ID Peserta</center></th>

                        </tr>
                        <tr>
                        <?php 
                               $soal=1;
                               $jml_soal=$this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg' ")->result_array();
                              foreach ($jml_soal as $key) { ?>
                                <th><?= $soal++;?></th>
                              <?php }?>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $i1=1; foreach($responden as $r){ ?>

                          <?php 
                            $id_user = $r['id_user'];
                            $soal = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg' ")->result_array(); 
                          ?>
                          <tr>
                          <td><?= $i1++; ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; 

                          foreach($soal as $s){
                            
                            $id_soal = $s['id_soalC']; 
                            $nilainya = $this->db->query("SELECT * FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND id_soalC='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg' ")->row_array();  
                            // 
                          ?>
                          <td><?= $nilainya['jawaban']; ?></td>
                          <?php } ?>
                          <?php if($soal != NULL){ ?>
                                <td align="center"><?= $nilainya['id_user']; ?></td>
                              <?php } ?>

                          <!-- akhir loop 2 -->
                          </tr>
                          <?php } ?>

                        <tr>
                          <td>Jumlah</td>
                          <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg'  ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalC'];

                            $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_c WHERE id_soalC='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= $total['total']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                          <td>Nilai Rata-Rata</td>
                          <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg' ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalC'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c WHERE id_soalC='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total'],2); ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                          <td>NRR X Bobot</td>
                          <?php 
                           $jml_semua=0;
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalC, jenis_soal, tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg' ")->result_array(); 
                            
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=7 AND tipe_soal='pg' ")->num_rows();

                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalC'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c WHERE id_soalC='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua=$jml_semua+(number_format($total['total']/$jml_soal,2)); } ?>
                        </tr>
                        <tr>
                          <td>Jumlah</td>
                          <td colspan="<?=$jml;?>" class="text-center"><h4><?=number_format($jml_semua,2);?></h4></td>
                        </tr>
                        <tr>
                          <td>Jumlah X 25</td>
                          <td colspan="<?=$jml;?>" class="text-center"><h4><?=number_format($jml_semua*25,2);?></h4></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                
                  </div>
                  <br>
            
                  <hr>
                  <h4 class="text-center">URAIAN</h4>
                  <!-- table uraian -->
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                            <th class="text-center">No</th>
                            <th>Soal</th>
                            <th>Saran / Komentar</th>
                            <th class="text-center">ID Peserta</th>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach($pelatihan as $pl){
                            $kd = $pl['kd_pelatihan']; 
                            $tampung = $this->db->query("SELECT * FROM penilaian_c LEFT JOIN kuisioner_c ON kuisioner_c.id_kuisionerC=penilaian_c.id_soalC WHERE kuisioner_c.jenis_soal=7 AND kuisioner_c.tipe_soal='uraian' AND penilaian_c.kd_pelatihan='$kd'")->result_array();
                          
                            foreach($tampung as $t){
                          ?>
                            
                            <tr>
                              <td align="center"><?= $no++; ?></td>
                              <td><?= $t['soalC']; ?></td>
                              <td><?= $t['jawaban']; ?></td>
                              <td align="center"><?= $t['id_user']; ?></td>
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