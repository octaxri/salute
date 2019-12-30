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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_program/rekap_kuisioner/2/<?= $program; ?>"><span class="icon icon-backward"></span></a> LAPORAN KUISIONER B - UNIT KOMPETENSI | PER PROGRAM : <?= $program1['nama_program']; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Hasil Nilai Responden Unit Kompetensi</strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="<?= base_url(); ?>laporan/rekap_program_kuisioner_b_unit_kompetensi/<?= $program; ?>" class="btn btn-danger icon icon-file-pdf-o" target="_blank"> PDF</a> | <a href="<?= base_url(); ?>laporan/export_excel_program_kuisioner_b_unit_kompetensi/<?= $program; ?>" class="btn btn-success icon icon-file-excel-o"> Excel</a> 
                    </center>
                    <br><br>

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        
                      <tr>
                          <th rowspan="2" width="15" class="text-center">No Responden</th>
                          <th colspan="<?= $jml_kuisioner_b_unit_kompetensi; ?>" class="text-center">Unit Kompetensi</th>
                        
                      </tr>

                        <tr>
                              <?php 
                               $soal=1;
                              foreach ($kuisioner_b_unit_kompetensi as $key) { ?>
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
                            $soal = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=5 AND tipe_soal='pg'")->result_array(); 
                          ?>
                          <tr>
                          <td class="text-center"><?= $i1++; ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; 
                          foreach($soal as $s){
                            
                            $id_soal = $s['id_soalB']; 
                            $nilainya = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=5 AND tipe_soal='pg'")->row_array();  
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
                          <?php foreach($kuisioner_b_unit_kompetensi as $sl){ 
                              $id_soalnya = $sl['id_kuisionerB'];
                              $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan 
                                                            WHERE penilaian_b.id_soalB='$id_soalnya' AND pelatihan.id_program='$program'")->row_array();
                          ?>
                            <td class="text-center"><?= $total['total']; ?></td>
                          <?php } ?>
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