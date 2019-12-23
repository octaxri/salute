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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>pelatihan/detail_pelatihan2/4/<?= $kd_pelatihan; ?>"><span class="icon icon-backward"></span></a> DETAIL KUISIONER B | Kejuruan <?= $data1['nama_kejuruan']; ?>, Program <?= $data1['nama_program']; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Hasil Analisis Angket Pengajar | <?= $pengajar['nama_pengajar']; ?></strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="<?= base_url();?>pelatihan/cetak_kuisioner_b_pelatihan_pengajar/<?= $kd_pelatihan;?>" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="<?= base_url();?>laporan/export_exel_kuisioner_b_pelatihan_pengajar/<?= $kd_pelatihan;?>" class="btn btn-success icon icon-file-excel-o"> Excel</a>
                        
                    </center>
                    <br><br>

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
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
                          <th colspan="<?= $jml;?>" class="text-center">PENGETAHUAN/PEMAHAMAN</th>
                          <th colspan="<?= $jml1;?>" class="text-center">KEMAMPUAN DALAM MEMBAWAKAN MATERI</th>
                          <th colspan="<?= $jml2;?>" class="text-center">KEMAMPUAN MEMAHAMI MASALAH PESERTA</th>
                          <th colspan="<?= $jml3;?>" class="text-center">PENAMPILAN TENAGA PELATIH</th>
                        </tr>

                        <tr>
    
                        <?php 
                        foreach ($responden as $k) { ?>
                          
                          <?php 
                          $k=0;
                          $id_pengajar=$k['id_pengajar'];
                          ?>

                  
                       
                       <?php 
                               $soal=1;
                               $jml_soal=$this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=9 ")->result_array();                               
                              foreach ($jml_soal as $key) { ?>
                                <th><?= $soal++;?></th>
                              <?php }?>
                                <!-- Ruang Teori -->
                              <?php 
                              $soal1=1;
                              $jml_soal1=$this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=10 ")->result_array();
                              foreach ($jml_soal1 as $key) { ?>
                                <th><?= $soal1++;?></th>
                              <?php } ?>

                              <?php 
                              $soal2=1;
                              $jml_soal2=$this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=11 ")->result_array();
                              foreach ($jml_soal2 as $key) { ?>
                                <th><?= $soal2++;?></th>
                              <?php } ?>

                              <?php 
                              $soal3=1;
                              $jml_soal3=$this->db->query("SELECT DISTINCT id_user,id_soalB,jenis_soal,tipe_soal,sub_soal,id_pengajar FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB INNER JOIN detail_penilaian_b ON idku=id_penilaian_b WHERE kd_pelatihan='$kd_pelatihan' AND id_pengajar='$id_pengajar' AND jenis_soal=2 AND tipe_soal='pg' AND sub_soal=12 ")->result_array();
                              foreach ($jml_soal3 as $key) { ?>
                                <th><?= $soal3++;?></th>
                              <?php } ?>

                              <?php  } ?>

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
                        <tr>
                        <td><?= $i1++; ?></td>
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

                        <tr>
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
                        <tr>
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
                        <tr>
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
                        <tr>
                          <td>Jumlah</td>
                          <td colspan="<?= $jml;?>" class="text-center"><h4><?= number_format($jml_semua,2);?></h4></td>
                          <td colspan="<?= $jml1;?>" class="text-center"><h4><?= number_format($jml_semua1,2);?></h4></td>
                          <td colspan="<?= $jml2;?>" class="text-center"><h4><?= number_format($jml_semua2,2);?></h4></td>
                          <td colspan="<?= $jml3;?>" class="text-center"><h4><?= number_format($jml_semua3,2);?></h4></td>
                        </tr>
                        <tr>
                          <td>Jumlah X 20</td>
                          <td colspan="<?=$jml;?>" class="text-center"><h4><?= number_format($jml_semua*20,2);?></h4></td>
                          <td colspan="<?=$jml1;?>" class="text-center"><h4><?= number_format($jml_semua1*20,2);?></h4></td>
                          <td colspan="<?=$jml2;?>" class="text-center"><h4><?= number_format($jml_semua2*20,2);?></h4></td>
                          <td colspan="<?=$jml3;?>" class="text-center"><h4><?= number_format($jml_semua3*20,2);?></h4></td>
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
                    </div>
                    <!-- AKHIR ISI -->

                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>