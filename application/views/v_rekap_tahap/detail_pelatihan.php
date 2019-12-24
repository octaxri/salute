<div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_tahap" ><span class="icon icon-backward"></span></a> Rekap Tahap : <?= $tahap; ?></span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
            </h1>
            <hr>
          </div>
          <!--  -->
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>DAFTAR KUISIONER</strong>
                </div>
                <div class="card-body">
                <table id="demo-datatables-colreorder-2" class="table table-hover table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="10%">No</th>
                        <th>Menu</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kuisioner A</td>
                            <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_tahap/rekap_kuisioner/1/<?= $tahap; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kuisioner B</td>
                            <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_tahap/rekap_kuisioner/2/<?= $tahap; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kuisioner C</td>
                            <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_tahap/rekap_kuisioner/3/<?= $tahap; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- ROW GUTTES 2 -->
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <center><strong>HASIL REKAP ANALISIS ANGKET PELATIHAN</strong></center>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="#" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="#" class="btn btn-success icon icon-file-excel-o"> Excel</a>
                        
                    </center>
                    <br><br>
                    <!--  -->
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th width="40%" class="text-center">Indikator</th>
                          <th class="text-center">Rata- Rata</th>
                          <th class="text-center">Kinerja Unit Pelayanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td align="center">1</td>
                          <td>Materi Pelatihan</td>
                          <td align="center"><?= $hasil_kuisioner_b_materi_pelatihan; ?></td>
                          <td align="center">
                          <?php 
                              if($hasil_kuisioner_b_materi_pelatihan <= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_kuisioner_b_materi_pelatihan>= 65.00 && $hasil_kuisioner_b_materi_pelatihan<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_kuisioner_b_materi_pelatihan>= 76.61 && $hasil_kuisioner_b_materi_pelatihan<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_kuisioner_b_materi_pelatihan>= 88.31 && $hasil_kuisioner_b_materi_pelatihan<= 100){
                                  echo 'Sangat Baik';
                              }   
                          ?>
                          </td>
                        </tr>
                        <tr>
                          <td align="center">2</td>
                          <td>Tenaga Pelatih</td>
                          <td align="center"></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <td align="center">3</td>
                          <td>Sarpras</td>
                          <td align="center"></td>
                          <td align="center"></td>
                        </tr>
                        <tr>
                          <td align="center">4</td>
                          <td>Bahan Pelatihan</td>
                          <td align="center"><?= $hasil_kuisioner_b_bahan_pelatihan; ?></td>
                          <td align="center">
                          <?php 
                              if($hasil_kuisioner_b_bahan_pelatihan <= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_kuisioner_b_bahan_pelatihan>= 65.00 && $hasil_kuisioner_b_bahan_pelatihan<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_kuisioner_b_bahan_pelatihan>= 76.61 && $hasil_kuisioner_b_bahan_pelatihan<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_kuisioner_b_bahan_pelatihan>= 88.31 && $hasil_kuisioner_b_bahan_pelatihan<= 100){
                                  echo 'Sangat Baik';
                              }   
                          ?>
                          </td>
                        </tr>
                        <tr>
                          <td align="center">5</td>
                          <td>Rekruitmen</td>
                          <td align="center"><?= $hasil_kuisioner_b_rekruitmen; ?></td>
                          <td align="center">
                          <?php 
                              if($hasil_kuisioner_b_rekruitmen <= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_kuisioner_b_rekruitmen>= 65.00 && $hasil_kuisioner_b_rekruitmen<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_kuisioner_b_rekruitmen>= 76.61 && $hasil_kuisioner_b_rekruitmen<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_kuisioner_b_rekruitmen>= 88.31 && $hasil_kuisioner_b_rekruitmen<= 100){
                                  echo 'Sangat Baik';
                              }   
                          ?>
                          
                          </td>
                        </tr>
                        <tr>
                          <td align="center">6</td>
                          <td>Penyambutan</td>
                          <td align="center"><?= $hasil_kuisioner_b_kamar; ?></td>
                          <td align="center">
                          <?php 
                              if($hasil_kuisioner_b_kamar <= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_kuisioner_b_kamar>= 65.00 && $hasil_kuisioner_b_kamar<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_kuisioner_b_kamar>= 76.61 && $hasil_kuisioner_b_kamar<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_kuisioner_b_kamar>= 88.31 && $hasil_kuisioner_b_kamar<= 100){
                                  echo 'Sangat Baik';
                              }   
                          ?>
                          </td>
                        </tr>
                        <tr>
                          <td align="center">7</td>
                          <td>Sarpras Asrama</td>
                          <td align="center"><?= $hasil_kuisioner_b_sarpras_asrama; ?></td>
                          <td align="center">
                          <?php 
                              if($hasil_kuisioner_b_sarpras_asrama <= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_kuisioner_b_sarpras_asrama>= 65.00 && $hasil_kuisioner_b_sarpras_asrama<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_kuisioner_b_sarpras_asrama>= 76.61 && $hasil_kuisioner_b_sarpras_asrama<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_kuisioner_b_sarpras_asrama>= 88.31 && $hasil_kuisioner_b_sarpras_asrama<= 100){
                                  echo 'Sangat Baik';
                              }   
                          ?>
                          </td>
                        </tr>
                        <tr>
                          <td align="center">8</td>
                          <td>Konsumsi</td>
                          <td align="center"><?= $hasil_kuisioner_b_konsumsi; ?></td>
                          <td align="center">
                          <?php 
                              if($hasil_kuisioner_b_konsumsi <= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_kuisioner_b_konsumsi>= 65.00 && $hasil_kuisioner_b_konsumsi<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_kuisioner_b_konsumsi>= 76.61 && $hasil_kuisioner_b_konsumsi<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_kuisioner_b_konsumsi>= 88.31 && $hasil_kuisioner_b_konsumsi<= 100){
                                  echo 'Sangat Baik';
                              }   
                          ?></td>
                        </tr>
                        <tr>
                          <td align="center">9</td>
                          <td>Secara Umum</td>
                          <td align="center"><?= $hasil_kuisioner_b_secara_umum; ?></td>
                          <td align="center">
                          <?php 
                              if($hasil_kuisioner_b_secara_umum <= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_kuisioner_b_secara_umum>= 65.00 && $hasil_kuisioner_b_secara_umum<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_kuisioner_b_secara_umum>= 76.61 && $hasil_kuisioner_b_secara_umum<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_kuisioner_b_secara_umum>= 88.31 && $hasil_kuisioner_b_secara_umum<= 100){
                                  echo 'Sangat Baik';
                              }   
                          ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                  </div>
                    <hr>

                    <!--  -->
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th width="30%" class="text-center">Nama Instruktur</th>
                          <th class="text-center">Pengetahuan / Pemahaman</th>
                          <th class="text-center">Kemampuan Dalam Membawakan Materi</th>
                          <th class="text-center">Penampilan Tenaga Pelatih</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Betri Betharia, A.Md</td>
                          <td align="center">80.00</td>
                          <td align="center">80</td>
                          <td align="center">80</td>
                        </tr>
                        <tr>
                          <td colspan="2">Rata-Rata</td>
                          <td  align="center">80.00</td>
                          <td  align="center">80</td>
                          <td  align="center">80</td>
                        </tr>
                        <tr>
                          <td colspan="2">Rata-Rata Instruktur</td>
                          <td colspan="3" align="center">80.00</td>
                        </tr>
                        <tr>
                          <td colspan="2">Kinerja Unit Pelayanan</td>
                          <td align="center">Sangat baik</td>
                          <td  align="center">Sangat baik</td>
                          <td  align="center">Sangat baik</td>
                        </tr>  
                      </tbody>
                    </table>
                    <br>
                  </div>
                  <br><br>
                  <!--  -->

                  GRAFIK DISINI
  <br>
                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>


          <!--  -->
        </div>
      </div>