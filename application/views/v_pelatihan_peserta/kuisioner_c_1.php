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
                  <strong>Daftar Kuisioner C | Berkenaan Dengan Rekruitmen, Perjalanan, Dan Persyaratan Peserta</strong>
                </div>
                <div class="card-body">
                    <!-- ISINYA -->
                    <?php echo form_open('Pelatihan_peserta/proses_kuisioner_c1');?>
                    <input type="hidden" value="<?= $kd_pelatihan; ?>" name="kd_pelatihan" class="form-control" >  
                    <?php $no=1; foreach($data as $d){ ?>
                        <h4><?= $no++; ?>. <?= $d['soalC']; ?></h4>
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                        <input type="hidden" value="<?= $d['id_kuisionerC']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban1C']; ?>" required> <?= $d['jawaban1C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban2C']; ?>"> <?= $d['jawaban2C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban3C']; ?>"> <?= $d['jawaban3C']; ?> <br>
                          &nbsp; &nbsp; &nbsp; <input type="radio" name="pertanyaan[<?= $no; ?>][jawaban]" value="<?= $d['jawaban4C']; ?>"> <?= $d['jawaban4C']; ?> <br>
                        <?php }else{ ?>
                          <input type="hidden" value="<?= $d['id_kuisionerC']; ?>" name="pertanyaan2[<?= $no; ?>][id]" class="form-control" >  
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



