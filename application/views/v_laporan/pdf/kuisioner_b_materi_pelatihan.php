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
    <table style="margin-left:10px; margin-bottom:0px;" width="100%">
        <tr>
            <td><h4>I. MATERI PELATIHAN (KURIKULUM SILABUS)</h4></td>
        </tr>
        <tr>
            <td><center><h4>PELATIHAN BERBASIS KOMPETENSI <?= strtoupper($data1['nama_program']); ?> <br> KEJURUAN <?= strtoupper($data1['nama_kejuruan']); ?></h4>
            </center></td>
        </tr>
        <tr>
            <td align="center">
            <table border="1" width="90%">
                      <thead>
                        
                      <tr>
                          <th rowspan="2" width="15" align="center">No Responden</th>

                          <?php $i1 =1; $jml=0; foreach($responden as $r){ ?>
                            
                            <?php 
                              $id_user = $r['id_user'];
                              $jml = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 AND tipe_soal='pg' ")->num_rows(); 
                            ?>

                          <?php } ?>
                          <th colspan="<?= $jml; ?>" align="center">Materi Pelatihan</th>
                        
                      </tr>

                        <tr>
                              <?php 
                               $soal=1;
                               $jml_soal=$this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 AND tipe_soal='pg' ")->result_array();
                              foreach ($jml_soal as $key) { ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php }?>
                        </tr>
                        
                      </thead>
                      <tbody>
                      <?php $i1=1; foreach($responden as $r){ ?>

                          <?php 
                            $id_user = $r['id_user'];
                            $soal = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 AND tipe_soal='pg' ")->result_array(); 
                          ?>
                          <tr>
                          <td align="center"><?= $i1++; ?></td>
                          <!-- loop 2 -->
                          <?php $i2=1; 

                          foreach($soal as $s){
                            
                            $id_soal = $s['id_soalB']; 
                            $nilainya = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 AND tipe_soal='pg' ")->row_array();  
                            // 
                          ?>
                          <td align="center"><?= $nilainya['jawaban']; ?></td>
                          <?php } ?>
                          <!-- akhir loop 2 -->
                          </tr>
                          <?php } ?>

                       
                        <tr>
                          <td align="center">Jumlah</td>
                            <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 AND tipe_soal='pg'  ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td align="center"><?= $total['total']; ?></td>
                            <?php } ?>
                        </tr>
                        
                        <tr>
                          <td align="center">Nilai Rata-Rata</td>
                            <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 AND tipe_soal='pg' ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td align="center"><?= number_format($total['total'],2); ?></td>
                            <?php } ?>
                        </tr>

                        <tr>
                          <td align="center">NRR X Bobot</td>
                           <?php 
                           $jml_semua=0;
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB, jenis_soal, tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 AND tipe_soal='pg' ")->result_array(); 
                            
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=1 AND tipe_soal='pg' ")->num_rows();

                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td align="center"><?= number_format($total['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua=$jml_semua+(number_format($total['total']/$jml_soal,2)); } ?>
                        </tr>
                        <tr>
                          <td align="center">Jumlah</td>
                          <td colspan="<?= $jml;?>" align="center"><h4><?= number_format($jml_semua,2) ;?></h4></td>
                        </tr>
                        <tr>
                          <td align="center">Jumlah X 20</td>
                          <td colspan="<?= $jml; ?>" align="center"><h4><?= $hasil_akhir = number_format($jml_semua*20,2);?> 
                          </h4></td>
                        </tr>
                      </tbody>
            
            </td>
        </tr>
    
    </table>

    
</body>
</html>