<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table align="center" cellspacing="5">
	
    <tr>
    <td></td>
        <td colspan="3"><h4>II. TENAGA PELATIH</h4></td>
    </tr>
    <tr>
    <td></td>
        <td colspan="3"><center><h4>HASIL ANALISIS ANGKET <br> PELATIHAN BERBASIS KOMPETENSI PER KELAS <br> KEJURUAN : <?= strtoupper($data1['nama_kejuruan']);?> <br> PROGRAM : <?= strtoupper($data1['nama_program']);?>  </h4></center></td>
    </tr>
    <tr>
    <td></td>
                <td colspan="3"><h4>NAMA INSTRUKTUR : <?= strtoupper($pengajar['nama_pengajar']); ?> </h4></td>
    </tr>
    <tr>
    </tr>
    
          <tr>
          <td></td>
            <td colspan="3">
                <!-- tabel -->  
                <table border="1" width="100%">
                <thead>
                        <tr>
                          <th rowspan="2" width="15">No Responden</th>
                          <?php $i1 =1; $jml=0; $jml1=0;$jml2=0;$jml3=0; foreach($responden as $r){ ?>
                            
                            <?php 
                              $id_user = $r['id_user'];
                              $id_pengajar = $r['id_pengajar'];
                              $jml = $this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9 ")->num_rows(); 
                              $jml1= $this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10 ")->num_rows();
                              $jml2= $this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b  WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11")->num_rows();
                              $jml3= $this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b  WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12 ")->num_rows();
                            ?>

                          <?php } ?>
                          <th colspan="<?= $jml_pengetahuan_pemahaman;?>" align="center">PENGETAHUAN/PEMAHAMAN</th>
                          <th colspan="<?= $jml_kemampuan;?>" align="center">KEMAMPUAN DALAM MEMBAWAKAN MATERI</th>
                          <th colspan="<?= $jml_memahami_masalah;?>" align="center">KEMAMPUAN MEMAHAMI MASALAH PESERTA</th>
                          <th colspan="<?= $jml_penampilan;?>" align="center">PENAMPILAN TENAGA PELATIH</th>
                        </tr>

                        <tr align="center">
  
                       
                       <?php 
                                 $soal=1;            
                              foreach ($pengetahuan_pemahaman as $key) { ?>
                                <th align="center"><?= $soal++;?></th>
                              <?php }?>
                                <!-- Ruang Teori -->
                              <?php 
                              $soal1=1;
                              
                              foreach ($kemampuan as $key) { ?>
                                <th align="center"><?= $soal1++;?></th>
                              <?php } ?>

                              <?php 
                              $soal2=1;
                              
                              foreach ($memahami_masalah as $key) { ?>
                                <th align="center"><?= $soal2++;?></th>
                              <?php } ?>

                              <?php 
                              $soal3=1;
                             foreach ($penampilan as $key) { ?>
                                <th align="center"><?= $soal3++;?></th>
                              <?php } ?>



                        </tr>
                      </thead>
                      <tbody>
                <?php $i1=1; foreach($responden as $r){ ?>

                        <?php 
                          $id_user = $r['id_user'];
                          $id_pengajar=$r['id_pengajar'];
                          $soal = $this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg'AND sub_soal=9 ")->result_array(); 
                          $soal1 = $this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg'AND sub_soal=10 ")->result_array(); 
                          $soal2 = $this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg'AND sub_soal=11 ")->result_array(); 
                          $soal3 = $this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg'AND sub_soal=12 ")->result_array(); 
 
                        ?>
                        <tr align="center">
                        <td align="center"><?= $i1++; ?></td>
                        <!-- loop 2 -->
                        <?php $i2=1; 

                        foreach($soal as $s){
                          
                          $id_soal = $s['id_soalB']; 
                          $nilainya = $this->db->query("SELECT  DISTINCT  * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND id_pengajar='$id_pengajar' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg' ")->row_array();  
                          // 
                        ?>
                        <td><?= $nilainya['jawaban']; ?></td>
                        <?php } ?>
                          <!-- akhir loop 2 -->

                        <!-- isi ruang teori -->
                        <?php $i3=1; 

                        foreach($soal1 as $s1){
                          
                          $id_soal1 = $s1['id_soalB']; 
                          $nilainya1 = $this->db->query("SELECT  DISTINCT  * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND id_pengajar='$id_pengajar' AND id_soalB='$id_soal1' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg' ")->row_array();  
                          // 
                        ?>
                        <td><?= $nilainya1['jawaban']; ?></td>
                        <?php } ?>
                        <!-- akhir loop 3 -->
                        
                        <!--isi listrik  -->
                        <?php $i4=1; 

                        foreach($soal2 as $s2){
                          
                          $id_soal2 = $s2['id_soalB']; 
                          $nilainya2 = $this->db->query("SELECT  DISTINCT  * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND id_pengajar='$id_pengajar' AND id_soalB='$id_soal2' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg' ")->row_array();  
                          // 
                        ?>
                        <td><?= $nilainya2['jawaban']; ?></td>
                        <?php } ?>
                          <!-- akhir loop 4 -->

                          <!-- isi kamar mandi -->
                        <?php $i5=1; 

                        foreach($soal3 as $s3){
                          
                          $id_soal3 = $s3['id_soalB']; 
                          $nilainya3 = $this->db->query("SELECT  DISTINCT  * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_user='$id_user' AND id_pengajar='$id_pengajar' AND id_soalB='$id_soal3' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=2 AND tipe_soal='pg' ")->row_array();  
                          // 
                        ?>
                        <td><?= $nilainya3['jawaban']; ?></td>
                        <?php } ?> 
                        <!-- akhir loop 5 -->

                        <!-- isi sarana penunjang -->
           

                        </tr>
                        <?php } ?>

                        <tr align="center">
                          <td>Jumlah</td>
                         

                          <?php 
                            $z = 1;
                            $soalnya = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9  ")->result_array(); 
                            foreach($soalnya as $z){
                            $id_soalnya = $z['id_soalB'];
                          $id_pengajar=$z['id_pengajar'];
                            $total = $this->db->query("SELECT DISTINCT SUM(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar'")->row_array();
                            ?>
                            <td><?= $total['total']; ?></td>
                            <?php } ?>
                            <!-- Akhir Kamar Mandi -->

                            <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= $total1['total']; ?></td>
                            <?php } ?>

                            <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= $total1['total']; ?></td>
                            <?php } ?>

                            <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= $total1['total']; ?></td>
                            <?php } ?>

                            

                        </tr>
                        <tr align="center">
                          <td>Nilai Rata-Rata</td>
 
                          <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= number_format($total1['total'],2); ?></td>
                            <?php } ?>

                            
                          <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= number_format($total1['total'],2); ?></td>
                            <?php } ?>

                            <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= number_format($total1['total'],2); ?></td>
                            <?php } ?>


                            <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= number_format($total1['total'],2); ?></td>
                            <?php } ?>
                 


                        </tr>
                        <tr align="center">
                          <td>NRR X Bobot</td>     
                          
                          <?php 
                          $jml_semua=0;
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9  ")->result_array();
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan'  AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9 ")->num_rows(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= number_format($total1['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua=$jml_semua+(number_format($total1['total']/$jml_soal,2)); } ?>

                            <?php 
                          $jml_semua1=0;
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10  ")->result_array();
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan'  AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10 ")->num_rows(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= number_format($total1['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua1=$jml_semua1+(number_format($total1['total']/$jml_soal,2)); } ?>

                            <?php 
                          $jml_semua2=0;
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11  ")->result_array();
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan'  AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11 ")->num_rows(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= number_format($total1['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua2=$jml_semua2+(number_format($total1['total']/$jml_soal,2)); } ?>


                            <?php 
                          $jml_semua3=0;
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12  ")->result_array();
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan'  AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12 ")->num_rows(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];
                            $id_pengajar=$z1['id_pengajar'];
                            $total1 = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' ")->row_array();
                            ?>
                            <td><?= number_format($total1['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua3=$jml_semua3+(number_format($total1['total']/$jml_soal,2)); } ?>

                        </tr>
                        <tr align="center">
                          <td>Jumlah</td>
                          <td colspan="<?= $jml_pengetahuan_pemahaman;?>" align="center"><h4><?= number_format($jml_semua,2);?></h4></td>
                          <td colspan="<?= $jml_kemampuan;?>" align="center"><h4><?= number_format($jml_semua1,2);?></h4></td>
                          <td colspan="<?= $jml_memahami_masalah;?>" align="center"><h4><?= number_format($jml_semua2,2);?></h4></td>
                          <td colspan="<?= $jml_penampilan;?>" align="center"><h4><?= number_format($jml_semua3,2);?></h4></td>
                        </tr>
                        <tr align="center">
                          <td>Jumlah X 20</td>
                          <td colspan="<?=$jml_pengetahuan_pemahaman;?>" align="center"><h4><?= number_format($jml_semua*20,2);?></h4></td>
                          <td colspan="<?=$jml_kemampuan;?>" align="center"><h4><?= number_format($jml_semua1*20,2);?></h4></td>
                          <td colspan="<?=$jml_memahami_masalah;?>" align="center"><h4><?= number_format($jml_semua2*20,2);?></h4></td>
                          <td colspan="<?=$jml_penampilan;?>" align="center"><h4><?= number_format($jml_semua3*20,2);?></h4></td>
                        </tr>
                      </tbody>
            </table>
            <br>
          </div>
          <br>
          <div class="table-responsive">
            <table>
                <tr>
                <td><h4> PENGETAHUAN/PEMAHAMAN  <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua*20,2);?></h4></td></h4></td>
                </tr>
                <tr>
                <td><h4> KEMAMPUAN DALAM MEMBAWAKAN MATERI <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua1*20,2);?></h4></td></h4></td>
                </tr>                        
                <tr>
                <td><h4> KEMAMPUAN DALAM MEMAHAMI MASALAH PESERTA <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua2*20,2);?></h4></td></h4></td>
                </tr>                        
                <tr>
                <td><h4> PENAMPILAN TENAGA PELATIH <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua3*20,2);?></h4></td> </h4></td>
                </tr>                        
              
                <tr>
                <?php 
                $rata=(number_format($jml_semua*20,2))+(number_format($jml_semua1*20,2))+(number_format($jml_semua2*20,2))+(number_format($jml_semua3*20,2));
                ?>
                <td><h4> RATA-RATA <td></td><td></td><td><h4>&emsp;=&emsp;<?= $hasil_akhir = number_format($rata/4,2);?>
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
                </h4></td> </h4></td>
                </tr>
                </table>
            </td>	
        </tr>

</table>
