<div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Detail Pelatihan</span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
            </h1>
            <hr>
          </div>
          <div class="row gutter-xs">
            <div class="col-md-6 col-lg-3 col-lg-push-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-primary circle sq-48">
                        <span class="icon icon-envelope"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Jawaban Masuk</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">0</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-push-3">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-danger circle sq-48">
                        <span class="icon icon-universal-access"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Pengajar</h6>
                      <h3 class="media-heading">
                        <span class="fw-l"><?= $jml_pengajar; ?></span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-pull-3">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-primary circle sq-48">
                        <span class="icon icon-users"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Peserta</h6>
                      <h3 class="media-heading">
                        <span class="fw-l"><?= $jml_peserta; ?></span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-danger circle sq-48">
                        <span class="icon icon-server"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Jenis Kuisioner</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">3</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <!--  -->
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>DAFTAR MENU</strong>
                </div>
                <div class="card-body">
                <table id="demo-datatables-colreorder-2" class="table table-hover table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="10%">No</th>
                        <th>Menu</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Data Peserta</td>
                            <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>pelatihan/detail_pelatihan2/1/<?= $kd_pelatihan; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Data Pengajar</td>
                            <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>pelatihan/detail_pelatihan2/2/<?= $kd_pelatihan; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kuisioner A</td>
                            <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>pelatihan/detail_pelatihan2/3/<?= $kd_pelatihan; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Kuisioner B</td>
                            <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>pelatihan/detail_pelatihan2/4/<?= $kd_pelatihan; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Kuisioner C</td>
                            <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>pelatihan/detail_pelatihan2/5"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <!--  -->
        </div>
      </div>