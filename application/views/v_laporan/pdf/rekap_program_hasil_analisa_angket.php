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
</style>
<body onload="window.print()">


    <table align="center" cellspacing="5" width="100%">
	
		    <tr>
			
                <td colspan="3"><center><h4>HASIL REKAP ANALISIS ANGKET <br> PELATIHAN BERBASIS KOMPETENSI <br> PER PROGRAM : <?= strtoupper($program1['nama_program']);?></h4></center></td>
            </tr>
			
			      <tr>
					<td colspan="3">
                        <!-- tabel -->  
                        <table border="1" width="100%">
                        <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Indikator</th>
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
                        <br>
                        <br>
                        <table border="1" width="100%">
                        <thead>
                        <tr class="text-center">
                          <th class="text-center">No</th>
                          <th class="text-center">Nama Instruktur</th>
                          <th class="text-center">Pengetahuan / Pemahaman</th>
                          <th class="text-center">Kemampuan Dalam Membawakan Materi</th>
                          <th class="text-center">Kemampuan Dalam Memahami Masalah Peserta</th>
                          <th class="text-center">Penampilan Tenaga Pelatih</th>
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
                                                                WHERE penilaian_b.id_soalB='$id_soal1' AND pelatihan.id_program='$program' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=9 AND detail_penilaian_b.id_pengajar='$id_pengajar' ")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal2' AND pelatihan.id_program='$program' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=10 AND detail_penilaian_b.id_pengajar='$id_pengajar1' ")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal3' AND pelatihan.id_program='$program' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=11 AND detail_penilaian_b.id_pengajar='$id_pengajar2' ")->row_array();
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
                                                                WHERE penilaian_b.id_soalB='$id_soal4' AND pelatihan.id_program='$program' AND kuisioner_b.jenis_soal=2 AND kuisioner_b.sub_soal=12 AND detail_penilaian_b.id_pengajar='$id_pengajar3' ")->row_array();
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
					</td>	
				</tr>
	
	</table>



</body>
</html>