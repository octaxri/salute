<div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
          <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
              <ul class="sidenav">
                <li class="sidenav-search hidden-md hidden-lg">
                  <form class="sidenav-form" action="/">
                    <div class="form-group form-group-sm">
                      <div class="input-with-icon">
                        <input class="form-control" type="text" placeholder="Search…">
                        <span class="icon icon-search input-icon"></span>
                      </div>
                    </div>
                  </form>
                </li>
                <li class="sidenav-heading">DASHBOARD</li>
                <li class="sidenav-item">
                  <a href="<?= site_url(); ?>dashboard">
                    <span class="sidenav-icon icon icon-home"></span>
                    <span class="sidenav-label">Dashboard</span>
                  </a>
                </li>
                <li class="sidenav-heading">MAIN</li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-database"></span>
                    <span class="sidenav-label">Data</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li class="sidenav-subheading">UI Elements</li>
                    <li><a href="<?= site_url(); ?>sub_soal">Sub Soal</a></li>
                    <li><a href="<?= site_url(); ?>kejuruan">Kejuruan</a></li>
                    <li><a href="<?= site_url(); ?>progam">Program</a></li>
                  </ul>
                </li>
                <li class="sidenav-item">
                  <a href="<?= site_url(); ?>peserta">
                    <span class="sidenav-icon icon icon-users"></span>
                    <span class="sidenav-label">List Peserta</span>
                  </a>
                </li>
                <li class="sidenav-item">
                  <a href="<?= site_url(); ?>pengajar">
                    <span class="sidenav-icon icon icon-universal-access"></span>
                    <span class="sidenav-label">List Pengajar</span>
                  </a>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-server"></span>
                    <span class="sidenav-label">Soal</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li><a href="<?= site_url(); ?>kuisoner_A">Kuisioner A</a></li>
                    <li><a href="<?= site_url(); ?>kuisoner_B">Kuisioner B</a></li>
                    <li><a href="<?= site_url(); ?>kuisoner_C">Kuisioner C</a></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-reorder"></span>
                    <span class="sidenav-label">Rekap</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li><a href="<?= site_url(); ?>sub_soal">Tahap</a></li>
                    <li><a href="<?= site_url(); ?>kejuruan">Kelas</a></li>
                  </ul>
                </li>
                <li class="sidenav-item">
                  <a href="<?= site_url(); ?>pelatihan">
                    <span class="sidenav-icon icon icon-diamond"></span>
                    <span class="sidenav-label">Pelatihan</span>
                  </a>
                </li>
                <li class="sidenav-heading">LAINNYA</li>
                <li class="sidenav-item">
                  <a href="<?= site_url(); ?>user">
                    <span class="sidenav-icon icon icon-user"></span>
                    <span class="sidenav-label">USERS</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>