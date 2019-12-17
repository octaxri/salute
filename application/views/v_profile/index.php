<!-- MAIN CONTENT -->
<div class="layout-content"> 
        <div class="layout-content-body">
        <!-- FLASH DATA -->    
        <?php 
        $dat = $this->session->flashdata('msg');
            if($dat!=""){ ?>
                    <div id="notifikasi" class="alert alert-success"><strong>Sukses! </strong> <?=$dat;?></div>
        <?php } ?>  
        <!-- AKHIR FLASH DATA -->
        <!-- FLASH DATA -->    
        <?php 
          $dat = $this->session->flashdata('msg2');
              if($dat!=""){ ?>
                    <div id="notifikasi" class="alert alert-warning"><?=$dat;?></div>
          <?php } ?>  
         <!-- AKHIR FLASH DATA -->
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">My Profile</span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
            </h1>
            <p class="title-bar-description">
              <small></small>
            </p>
          </div>
          <hr>
          <div class="row gutter-xs">
            <div class="col-xs-12">
            <div class="container-fluid">
              <!-- Page Heading -->
              <div class="container-fluid">
              <div class="card mb-3 col-lg-8">
              <div class="row no-gutters">
                <div class="col-md-8">
                    <!-- ISI -->
                <br>
                <div class="demo-form-wrapper">
                <div class="form form-horizontal">
                  <?php if($user['is_level'] == 0){ ?>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Nama</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" value="<?= $user['nama']; ?>" readonly>
                    </div>
                  </div>
                  <?php } ?>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Username</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" value="<?= $user['username']; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Email</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" value="<?= $user['email']; ?>" readonly>
                    </div>
                  </div>

                  <?php if($user['is_level'] == 0){ ?>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" value="<?= $user['jk']; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" value="<?= $user['tgl_lahir']; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Pendidikan</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" value="<?= $user['pendidikan']; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Pekerjaan</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" value="<?= $user['pekerjaan']; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Tipe Peserta</label>
                    <div class="col-sm-9">
                      <input id="form-control-1" class="form-control" type="text" value="<?= $user['tipe_peserta']; ?>" readonly>
                    </div>
                  </div>
                  <?php } ?>

                  <br><br>
                  <center>
                  <div class="row">
                    <div class="col-sm-12"><a class="btn-sm btn-primary"  href="#modal-edit<?= $user['id_user']; ?>" data-toggle="modal"><span class="fas fa-fw fa-edit"></span>Ubah Profile</a> | <a class="btn-sm btn-primary" href="#modal-password<?= $user['id_user']; ?>" data-toggle="modal"><span class="fas fa-fw fa-edit"></span>Ganti Password</a></div>
                  </div>
                  </center>
    
                </div>
              </div>
              
                    <!-- AKHIR ISI -->
                </div>
              </div>
              </div>
        
              </div>
              <!--  -->
            </div>
          </div>
        </div>
      </div>


         <!-- MODAL BOX UBAH PROFILE -->
    <div id="modal-edit<?= $user['id_user']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Profile</h4>
        </div>
        <div class="modal-body">
        <?php echo form_open('Profile/edit_profile') ?>
        <input type="hidden" readonly value="<?= $user['id_user']; ?>" name="id" class="form-control" >
           <?php if($this->session->userdata('level') == 0){ ?>
            <div class="form-group">
              <label class="control-label" for="nama">Nama</label>
              <input class="form-control" id="nama" type="text" name="nama" value="<?= $user['nama']; ?>">
            </div>
           <?php } ?>
            <div class="form-group">
              <label class="control-label" for="email">Email</label>
              <input class="form-control" id="email" type="email" name="email" value="<?= $user['email']; ?>">
            </div>
            <?php if($this->session->userdata('level') == 0){ ?>
            <div class="form-group">
                    <label for="jk" class="form-control-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <?php foreach($jk as $j){ ?>
                          <?php if($j == $user['jk']){ ?>
                            <option value="<?= $j; ?>" selected><?= $j; ?></option>
                          <?php }else{ ?>
                            <option value="<?= $j; ?>"><?= $j; ?></option>
                          <?php } ?>
                        <?php } ?>
                    </select>
            </div>
            <div class="form-group">
              <label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
              <input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir" value="<?= $user['tgl_lahir']; ?>">
            </div>
            <div class="form-group">
                    <label for="pendidikan" class="form-control-label">Pendidikan</label>
                    <select name="pendidikan" id="pendidikan" class="form-control" required>
                        <?php foreach($pendidikan as $p){ ?>
                          <?php if($p == $user['pendidikan']){ ?>
                            <option value="<?= $p; ?>" selected><?= $p; ?></option>
                          <?php }else{ ?>
                            <option value="<?= $p; ?>"><?= $p; ?></option>
                          <?php } ?>
                        <?php } ?>
                    </select>
            </div>
            <div class="form-group">
              <label class="control-label" for="pekerjaan">Pekerjaan</label>
              <input class="form-control" id="pekerjaan" type="text" name="pekerjaan" value="<?= $user['pekerjaan']; ?>">
            </div>
            <div class="form-group">
                    <label for="tipe_peserta" class="form-control-label">Tipe Peserta</label>
                    <select name="tipe_peserta" id="tipe_peserta" class="form-control" required>
                        <?php foreach($tipe_peserta as $t){ ?>
                          <?php if($t == $user['tipe_peserta']){ ?>
                            <option value="<?= $t; ?>" selected><?= $t; ?></option>
                          <?php }else{ ?>
                            <option value="<?= $t; ?>"><?= $t; ?></option>
                          <?php } ?>
                        <?php } ?>
                    </select>
            </div>
            <?php } ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
          </form>
      </div>
    </div>
  </div>
    <!-- AKHIR MODAL BOX UBAH PROFILE -->

     <!-- MODAL BOX CHANGE PASSWORD -->
     <div id="modal-password<?= $user['id_user']; ?>" tabindex="-1" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ubah Profile</h4>
        </div>
        <div class="modal-body">
        <?php echo form_open('Profile/change_password') ?>
        <input type="hidden" readonly value="<?= $user['id_user']; ?>" name="id" class="form-control" >
              <div class="form-group">
                  <label for="current_password">Current Password : </label>
                  <input type="password" id="current_password" name="current_password" value="<?= set_value('current_password'); ?>" class="form-control" placeholder="Current Password"  required="">
                  <small class="form-text text-danger"><?= form_error('current_password');?></small>
              </div>

              <div class="form-group">
                  <label for="new_password">New Password : </label>
                  <input type="password" id="new_password" name="new_password1" value="<?= set_value('new_password1'); ?>" class="form-control" placeholder="New Password"  required="">
                  <small class="form-text text-danger"><?= form_error('new_password1');?></small>
                </div>

        
              <div class="form-group">
                  <label for="repeat_password">Repeat Password : </label>
                  <input type="password" id="repeat_password" name="new_password2" value="<?= set_value('new_password2'); ?>" class="form-control" placeholder="Repeat Password"  required="">
                  <small class="form-text text-danger"><?= form_error('new_password2');?></small>
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
    <!-- AKHIR MODAL BOX CHANGE PASSWORD -->