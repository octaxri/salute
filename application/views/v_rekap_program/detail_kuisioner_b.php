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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_program/in_detail_program/<?= $program; ?>"><span class="icon icon-backward"></span></a> DETAIL KUISIONER B PER PROGRAM : <?= $program1['nama_program']; ?></span>
            </h1>
          </div>
          <hr>
          <!--  -->
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Detail Menu Kuisioner B</strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <br>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Menu</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Materi Pelatihan (Kurikulum, Silabus, Dan Modul)</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_program/rekap_kuisioner_b_materi_pelatihan/<?= $program; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Tenaga Pelatih</td>
                          <td class="text-center"><a class="badge badge-primary" href="#modal-pilih-pengajar<?= $program; ?>" data-toggle="modal"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Sarana Dan Prasarana</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url();?>rekap_program/rekap_kuisioner_b_sapras/<?=$program;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Bahan Latihan, Modul, ATK, Dan Seragam Peserta</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url();?>rekap_program/rekap_kuisioner_b_bahan_pelatihan/<?= $program;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Unit Kompetensi</td>
                          <td class="text-center"><a class="badge badge-primary" href=""><span class="icon icon-eye"></span> Detail</a></td>
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
          <hr>
           <!--  -->
           <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <center><strong>HASIL REKAP ANALISIS ANGKET PELATIHAN .....</strong></center>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="" class="btn btn-success icon icon-file-excel-o"> Excel</a>
                        
                    </center>
                    <br><br>
                    <!--  -->
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Indikator</th>
                          <th>Rata- Rata</th>
                          <th>Kinerja Unit Pelayanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Materi Pelatihan</td>
                          <td>80.00</td>
                          <td>Baik</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Tenaga Pelatih</td>
                          <td>80.00</td>
                          <td>Baik</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Sarpras</td>
                          <td>80.00</td>
                          <td>Baik</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Bahan Pelatihan</td>
                          <td>80.00</td>
                          <td>Baik</td>
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
                          <th width="30%">Nama Instruktur</th>
                          <th>Pengetahuan / Pemahaman</th>
                          <th>Kemampuan Dalam Membawakan Materi</th>
                          <th>Penampilan Tenaga Pelatih</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Betri Betharia, A.Md</td>
                          <td>80.00</td>
                          <td>80</td>
                          <td>80</td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                  </div>
                  <br><br>
                  <!--  -->
                  GRAFIK DISINI

                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>
                    
        </div>
      </div>


      <!-- MODAL BOX KUISIONER B PENGAJAR-->
    <div id="modal-pilih-pengajar<?= $program; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Pilih Pengajar</h4>
        </div>
        <div class="modal-body">  
        <?php foreach($daftar_pengajar as $i) { ?>
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan/in_detail_pelatihan_pengajar_kuisioner_b/<?= $program; ?>/<?= $i['id_pengajar']; ?>"><?= $i['nama_pengajar'];?></a><br><br>
          </div>
        <?php } ?>
          <hr>
          <div class="form-group">
            <button type="button" class="btn btn-danger col-xs-12" data-dismiss="modal">Batal</button><br><br>
          </div>
        </div>
      
      </div>
    </div>
  </div>
    <!-- AKHIR MODAL BOX KUISIONER B PENGAJAR-->