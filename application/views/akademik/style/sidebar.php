<div>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('Akademik/'); ?>" class="brand-link">
      <span class="brand-text font-weight-light">SISTEM INFORMASI SEKOLAH</span>
    </a>

    <div class="sidebar">
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        </div>
        <div class="info">
          <a href="#" class="d-block">ISI SENDIRI SENDIRI</a>
        </div>
      </div> -->

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url('Akademik/') ;?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard Akademik
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Akademik/tahun_ajaran') ;?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tahun Ajaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Akademik/jenjang'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Jenjang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Akademik/kelas'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Akademik/guru'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Guru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Siswa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Akademik/siswa_pendaftaran') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendaftaran Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Akademik/siswa_pembagian_kelas') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembagian Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Akademik/siswa_data') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Akademik/siswa_mutasi') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mutasi Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pelajaran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Akademik/pelajaran') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Akademik/jenis_pelajaran') ;?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Mata Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>