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
                      <div id="notifikasi" class="alert alert-warning"><strong> </strong> <?=$dat;?></div>
        <?php } ?> 
            <br>

          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">REKAP PER TAHAP</span>
            </h1>
          </div>
          <hr>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <strong>Rekap Per Tahap</strong>
                </div>
                <div class="card-body">
                <!--  -->
                <div class="demo-form-wrapper">
                <form class="form form-horizontal" method="post">

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tahap">Tahap</label>
                    <div class="col-sm-6">
                      <input id="tahap" name="tahap" class="form-control" type="number" required="">
                    </div>
                  </div>

                  <br>
                  <div class="form-group">
                  <label class="col-sm-5 control-label" for=""></label>
                    <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                  </div>
                    </div>
                  </div>
                </form>
              </div>
                    

                <!--  -->
                    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- AJAX SELECT DINAMIS -->
<script type="text/javascript">
      $(function(){

      $.ajaxSetup({
      type:"POST",
      url: "<?php echo base_url('pelatihan/ambil_data') ?>",
      cache: false,
      });

      $("#kejuruan").change(function(){

      var value=$(this).val();
      if(value>0){
      $.ajax({
      data:{modul:'program',id:value},
      success: function(respond){
      $("#program").html(respond);
      }
      })
      }

      });


      })

</script>
