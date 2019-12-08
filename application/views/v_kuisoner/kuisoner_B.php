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
              <span class="d-ib">DATA KUISONER B</span>
            </h1>
          </div>
          <hr>
          <div class="text-left m-b">
              <button class="btn btn-info" data-toggle="modal" data-target="#add_kuisoner1" type="button">(+) Tambah Data</button>
          </div>
          <br>
          <!--MATERI PELATIHAN -->
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Materi Pelatihan (kurikulum silabus dan modul)<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B</th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B/th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data as $i) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $i['soalB'];?></td>
                        <td><?= $i['jawaban1B']; ?></td>
                        <td><?= $i['jawaban2B']; ?></td>
                        <td><?= $i['jawaban3B']; ?></td>
                        <td><?= $i['jawaban4B']; ?></td>
                        <td><?= $i['jawaban5B']; ?></td>
                        <td><?= $i['tipe_soal']; ?></td>
                        <td><?= $i['nama_sub_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit1<?= $i['id_kuisionerB']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus1<?= $i['id_kuisionerB']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
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
            <!--TENAGA PELATIH -->
            <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Tenaga Pelatih<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-1" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B</th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B</th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data1 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalB'];?></td>
                        <td><?= $u['jawaban1B']; ?></td>
                        <td><?= $u['jawaban2B']; ?></td>
                        <td><?= $u['jawaban3B']; ?></td>
                        <td><?= $u['jawaban4B']; ?></td>
                        <td><?= $u['jawaban5B']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        <td><?= $u['nama_sub_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit2<?= $u['id_kuisionerB']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus2<?= $u['id_kuisionerB']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR TABEL TENAGA PELATIH -->

          <br>
            <br>
            <!--Sarana Prasarana -->
            <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Sarana dan Prasarana<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-responsive-1" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B</th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B</th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data2 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalB'];?></td>
                        <td><?= $u['jawaban1B']; ?></td>
                        <td><?= $u['jawaban2B']; ?></td>
                        <td><?= $u['jawaban3B']; ?></td>
                        <td><?= $u['jawaban4B']; ?></td>
                        <td><?= $u['jawaban5B']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        <td><?= $u['nama_sub_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit3<?= $u['id_kuisionerB']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus3<?= $u['id_kuisionerB']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR TABEL SARANA PRASARANA -->

          <br>
            <br>
            <!--BAHAN PELATIHAN -->
            <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Bahan Latihan, Modul, ATK, dan Seragam Peserta<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-responsive-2" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B</th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B</th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data3 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalB'];?></td>
                        <td><?= $u['jawaban1B']; ?></td>
                        <td><?= $u['jawaban2B']; ?></td>
                        <td><?= $u['jawaban3B']; ?></td>
                        <td><?= $u['jawaban4B']; ?></td>
                        <td><?= $u['jawaban5B']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        <td><?= $u['nama_sub_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit4<?= $u['id_kuisionerB']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus4<?= $u['id_kuisionerB']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR TABEL BAHAN PELATIHAN -->

          <br>
            <br>
            <!--UNIT KOMPETENSI -->
            <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Unit Kompetensi<strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-scroller-1" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%">No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B</th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th width="25%">Aksi</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban1B</th>
                        <th>Jawaban2B</th>
                        <th>Jawaban3B</th>
                        <th>Jawaban4B</th>
                        <th>Jawaban5B</th>
                        <th>Tipe Soal</th>
                        <th>Sub Soal</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php $no=1; foreach ($data4 as $u) 
                    {
                      
                    ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['soalB'];?></td>
                        <td><?= $u['jawaban1B']; ?></td>
                        <td><?= $u['jawaban2B']; ?></td>
                        <td><?= $u['jawaban3B']; ?></td>
                        <td><?= $u['jawaban4B']; ?></td>
                        <td><?= $u['jawaban5B']; ?></td>
                        <td><?= $u['tipe_soal']; ?></td>
                        <td><?= $u['nama_sub_soal']; ?></td>
                        
                        <td class="text-center">
                          <a class="badge badge-success" href="#modal-edit5<?= $u['id_kuisionerB']; ?>" data-toggle="modal" ><span class="icon icon-edit"></span> Edit</a> ||
                          <a class="badge badge-danger" href="#modal-hapus5<?= $u['id_kuisionerB']; ?>" data-toggle="modal"><span class="icon icon-trash-o"></span> Hapus</a>
                        </td>
                      </tr>

                    <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR TABEL UNIT KOMPETISI -->

        </div>
      </div>

    <!-- MODAL BOX MATERI PELATIHAN -->

    <!-- MODAL BOX TAMBAH DATA -->
    <div id="add_kuisoner1" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah Data Kuisoner B</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/tambah_data');?>

            <div class="form-group">
                <label for="jenis_soal">Jenis Soal </label>
                    <select required class="form-control" id="jenis_soal" name="jenis_soal">
                        <option value="">-- Pilih Jenis Soal --</option>
                        <option value="1">Materi Pelatihan</option>
                        <option value="2">Tenaga Pelatih</option>
                        <option value="3">Sarana dan Prasarana</option>
                        <option value="4">Bahan Latihan, Modul, ATK, dan Seragam Peserta</option>
                        <option value="5">Unit Kompetensi</option>
                    </select>
            </div>

          <div class="form-group">
              <label class="control-label">Soal B</label>
              <textarea class="form-control" rows="5" name="soalB" id="soalB" required></textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban1B</label>
              <input class="form-control" type="text" name="jawaban1B"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban2B</label>
              <input class="form-control" type="text" name="jawaban2B"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban3B</label>
              <input class="form-control" type="text" name="jawaban3B"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban4B</label>
              <input class="form-control" type="text" name="jawaban4B"  required>
            </div>

            <div class="form-group">
              <label class="control-label">Jawaban5B</label>
              <input class="form-control" type="text" name="jawaban5B"  required>
            </div>

            <div class="form-group">
                <label for="tipe_soal">Tipe Soal </label>
                    <select required name="tipe_soal" class="form-control" id="tipe_soal">
                        <option value="">-- Pilih Tipe Soal</option>
                        <option value="pg">PG</option>
                        <option value="uraian">Uraian</option>
                    </select>
            </div>            

            <div class="form-group">
                <label for="sub_soal">Sub Soal</label>
                    <select required name="sub_soal" class="form-control" id="sub_soal">
                        <option value="">-- Pilih Sub Soal --</option>
                        <?php foreach($sub as $x) 
                          { 
                            $id=$x['id_sub_soal'];
                            $nm=$x['nama_sub_soal'];
                            ?>

                              <option value="<?php echo $id;?>"><?php echo $nm ; ?></option>
                          

                          <?php }?>
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

        <div id="modal-edit1<?= $x['id_kuisionerB'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Materi Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >

          <div class="form-group">
              <label class="control-label">Soal B</label>
              <textarea class="form-control" rows="5" name="soalB" id="soalB" required><?= $x['soalB'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1B</label>
              <input class="form-control" type="text" name="jawaban1B" value="<?=$x['jawaban1B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2B</label>
              <input class="form-control" type="text" name="jawaban2B" value="<?=$x['jawaban2B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3B</label>
              <input class="form-control" type="text" name="jawaban3B" value="<?=$x['jawaban3B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4B</label>
              <input class="form-control" type="text" name="jawaban4B" value="<?=$x['jawaban4B']?>"  required>
          </div>
          
          <div class="form-group">
              <label class="control-label">Jawaban5B</label>
              <input class="form-control" type="text" name="jawaban5B" value="<?=$x['jawaban5B']?>"  required>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Sub Soal</label>
                <select class="form-control" name="sub_soal" id="sub_soal" required>
                <?php foreach ($sub as $k2) 
                    {
                                    $id_kat=$k2['id_sub_soal'];
                                    $nm_kej=$k2['nama_sub_soal'];
                                    if($id_kat==$x['id_sub_soal'])
                                        echo "<option value='$id_kat' selected>$nm_kej</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kej</option>";
                                }
                                ?>
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
            <div id="modal-hapus1<?= $x['id_kuisionerB']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Materi Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalB']?></b>" ?</strong>
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

        <div id="modal-edit2<?= $x['id_kuisionerB'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Tenaga Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >
          
          <div class="form-group">
              <label class="control-label">Soal B</label>
              <textarea class="form-control" rows="5" name="soalB" id="soalB" required><?= $x['soalB'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1B</label>
              <input class="form-control" type="text" name="jawaban1B" value="<?=$x['jawaban1B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2B</label>
              <input class="form-control" type="text" name="jawaban2B" value="<?=$x['jawaban2B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3B</label>
              <input class="form-control" type="text" name="jawaban3B" value="<?=$x['jawaban3B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4B</label>
              <input class="form-control" type="text" name="jawaban4B" value="<?=$x['jawaban4B']?>"  required>
          </div>
          
          <div class="form-group">
              <label class="control-label">Jawaban5B</label>
              <input class="form-control" type="text" name="jawaban5B" value="<?=$x['jawaban5B']?>"  required>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Sub Soal</label>
                <select class="form-control" name="sub_soal" id="sub_soal" required>
                <?php foreach ($sub as $k2) 
                    {
                                    $id_kat=$k2['id_sub_soal'];
                                    $nm_kej=$k2['nama_sub_soal'];
                                    if($id_kat==$x['id_sub_soal'])
                                        echo "<option value='$id_kat' selected>$nm_kej</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kej</option>";
                                }
                                ?>
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
            <div id="modal-hapus2<?= $x['id_kuisionerB']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Tenaga Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalB']?></b>" ?</strong>
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

        <div id="modal-edit3<?= $x['id_kuisionerB'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Sarana dan Prasarana</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >

          <div class="form-group">
              <label class="control-label">Soal B</label>
              <textarea class="form-control" rows="5" name="soalB" id="soalB" required><?= $x['soalB'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1B</label>
              <input class="form-control" type="text" name="jawaban1B" value="<?=$x['jawaban1B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2B</label>
              <input class="form-control" type="text" name="jawaban2B" value="<?=$x['jawaban2B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3B</label>
              <input class="form-control" type="text" name="jawaban3B" value="<?=$x['jawaban3B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4B</label>
              <input class="form-control" type="text" name="jawaban4B" value="<?=$x['jawaban4B']?>"  required>
          </div>
          
          <div class="form-group">
              <label class="control-label">Jawaban5B</label>
              <input class="form-control" type="text" name="jawaban5B" value="<?=$x['jawaban5B']?>"  required>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Sub Soal</label>
                <select class="form-control" name="sub_soal" id="sub_soal" required>
                <?php foreach ($sub as $k2) 
                    {
                                    $id_kat=$k2['id_sub_soal'];
                                    $nm_kej=$k2['nama_sub_soal'];
                                    if($id_kat==$x['id_sub_soal'])
                                        echo "<option value='$id_kat' selected>$nm_kej</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kej</option>";
                                }
                                ?>
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
            <div id="modal-hapus3<?= $x['id_kuisionerB']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Sarana dan Prasarana</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalB']?></b>" ?</strong>
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

        <div id="modal-edit4<?= $x['id_kuisionerB'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Bahan Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >
          
          <div class="form-group">
              <label class="control-label">Soal B</label>
              <textarea class="form-control" rows="5" name="soalB" id="soalB" required><?= $x['soalB'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1B</label>
              <input class="form-control" type="text" name="jawaban1B" value="<?=$x['jawaban1B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2B</label>
              <input class="form-control" type="text" name="jawaban2B" value="<?=$x['jawaban2B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3B</label>
              <input class="form-control" type="text" name="jawaban3B" value="<?=$x['jawaban3B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4B</label>
              <input class="form-control" type="text" name="jawaban4B" value="<?=$x['jawaban4B']?>"  required>
          </div>
          
          <div class="form-group">
              <label class="control-label">Jawaban5B</label>
              <input class="form-control" type="text" name="jawaban5B" value="<?=$x['jawaban5B']?>"  required>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Sub Soal</label>
                <select class="form-control" name="sub_soal" id="sub_soal" required>
                <?php foreach ($sub as $k2) 
                    {
                                    $id_kat=$k2['id_sub_soal'];
                                    $nm_kej=$k2['nama_sub_soal'];
                                    if($id_kat==$x['id_sub_soal'])
                                        echo "<option value='$id_kat' selected>$nm_kej</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kej</option>";
                                }
                                ?>
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
            <div id="modal-hapus4<?= $x['id_kuisionerB']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Bahan Pelatihan</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalB']?></b>" ?</strong>
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

        <div id="modal-edit5<?= $x['id_kuisionerB'];?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Data Unit Kompetensi</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/edit_data'); ?> 
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >
          
          <div class="form-group">
              <label class="control-label">Soal B</label>
              <textarea class="form-control" rows="5" name="soalB" id="soalB" required><?= $x['soalB'];?></textarea>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban1B</label>
              <input class="form-control" type="text" name="jawaban1B" value="<?=$x['jawaban1B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban2B</label>
              <input class="form-control" type="text" name="jawaban2B" value="<?=$x['jawaban2B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban3B</label>
              <input class="form-control" type="text" name="jawaban3B" value="<?=$x['jawaban3B']?>"  required>
          </div>

          <div class="form-group">
              <label class="control-label">Jawaban4B</label>
              <input class="form-control" type="text" name="jawaban4B" value="<?=$x['jawaban4B']?>"  required>
          </div>
          
          <div class="form-group">
              <label class="control-label">Jawaban5B</label>
              <input class="form-control" type="text" name="jawaban5B" value="<?=$x['jawaban5B']?>"  required>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Tipe Soal</label>
                <select class="form-control" name="tipe_soal" id="tipe_soal" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="pg">PG</option>
                    <option value="uraian">Uraian</option>
                </select>
          </div>

          <div class="form-group">
                <label for="tipe_soal">Sub Soal</label>
                <select class="form-control" name="sub_soal" id="sub_soal" required>
                <?php foreach ($sub as $k2) 
                    {
                                    $id_kat=$k2['id_sub_soal'];
                                    $nm_kej=$k2['nama_sub_soal'];
                                    if($id_kat==$x['id_sub_soal'])
                                        echo "<option value='$id_kat' selected>$nm_kej</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kej</option>";
                                }
                                ?>
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
            <div id="modal-hapus5<?= $x['id_kuisionerB']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Hapus Data Unit Kompetensi</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Kuisoner_b/hapus_data'); ?>
          <input type="hidden" readonly value="<?= $x['id_kuisionerB']; ?>" name="id_kuisionerB" class="form-control" >

          <p>Apakah Anda Yakin Menghapus Data "<b><?=$x['soalB']?></b>" ?</strong>
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