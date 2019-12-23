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
            <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_program/in_detail_program/<?= $program; ?>"><span class="icon icon-backward"></span></a> DETAIL KUISIONER C PER PROGRAM : <?= $program1['nama_program']; ?></span>
            </h1>
          </div>
          <hr>
          <!--  -->
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Detail Menu Kuisioner C</strong>
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
                          <td>REKRUITMEN, PERJALANAN, DAN PERSYARATAN PESERTA</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_program/rekap_kuisioner_c_rekrut/<?=$program;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>PENYAMBUTAN, PEMBAGIAN KAMAR PESERTA</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_program/rekap_kuisioner_c_penyambutan/<?= $program;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>SARANA DAN PRASARANA ASRAMA</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_program/rekap_kuisioner_c_sapras/<?= $program;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>KONSUMSI</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_program/rekap_kuisioner_c_konsumsi/<?=$program;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>

                        <tr>
                          <td>5</td>
                          <td>PELAKSANAAN UJI KOMPETENSI</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_program/rekap_kuisioner_c_pelaksanaan/<?= $program;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>SECARA UMUM PELATIHAN</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_program/rekap_kuisioner_c_secara_umum/<?= $program;?>"><span class="icon icon-eye"></span> Detail</a></td>
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


        

                    <!--  -->
    
            

                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>
                    
        </div>
      </div>


      <!-- MODAL BOX KUISIONER B PENGAJAR-->
    <div id="modal-pilih-pengajar" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Pilih Pengajar</h4>
        </div>
        <div class="modal-body">  
        <?php foreach($daftar_pengajar as $i) { ?>
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan/in_detail_pelatihan_pengajar_kuisioner_b/<?= $kd_pelatihan; ?>/<?= $i['id_pengajar']; ?>"><?= $i['nama_pengajar'];?></a><br><br>
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