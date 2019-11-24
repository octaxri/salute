<div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
            
          </div>

          <div class="text-center m-b">
            <h3 class="m-b-0">Data Kejuruan</h3>
          </div>
</br>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong><button class="btn btn-outline-primary" data-toggle="modal" data-target="#infoModalColoredHeader" type="button"><span class="icon icon-plus"> Tambah</span></button></strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-5" class="table table-striped table-bordered table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </tfoot>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

          <!--Modal Tambah Data Kejuruan-->
    <div id="infoModalColoredHeader" tabindex="-1" role="dialog" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">×</span>
              <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Tambah Data Kejuruan</h4>
          </div>
          <div class="modal-body">

          <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="nama">Nama : </label>
                    <div class="col-sm-10">
                      <input id="nama" name="nama" class="form-control input-pill" type="text">
                    </div>
                </div>
          </form>

          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" type="button">Tambah</button>
            <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
          </div>
        </div>
      </div>
    </div>
<!--isi konten modal-->