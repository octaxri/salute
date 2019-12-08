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
              <button class="btn btn-info" data-toggle="modal" data-target="#modalSignUpSm" type="button">(+) Tambah Data</button>
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
                <table id="demo-datatables-colreorder-2" class="table table-hover table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="7%">No</th>
                        <th>Kode</th>
                        <th>Kejuruan</th>
                        <th>Program</th>
                        <th>Waktu Pelatihan</th>
                        <th>Tahap</th>
                        <th>Kelas</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Kejuruan</th>
                        <th>Program</th>
                        <th>Waktu Pelatihan</th>
                        <th>Tahap</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach($data as $i){ ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['kd_pelatihan']; ?></td>
                        <td><?= $i['nama_kejuruan']; ?></td>
                        <td><?= $i['nama_program'];  ?></td>
                        <td><?= $i['tgl_mulai_pelatihan']; ?> - <?= $i['tgl_akhir_pelatihan']; ?></td>
                        <td><?= $i['tahap_pelatihan']; ?></td>
                        <td><?= $i['kelas_pelatihan']; ?></td>
                        <td class="text-center">
                          <a class="badge badge-primary" href="<?= base_url(); ?>pelatihan/detail_pelatihan/<?= $i['kd_pelatihan']; ?>"><span class="icon icon-eye"></span> Detail</a>
                          <a class="badge badge-success" href="#modal-edit<?= $i['kd_pelatihan']; ?>" data-toggle="modal"><span class="icon icon-edit"></span> Edit</a>
                          <a class="badge badge-danger" href="#modal-hapus<?= $i['kd_pelatihan']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
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
    <div id="modalSignUpSm" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data Pelatihan</h4>
        </div>
        <div class="modal-body">
         <?php echo form_open('Pelatihan/tambah_data');?>
           
            <div class="form-group">
                    <label for="kejuruan" class="form-control-label">Kejuruan *</label>
                    <select name="kejuruan" id="kejuruan" class="form-control" required>
                        <option value="">----- Pilih ------</option>
                        <?php foreach($kejuruan as $k){ ?>
                            <option value="<?= $k['id_kejuruan']; ?>"><?= strtoupper($k['nama_kejuruan']); ?></option>
                        <?php } ?>
                    </select>
            </div>

            <div class="form-group">
                    <label for="program" class="form-control-label">Program *</label>
                    <select name="program" id="program" class="form-control" required>
                        <option value="" style="display:none;">Silahkan pilih kejuruan terlebih dahulu</option>
                    </select>
            </div>

            <div class="form-group">
              <label class="control-label" for="tahap_pelatihan">Tahap Pelatihan</label>
              <input class="form-control" type="number" name="tahap_pelatihan" id="tahap_pelatihan" required="">
            </div>

            <div class="form-group">
              <label class="control-label" for="kelas_pelatihan">Kelas Pelatihan</label>
              <input class="form-control" type="number" name="kelas_pelatihan" id="kelas_pelatihan" required="">
            </div>

            <div class="form-group">
              <label class="control-label" for="tgl_mulai">Tanggal Mulai Pelatihan</label>
              <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai" required="">
            </div>

            <div class="form-group">
              <label class="control-label" for="tgl_akhir">Tanggal Akhir Pelatihan</label>
              <input class="form-control" type="date" name="tgl_akhir" id="tgl_akhir" required="">
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
     <div id="modal-edit<?= $x['kd_pelatihan'] ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Pelatihan</h4>
        </div>
        <div class="modal-body">
         <?php echo form_open('Pelatihan/edit_data');?>
         <input type="hidden" value="<?= $x['kd_pelatihan']; ?>" name="id" class="form-control" >
           
          <div class="form-group">
                <label for="kejuruan" class="form-control-label">Kompartemen *</label>
                <select name="kejuruan" id="edit_kejuruan" class="form-control" required>
                    <?php foreach($kejuruan as $k){ ?>
                        <?php if($k['id_kejuruan'] == $x['id_kejuruan']){ ?>
                            <option value="<?= $k['id_kejuruan']; ?>" selected><?= strtoupper($k['nama_kejuruan']); ?></option>
                        <?php }else{?>
                            <option value="<?= $k['id_kejuruan']; ?>"><?= strtoupper($k['nama_kejuruan']); ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="program" class="form-control-label">Program *</label>
                <select name="program" id="edit_program" class="form-control" required>
                    <?php foreach($program as $s){ ?>
                        <?php if($s['id_program'] == $x['id_program']){ ?>
                            <option value="<?= $s['id_program']; ?>" selected><?= strtoupper($s['nama_program']); ?></option>
                        <?php }else{?>
                            <option value="<?= $s['id_program']; ?>"><?= strtoupper($s['nama_program']); ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
              <label class="control-label" for="tahap_pelatihan">Tahap Pelatihan</label>
              <input class="form-control" type="number" name="tahap_pelatihan" id="tahap_pelatihan" value="<?= $x['tahap_pelatihan']; ?>" required="">
            </div>

            <div class="form-group">
              <label class="control-label" for="kelas_pelatihan">Kelas Pelatihan</label>
              <input class="form-control" type="number" name="kelas_pelatihan" id="kelas_pelatihan" value="<?= $x['kelas_pelatihan']; ?>"  required="">
            </div>

            <div class="form-group">
              <label class="control-label" for="tgl_mulai">Tanggal Mulai Pelatihan</label>
              <input class="form-control" type="date" name="tgl_mulai" id="tgl_mulai" required="">
            </div>

            <div class="form-group">
              <label class="control-label" for="tgl_akhir">Tanggal Akhir Pelatihan</label>
              <input class="form-control" type="date" name="tgl_akhir" id="tgl_akhir" required="">
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
  <?php endforeach;?>
<!-- AKHIR MODAL BOX EDIT DATA -->


<!-- MODAL BOX HAPUS DATA -->
<?php $no=0; foreach($data as $x): $no++; ?>

<div id="modal-hapus<?= $x['kd_pelatihan']; ?>" tabindex="-1" role="dialog" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header bg-primary">
  <h4 class="modal-title">Hapus Data Kejuruan</h4>
</div>
<div class="modal-body">
  <?php echo form_open('Pelatihan/hapus_data');?>
  <input type="hidden" readonly value="<?= $x['kd_pelatihan']; ?>" name="kd_pelatihan" class="form-control" >
    <strong>Apakah Anda Yakin Menghapus Data ?</<strong>
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


<!-- AJAX SELECT DINAMIS -->
<script type="text/javascript">
      $(function(){

      $.ajaxSetup({
      type:"POST",
      url: "<?php echo base_url('pelatihan/ambil_data') ?>",
      cache: false,
      });

      $("#kejuruan").change(function(){

      var value=$(this).val();
      if(value>0){
      $.ajax({
      data:{modul:'program',id:value},
      success: function(respond){
      $("#program").html(respond);
      }
      })
      }

      });


      })

</script>


<script type="text/javascript">
      $(function(){

      $.ajaxSetup({
      type:"POST",
      url: "<?php echo base_url('pelatihan/ambil_data') ?>",
      cache: false,
      });

      $("#edit_kejuruan").change(function(){

      var value=$(this).val();
      if(value>0){
      $.ajax({
      data:{modul:'program',id:value},
      success: function(respond){
      $("#edit_program").html(respond);
      }
      })
      }

      });


      })

</script>

    <!-- AJAX SELECT DINAMIS -->