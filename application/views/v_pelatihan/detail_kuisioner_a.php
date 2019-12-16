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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>pelatihan/detail_pelatihan/<?= $kd_pelatihan; ?>"><span class="icon icon-backward"></span></a> DETAIL KUISIONER A | Kejuruan <?= $data['nama_kejuruan']; ?>, Program <?= $data['nama_program']; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Pengolahan Indeks Kepuasan Masyarakat Per Responden Dan Per Unsur Pelayanan</strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="" class="btn btn-success icon icon-file-excel-o"> Excel</a>
                        
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
                              $jml = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan'")->num_rows(); 
                            
                            ?>
                          <?php } ?>
                          <th colspan="<?= $jml ;?>" class="text-center">Pelayanan</th>
                        </tr>

                        <tr>
                        <?php 
                           $p = 1;
                           $soalnya = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                           foreach($soalnya as $sl) { ?>
                          <th><?= $p++; ?></th>
                        <?php } ?>
                        </tr>

                      </thead>
                      <tbody>
                        <!-- loop 1 -->
                        <?php $i1=1; foreach($responden as $r){ ?>

                          <?php 
                            $id_user = $r['id_user'];
                            $soal = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan'")->result_array(); 
                          ?>
                        <tr>
                          <td><?= $i1++; ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; 

                          foreach($soal as $s){
                            
                            $id_soal = $s['id_soalA']; 
                            $nilainya = $this->db->query("SELECT * FROM penilaian_a WHERE id_user='$id_user' AND id_soalA='$id_soal' AND kd_pelatihan='$kd_pelatihan'")->row_array();  
                            // 
                          ?>
                          <td><?= $nilainya['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop 2 -->
                        </tr>
                        <?php } ?>
                        <!-- akhir loop 1 -->
                        <tr>
                          <td>Jumlah</td>
                          <?php 
                           $z = 1;
                           $soalnya1 = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                           foreach($soalnya1 as $z){
                           $id_soalnya = $z['id_soalA'];

                           $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_a WHERE id_soalA='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                          ?>
                          <td><?= $total['total']; ?></td>
                          <?php } ?>
                        </tr>

                        <tr>
                          <td>Nilai Rata-Rata</td>
                          <?php 
                           $z = 1;
                           $soalnya1 = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                           foreach($soalnya1 as $z){
                           $id_soalnya = $z['id_soalA'];

                           $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_a WHERE id_soalA='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                          ?>
                          <td><?= number_format($total['total'],2); ?></td>
                          <?php } ?>
                        </tr>
                        
                        <tr>
                          <td>NRR X Bobot</td>
                          <?php 
                           $jmlh_keseluruhan = 0;
                           $z = 1;
                           $soalnya1 = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                           
                           $jml_soal = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->num_rows(); 
                           foreach($soalnya1 as $z){
                           $id_soalnya = $z['id_soalA'];

                           $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_a WHERE id_soalA='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                          ?>
                          <td><?= number_format($total['total']/$jml_soal,2); ?></td>
                          <?php $jmlh_keseluruhan = $jmlh_keseluruhan+(number_format($total['total']/$jml_soal,2)); } ?>
                        </tr>
                        <tr>
                          <td>Jumlah</td>
                          <td colspan="<?= $jml; ?>" class="text-center"><h4><?= number_format($jmlh_keseluruhan,2); ?></h4></td>
                        </tr>
                        <tr>
                          <td>Jumlah X 20</td>
                          <td colspan="<?= $jml; ?>" class="text-center"><h4><?= number_format($jmlh_keseluruhan*20,2); ?></h4></td>
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
          <div class="row gutter-xs">
          <div class="col-xs-12">
          <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Grafik Data Kuisioner A</h4>
                </div>
                
                <div class="card-body">
                <div class="col-xs-6 col-xs-9">
                  <div class="card-chart">
                    <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="nilai_a" data-chart="bar" data-animation="false" 
 
                    data-tooltips="{&quot;mode&quot;: &quot;label&quot;}" 
                    data-hide="[&quot;gridLinesX&quot;, &quot;legend&quot;]" 
                    height="450" width="900" style="display: block; width: 300px; height: 150px;"></canvas>
                  </div>
                  </div>
                </div>
              </div>
          </div>
          </div>
        </div>
      </div>