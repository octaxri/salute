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
                    <a href="<?= base_url();?>laporan/cetak_tahap_hasil_analisa_angket/<?= $tahap; ?>" target="_blank" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="<?= base_url();?>laporan/rekap_tahap_excel_hasil_analisa_angket/<?= $tahap;?>" class="btn btn-success icon icon-file-excel-o" target="_blank"> Excel</a>
                        
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
                          <td align="center"><?= $hasil_kuisioner_b_tenaga_pelatih;?></td>
                          <td align="center">
                          <?php 
                              if($hasil_kuisioner_b_tenaga_pelatih<= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_kuisioner_b_tenaga_pelatih>= 65.00 && $hasil_kuisioner_b_tenaga_pelatih<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_kuisioner_b_tenaga_pelatih>= 76.61 && $hasil_kuisioner_b_tenaga_pelatih<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_kuisioner_b_tenaga_pelatih>= 88.31 && $hasil_kuisioner_b_tenaga_pelatih<= 100){
                                  echo 'Sangat Baik';
                              }   
                          ?>
                          </td>
                        </tr>
                        <tr>
                          <td align="center">3</td>
                          <td>Sarpras</td>
                          <td align="center"><?= $hasil_kuisioner_b_sarpras; ?></td>
                          <td align="center">
                          <?php 
                              if($hasil_kuisioner_b_sarpras <= 64.99){  
                                  echo 'Tidak Baik';
                              }
                              else if($hasil_kuisioner_b_sarpras>= 65.00 && $hasil_kuisioner_b_sarpras<= 76.60){
                                  echo 'Kurang Baik';
                              }
                              else if($hasil_kuisioner_b_sarpras>= 76.61 && $hasil_kuisioner_b_sarpras<= 88.30){
                                  echo 'Baik';
                              }
                              else if($hasil_kuisioner_b_sarpras>= 88.31 && $hasil_kuisioner_b_sarpras<= 100){
                                  echo 'Sangat Baik';
                              }   
                          ?>
                          </td>
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
                          <th>No</th>
                          <th>Nama Instruktur</th>
                          <th>Pengetahuan / Pemahaman</th>
                          <th>Kemampuan Dalam Membawakan Materi</th>
                          <th>Kemampuan Dalam Memahami Masalah Peserta</th>
                          <th>Penampilan Tenaga Pelatih</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1;  $total_p=0; $total_p1=0; $total_p2=0; $total_p3=0; foreach ($daftar_pengajar as $k) { ?>
                        

                        <tr>
                          <td align="center"><?=$no++;?></td>
                          <td align="center"><?=$k['nama_pengajar'] ;?></td>
                         
                          <?php 
                          $id_pengajar=$k['id_pengajar'];
                          $rata1;
                          $jml_semua1=0;
                         
                            foreach($pengetahuan_pemahaman as $s1){
                              $id_soal1 = $s1['id_kuisionerB'];
                              $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=9 AND detail_penilaian_b.id_pengajar='$id_pengajar' ")->row_array();
                          ?>  

                          <?php $jml_semua1=$jml_semua1+(number_format($total1['total']/$jml_pengetahuan_pemahaman,2)); } ?>
                          <!-- akhir loop soal pengetahuan_pemahaman -->

                           <?php $total_p=$total_p+(number_format($jml_semua1*20,2));?> 

                          <td align="center"><?=number_format($jml_semua1*20,2);?></td>
                          
                          
                          <?php 
                          $id_pengajar1=$k['id_pengajar'];
                          $jml_semua2=0;
                            foreach($kemampuan as $s2){
                              $id_soal2 = $s2['id_kuisionerB'];
                              $total2 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=10 AND detail_penilaian_b.id_pengajar='$id_pengajar1' ")->row_array();
                          ?>  

                          <?php $jml_semua2=$jml_semua2+(number_format($total2['total']/$jml_kemampuan,2)); } ?>
                          
                          <?php $total_p1=$total_p1+(number_format($jml_semua2*20,2)); ?>

                          <td align="center"><?= number_format($jml_semua2*20,2);?></td>



                          <?php 
                          $id_pengajar2=$k['id_pengajar'];
                          $jml_semua3=0;
                            foreach($memahami_masalah as $s3){
                              $id_soal3 = $s3['id_kuisionerB'];
                              $total3 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=11 AND detail_penilaian_b.id_pengajar='$id_pengajar2' ")->row_array();
                          ?>  

                          <?php $jml_semua3=$jml_semua3+(number_format($total3['total']/$jml_memahami_masalah,2)); } ?>

                          <?php $total_p2=$total_p2+(number_format($jml_semua3*20,2)); ?>
                          <td align="center"><?= number_format($jml_semua3*20,2);?></td>



                          <?php 
                          $id_pengajar3=$k['id_pengajar'];
                          $jml_semua4=0;
                            foreach($penampilan as $s4){
                              $id_soal4 = $s4['id_kuisionerB'];
                              $total4 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b LEFT JOIN pelatihan ON penilaian_b.kd_pelatihan=pelatihan.kd_pelatihan
                                                                LEFT JOIN kuisioner_b ON penilaian_b.id_soalB=kuisioner_b.id_kuisionerB
                                                                LEFT JOIN detail_penilaian_b ON detail_penilaian_b.id_penilaian_b=penilaian_b.idku
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.tahap_pelatihan='$tahap' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=12 AND detail_penilaian_b.id_pengajar='$id_pengajar3' ")->row_array();
                          ?>  

                          <?php $jml_semua4=$jml_semua4+(number_format($total4['total']/$jml_penampilan,2)); } ?>
                          <?php $total_p3=$total_p3+(number_format($jml_semua4*20,2)); ?>
                          <td align="center"><?= number_format($jml_semua4*20,2);?></td>
                        </tr>
                        
                        <?php } ?>
                        <tr>
                          <td colspan="2" align="center">Rata-Rata</td>
                          <td  align="center"><?= number_format($total_p/($no-1),2);?></td>
                          <td  align="center"><?= number_format($total_p1/($no-1),2);?></td>
                          <td  align="center"><?= number_format($total_p2/($no-1),2);?></td>
                          <td  align="center"><?= number_format($total_p3/($no-1),2);?></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center">Kinerja Unit Pelayanan</td>
                          <td align="center"><?php 
                              $pahaman=number_format($total_p/($no-1),2);
                              if($pahaman <= 64.99){  
                                  echo '(Tidak Baik)';
                              }
                              else if($pahaman >= 65.00 && $pahaman<= 76.60){
                                  echo '(Kurang Baik)';
                              }
                              else if($pahaman>= 76.61 && $pahaman<= 88.30){
                                  echo '(Baik)';
                              }
                              else if($pahaman>= 88.31 && $pahaman<= 100){
                                  echo '(Sangat Baik)';
                              }   
                            ?>
                            </td>
                            <td align="center"><?php 
                              $kemampuanku=number_format($total_p1/($no-1),2);
                              if($kemampuanku <= 64.99){  
                                  echo '(Tidak Baik)';
                              }
                              else if($kemampuanku >= 65.00 && $kemampuanku<= 76.60){
                                  echo '(Kurang Baik)';
                              }
                              else if($kemampuanku>= 76.61 && $kemampuanku<= 88.30){
                                  echo '(Baik)';
                              }
                              else if($kemampuanku>= 88.31 && $kemampuanku<= 100){
                                  echo '(Sangat Baik)';
                              }   
                            ?>
                            </td>
                            <td align="center"><?php 
                              $masalah=number_format($total_p2/($no-1),2);
                              if($masalah <= 64.99){  
                                  echo '(Tidak Baik)';
                              }
                              else if($masalah >= 65.00 && $masalah<= 76.60){
                                  echo '(Kurang Baik)';
                              }
                              else if($masalah>= 76.61 && $masalah<= 88.30){
                                  echo '(Baik)';
                              }
                              else if($masalah>= 88.31 && $masalah<= 100){
                                  echo '(Sangat Baik)';
                              }   
                            ?>
                            </td>
                            <td align="center"><?php 
                              $pelatih=number_format($total_p3/($no-1),2);
                              if($pelatih <= 64.99){  
                                  echo '(Tidak Baik)';
                              }
                              else if($pelatih >= 65.00 && $pelatih<= 76.60){
                                  echo '(Kurang Baik)';
                              }
                              else if($pelatih>= 76.61 && $pelatih<= 88.30){
                                  echo '(Baik)';
                              }
                              else if($pelatih>= 88.31 && $pelatih<= 100){
                                  echo '(Sangat Baik)';
                              }   
                            ?>
                            </td>
                        </tr>
                        <tr>
                        <?php $rata_seluruh=(number_format($total_p/($no-1),2)) + (number_format($total_p1/($no-1),2)) + (number_format($total_p2/($no-1),2)) + (number_format($total_p3/($no-1),2)); ?>
                          <td colspan="2" align="center">Rata-Rata Instruktur</td>
                          <td colspan="4" align="center"><?= $hasil_seluruh = number_format($rata_seluruh/4,2);?>
                          <?php 
                          if($hasil_seluruh <= 64.99){  
                                  echo '(Tidak Baik)';
                              }
                              else if($hasil_seluruh >= 65.00 && $hasil_seluruh<= 76.60){
                                  echo '(Kurang Baik)';
                              }
                              else if($hasil_seluruh>= 76.61 && $hasil_seluruh<= 88.30){
                                  echo '(Baik)';
                              }
                              else if($hasil_seluruh>= 88.31 && $hasil_seluruh<= 100){
                                  echo '(Sangat Baik)';
                              }   
                            ?>

                            </td>
                          
                          </td>
                        </tr> 
                      </tbody>
                    </table>
                    <br>
                  </div>
                  <br><br>
                  <!--  -->
                 

                   <!-- codingan graifk -->
                   <script>
                        window.onload = function () {
                      var judul=document.getElementById("el");;
                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2", // "light1", "light2", "dark1", "dark2"
                            title:{
                                text: "GRAFIK HASIL ANALISIS ANGKET PER TAHAP", 
                                margin: 10,
                                  padding:4,
                            },
                            subtitles: [{
                                  text: " TAHAP : <?= $tahap; ?> ",		
                                  fontColor: "black",
                                  fontSize: 22,
                                 
                                }],
                            axisY: {
                                title: "Grafik Hasil Analisis Angket",
                            },
                            data: [{        
                                type: "column",  
                                showInLegend: true, 
                                legendMarkerColor: "grey",
                                legendText: "Jumlah Penilaian",
                                dataPoints: [      
                                    { y: <?= $hasil_kuisioner_b_materi_pelatihan; ?>, label: "MATERI PELATIHAN", indexLabel: "<?= $hasil_kuisioner_b_materi_pelatihan; ?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= $hasil_kuisioner_b_tenaga_pelatih;?>,label: "TENAGA PELATIH", indexLabel: "<?= $hasil_kuisioner_b_tenaga_pelatih;?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside"},
                                    { y: <?= $hasil_kuisioner_b_sarpras; ?>,  label: "SARANA/PRASARANA", indexLabel: "<?= $hasil_kuisioner_b_sarpras; ?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= $hasil_kuisioner_b_bahan_pelatihan; ?>,  label: "BAHAN PELATIHAN", indexLabel: "<?= $hasil_kuisioner_b_bahan_pelatihan; ?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= $hasil_kuisioner_b_rekruitmen; ?>,  label: "REKRUITMEN", indexLabel: "<?= $hasil_kuisioner_b_rekruitmen; ?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= $hasil_kuisioner_b_kamar; ?>,  label: "PENYAMBUTAN", indexLabel: "<?= $hasil_kuisioner_b_kamar; ?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= $hasil_kuisioner_b_sarpras_asrama; ?>,  label: "SAPRAS ASRAMA", indexLabel: "<?= $hasil_kuisioner_b_sarpras_asrama; ?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= $hasil_kuisioner_b_konsumsi; ?>,  label: "KONSUMSI", indexLabel: "<?= $hasil_kuisioner_b_konsumsi; ?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                    { y: <?= $hasil_kuisioner_b_secara_umum; ?>,  label: "SECARA UMUM", indexLabel: "<?= $hasil_kuisioner_b_secara_umum; ?>", indexLabelFontColor: "black", indexLabelOrientation: "horizontal", indexLabelPlacement: "inside" },
                                ]
                            }]
                        });
                        chart.render();
                        document.getElementById("printChart").addEventListener("click",function(){
                           
                            chart.print();
                        });  	
                        }
                        </script>

                        
                    <br><br><br><br>
                    <!-- <div id="el">
                    <center><h3>GRAFIK HASIL ANALISIS ANGKET <br>LAPORAN PER PROGAM : <?= $tahap; ?>
                    </div>
                    </h3></center> -->
                    
                    <br><br><br>
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    <button id="printChart">Print Chart</button>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    <br><br><br><br>
                    
                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>


          <!--  -->
        </div>
      </div>