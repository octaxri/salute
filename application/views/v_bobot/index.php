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
              <span class="d-ib">DATA BOBOT PENILAIAN</span>
            </h1>
          </div>
          <hr>
          <div class="text-left m-b">
              <button class="btn btn-info" data-toggle="modal" data-target="#add_bobot" type="button">(+) Tambah Data</button>
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
                  <strong>Daftar Nilai Bobot</strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Nilai Bobot</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nilai Bobot</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    
                      <?php 
                        $no=1; foreach ($data as $i) {
                        
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['nilai']; ?></td>
                        <td class="text-center">
                          <a class="badge badge-success" href="#edit_bobot<?= $i['id_bobot']; ?>" data-toggle="modal"><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#hapus_bobot<?= $i['id_bobot']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    <!-- MODAL BOX TAMBAH DATA -->
    <div id="add_bobot" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data Bobot</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Bobot/tambah_data');?>
            <div class="form-group">
              <label class="control-label">Nilai Bobot</label>
              <input class="form-control" type="text" name="bobot" placeholder="Nilai Bobot"  required>
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


        <!-- MODAL BOX EDIT DATA -->
        <?php $no=0; foreach($data as $x): $no++; ?>

        <div id="edit_bobot<?= $x['id_bobot']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Nilai Bobot</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Bobot/edit_data');?>
          <input type="hidden" readonly value="<?= $x['id_bobot']; ?>" name="id_bobot" class="form-control" >
            <div class="form-group">
              <label class="control-label">Nilai Bobot</label>
              <input class="form-control" type="text" name="bobot" value="<?= $x['nilai'] ?>" required>
              <small class="form-text text-danger"><?= form_error('nilai');?></small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
          </form>
      </div>
    </div>
  </div>
  <?php endforeach;?>
    <!-- AKHIR MODAL BOX EDIT DATA -->


        <!-- MODAL BOX HAPUS DATA -->
        <?php $no=0; foreach($data as $x): $no++; ?>

        <div id="hapus_bobot<?= $x['id_bobot']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Nilai Bobot</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Bobot/hapus_data');?>
          <input type="hidden" readonly value="<?= $x['id_bobot']; ?>" name="id_bobot" class="form-control" >
            <p>Apakah Anda Yakin Menghapus Data "<b><?= $x['nilai']; ?></b>" ?</strong>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
        </div>
          </form>
      </div>
    </div>
  </div>

  <?php endforeach;?>
    <!-- AKHIR MODAL BOX HAPUS DATA -->