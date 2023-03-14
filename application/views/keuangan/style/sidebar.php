<div>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">SISTEM INFORMASI SEKOLAH</span>
    </a>

    <div class="sidebar">
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
            <a href="<?php echo base_url('keuangan/')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('keuangan/anggaran')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Rencana Anggaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('keuangan/akun')?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Akun
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('keuangan/dana')?>" class="nav-link">
              <i class="nav-icon fas fa-share"></i>
              <p>
              Dana Masuk & Keluar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('keuangan/jurnal')?>" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
              Jurnal Penyesuaian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a  class="nav-link">
              <i class="nav-icon fas fa-comments-dollar"></i>
              <p>
               Laporan Keuangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('keuangan/laporan_jurnalpenyesuaian')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Penyesuaian </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('keuangan/laporan_bukubesar')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Buku Besar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('keuangan/laporan_neracalajur')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Neraca Lajur</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="<?php echo base_url('keuangan/pembayaran')?>" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Pembayaran
              </p>
            </a>
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