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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>JK</th>
                        <th>Tanggal Lahir</th>
                        <th>Tipe Peserta</th>
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>JK</th>
                        <th>Tanggal Lahir</th>
                        <th>Tipe Peserta</th>
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach($data as $i){ ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['nama']; ?></td>
                        <td><?= $i['email']; ?></td>
                        <td><?= $i['jk']; ?></td>
                        <td><?= $i['tgl_lahir']; ?></td>
                        <td><?= $i['tipe_peserta']; ?></td>
                        <td><?= $i['pendidikan']; ?></td>
                        <td><?= $i['pekerjaan']; ?></td>
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


