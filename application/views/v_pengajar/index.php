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
              <span class="d-ib">DATA PENGAJAR</span>
            </h1>
          </div>
          <hr>
          <div class="text-left m-b">
              <button class="btn btn-info" data-toggle="modal" data-target="#add_pengajar" type="button">(+) Tambah Data</button>
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
                  <strong>Daftar Pengajar</strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Nama Pengajar</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Pengajar</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    
                      <?php 
                        $no=1; foreach ($data as $i) {
                        
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['nama_pengajar']; ?></td>
                        <td class="text-center">
                          <a class="badge badge-success" href="#edit_pengajar<?= $i['id_pengajar']; ?>" data-toggle="modal"><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#hapus_pengajar<?= $i['id_pengajar']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
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
    <div id="add_pengajar" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data Pengajar</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Pengajar/tambah_pengajar');?>
            <div class="form-group">
              <label class="control-label">Nama Pengajar</label>
              <input class="form-control" type="text" name="nama_pengajar" placeholder="Nama Pengajar"  required>
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

        <div id="edit_pengajar<?= $x['id_pengajar']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Pengajar</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Pengajar/edit_pengajar');?>
          <input type="hidden" readonly value="<?= $x['id_pengajar']; ?>" name="id_pengajar" class="form-control" >
            <div class="form-group">
              <label class="control-label">Nama Pengajar</label>
              <input class="form-control" type="text" name="nama_pengajar" value="<?= $x['nama_pengajar'] ?>" required>
              <small class="form-text text-danger"><?= form_error('nama_pengajar');?></small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
          </form>
      </div>
    </div>
  </div>
  <?php endforeach;?>
    <!-- AKHIR MODAL BOX EDIT DATA -->


        <!-- MODAL BOX HAPUS DATA -->
        <?php $no=0; foreach($data as $x): $no++; ?>

        <div id="hapus_pengajar<?= $x['id_pengajar']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Pengajar</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Pengajar/hapus_pengajar');?>
          <input type="hidden" readonly value="<?= $x['id_pengajar']; ?>" name="id_pengajar" class="form-control" >
            <p>Apakah Anda Yakin Menghapus Data "<b><?= $x['nama_pengajar']; ?></b>" ?</strong>
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