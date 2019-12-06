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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>pelatihan_peserta"><span class="icon icon-backward"></span></a> KUISIONER C </span>
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
                  <strong>Daftar Kuisioner C</strong>
                </div>
                <div class="card-body">
                    <!-- ISINYA -->
                    <?php echo form_open('Pelatihan_peserta/proses_kuisioner_c');?>
                    <input type="hidden" value="<?= $kd_pelatihan; ?>" name="kd_pelatihan" class="form-control" >  
                    <?php $no=1; $n=1; foreach($data as $d){ ?>
                        <input type="hidden" value="<?= $d['id_kuisionerC']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                            <strong>A. BERKENAAN DENGAN REKRUITMEN, PERJALANAN, DAN PERSYARATAN PESERTA</strong>
                        <h4><?= $no++; ?>. <?= $d['soalC']; ?></h4>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="1" required> <?= $d['jawaban1C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="2"> <?= $d['jawaban2C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="3"> <?= $d['jawaban3C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="4"> <?= $d['jawaban4C']; ?> <br>
                          <hr>
                        <?php }elseif($d['tipe_soal']=="uraian") { ?>
                        <br>
                        <strong>Saran dan Komentar</strong>
                            <h4><?= $n++; ?>. <?= $d['soalC']; ?></h4>
                            <textarea class="form-control" name="pertanyaan2[<?= $n; ?>][jawaban]" id="" cols="30" rows="5"></textarea> <br>
                        <?php } ?>
                    <?php } ?>
                    <br>
                    <hr>
                    <?php $no=1; $n=1; foreach($data1 as $d){ ?>
                        <input type="hidden" value="<?= $d['id_kuisionerC']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                            <strong>B. BERKENAAN DENGAN PENYAMBUTAN, PEMBAGIAN KAMAR PESERTA</strong>
                        <h4><?= $no++; ?>. <?= $d['soalC']; ?></h4>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="1" required> <?= $d['jawaban1C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="2"> <?= $d['jawaban2C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="3"> <?= $d['jawaban3C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="4"> <?= $d['jawaban4C']; ?> <br>
                          <hr>
                        <?php }elseif($d['tipe_soal']=="uraian") { ?>
                        <br>
                        <strong>Saran dan Komentar</strong>
                            <h4><?= $n++; ?>. <?= $d['soalC']; ?></h4>
                            <textarea class="form-control" name="pertanyaan2[<?= $n; ?>][jawaban]" id="" cols="30" rows="5"></textarea> <br>
                        <?php } ?>
                    <?php } ?>
                    <br>
                    <hr>
                    <?php $no=1; $n=1; foreach($data2 as $d){ ?>
                        <input type="hidden" value="<?= $d['id_kuisionerC']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                            <strong>C. BERKENAAN DENGAN SARANA DAN PRASARANA</strong>
                        <h4><?= $no++; ?>. <?= $d['soalC']; ?></h4>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>" required> <?= $d['jawaban1C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban2C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban3C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban4C']; ?> <br>
                          <hr>
                        <?php }elseif($d['tipe_soal']=="uraian") { ?>
                        <br>
                        <strong>Saran dan Komentar</strong>
                            <h4><?= $n++; ?>. <?= $d['soalC']; ?></h4>
                            <textarea class="form-control" name="pertanyaan2[<?= $n; ?>][jawaban]" id="" cols="30" rows="5"></textarea> <br>
                        <?php } ?>
                    <?php } ?>
                    <br>
                    <hr>
                    <?php $no=1; $n=1; foreach($data3 as $d){ ?>
                        <input type="hidden" value="<?= $d['id_kuisionerC']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                            <strong>D. BERKENAAN DENGAN KONSUMSI</strong>
                        <h4><?= $no++; ?>. <?= $d['soalC']; ?></h4>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>" required> <?= $d['jawaban1C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban2C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban3C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban4C']; ?> <br>
                          <hr>
                        <?php }elseif($d['tipe_soal']=="uraian") { ?>
                        <br>
                        <strong>Saran dan Komentar</strong>
                            <h4><?= $n++; ?>. <?= $d['soalC']; ?></h4>
                            <textarea class="form-control" name="pertanyaan2[<?= $n; ?>][jawaban]" id="" cols="30" rows="5"></textarea> <br>
                        <?php } ?>
                    <?php } ?>
                    <br>
                    <hr>
                    <?php $no=1; $n=1; foreach($data4 as $d){ ?>
                        <input type="hidden" value="<?= $d['id_kuisionerC']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                            <strong>E. BERKENAAN DENGAN BAHAN LATIHAN, MODUL, ATK, DAN SERAGAM PESERTA</strong>
                        <h4><?= $no++; ?>. <?= $d['soalC']; ?></h4>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>" required> <?= $d['jawaban1C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban2C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban3C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban4C']; ?> <br>
                          <hr>
                        <?php }elseif($d['tipe_soal']=="uraian") { ?>
                        <br>
                        <strong>Saran dan Komentar</strong>
                            <h4><?= $n++; ?>. <?= $d['soalC']; ?></h4>
                            <textarea class="form-control" name="pertanyaan2[<?= $n; ?>][jawaban]" id="" cols="30" rows="5"></textarea> <br>
                        <?php } ?>
                    <?php } ?>
                    <br>
                    <hr>
                    <?php $no=1; $n=1; foreach($data5 as $d){ ?>
                        <input type="hidden" value="<?= $d['id_kuisionerC']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                            <strong>F. BERKENAAN DENGAN PELAKSANAAN UJI KOMPETENSI</strong>
                        <h4><?= $no++; ?>. <?= $d['soalC']; ?></h4>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>" required> <?= $d['jawaban1C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban2C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban3C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban4C']; ?> <br>
                          <hr>
                        <?php }elseif($d['tipe_soal']=="uraian") { ?>
                        <br>
                        <strong>Saran dan Komentar</strong>
                            <h4><?= $n++; ?>. <?= $d['soalC']; ?></h4>
                            <textarea class="form-control" name="pertanyaan2[<?= $n; ?>][jawaban]" id="" cols="30" rows="5"></textarea> <br>
                        <?php } ?>
                    <?php } ?>
                    <br>
                    <hr>
                    <?php $no=1; $n=1; foreach($data6 as $d){ ?>
                        <input type="hidden" value="<?= $d['id_kuisionerC']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                            <strong>G. SECARA UMUM PELAKSANAAN PELATIHAN</strong>
                        <h4><?= $no++; ?>. <?= $d['soalC']; ?></h4>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>" required> <?= $d['jawaban1C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban2C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban3C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>"> <?= $d['jawaban4C']; ?> <br>
                          <hr>
                        <?php }elseif($d['tipe_soal']=="uraian") { ?>
                        <br>
                        <strong>Saran dan Komentar</strong>
                            <h4><?= $n++; ?>. <?= $d['soalC']; ?></h4>
                            <textarea class="form-control" name="pertanyaan2[<?= $n; ?>][jawaban]" id="" cols="30" rows="5"></textarea> <br>
                        <?php } ?>
                    <?php } ?>
                    <button class="btn btn-primary col-xs-12" type="submit" >Kirim</button>
                    </form>     
                    <!-- AKHIR ISINYA -->
                    <br><br><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



