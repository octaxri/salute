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
                      <div id="notifikasi" class="alert alert-warning"><strong> </strong> <?=$dat;?></div>
        <?php } ?> 
            <br>


          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">DATA PELATIHAN</span>
            </h1>
          </div>
          <hr>
          <div class="text-left m-b">
              <button class="btn btn-info" data-toggle="modal" data-target="#modalSignUpSm" type="button">(+) Tambah Pelatihan</button>
          </div>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Daftar Pelatihan</strong>
                </div>
                <div class="card-body">
                    <!-- ISINYA -->
                    <?php foreach($data as $d){ ?>
                    <h3><?= $d['nama_kejuruan']; ?> - <?= $d['nama_program']; ?> (<?= $d['tgl_mulai_pelatihan']; ?> - <?= $d['tgl_akhir_pelatihan']; ?>)</h3><br>
                    <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan_peserta/kirim_kuisioner_a/<?= $d['kd_pelatihan']; ?>">Kuisioner A</a><br><br><br>
                    <a class="btn btn-primary col-xs-12" href="#modal-b<?= $d['kd_pelatihan']; ?>" data-toggle="modal">Kuisioner B</a><br><br><br>
                    <a class="btn btn-primary col-xs-12" href="<?= base_url();?>pelatihan_peserta/kirim_kuisioner_c/<?= $d['kd_pelatihan'];?>">Kuisioner C</a><br><br><br>
                    <hr>
                    <?php } ?>
                    <!-- AKHIR ISINYA -->
                    <br><br><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    <!-- MODAL BOX TAMBAH DATA -->
    <div id="modalSignUpSm" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data Pelatihan</h4>
        </div>
        <div class="modal-body">
         <?php echo form_open('Pelatihan_peserta/tambah_data');?>
            <div class="form-group">
              <label class="control-label">Kode Pelatihan</label>
              <input class="form-control" type="text" name="kd_pelatihan" required="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
          </form>
      </div>
    </div>
  </div>
    <!-- AKHIR MODAL BOX TAMBAH DATA -->

   <!-- MODAL BOX KUISIONER B -->
   <?php $no=0; foreach($data as $x): $no++; ?>
    <div id="modal-b<?= $x['kd_pelatihan'] ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">KUISIONER B</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan_peserta/in_materi_pelatihan_kuisioner_b/<?= $x['kd_pelatihan']; ?>">Materi Pelatihan (kurikulum silabus dan modul)</a><br><br>
          </div>
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="#modal-pilih-pengajar<?= $x['kd_pelatihan']; ?>" data-toggle="modal">Tenaga Pelatih</a><br><br>
          </div>
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan_peserta/in_sarana_dan_prasarana_b/<?= $x['kd_pelatihan']; ?>">Sarana dan Prasarana</a><br><br>
          </div>
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan_peserta/in_bahan_pelatihan_b/<?= $x['kd_pelatihan'];?>">Bahan Latihan, Modul, ATK, dan Seragam Peserta</a><br><br>
          </div>
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan_peserta">Unit Kompetensi</a><br><br>
          </div>
          <hr>
          <div class="form-group">
            <button type="button" class="btn btn-danger col-xs-12" data-dismiss="modal">Batal</button><br><br>
          </div>
        </div>
      
      </div>
    </div>
  </div>
  <?php endforeach;?>
    <!-- AKHIR MODAL BOX KUISIONER B -->


     <!-- MODAL BOX KUISIONER B PENGAJAR-->
   <?php $no=0; foreach($data as $x): $no++; ?>
    <div id="modal-pilih-pengajar<?= $x['kd_pelatihan'] ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Pilih Pengajar</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan_peserta">Pengajar 1</a><br><br>
          </div>
          <div class="form-group">
            <a class="btn btn-primary col-xs-12" href="<?= base_url(); ?>pelatihan_peserta">Pengajar 2</a><br><br>
          </div>
          <hr>
          <div class="form-group">
            <button type="button" class="btn btn-danger col-xs-12" data-dismiss="modal">Batal</button><br><br>
          </div>
        </div>
      
      </div>
    </div>
  </div>
  <?php endforeach;?>
    <!-- AKHIR MODAL BOX KUISIONER B PENGAJAR-->

