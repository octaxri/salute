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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_tahap/in_detail_rekap/<?= $tahap; ?>"><span class="icon icon-backward"></span></a> DETAIL KUISIONER B PER TAHAP : <?= $tahap; ?></span>
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
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_tahap/rekap_kuisioner_b_materi_pelatihan/<?= $tahap; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Tenaga Pelatih</td>
                          <td class="text-center"><a class="badge badge-primary" href="#modal-pilih-pengajar<?= $tahap; ?>" data-toggle="modal"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Sarana Dan Prasarana</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_tahap/rekap_kuisioner_b_sarpras/<?= $tahap; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Bahan Latihan, Modul, ATK, Dan Seragam Peserta</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_tahap/rekap_kuisioner_b_bahan_latihan/<?= $tahap; ?>"><span class="icon icon-eye"></span> Detail</a></td>
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
                    
        </div>
      </div>


      <!-- MODAL BOX KUISIONER B PENGAJAR-->
    <div id="modal-pilih-pengajar<?= $tahap; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Pilih Pengajar</h4>
        </div>
        <div class="modal-body">  
        <?php foreach($daftar_pengajar as $i) { ?>
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan/in_detail_pelatihan_pengajar_kuisioner_b/<?= $tahap; ?>/<?= $i['id_pengajar']; ?>"><?= $i['nama_pengajar'];?></a><br><br>
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