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
              <span class="d-ib"><a class="btn btn-info" href="<?= base_url(); ?>pelatihan_peserta"><span class="icon icon-backward"></span></a> KUISIONER B </span>
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
                  <strong>Daftar Kuisioner B | Tenaga Pelatih</strong>
                </div>
                <div class="card-body">
                    <!-- <h5>* Bagi tenaga pelatih  yang hanya mengajar teori saja,peserta jangan mengisi point 2a, 3a,4a dan 7b</h5>
                    <hr> -->
                    <!-- ISINYA -->
                    <?php echo form_open('Pelatihan_peserta/proses_kuisioner_b1');?>
                    <input type="hidden" value="<?= $kd_pelatihan; ?>" name="kd_pelatihan" class="form-control" >
                    <input type="hidden" value="<?= $id_pengajar; ?>" name="id_pengajar" class="form-control" >  
                    <?php $no=1; $n=1; $nu=1; $k=1; $p=1; $m=1; $s=1; foreach($data as $d){ ?>
                      <?php $no++; ?>
                      <?php if($d['tipe_soal'] == 'pg' && $d['sub_soal'] == 9){ ?>
                          <strong>A. PENGETAHUAN / PEMAHAMAN</strong>
                          <h4><?= $s++; ?>. <?= $d['soalB']; ?></h4>
                        <input type="hidden" value="<?= $d['id_kuisionerB']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1B']; ?>" required> <?= $d['jawaban1B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban2B']; ?>"> <?= $d['jawaban2B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban3B']; ?>"> <?= $d['jawaban3B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban4B']; ?>"> <?= $d['jawaban4B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban5B']; ?>"> <?= $d['jawaban5B']; ?> <br>
                        
                        <?php } elseif ($d['tipe_soal'] == 'pg' && $d['sub_soal'] == 10) { ?>
                          <strong>B. KEMAMPUAN DALAM MEMBAWAKAN MATERI </strong>
                          <h4><?= $n++; ?>. <?= $d['soalB']; ?></h4>
                        <input type="hidden" value="<?= $d['id_kuisionerB']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1B']; ?>" required> <?= $d['jawaban1B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban2B']; ?>"> <?= $d['jawaban2B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban3B']; ?>"> <?= $d['jawaban3B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban4B']; ?>"> <?= $d['jawaban4B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban5B']; ?>"> <?= $d['jawaban5B']; ?> <br>
                          
                        <?php } elseif ($d['tipe_soal'] == 'pg' && $d['sub_soal'] == 11) { ?>

                          <strong>C. KEMAMPUAN MEMAHAMI MASALAH PESERTA</strong>
                          <h4><?= $nu++; ?>. <?= $d['soalB']; ?></h4>
                        <input type="hidden" value="<?= $d['id_kuisionerB']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1B']; ?>" required> <?= $d['jawaban1B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban2B']; ?>"> <?= $d['jawaban2B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban3B']; ?>"> <?= $d['jawaban3B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban4B']; ?>"> <?= $d['jawaban4B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban5B']; ?>"> <?= $d['jawaban5B']; ?> <br>

                        <?php } elseif ($d['tipe_soal'] == 'pg' && $d['sub_soal'] == 12) { ?>

                          <strong>D. PENAMPILAN TENAGA PELATIH</strong>
                          <h4><?= $k++; ?>. <?= $d['soalB']; ?></h4>
                        <input type="hidden" value="<?= $d['id_kuisionerB']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1B']; ?>" required> <?= $d['jawaban1B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban2B']; ?>"> <?= $d['jawaban2B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban3B']; ?>"> <?= $d['jawaban3B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban4B']; ?>"> <?= $d['jawaban4B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban5B']; ?>"> <?= $d['jawaban5B']; ?> <br>
                    
                        <?php } elseif ($d['tipe_soal'] == 'uraian' && $d['sub_soal'] == 13) { ?>

                          <strong>KOMENTAR / SARAN TENAGA PELATIH</strong>
                          <h4><?= $m++; ?>. <?= $d['soalB']; ?></h4>
                          <input type="hidden" value="<?= $d['id_kuisionerB']; ?>" name="pertanyaan2[<?= $no; ?>][id]" class="form-control" >  
                          <textarea name="pertanyaan2[<?= $no; ?>][jawaban]" class="form-control" cols="30" rows="5"></textarea>
                        
                        <?php } ?>
                          <hr>
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



