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
              <span class="d-ib">DATA PESERTA</span>
            </h1>
          </div>
          <hr>
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
                  <strong>Daftar Peserta</strong>
                </div>
                <div class="card-body">
                <table id="demo-datatables-colreorder-2" class="table table-hover table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="10%">No</th>
                        <th>ID Peserta</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>JK</th>
                        <th>Usia</th>
                        <th>Tipe Peserta</th>
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>ID Peserta</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>JK</th>
                        <th>Usia</th>
                        <th>Tipe Peserta</th>
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach($data as $i){ ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['id_user']; ?></td>
                        <td><?= $i['nama']; ?></td>
                        <td><?= $i['email']; ?></td>
                        <td><?= $i['jk']; ?></td>
                        <td><?= $i['usia']; ?></td>
                        <td><?= $i['tipe_peserta']; ?></td>
                        <td><?= $i['pendidikan']; ?></td>
                        <td><?= $i['pekerjaan']; ?></td>
                        <td class="text-center">
                          <a class="badge badge-success" href="#edit_peserta<?= $i['id_user']; ?>" data-toggle="modal"><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#hapus_peserta<?= $i['id_user']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
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



 <!-- MODAL BOX EDIT DATA -->
 <?php $no=0; foreach($data as $x): $no++; ?>

<div id="edit_peserta<?= $x['id_user']; ?>" tabindex="-1" role="dialog" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-primary">
  <h4 class="modal-title">Ubah Data Peserta</h4>
</div>
<div class="modal-body">
  <?php echo form_open('Peserta/edit_peserta');?>
  <input type="hidden" readonly value="<?= $x['id_user']; ?>" name="id_user" class="form-control" >
    <div class="form-group">
      <label class="control-label">Nama Peserta</label>
      <input class="form-control" type="text" name="nama" value="<?= $x['nama'] ?>" required>
      <small class="form-text text-danger"><?= form_error('nama');?></small>
    </div>

    <div class="form-group">
      <label class="control-label">Email</label>
      <input class="form-control" type="email" name="email" value="<?= $x['email'] ?>" required>
      <small class="form-text text-danger"><?= form_error('email');?></small>
    </div>

    <div class="form-group">
    <label for="jenis">Jenis Kelamin</label>
          <select class="form-control" id="jk" name="jk">
          
          <option value="selected"><?= $x['jk']?></option>

              <?php
                if($x['jk']=="L")
                { ?>
                  <option value="P">P</option>
              
              <?php  } ?>

              <?php
                if($x['jk']=="P")
                { ?>
                  <option value="L">L</option>
              
              <?php  } ?>
            
    
          
          </select>
      <small class="form-text text-danger"><?= form_error('jk');?></small>
    </div>

    <div class="form-group">
      <label class="control-label">Usia</label>
      <input class="form-control" type="number" name="usia" value="<?= $x['usia'] ?>" required>
      <small class="form-text text-danger"><?= form_error('usia');?></small>
    </div>

    <div class="form-group">
      <label for="tipe">Tipe Peserta</label>
          <select class="form-control" id="tipe_peserta" name="tipe_peserta">
          
          <option value="selected"><?= $x['tipe_peserta']?></option>

              <?php
                if($x['tipe_peserta']=="Boarding")
                { ?>
                  <option value="Non Boarding">Non Boarding</option>
              
              <?php  } ?>

              <?php
                if($x['tipe_peserta']=="Non Boarding")
                { ?>
                  <option value="Boarding">Boarding</option>
              
              <?php  } ?>
            
    
          
          </select>
    </div>

    <div class="form-group">
    <label for="pendidikan">Pendidikan</label>
          <select class="form-control" id="pendidikan" name="pendidikan">
          
          <option value="selected"><?= $x['pendidikan']?></option>

              <?php
                if($x['pendidikan']=="SD")
                { ?>
                  <option value="SMP/SLTP">SMP/SLTP</option>
                  <option value="SMA/SMK/SLTA">SMA/SMK/SLTA</option>
                  <option value="DIPLOMA">DIPLOMA</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
              
              <?php  } ?>

              <?php
                if($x['pendidikan']=="SMP/SLTP")
                { ?>
                  <option value="SD">SD</option>
                  <option value="SMA/SMK/SLTA">SMA/SMK/SLTA</option>
                  <option value="DIPLOMA">DIPLOMA</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
              
              <?php  } ?>

              <?php
                if($x['pendidikan']=="SMA/SMK/SLTA")
                { ?>
                  <option value="SD">SD</option>
                  <option value="SMP/SLTP">SMP/SLTP</option>
                  <option value="DIPLOMA">DIPLOMA</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
              
              <?php  } ?>

              <?php
                if($x['pendidikan']=="DIPLOMA")
                { ?>
                  
                  <option value="SD">SD</option>
                  <option value="SMP/SLTP">SMP/SLTP</option>
                  <option value="SMA/SMK/SLTA">SMA/SMK/SLTA</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
              
              <?php  } ?>

              <?php
                if($x['pendidikan']=="S1")
                { ?>
                  
                  <option value="SD">SD</option>
                  <option value="SMP/SLTP">SMP/SLTP</option>
                  <option value="SMA/SMK/SLTA">SMA/SMK/SLTA</option>
                  <option value="DIPLOMA">DIPLOMA</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
              
              <?php  } ?>

              <?php
                if($x['pendidikan']=="S2")
                { ?>
                  
                  <option value="SD">SD</option>
                  <option value="SMP/SLTP">SMP/SLTP</option>
                  <option value="SMA/SMK/SLTA">SMA/SMK/SLTA</option>
                  <option value="DIPLOMA">DIPLOMA</option>
                  <option value="S1">S1</option>
                  <option value="S3">S3</option>
              
              <?php  } ?>

              
              <?php
                if($x['pendidikan']=="S3")
                { ?>
                  
                  <option value="SD">SD</option>
                  <option value="SMP/SLTP">SMP/SLTP</option>
                  <option value="SMA/SMK/SLTA">SMA/SMK/SLTA</option>
                  <option value="DIPLOMA">DIPLOMA</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
              
              <?php  } ?>

    
            
    
          
          </select>
    </div>

    <div class="form-group">
      <label class="control-label">Pekerjaan</label>
      <input class="form-control" type="text" name="pekerjaan" value="<?= $x['pekerjaan'] ?>" required>
      <small class="form-text text-danger"><?= form_error('pekerjaan');?></small>
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

        <div id="hapus_peserta<?= $x['id_user']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Peserta</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Peserta/hapus_peserta');?>
          <input type="hidden" readonly value="<?= $x['id_user']; ?>" name="id_user" class="form-control" >
            <p>Apakah Anda Yakin Menghapus Data Peserta "<b><?= $x['nama']; ?></b>" ?</strong>
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


