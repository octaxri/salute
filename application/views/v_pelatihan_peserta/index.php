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
                    <a class="btn btn-primary col-xs-12" href="#edit_data">Kuisioner B</a><br><br><br>
                    <a class="btn btn-primary col-xs-12" href="#edit_data">Kuisioner C</a><br><br><br>
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

