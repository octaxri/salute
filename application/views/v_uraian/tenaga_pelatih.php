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
              <span class="d-ib">DATA KOMENTAR / SARAN TENAGA PELATIH</span>
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
                  <strong>Daftar Komentar Tenaga Pelatih</strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Pelatihan</th>
                        <th>Saran / Komentar</th>
                        <th>Nama User</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Kode Pelatihan</th>
                        <th>Saran / Komentar</th>
                        <th>Nama User</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach($pelatih as $i){ ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['kd_pelatihan']; ?></td>
                        <td><?= $i['jawaban']; ?></td>
                        <td><?= $i['nama']; ?></td>
                        <!-- <td class="text-center">
                          <a class="badge badge-success" href="" data-toggle="modal"><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td> -->
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


