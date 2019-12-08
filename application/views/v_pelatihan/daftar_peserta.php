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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>pelatihan/detail_pelatihan/<?= $kd_pelatihan; ?>"><span class="icon icon-backward"></span></a> DATA PESERTA PELATIHAN</span>
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
                  <strong>Daftar Peserta Pelatihan</strong>
                </div>
                <div class="card-body">
                <table id="demo-datatables-colreorder-2" class="table table-hover table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Nama Peserta</th>
                        <th width="20%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach($data as $i){ ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['nama']; ?></td>
                        <td class="text-center">
                          <a class="badge badge-danger" href="#hapus_data<?= $i['id']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
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


    <!-- MODAL BOX HAPUS DATA -->
    <?php $no=0; foreach($data as $x): $no++; ?>

    <div id="hapus_data<?= $x['id']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header bg-primary">
    <h4 class="modal-title">Hapus Data Peserta</h4>
    </div>
    <div class="modal-body">
    <?php echo form_open('Pelatihan/hapus_peserta_pelatihan');?>
    <input type="hidden" readonly value="<?= $x['id']; ?>" name="id" class="form-control" >
    <input type="hidden" readonly value="<?= $kd_pelatihan; ?>" name="kd_pelatihan" class="form-control" >

        <strong>Apakah Anda Yakin Menghapus Data ?</strong>
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
