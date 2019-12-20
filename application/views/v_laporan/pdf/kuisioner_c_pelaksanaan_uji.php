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
            <tr  align="center" >
                <td colspan="3"><h4>PELAKSANAAN UJI</h4></td>
            </tr>
            <tr  align="center" >
                <td colspan="3"><center><h4>
                HASIL ANALISIS ANGKET <br>
                PELATIHAN <?= strtoupper($data1['nama_program']); ?>  
                <br> KEJURUAN <?= strtoupper($data1['nama_kejuruan']); ?>
                </h4></center></td>
            </tr>
            <tr  align="center" >
                <td colspan="3">
                        <!-- tabel -->  
                        <table align="center" width="100%" border="1">
                      <thead>
                        <tr>
                          <th rowspan="2" width="15" align="center">No Responden</th>
                          <?php $i1 =1; $jml=0; foreach($responden as $r){ ?>
                            
                            <?php 
                              $id_user = $r['id_user'];
                              $jml = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg' ")->num_rows(); 
                            ?>

                          <?php } ?>
                          <th colspan="<?=$jml;?>" align="center">Pelaksanaan Uji Kompetensi</th>
                        </tr>
                        <tr  align="center" >
                        <?php 
                               $soal=1;
                               $jml_soal=$this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg' ")->result_array();
                              foreach ($jml_soal as $key) { ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php }?>
                        </tr>
                      </thead>
                      <tbody>
                         <?php $i1=1; foreach($responden as $r){ ?>

                          <?php 
                            $id_user = $r['id_user'];
                            $soal = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg' ")->result_array(); 
                          ?>
                          <tr  align="center" >
                          <td align="center"><?= $i1++; ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; 

                          foreach($soal as $s){
                            
                            $id_soal = $s['id_soalC']; 
                            $nilainya = $this->db->query("SELECT * FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE id_user='$id_user' AND id_soalC='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg' ")->row_array();  
                            // 
                          ?>
                          <td align="center"><?= $nilainya['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop 2 -->
                          </tr>
                          <?php } ?>

                        <tr  align="center" >
                          <td align="center">Jumlah</td>
                          <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg'  ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalC'];

                            $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_c WHERE id_soalC='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td align="center"><?= $total['total']; ?></td>
                            <?php } ?>
                        </tr>
                        <tr  align="center" >
                          <td align="center">Nilai Rata-Rata</td>
                          <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg' ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalC'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c WHERE id_soalC='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td align="center"><?= number_format($total['total'],2); ?></td>
                            <?php } ?>
                        </tr>
                        <tr  align="center" >
                          <td align="center">NRR X Bobot</td>
                          <?php 
                           $jml_semua=0;
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalC, jenis_soal, tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg' ")->result_array(); 
                            
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalC,jenis_soal,tipe_soal FROM penilaian_c INNER JOIN kuisioner_c ON id_soalC=id_kuisionerC WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=6 AND tipe_soal='pg' ")->num_rows();

                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalC'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_c WHERE id_soalC='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td align="center"><?= number_format($total['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua=$jml_semua+(number_format($total['total']/$jml_soal,2)); } ?>
                        </tr>
                        <tr  align="center" >
                          <td align="center">Jumlah</td>
                          <td colspan="<?=$jml;?>" align="center"><h4><?=number_format($jml_semua,2);?></h4></td>
                        </tr>
                        <tr  align="center" >
                          <td align="center">Jumlah X 25</td>
                          <td colspan="<?=$jml;?>" align="center"><h4><?=number_format($jml_semua*25,2);?></h4></td>
                        </tr>
                      </tbody>
                    </table>
                        <!-- akhir tabel -->
                </td>
            </tr>
            
    </table>
</body>
</html>