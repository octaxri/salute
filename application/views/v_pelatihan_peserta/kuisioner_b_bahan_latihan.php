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
                  <strong>Daftar Kuisioner B | Bahan Latihan, Modul, ATK, dan Seragam Peserta</strong>
                </div>
                <div class="card-body">
                    <!-- ISINYA -->
                    <?php echo form_open('Pelatihan_peserta/proses_kuisioner_b');?>
                    <input type="hidden" value="<?= $kd_pelatihan; ?>" name="kd_pelatihan" class="form-control" >  
                    <?php $no=1; $n=1; $k=1;foreach($data as $d){ ?>
                          <?php $no++;?>
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                        <h4><?= $n++; ?>. <?= $d['soalB']; ?></h4>
                        <input type="hidden" value="<?= $d['id_kuisionerB']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1B']; ?>" required> <?= $d['jawaban1B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban2B']; ?>"> <?= $d['jawaban2B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban3B']; ?>"> <?= $d['jawaban3B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban4B']; ?>"> <?= $d['jawaban4B']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban5B']; ?>"> <?= $d['jawaban5B']; ?> <br>
                          <hr>
                        <?php }else{ ?>
                        <br>
                            <h4><?= $k++; ?>. <?= $d['soalB']; ?></h4>
                            <input type="hidden" value="<?= $d['id_kuisionerB']; ?>" name="pertanyaan2[<?= $no; ?>][id]" class="form-control" >
                            <textarea class="form-control" name="pertanyaan2[<?= $no; ?>][jawaban]" id="" cols="30" rows="5" required=""></textarea> <br>
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



