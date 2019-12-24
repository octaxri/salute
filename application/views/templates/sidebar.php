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
                <!-- Login sebagai peserta -->
                <?php if($this->session->userdata('level') == 0){ ?>
                <li class="sidenav-heading">MAIN</li>
                <li class="sidenav-item">
                  <a href="<?= base_url(); ?>pelatihan_peserta">
                    <span class="sidenav-icon icon icon-home"></span>
                    <span class="sidenav-label">Pelatihan</span>
                  </a>
                </li>
                <?php } ?>
                <!-- Login sebagai admin -->
                <?php if($this->session->userdata('level') == 1){ ?>
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
                    <li><a href="<?= site_url(); ?>kuisoner_a">Kuisioner A</a></li>
                    <li><a href="<?= site_url(); ?>kuisoner_b">Kuisioner B</a></li>
                    <li><a href="<?= site_url(); ?>kuisoner_c">Kuisioner C</a></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-reorder"></span>
                    <span class="sidenav-label">Rekap</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li><a href="<?= site_url(); ?>Rekap_tahap">Tahap</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_program">Program</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_kejuruan">Kejuruan</a></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-reorder"></span>
                    <span class="sidenav-label">Rekap Uraian</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li><a href="<?= site_url(); ?>Rekap_uraian/tampil_uraian_materi_pelatihan/">Materi Pelatihan</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_uraian/tampil_uraian_tenaga_pelatih/">Tenaga Pelatih</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_uraian/tampil_uraian_sapras/">Sarana dan Prasarana</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_uraian/tampil_uraian_bahan_pelatihan/">Bahan Pelatihan</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_uraian/tampil_uraian_rekrut/">Rekruitment</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_uraian/tampil_uraian_sambut/">Penyambutan</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_uraian/tampil_uraian_sapras_asrama/">Sarana dan Prasarana Asrama</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_uraian/tampil_uraian_konsumsi/">Konsumsi</a></li>
                    <li><a href="<?= site_url(); ?>Rekap_uraian/tampil_uraian_umum/">Secara Umum Pelaksanaan Pelatihan</a></li>

                  </ul>
                </li>
                <li class="sidenav-item">
                  <a href="<?= site_url(); ?>pelatihan">
                    <span class="sidenav-icon icon icon-diamond"></span>
                    <span class="sidenav-label">Pelatihan</span>
                  </a>
                </li>
             
                <li class="sidenav-heading">LAINNYA</li>
                <!-- <li class="sidenav-item">
                  <a href="bobot">
                    <span class="sidenav-icon icon icon-gear"></span>
                    <span class="sidenav-label">Bobot Peniliaan</span>
                  </a>
                </li> -->
                <li class="sidenav-item">
                  <a href="<?= site_url(); ?>user">
                    <span class="sidenav-icon icon icon-user"></span>
                    <span class="sidenav-label">USERS</span>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>