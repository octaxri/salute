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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>pelatihan/detail_pelatihan/<?= $kd_pelatihan; ?>"><span class="icon icon-backward"></span></a> DETAIL KUISIONER B SARANA DAN PRASARANA | Kejuruan <?= $data1['nama_kejuruan']; ?>, Program <?= $data1['nama_program']; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Hasil Nilai Responden SARANA DAN PRASARANA</strong>
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
                          <?php $i1 =1; $jml=0; $jml1=0;$jml2=0;$jml3=0;$jml4=0; foreach($responden as $r){ ?>
                            
                            <?php 
                              $id_user = $r['id_user'];
                              $jml = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->num_rows(); 
                              $jml1= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2 ")->num_rows();
                              $jml2= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->num_rows();
                              $jml3= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->num_rows();
                              $jml4= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7 ")->num_rows();
                            ?>

                          <?php } ?>
                          <th colspan="<?= $jml;?>" class="text-center">WORKSHOP/BENGKEL</th>
                          <th colspan="<?= $jml1;?>" class="text-center">RUANG TEORI</th>
                          <th colspan="<?= $jml2;?>" class="text-center">LISTRIK</th>
                          <th colspan="<?= $jml3;?>" class="text-center">KAMAR MANDI/TOILET</th>
                          <th colspan="<?= $jml4;?>" class="text-center">SARANA PENUNJANG</th>
                        </tr>
                        
                        <tr>
                        <?php 
                               $soal=1;
                               $jml_soal=$this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->result_array();                               
                              foreach ($jml_soal as $key) { ?>
                                <th><?= $soal++;?></th>
                              <?php }?>
                                <!-- Ruang Teori -->
                              <?php 
                              $soal1=1;
                              $jml_soal1=$this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2 ")->result_array();
                              foreach ($jml_soal1 as $key) { ?>
                                <th><?= $soal1++;?></th>
                              <?php } ?>

                              <?php 
                              $soal2=1;
                              $jml_soal2=$this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->result_array();
                              foreach ($jml_soal2 as $key) { ?>
                                <th><?= $soal2++;?></th>
                              <?php } ?>

                              <?php 
                              $soal3=1;
                              $jml_soal3=$this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->result_array();
                              foreach ($jml_soal3 as $key) { ?>
                                <th><?= $soal3++;?></th>
                              <?php } ?>

                              <?php 
                              $soal4=1;
                              $jml_soal4=$this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7 ")->result_array();
                              foreach ($jml_soal4 as $key) { ?>
                                <th><?= $soal4++;?></th>
                              <?php } ?>
                        </tr>
                      
                      </thead>
                      <tbody>
                      <?php $i1=1; foreach($responden as $r){ ?>

                        <?php 
                          $id_user = $r['id_user'];
                          $soal = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=1 ")->result_array(); 
                          $soal1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=2 ")->result_array(); 
                          $soal2 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=5 ")->result_array(); 
                          $soal3 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=6 ")->result_array(); 
                          $soal4 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg'AND sub_soal=7 ")->result_array(); 
                        ?>
                        <tr>
                        <td><?= $i1++; ?></td>
                        <!-- loop 2 -->
                        <?php $i2=1; 

                        foreach($soal as $s){
                          
                          $id_soal = $s['id_soalB']; 
                          $nilainya = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          // 
                        ?>
                        <td><?= $nilainya['jawaban']; ?></td>
                        <?php } ?>
                          <!-- akhir loop 2 -->

                        <!-- isi ruang teori -->
                        <?php $i3=1; 

                        foreach($soal1 as $s1){
                          
                          $id_soal1 = $s1['id_soalB']; 
                          $nilainya1 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal1' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          // 
                        ?>
                        <td><?= $nilainya1['jawaban']; ?></td>
                        <?php } ?>
                        <!-- akhir loop 3 -->
                        
                        <!--isi listrik  -->
                        <?php $i4=1; 

                        foreach($soal2 as $s2){
                          
                          $id_soal2 = $s2['id_soalB']; 
                          $nilainya2 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal2' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          // 
                        ?>
                        <td><?= $nilainya2['jawaban']; ?></td>
                        <?php } ?>
                          <!-- akhir loop 4 -->

                          <!-- isi kamar mandi -->
                        <?php $i5=1; 

                        foreach($soal3 as $s3){
                          
                          $id_soal3 = $s3['id_soalB']; 
                          $nilainya3 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal3' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          // 
                        ?>
                        <td><?= $nilainya3['jawaban']; ?></td>
                        <?php } ?> 
                        <!-- akhir loop 5 -->

                        <!-- isi sarana penunjang -->
                        <?php $i6=1; 

                        foreach($soal4 as $s4){
                          
                          $id_soal4 = $s4['id_soalB']; 
                          $nilainya4 = $this->db->query("SELECT * FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE id_user='$id_user' AND id_soalB='$id_soal4' AND kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' ")->row_array();  
                          // 
                        ?>
                        <td><?= $nilainya4['jawaban']; ?></td>
                        <?php } ?> 

                        </tr>
                        <?php } ?>

                    
                        <tr>
                          <td>Jumlah</td>
                          <!-- Jumlah Workshop -->
                          <?php 
                            $z = 1;
                            $soalnya = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1  ")->result_array(); 
                            foreach($soalnya as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= $total['total']; ?></td>
                            <?php } ?>
                            <!-- akhir workshop -->

                            <!-- Jumlah Ruang Teori -->
                            <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];

                            $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= $total1['total']; ?></td>
                            <?php } ?>
                            <!-- akhir Ruang teori -->

                            <!-- Listrik -->
                            <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];

                            $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= $total1['total']; ?></td>
                            <?php } ?>
                            <!-- Akhir listrik -->

                            <!-- Jumlah Kamar Mandi -->
                            <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];

                            $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= $total1['total']; ?></td>
                            <?php } ?>
                            <!-- Akhir Kamar Mandi -->

                            <!-- Jumlah Sarana Penunjang -->
                            <?php 
                            $z1 = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7  ")->result_array(); 
                            foreach($soalnya1 as $z1){
                            $id_soalnya1 = $z1['id_soalB'];

                            $total1 = $this->db->query("SELECT SUM(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya1' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= $total1['total']; ?></td>
                            <?php } ?>
                            <!-- Akhir Sarana Penunjang -->

                        </tr>


                        <tr>
                          <td>Nilai Rata-Rata</td>
                          <!-- Rt Workshop -->
                          <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total'],2); ?></td>
                            <?php } ?>
                            <!-- Akhir rt Workshop -->

                              <!-- Rt Ruang Teori -->
                              <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2 ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total'],2); ?></td>
                            <?php } ?>
                              <!-- Akhir Ruang Teori -->

                              <!-- rt Listrik -->
                              <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total'],2); ?></td>
                            <?php } ?>
                              <!-- Akhir Listrik -->
                              
                              <!-- rt kamar mandi -->
                              <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total'],2); ?></td>
                            <?php } ?>
                              <!-- Akhir Kamar Mandi -->

                              <!-- Sarana Penunjang -->
                              <?php 
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal, sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7 ")->result_array(); 
                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total'],2); ?></td>
                            <?php } ?>
                              <!-- Akhir Sarana Penunjang -->

                        </tr>


                        <tr>
                          <td>NRR X Bobot</td>
                          <!-- nrr x bobot Workshop -->
                          <?php 
                           $jml_semua1=0;
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB, jenis_soal, tipe_soal, sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->result_array(); 
                            
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=1 ")->num_rows();

                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua1=$jml_semua1+(number_format($total['total']/$jml_soal,2)); } ?>
                                <!-- Akhir workshop -->

                                <!-- ruang teori -->
                                <?php 
                           $jml_semua2=0;
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB, jenis_soal, tipe_soal, sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2 ")->result_array(); 
                            
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=2 ")->num_rows();

                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua2=$jml_semua2+(number_format($total['total']/$jml_soal,2)); } ?>
                                <!-- akhir ruang teori -->

                                <!-- Listrik -->
                                <?php 
                           $jml_semua3=0;
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB, jenis_soal, tipe_soal, sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->result_array(); 
                            
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=5 ")->num_rows();

                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua3=$jml_semua3+(number_format($total['total']/$jml_soal,2)); } ?>
                                <!--akhir Listrik -->

                                <!-- Kamarmandi -->
                                <?php 
                           $jml_semua4=0;
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB, jenis_soal, tipe_soal, sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->result_array(); 
                            
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=6 ")->num_rows();

                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua4=$jml_semua4+(number_format($total['total']/$jml_soal,2)); } ?>
                                <!--akhir  Kamarmandi -->

                                <!-- sarana penunjang -->
                                <?php 
                           $jml_semua5=0;
                            $z = 1;
                            $soalnya1 = $this->db->query("SELECT DISTINCT id_soalB, jenis_soal, tipe_soal, sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7 ")->result_array(); 
                            
                            $jml_soal= $this->db->query("SELECT DISTINCT id_soalB,jenis_soal,tipe_soal,sub_soal FROM penilaian_b INNER JOIN kuisioner_b ON id_soalB=id_kuisionerB WHERE kd_pelatihan='$kd_pelatihan' AND jenis_soal=3 AND tipe_soal='pg' AND sub_soal=7 ")->num_rows();

                            foreach($soalnya1 as $z){
                            $id_soalnya = $z['id_soalB'];

                            $total = $this->db->query("SELECT AVG(jawaban) as total FROM penilaian_b WHERE id_soalB='$id_soalnya' AND kd_pelatihan='$kd_pelatihan'")->row_array();
                            ?>
                            <td><?= number_format($total['total']/$jml_soal,2); ?></td>
                            <?php $jml_semua5=$jml_semua5+(number_format($total['total']/$jml_soal,2)); } ?>
                                <!-- akhir sarana penunjang -->

                        </tr>


                        <tr>
                          <td>Jumlah</td>
                          <td colspan="<?= $jml;?>" class="text-center"><h4><?= number_format($jml_semua1,2);?></h4></td>
                          <td colspan="<?= $jml1;?>" class="text-center"><h4><?= number_format($jml_semua2,2);?></h4></td>
                          <td colspan="<?= $jml2;?>" class="text-center"><h4><?= number_format($jml_semua3,2);?></h4></td>
                          <td colspan="<?= $jml3;?>" class="text-center"><h4><?= number_format($jml_semua4,2);?></h4></td>
                          <td colspan="<?= $jml4;?>" class="text-center"><h4><?= number_format($jml_semua5,2);?></h4></td>
                        </tr>
                        <tr>
                          <td>Jumlah X 20</td>
                          <td colspan="<?=$jml;?>" class="text-center"><h4><?= number_format($jml_semua1*20,2);?></h4></td>
                          <td colspan="<?=$jml1;?>" class="text-center"><h4><?= number_format($jml_semua2*20,2);?></h4></td>
                          <td colspan="<?=$jml2;?>" class="text-center"><h4><?= number_format($jml_semua3*20,2);?></h4></td>
                          <td colspan="<?=$jml3;?>" class="text-center"><h4><?= number_format($jml_semua4*20,2);?></h4></td>
                          <td colspan="<?=$jml4;?>" class="text-center"><h4><?= number_format($jml_semua5*20,2);?></h4></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                
                  </div>
                  <br>
                  <div class="table-responsive">
                    <table>
                        <tr>
                        <td><h4> WORKSHOP / BENGKEL  <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua1*20,2);?></h4></td></h4></td>
                        </tr>
                        <tr>
                        <td><h4> RUANG TEORI <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua2*20,2);?></h4></td></h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> LISTRIK <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua3*20,2);?></h4></td></h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> KAMAR MANDI / TOILET <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua4*20,2);?></h4></td> </h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> SARANA PENUNJANG <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($jml_semua5*20,2);?></h4></td> </h4></td>
                        </tr>
                        <tr>
                        <?php 
                        $rata=(number_format($jml_semua1*20,2))+(number_format($jml_semua2*20,2))+(number_format($jml_semua3*20,2))+(number_format($jml_semua4*20,2))+(number_format($jml_semua5*20,2));
                        ?>
                        <td><h4> RATA-RATA <td></td><td></td><td><h4>&emsp;=&emsp;<?= number_format($rata/5,2);?></h4></td> </h4></td>
                        </tr>
                    </table>
                    </div>
                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>