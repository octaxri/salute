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
                  <strong>Daftar Kuisioner B | Unit Kompetensi</strong>
                </div>
                <div class="card-body">
                    <!-- ISINYA -->
                    <?php echo form_open('Pelatihan_peserta/proses_kuisioner_b');?>
                    <input type="hidden" value="<?= $kd_pelatihan; ?>" name="kd_pelatihan" class="form-control" >  
                    <?php $no=1; foreach($data as $d){ ?>
                        <h4><?= $no++; ?>. <?= $d['soalB']; ?></h4>
                        <?php if($d['tipe_soal'] == 'pg'){ ?>
                        <input type="hidden" value="<?= $d['id_kuisionerB']; ?>" name="pertanyaan[<?= $no; ?>][id]" class="form-control" >  
                        
                        <input type="number" name="pertanyaan[<?= $no;?>][jawaban]" class="form-control" required>
                        
                        

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



