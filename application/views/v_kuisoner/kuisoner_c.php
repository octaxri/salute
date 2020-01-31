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
              <span class="d-ib">DATA KUISONER C</span>
            </h1>
          </div>
          <hr>
          <div class="text-left m-b">
              <button class="btn btn-info" data-toggle="modal" data-target="#add_kuisoner1" type="button">(+) Tambah Data</button>
          </div>
          <br>
          <!--BERKENAAN DENGAN REKRUITMEN, PERJALANAN, DAN PERSYARATAN PESERTA -->
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>BERKENAAN DENGAN REKRUITMEN, PERJALANAN, DAN PERSYARATAN PESERTA<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data as $i) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['soalC'];?></td>
                        <td><?= $i['jawaban1C']; ?></td>
                        <td><?= $i['jawaban2C']; ?></td>
                        <td><?= $i['jawaban3C']; ?></td>
                        <td><?= $i['jawaban4C']; ?></td>
                        <td><?= $i['tipe_soal']; ?></td>

                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit1<?= $i['id_kuisionerC']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus1<?= $i['id_kuisionerC']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
            <br>
            <br>
            <!-- BERKENAAN DENGAN PENYAMBUTAN, PEMBAGIAN KAMAR PESERTA -->
            <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>BERKENAAN DENGAN PENYAMBUTAN, PEMBAGIAN KAMAR PESERTA<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-1" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>

                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data1 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalC'];?></td>
                        <td><?= $u['jawaban1C']; ?></td>
                        <td><?= $u['jawaban2C']; ?></td>
                        <td><?= $u['jawaban3C']; ?></td>
                        <td><?= $u['jawaban4C']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit2<?= $u['id_kuisionerC']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus2<?= $u['id_kuisionerC']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR TABEL BERKENAAN DENGAN PENYAMBUTAN, PEMBAGIAN KAMAR PESERTA -->

          <br>
            <br>
            <!--BERKENAAN DENGAN SARANA DAN PRASARANA -->
            <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>BERKENAAN DENGAN SARANA DAN PRASARANA<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-fixedheader-2" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="5%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data2 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalC'];?></td>
                        <td><?= $u['jawaban1C']; ?></td>
                        <td><?= $u['jawaban2C']; ?></td>
                        <td><?= $u['jawaban3C']; ?></td>
                        <td><?= $u['jawaban4C']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit3<?= $u['id_kuisionerC']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus3<?= $u['id_kuisionerC']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR TABEL BERKENAAN DENGAN SARANA DAN PRASARANA -->

          <br>
            <br>
            <!--BERKENAAN DENGAN KONSUMSI-->
            <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>BERKENAAN DENGAN KONSUMSI<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-fixedheader-1" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="5%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data3 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalC'];?></td>
                        <td><?= $u['jawaban1C']; ?></td>
                        <td><?= $u['jawaban2C']; ?></td>
                        <td><?= $u['jawaban3C']; ?></td>
                        <td><?= $u['jawaban4C']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit4<?= $u['id_kuisionerC']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus4<?= $u['id_kuisionerC']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR TABEL BERKENAAN DENGAN KONSUMSI -->

          <br>
            <br>
            <!-- BERKENAAN DENGAN BAHAN LATIHAN, MODUL, ATK, DAN SERAGAM PESERTA-->
            <!-- <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>BERKENAAN DENGAN BAHAN LATIHAN, MODUL, ATK, DAN SERAGAM PESERTA<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-scroller-1" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data4 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalC'];?></td>
                        <td><?= $u['jawaban1C']; ?></td>
                        <td><?= $u['jawaban2C']; ?></td>
                        <td><?= $u['jawaban3C']; ?></td>
                        <td><?= $u['jawaban4C']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit5<?= $u['id_kuisionerC']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus5<?= $u['id_kuisionerC']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          AKHIR TABEL BERKENAAN DENGAN BAHAN LATIHAN, MODUL, ATK, DAN SERAGAM PESERTA -->

          <br>
            <br>
            <!--BERKENAAN DENGAN PELAKSANAAN UJI KOMPETENSI-->
            <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>BERKENAAN DENGAN PELAKSANAAN UJI KOMPETENSI<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-fixedheader-1" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="5%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data5 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalC'];?></td>
                        <td><?= $u['jawaban1C']; ?></td>
                        <td><?= $u['jawaban2C']; ?></td>
                        <td><?= $u['jawaban3C']; ?></td>
                        <td><?= $u['jawaban4C']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit6<?= $u['id_kuisionerC']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus6<?= $u['id_kuisionerC']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR TABEL BERKENAAN DENGAN PELAKSANAAN UJI KOMPETENSI -->

          <br>
            <br>
            <!--SECARA UMUM PELAKSANAAN PELATIHAN-->
            <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>SECARA UMUM PELAKSANAAN PELATIHAN<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-2" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1C</th>
                        <th>Jawaban2C</th>
                        <th>Jawaban3C</th>
                        <th>Jawaban4C</th>
                        <th>Tipe Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data6 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalC'];?></td>
                        <td><?= $u['jawaban1C']; ?></td>
                        <td><?= $u['jawaban2C']; ?></td>
                        <td><?= $u['jawaban3C']; ?></td>
                        <td><?= $u['jawaban4C']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit7<?= $u['id_kuisionerC']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus7<?= $u['id_kuisionerC']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR TABEL SECARA UMUM PELAKSANAAN PELATIHAN -->

        </div>
      </div>

    <!-- MODAL BOX MATERI PELATIHAN -->

    <!-- MODAL BOX TAMBAH DATA -->
    <div id="add_kuisoner1" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data Kuisoner C</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/tambah_data');?>

            <div class="form-group">
                <label for="jenis_soal">Jenis Soal </label>
                    <select required class="form-control" id="jenis_soal" name="jenis_soal">
                        <option value="">-- Pilih Jenis Soal --</option>
                        <option value="1">BERKENAAN DENGAN REKRUITMEN, PERJALANAN, DAN PERSYARATAN PESERTA</option>
                        <option value="2">BERKENAAN DENGAN PENYAMBUTAN, PEMBAGIAN KAMAR PESERTA</option>
                        <option value="3">BERKENAAN DENGAN SARANA DAN PRASARANA</option>
                        <option value="4">BERKENAAN DENGAN KONSUMSI</option>
                        <option value="6">BERKENAAN DENGAN PELAKSANAAN UJI KOMPETENSI</option>
                        <option value="7">SECARA UMUM PELAKSANAAN PELATIHAN</option>
                    </select>
            </div>

          <div class="form-group">
              <label class="control-label">Soal C</label>
              <textarea class="form-control" rows="5" name="soalC" id="soalC" required></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban1C</label>
              <input class="form-control" type="text" name="jawaban1C"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban2C</label>
              <input class="form-control" type="text" name="jawaban2C"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban3C</label>
              <input class="form-control" type="text" name="jawaban3C"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban4C</label>
              <input class="form-control" type="text" name="jawaban4C"  required>
            </div>


            <div class="form-group">
                <label for="tipe_soal">Tipe Soal </label>
                    <select required name="tipe_soal" class="form-control" id="tipe_soal">
                        <option value="">-- Pilih Tipe Soal</option>
                        <option value="pg">PG</option>
                        <option value="uraian">Uraian</option>
                    </select>
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

        <div id="modal-edit1<?= $x['id_kuisionerC'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Materi Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >

          <div class="form-group">
              <label class="control-label">Soal C</label>
              <textarea class="form-control" rows="5" name="soalC" id="soalC" required><?= $x['soalC'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1C</label>
              <input class="form-control" type="text" name="jawaban1C" value="<?=$x['jawaban1C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2C</label>
              <input class="form-control" type="text" name="jawaban2C" value="<?=$x['jawaban2C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3C</label>
              <input class="form-control" type="text" name="jawaban3C" value="<?=$x['jawaban3C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4C</label>
              <input class="form-control" type="text" name="jawaban4C" value="<?=$x['jawaban4C']?>"  required>
          </div>
          

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
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
            <div id="modal-hapus1<?= $x['id_kuisionerC']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Materi Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_B/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalC']?></b>" ?</strong>
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
      <!-- AKHIR MODAL BOX MATERI PELATIHAN -->


        <!-- MODAL BOX TENAGA PELATIHAN -->

        <!-- MODAL BOX EDIT DATA -->
        <?php $no=0; foreach($data1 as $x): $no++; ?>

        <div id="modal-edit2<?= $x['id_kuisionerC'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data BERKENAAN DENGAN PENYAMBUTAN, PEMBAGIAN KAMAR PESERTA</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >
          
          <div class="form-group">
              <label class="control-label">Soal B</label>
              <textarea class="form-control" rows="5" name="soalC" id="soalC" required><?= $x['soalC'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1C</label>
              <input class="form-control" type="text" name="jawaban1C" value="<?=$x['jawaban1C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2C</label>
              <input class="form-control" type="text" name="jawaban2C" value="<?=$x['jawaban2C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3C</label>
              <input class="form-control" type="text" name="jawaban3C" value="<?=$x['jawaban3C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4C</label>
              <input class="form-control" type="text" name="jawaban4C" value="<?=$x['jawaban4C']?>"  required>
          </div>
          
      

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
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
            <?php $no=0; foreach($data1 as $x): $no++; ?>
            <div id="modal-hapus2<?= $x['id_kuisionerC']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data BERKENAAN DENGAN PENYAMBUTAN, PEMBAGIAN KAMAR PESERTA</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalC']?></b>" ?</strong>
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
      <!-- AKHIR MODAL BOX TENAGA PELATIH -->

              <!-- MODAL BOX SARANA DAN PRASARANA-->

        <!-- MODAL BOX EDIT DATA -->
        <?php $no=0; foreach($data2 as $x): $no++; ?>

        <div id="modal-edit3<?= $x['id_kuisionerC'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data BERKENAAN DENGAN SARANA DAN PRASARANA</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >

          <div class="form-group">
              <label class="control-label">Soal C</label>
              <textarea class="form-control" rows="5" name="soalC" id="soalC" required><?= $x['soalC'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1C</label>
              <input class="form-control" type="text" name="jawaban1C" value="<?=$x['jawaban1C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2C</label>
              <input class="form-control" type="text" name="jawaban2C" value="<?=$x['jawaban2C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3C</label>
              <input class="form-control" type="text" name="jawaban3C" value="<?=$x['jawaban3C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4C</label>
              <input class="form-control" type="text" name="jawaban4C" value="<?=$x['jawaban4C']?>"  required>
          </div>
          

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
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
            <?php $no=0; foreach($data2 as $x): $no++; ?>
            <div id="modal-hapus3<?= $x['id_kuisionerC']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data BERKENAAN DENGAN SARANA DAN PRASARANA</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalC']?></b>" ?</strong>
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
      <!-- AKHIR MODAL BOX SARANA DAN PRASARANA-->

                  <!-- MODAL BOX BAHAN PELATIHAN-->

        <!-- MODAL BOX EDIT DATA -->
        <?php $no=0; foreach($data3 as $x): $no++; ?>

        <div id="modal-edit4<?= $x['id_kuisionerC'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data BERKENAAN DENGAN KONSUMSI</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >
          
          <div class="form-group">
              <label class="control-label">Soal C</label>
              <textarea class="form-control" rows="5" name="soalC" id="soalC" required><?= $x['soalC'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1C</label>
              <input class="form-control" type="text" name="jawaban1C" value="<?=$x['jawaban1C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2C</label>
              <input class="form-control" type="text" name="jawaban2C" value="<?=$x['jawaban2C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3C</label>
              <input class="form-control" type="text" name="jawaban3C" value="<?=$x['jawaban3C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4C</label>
              <input class="form-control" type="text" name="jawaban4C" value="<?=$x['jawaban4C']?>"  required>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
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
            <?php $no=0; foreach($data3 as $x): $no++; ?>
            <div id="modal-hapus4<?= $x['id_kuisionerC']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data BERKENAAN DENGAN KONSUMSI</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalC']?></b>" ?</strong>
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
      <!-- AKHIR MODAL BOX BAHAN PELATIHAN-->


      <!-- MODAL BOX UNIT KOMPETENSI-->

        <!-- MODAL BOX EDIT DATA -->
        <?php $no=0; foreach($data4 as $x): $no++; ?>

        <div id="modal-edit5<?= $x['id_kuisionerC'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data BERKENAAN DENGAN BAHAN LATIHAN, MODUL, ATK, DAN SERAGAM PESERTA</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >
          
          <div class="form-group">
              <label class="control-label">Soal C</label>
              <textarea class="form-control" rows="5" name="soalC" id="soalC" required><?= $x['soalC'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1C</label>
              <input class="form-control" type="text" name="jawaban1C" value="<?=$x['jawaban1C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2C</label>
              <input class="form-control" type="text" name="jawaban2C" value="<?=$x['jawaban2C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3C</label>
              <input class="form-control" type="text" name="jawaban3C" value="<?=$x['jawaban3C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4C</label>
              <input class="form-control" type="text" name="jawaban4C" value="<?=$x['jawaban4C']?>"  required>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
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
            <?php $no=0; foreach($data4 as $x): $no++; ?>
            <div id="modal-hapus5<?= $x['id_kuisionerC']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data BERKENAAN DENGAN BAHAN LATIHAN, MODUL, ATK, DAN SERAGAM PESERTA</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalC']?></b>" ?</strong>
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
      <!-- AKHIR MODAL BOX KOMPENTENSI-->

           <!-- MODAL BOX UNIT KOMPETENSI-->

        <!-- MODAL BOX EDIT DATA -->
        <?php $no=0; foreach($data5 as $x): $no++; ?>

        <div id="modal-edit6<?= $x['id_kuisionerC'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data BERKENAAN DENGAN PELAKSANAAN UJI KOMPETENSI</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >
          
          <div class="form-group">
              <label class="control-label">Soal C</label>
              <textarea class="form-control" rows="5" name="soalC" id="soalC" required><?= $x['soalC'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1C</label>
              <input class="form-control" type="text" name="jawaban1C" value="<?=$x['jawaban1C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2C</label>
              <input class="form-control" type="text" name="jawaban2C" value="<?=$x['jawaban2C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3C</label>
              <input class="form-control" type="text" name="jawaban3C" value="<?=$x['jawaban3C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4C</label>
              <input class="form-control" type="text" name="jawaban4C" value="<?=$x['jawaban4C']?>"  required>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
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
            <?php $no=0; foreach($data5 as $x): $no++; ?>
            <div id="modal-hapus6<?= $x['id_kuisionerC']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data BERKENAAN DENGAN PELAKSANAAN UJI KOMPETENSI</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalC']?></b>" ?</strong>
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
      <!-- AKHIR MODAL BOX KOMPENTENSI-->

           <!-- MODAL BOX UNIT KOMPETENSI-->

        <!-- MODAL BOX EDIT DATA -->
        <?php $no=0; foreach($data6 as $x): $no++; ?>

        <div id="modal-edit7<?= $x['id_kuisionerC'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data SECARA UMUM PELAKSANAAN PELATIHAN</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >
          
          <div class="form-group">
              <label class="control-label">Soal C</label>
              <textarea class="form-control" rows="5" name="soalC" id="soalC" required><?= $x['soalC'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1C</label>
              <input class="form-control" type="text" name="jawaban1C" value="<?=$x['jawaban1C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2C</label>
              <input class="form-control" type="text" name="jawaban2C" value="<?=$x['jawaban2C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3C</label>
              <input class="form-control" type="text" name="jawaban3C" value="<?=$x['jawaban3C']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4C</label>
              <input class="form-control" type="text" name="jawaban4C" value="<?=$x['jawaban4C']?>"  required>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
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
            <?php $no=0; foreach($data6 as $x): $no++; ?>
            <div id="modal-hapus7<?= $x['id_kuisionerC']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data SECARA UMUM PELAKSANAAN PELATIHAN</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_c/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerC']; ?>" name="id_kuisionerC" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalC']?></b>" ?</strong>
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
      <!-- AKHIR MODAL BOX KOMPENTENSI-->