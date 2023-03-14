<div>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('Perpustakaan/')?>" class="brand-link">
      <span class="brand-text font-weight-light">SISTEM INFORMASI SEKOLAH</span>
    </a>

    <!-- Sidebar -->
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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('Perpustakaan/')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Perpustakaan/rak_buku')?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
                <p>
                Data Rak Buku
                </p> 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Buku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Perpustakaan/data_buku')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Perpustakaan/tambah_buku');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Input Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modul Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Detail Index Buku</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Barcode Buku</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Perpustakaan/kategori_buku')?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Kategori Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a  class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Data Anggota
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Perpustakaan/data_anggota')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Perpustakaan/form_anggota')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Input Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Perpustakaan/kartu_anggota')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Kartu Anggota </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Perpustakaan/peminjaman')?>" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Perpustakaan/pengembalian')?>" class="nav-link">
              <i class="nav-icon fas fa-inbox"></i>
              <p>
                Pengembalian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a  class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
               Laporan 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('Perpustakaan/laporan_peminjaman')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Peminjaman </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('Perpustakaan/laporan_pengembalian')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Pengembalian</p>
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
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</div>