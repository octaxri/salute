<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>


<table>
    <tr>
        <td></td> 
        <td colspan="10"><center><h4>LAPORAN PER TAHAP : <?= $tahap; ?></h4></center></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="10"><center><h4>PENGELOHAN INDEKS KEPUASAN MASYARAKAT PER RESPONDEN DAN PER UNSUR PELAYANAN</h4></center></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="10"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="10">UNIT PELAYANAN : BALAI BESAR PENGEMBANGAN LATIHAN KERJA SEMARANG</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="10">ALAMAT : JLN. BRIGJEN SUDIARTO NO. 118 SEMARANG</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="10">Tlp/Fax : (024) 6712680 / 76580968</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="10"></td>
    </tr>
</table>



<table align="center" cellspacing="10">
            <tr>
                <td></td>
                <td colspan="3">
                <table align="center" border="1" cellpadding="3" > 
                        <tr align="center">
                          <th rowspan="2" align="center" valign="middle"><b>NOMOR URUT</b></th>
                          <th colspan="<?= $jml_kuisioner_a ;?>" align="center">NILAI PER UNSUR PELAYANAN</th>
                          <th align="center" rowspan="3"><center>ID Peserta</center></th>  
                        </tr>

                        <tr align="center">
                        <?php 
                           $p = 1;
                           foreach($kuisioner_a as $sl) { ?>
                          <th align="center">U <?= $p++; ?></th>
                        <?php } ?>
                        </tr>
                        <tr align="center">
                            <td align="center" style="background-color:BurlyWood;">1</td>
                            <?php $p2=2; 
                                foreach($kuisioner_a as $c){
                            ?>
                            <td align="center" style="background-color:BurlyWood;"><?= $p2++; ?></td>
                            <?php } ?>
                        </tr>
                          <!-- loop pelatihan -->
                      <?php $i1=1;  foreach($pelatihan as $pl){ ?>
                          <?php 
                            $kd_pelatihan = $pl['kd_pelatihan'];
                            $responden = $this->db->query("SELECT DISTINCT id_user FROM penilaian_a WHERE kd_pelatihan='$kd_pelatihan'")->result_array(); 
                          ?>

                            <!-- loop 1 -->
                            <?php foreach($responden as $r){ ?>
                              <?php 
                                $id_user = $r['id_user'];
                                $soal = $this->db->query("SELECT DISTINCT id_soalA FROM penilaian_a WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan'")->result_array(); 
                              ?>
                              <tr align="center">
                              <td align="center"><?= $i1++; ?></td>
                              <!-- loop 2 -->
                              <?php $i2=1; 
                              foreach($soal as $s){
                                
                                $id_soal = $s['id_soalA']; 
                                $nilainya = $this->db->query("SELECT * FROM penilaian_a WHERE id_user='$id_user' AND id_soalA='$id_soal' AND kd_pelatihan='$kd_pelatihan'")->row_array();  
                                // 
                              ?>
                              <td><?= $nilainya['jawaban']; ?></td>
                              <?php } ?>
                              <?php if($soal != NULL){ ?>
                                <td class="text-center"><?= $nilainya['id_user']; ?></td>
                              <?php } ?>
                              <!-- akhir loop 2 -->
                              </tr>
                            <?php } ?>
                            <!-- akhir loop 1 -->
                        <!-- akhir loop pelatihan -->
                        <?php } ?>
                        
                        <tr align="center">
                          <td align="center">Jumlah</td>
                        <?php foreach($kuisioner_a as $sl){
                          $id_soalnya = $sl['id_kuisionerA'];
                          $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_a LEFT JOIN pelatihan ON penilaian_a.kd_pelatihan=pelatihan.kd_pelatihan  
                                                      WHERE penilaian_a.id_soalA='$id_soalnya' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
                        ?>
                          <td><?= $total['total']; ?></td>
                        <?php } ?>
                        </tr>

                        <tr align="center">
                          <td align="center">NRR</td>
                          <?php foreach($kuisioner_a as $sl){
                          $id_soalnya = $sl['id_kuisionerA'];
                          $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_a LEFT JOIN pelatihan ON penilaian_a.kd_pelatihan=pelatihan.kd_pelatihan  
                                                      WHERE penilaian_a.id_soalA='$id_soalnya' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
                          ?>
                            <td><?= number_format($total['total'],2); ?></td>
                          <?php } ?>
                        </tr>
                        
                        <tr align="center">
                          <td align="center">NRR Tertimbang</td>
                          <?php  $jmlh_keseluruhan = 0; foreach($kuisioner_a as $sl){
                          $id_soalnya = $sl['id_kuisionerA'];
                          $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_a LEFT JOIN pelatihan ON penilaian_a.kd_pelatihan=pelatihan.kd_pelatihan  
                                                      WHERE penilaian_a.id_soalA='$id_soalnya' AND pelatihan.tahap_pelatihan='$tahap'")->row_array();
                          ?>
                            <td><?= number_format($total['total']/$jml_kuisioner_a,2); ?></td>
                            
                          <?php $jmlh_keseluruhan = $jmlh_keseluruhan+(number_format($total['total']/$jml_kuisioner_a,2)); } ?>
                        </tr>

                        <tr align="center">
                          <td align="center">Total</td>
                          <td colspan="<?= $jml_kuisioner_a; ?>" align="center"><h4><?= number_format($jmlh_keseluruhan,2); ?></h4></td>
                        </tr>
                        <tr>
                          <td align="center">Hasil</td>
                          <td colspan="<?= $jml_kuisioner_a; ?>" align="center"><h4><?= $hasil_akhir = number_format($jmlh_keseluruhan*20,2); ?>
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
                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">       
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">
                <br>Menurut KEP. MEN. PAN NOMOR : KEP/25/M.PAN/2/2004 tentang Pedoman Umum Penyusunan        
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">
                Indeks Kepuasan Masyarakat di Unit Pelayanan Instansi Pemerintah dengan kriteria sebagai berikut :      
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">       
                </td>
            </tr>
            <tr>
                 <td></td>
                <td colspan="3">
                    <table width="90%" align="center" border="1" cellpadding="3">
                        <tr>
                          <td align="center">NILAI PERSEPSI</td>
                          <td align="center">NILAI INTERVAL KONVERSI IKM</td>
                          <td align="center">MUTU PELAYANAN</td>
                          <td align="center">KINERJA UNIT PELAYANAN</td>
                        </tr>
                          <tr align="center" <?php if($hasil_akhir <= 64.99){ ?>style="background-color:BurlyWood;" <?php }?>>
                          <td>1</td>
                          <td>25.00 - 64.99</td>
                          <td>D</td>
                          <td>Tidak Baik</td>
                        </tr>
                        <tr align="center" <?php if($hasil_akhir>= 65.00 && $hasil_akhir<= 76.60){ ?>style="background-color:BurlyWood;" <?php }?>>
                          <td>2</td>
                          <td>65.00 - 76.60</td>
                          <td>C</td>
                          <td>Kurang Baik</td>
                        </tr>
                        <tr align="center" <?php if($hasil_akhir>= 76.61 && $hasil_akhir<= 88.30){ ?>style="background-color:BurlyWood;" <?php }?>>
                          <td>3</td>
                          <td>76.61 - 88.30</td>
                          <td>B</td>
                          <td>Baik</td>
                        </tr>
                        <tr align="center" <?php if($hasil_akhir>= 88.31 && $hasil_akhir<= 100){ ?>style="background-color:BurlyWood;" <?php }?>>
                          <td>4</td>
                          <td>88.31 - 100.00</td>
                          <td>A</td>
                          <td>Sangat Baik</td>
                        </tr>
                    </table>
                </td>
            </tr>
    </table>