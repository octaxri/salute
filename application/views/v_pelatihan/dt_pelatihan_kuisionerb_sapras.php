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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>pelatihan/detail_pelatihan/<?= $kd_pelatihan; ?>"><span class="icon icon-backward"></span></a> DETAIL KUISIONER B SARANA DAN PRASARANA | Kejuruan <?= $data1['nama_kejuruan']; ?>, Program <?= $data1['nama_program']; ?></span>
            </h1>
          </div>
          <hr>
          <br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Hasil Nilai Responden SARANA DAN PRASARANA</strong>
                </div>
                <div class="card-body">
                    <!-- IISI -->
                    <center>
                        <a href="" class="btn btn-danger icon icon-file-pdf-o"> PDF</a> | <a href="" class="btn btn-success icon icon-file-excel-o"> Excel</a>
                        
                    </center>
                    <br><br>

                    <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2" width="15">No Responden</th>
                          <th colspan="4" class="text-center">Workshop / Bengkel</th>
                        </tr>
                        <tr>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>4</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>4</td>
                          <td>4</td>
                          <td>4</td>
                          <td>3</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>5</td>
                          <td>4</td>
                          <td>4</td>
                          <td>3</td>
                        </tr>
                        <tr>
                          <td>Jumlah</td>
                          <td>5</td>
                          <td>4</td>
                          <td>4</td>
                          <td>3</td>
                        </tr>
                        <tr>
                          <td>Nilai Rata-Rata</td>
                          <td>5</td>
                          <td>4</td>
                          <td>4</td>
                          <td>3</td>
                        </tr>
                        <tr>
                          <td>NRR X Bobot</td>
                          <td>5</td>
                          <td>4</td>
                          <td>4</td>
                          <td>3</td>
                        </tr>
                        <tr>
                          <td>Jumlah</td>
                          <td colspan="4" class="text-center"><h4>5</h4></td>
                        </tr>
                        <tr>
                          <td>Jumlah X 20</td>
                          <td colspan="4" class="text-center"><h4>5</h4></td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                
                  </div>
                  <br>
                  <div class="table-responsive">
                    <table>
                        <tr>
                        <td><h4> WORKSHOP / BENGKEL  <td></td><td></td><td>&emsp;=</td></h4></td>
                        </tr>
                        <tr>
                        <td><h4> RUANG TEORI <td></td><td></td><td>&emsp;=</td></h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> LISTRIK <td></td><td></td><td>&emsp;=</td></h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> KAMAR MANDI / TOILET <td></td><td></td><td>&emsp;=</td> </h4></td>
                        </tr>                        
                        <tr>
                        <td><h4> SARANA PENUNJANG <td></td><td></td><td>&emsp;=</td> </h4></td>
                        </tr>
                        <tr>
                        <td><h4> RATA-RATA <td></td><td></td><td>&emsp;=</td> </h4></td>
                        </tr>
                    </table>
                    </div>
                    <!-- AKHIR ISI -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>