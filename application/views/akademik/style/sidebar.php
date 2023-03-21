<?php if($this->session->userdata('level') === 'Admin') {?>
  <?php $this->load->view('petugas/style/sidebar')?>
<?php } else {?>
  <div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="<?php echo base_url('Akademik/'); ?>" class="brand-link">
        <span class="brand-text font-weight-light">SISTEM INFORMASI SEKOLAH</span>
      </a>
        <div class="form-inline p-2">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

      <div class="sidebar">
        <nav class="mt-2" data-scrollbar-auto-hide="n">
          <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?php echo base_url('Akademik/') ;?>"  class="<?=$menu == 'dashboard' ? 'active' :'' ?> nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard Akademik
                </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="<?php echo base_url('Akademik/tahun_ajaran') ;?>" class='nav-link <?=$menu == 'tahun_ajaran' ? 'active' :'' ?>'>
                <i class="nav-icon far fa-calendar"></i>
                <p>
                  Tahun Ajaran
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Akademik/jenjang'); ?>" class="nav-link <?=$menu == 'jenjang' ? 'active' :'' ?>" >
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                  Jenjang
                </p>
              </a>
            </li>
            <li class="nav-item <?=$menu == 'kelas' ? 'menu-open' :'' ?>">
              <a href="#" class="nav-link <?=$menu == 'kelas' ? 'active' :'' ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Kelas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('Akademik/kelas'); ?>" class="nav-link  <?=$submenu == 'kelas' ? 'active' :'' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelas Utama</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('Akademik/rombel') ;?>" class="nav-link  <?=$submenu == 'rombel' ? 'active' :'' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rombongan Belajar</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item">
              <a href="<?php echo base_url('Akademik/guru'); ?>" class="nav-link <?=$menu == 'guru' ? 'active' :'' ?>">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                  Guru
                </p>
              </a>
            </li>
            <li class="nav-item <?=$menu == 'siswa' ? 'menu-open' :'' ?>">
              <a href="#" class="nav-link <?=$menu == 'siswa' ? 'active' :'' ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Siswa
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('Akademik/siswa_pendaftaran') ;?>" class="nav-link <?=$submenu == 'siswa_pendaftaran' ? 'active' :'' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pendaftaran Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('Akademik/siswa_seleksi_siswa') ;?>" class="nav-link <?=$submenu == 'seleksi_siswa' ? 'active' :'' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Seleksi Pendaftar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('Akademik/siswa_pembagian_kelas') ;?>" class="nav-link <?=$submenu == 'pembagian_kelas' ? 'active' :'' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pembagian Kelas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('Akademik/siswa_data') ;?>" class="nav-link <?=$submenu == 'data_siswa' ? 'active' :'' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('Akademik/siswa_mutasi') ;?>" class="nav-link <?=$submenu == 'mutasi' ? 'active' :'' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mutasi Siswa</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item <?=$menu == 'mapel' ? 'menu-open' :'' ?>">
              <a href="#" class="nav-link <?=$menu == 'mapel' ? 'active' :'' ?>">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Pelajaran
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('Akademik/jenis_pelajaran') ;?>" class="nav-link <?=$submenu == 'jenis_mapel' ? 'active' :'' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jenis Mata Pelajaran</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('Akademik/pelajaran') ;?>" class="nav-link <?=$submenu == 'mapel' ? 'active' :'' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mata Pelajaran</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item logout">
              <a href="<?php echo base_url('Login/logout');?>" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Keluar</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
  </div>
<?php }?>