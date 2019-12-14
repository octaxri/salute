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
                          <?php $i1 =1; foreach($responden as $r){ ?>
                            <?php 
                              $id_user = $r['id_user'];
                              $jml = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE id_user='$id_user'")->num_rows(); 
                            ?>
                          <?php } ?>
                          <th colspan="<?= $jml; ?>" class="text-center">Materi Pelatihan</th>
                        </tr>
                        <tr>
                        <?php 
                           $p = 1;
                           $soalnya = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a")->result_array(); 
                           foreach($soalnya as $sl){
                        ?>
                          <th><?= $p++; ?></th>
                        <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- loop 1 -->
                        <?php $i1 =1; foreach($responden as $r){ ?>

                          <?php 
                            $id_user = $r['id_user'];
                            $soal = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE id_user='$id_user'")->result_array(); 
                          ?>
                        <tr>
                          <td><?= $i1++; ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; foreach($soal as $s){ 
                            $id_soal = $s['id_soalA'];
                            $nilainya = $this->db->query("SELECT * FROM penilaian_a WHERE id_user='$id_user' AND id_soalA='$id_soal'")->row_array();  
                          ?>
                          <td><?= $nilainya['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop 2 -->
                        </tr>
                        <?php } ?>
                        <!-- akhir loop 1 -->
                        <tr>
                          <td>Jumlah</td>
                          <td>5</td>
                          <td>4</td>
                          <td>4</td>
                          <td>3</td>
                        </tr>
                        <tr>
                          <td>Nilai Rata-Rata</td>
                          <td>5</td>
                          <td>4</td>
                          <td>4</td>
                          <td>3</td>
                        </tr>
                        <tr>
                          <td>NRR X Bobot</td>
                          <td>5</td>
                          <td>4</td>
                          <td>4</td>
                          <td>3</td>
                        </tr>
                        <tr>
                          <td>Jumlah</td>
                          <td colspan="4" class="text-center"><h4>5</h4></td>
                        </tr>
                        <tr>
                          <td>Jumlah X 20</td>
                          <td colspan="4" class="text-center"><h4>5</h4></td>
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