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

          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>rekap_kejuruan/in_detail_kejuruan/<?= $kejuruan; ?>"><span class="icon icon-backward"></span></a> LAPORAN PER KEJURUAN : <?= $detail_kejuruan['nama_kejuruan']; ?></span>
            </h1>
          </div>
          <hr>
          <!--  -->
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Detail Menu Kuisioner C</strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <br>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Menu</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>REKRUITMEN, PERJALANAN, DAN PERSYARATAN PESERTA</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_kejuruan/kuisioner_c_rekruitmen/<?= $kejuruan; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>PENYAMBUTAN, PEMBAGIAN KAMAR PESERTA</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_kejuruan/kuisioner_c_kamar/<?= $kejuruan; ?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>SARANA DAN PRASARANA ASRAMA</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_kejuruan/kuisioner_c_sarpras/<?=$kejuruan;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>KONSUMSI</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_kejuruan/kuisioner_c_konsumsi/<?= $kejuruan;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>

                        <tr>
                          <td>5</td>
                          <td>PELAKSANAAN UJI KOMPETENSI</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_kejuruan/kuisioner_c_uji_kompetensi/<?= $kejuruan;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td>SECARA UMUM PELATIHAN</td>
                          <td class="text-center"><a class="badge badge-primary" href="<?= base_url(); ?>rekap_kejuruan/kuisioner_c_secara_umum/<?= $kejuruan;?>"><span class="icon icon-eye"></span> Detail</a></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                  </div>

                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>
                    
        </div>
      </div>


 