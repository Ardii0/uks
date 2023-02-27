<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">SISTEM INFORMASI SEKOLAH</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">DASHBOARD ADMIN</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./index.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard Akademik</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./dashboard_perpus" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard Perpustakaan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./dashboard_nilai" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard Nilai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard Keuangan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">PERPUSTAKAAN</li>
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
                                <a href="<?php echo base_url('petugas/data_buku')?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Buku</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('petugas/tambah_buku');?>" class="nav-link">
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
                    <li class="nav-header">AKADEMIK</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Akademik/tahun_ajaran') ;?>" class="nav-link">
                            <i class="nav-icon far fa-calendar"></i>
                            <p>
                                Tahun Ajaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Akademik/jenjang'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Jenjang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Akademik/kelas'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-door-closed"></i>
                            <p>
                                Kelas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Akademik/guru'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Guru
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
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
                            <i class="nav-icon fas fa-book"></i>
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
                    <li class="nav-header">NILAI</li>
                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-percent"></i>
                            <p>
                                Nilai
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                Data Nilai
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                Cetak Rapot
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">KEUANGAN</li>
                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Rencana Anggaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-share"></i>
                            <p>
                                Data Masuk & Keluar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Jurnal Penyesuain
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-comments-dollar"></i>
                            <p>
                                Laporan Keuangan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-money-bill"></i>
                            <p>
                                Pembayaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Keluar</li>
                    <li class="nav-item">
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