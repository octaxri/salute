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
              <span class="d-ib">DATA KUISONER A</span>
            </h1>
          </div>
          <hr>
          <div class="text-left m-b">
              <button class="btn btn-info" data-toggle="modal" data-target="#add_kuisoner" type="button">(+) Tambah Data</button>
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
                  <strong>Daftar Kuisoner A<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal A</th>
                        <th>Jawaban1A</th>
                        <th>Jawaban2A A</th>
                        <th>Jawaban3A</th>
                        <th>Jawaban4A</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal A</th>
                        <th>Jawaban1A</th>
                        <th>Jawaban2A A</th>
                        <th>Jawaban3A</th>
                        <th>Jawaban4A</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php  foreach ($data as $i) 
                    {
                      $no=1;
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['soalA'];?></td>
                        <td><?= $i['jawaban1A']; ?></td>
                        <td><?= $i['jawaban2A']; ?></td>
                        <td><?= $i['jawaban3A']; ?></td>
                        <td><?= $i['jawaban4A']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit<?= $i['id_kuisionerA']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus<?= $i['id_kuisionerA']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
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
    <div id="add_kuisoner" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data Kuisoner A</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_A/tambah_kuisoner');?>

            <div class="form-group">
              <label class="control-label">Soal A</label>
              <input class="form-control" type="text" name="soalA"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban1A</label>
              <input class="form-control" type="text" name="jawaban1A"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban2A</label>
              <input class="form-control" type="text" name="jawaban2A"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban3A</label>
              <input class="form-control" type="text" name="jawaban3A"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban4A</label>
              <input class="form-control" type="text" name="jawaban4A"  required>
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

        <div id="modal-edit<?= $x['id_kuisionerA'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Kuisoner A</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_A/edit_kuisoner'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerA']; ?>" name="id_kuisionerA" class="form-control" >
          
          <div class="form-group">
              <label class="control-label">Soal A</label>
              <input class="form-control" type="text" name="soalA" value="<?=$x['soalA'];?>" required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1A</label>
              <input class="form-control" type="text" name="jawaban1A" value="<?=$x['jawaban1A']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2A</label>
              <input class="form-control" type="text" name="jawaban2A" value="<?=$x['jawaban2A']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3A</label>
              <input class="form-control" type="text" name="jawaban3A" value="<?=$x['jawaban3A']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4A</label>
              <input class="form-control" type="text" name="jawaban4A" value="<?=$x['jawaban4A']?>"  required>
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
            <div id="modal-hapus<?= $x['id_kuisionerA']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Kuisoner A</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_A/hapus_kuisoner'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerA']; ?>" name="id_kuisionerA" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalA']?></b>" ?</strong>
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