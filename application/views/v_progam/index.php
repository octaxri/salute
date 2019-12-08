<div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">DATA PROGAM PELATIHAN</span>
            </h1>
          </div>
          <hr>
          <div class="text-left m-b">
              <button class="btn btn-info" data-toggle="modal" data-target="#add_progam" type="button">(+) Tambah Data</button>
          </div>
          <br>
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
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Daftar Progam Pelatihan</strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Kejuruan</th>
                        <th>Nama Progam</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Kejuruan</th>
                        <th>Nama Progam</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php 
                        $no=1; foreach ($data as $i) {
                        
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['nama_kejuruan']; ?></td>
                        <td><?= $i['nama_program']; ?></td>
                        <td class="text-center">
                          <a class="badge badge-success" data-toggle="modal"  href="#edit_progam<?= $i['id_program'] ;?>"><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" data-toggle="modal"  href="#hapus_progam<?= $i['id_program']; ?>"><span class="icon icon-trash-o"></span> Hapus</a>
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
    <div id="add_progam" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data Progam Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Progam/tambah_progam');?>

          <div class="form-group">
              <label for="Kategori">Kejuruan  </label>
                  <select required name="id_kejuruan" id="id_kejuruan" class="custom-select">
                    <option value="">-- Pilih Kejuruan --</option>
                    <?php foreach($kej as $x) 
                          { 
                            $id=$x['id_kejuruan'];
                            $nm=$x['nama_kejuruan'];
                            ?>

                              <option value="<?php echo $id;?>"><?php echo $nm ; ?></option>
                          

                          <?php }?>
                  </select>
          </div>
            <div class="form-group">
              <label class="control-label">Nama Progam</label>
              <input class="form-control" type="text" name="nama_progam" placeholder="Nama Progam" required>
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

        <div id="edit_progam<?= $x['id_program'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Progam Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Progam/edit_progam'); ?> 
          <input type="hidden" readonly value="<?= $x['id_program']; ?>" name="id_program" class="form-control" >
          <div class="form-group">
              <label for="Kategori">Kejuruan  </label>
                  <select required name="id_kejuruan" id="id_kejuruan" class="form-control">
                    
                    <?php foreach ($kej as $k2) 
                    {
                                    $id_kat=$k2['id_kejuruan'];
                                    $nm_kej=$k2['nama_kejuruan'];
                                    if($id_kat==$x['id_kejuruan'])
                                        echo "<option value='$id_kat' selected>$nm_kej</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kej</option>";
                                }
                                ?>
                  </select>
          </div>
            <div class="form-group">
              <label class="control-label">Nama Progam</label>
              <input class="form-control" type="text" name="nama_progam" value="<?=$x['nama_progam'] ?>" required>
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
            <div id="hapus_progam<?= $x['id_program']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Progam Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Progam/hapus_progam'); ?>
          <input type="hidden" readonly value="<?= $x['id_program']; ?>" name="id_program" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b>ini</b>" ?</strong>
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