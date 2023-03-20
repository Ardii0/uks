<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
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
            <nav class="mt-2" style="padding-bottom: 90px" data-scrollbar-auto-hide="n">
                <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo base_url('Admin/'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Akademik/') ;?>" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Akademik
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('Akademik/') ;?>" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Home Akademik</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Akademik/tahun_ajaran') ;?>" class="nav-link">
                                    <i class="far fa-calendar nav-icon"></i>
                                    <p>Tahun Ajaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Akademik/jenjang') ;?>" class="nav-link">
                                    <i class="fas fa-graduation-cap nav-icon"></i>
                                    <p>Jenjang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Akademik/kelas'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-door-closed"></i>
                                    <p>
                                        Kelas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Akademik/kelas'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Kelas Utama</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Akademik/rombel'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Rombongan Belajar</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Akademik/guru'); ?>" class="nav-link">
                                    <i class="fas fa-user-tie nav-icon"></i>
                                    <p>Guru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Akademik/'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Siswa
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Akademik/siswa_pendaftaran') ;?>"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Pendaftaran Siswa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Akademik/siswa_seleksi_siswa') ;?>"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Seleksi Pendaftar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Akademik/siswa_pembagian_kelas') ;?>"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Pembagian Kelas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Akademik/siswa_data') ;?>" class="nav-link ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Data Siswa</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Akademik/siswa_mutasi') ;?>" class="nav-link ">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Mutasi Siswa</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Akademik/kelas'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Pelajaran
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Akademik/jenis_pelajaran') ;?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Jenis Mata Pelajaran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Akademik/pelajaran') ;?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Mata Pelajaran</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Perpustakaan/'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Perpus
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/'); ?>" class="nav-link">
                                    <i class="fas fa-home nav-icon"></i>
                                    <p>Home Perpus</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/rak_buku'); ?>" class="nav-link">
                                    <i class="fas fa-th nav-icon"></i>
                                    <p>Rak Buku</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/kategori_buku'); ?>" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>Kategori Buku</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/'); ?>" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>
                                        Data Buku
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Perpustakaan/data_buku'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Daftar Buku</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Perpustakaan/tambah_buku'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Form Buku</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/'); ?>" class="nav-link">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>
                                        Data Anggota
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Perpustakaan/data_anggota'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Daftar Anggota</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Perpustakaan/form_anggota'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Form Anggota</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/peminjaman'); ?>" class="nav-link">
                                    <i class="fas fa-table nav-icon"></i>
                                    <p>Peminjaman</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/pengembalian'); ?>" class="nav-link">
                                    <i class="fas fa-inbox nav-icon"></i>
                                    <p> Pengembalian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/'); ?>" class="nav-link">
                                    <i class="fas fa-info nav-icon"></i>
                                    <p>
                                        <p>Laporan</p>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Perpustakaan/data_anggota'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Daftar Anggota</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Perpustakaan/form_anggota'); ?>" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Form Anggota</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Nilai/') ;?>" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Nilai
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('Nilai/') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Home Nilai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Nilai/modul_input_nilai') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-percent"></i>
                                    <p>Input Nilai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Nilai/modul_data_nilai') ?>" class="nav-link">
                                    <i class="fas fa-folder-open nav-icon"></i>
                                    <p>Data Nilai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Nilai/cetak_raport') ?>" class="nav-link">
                                    <i class="fas fa-print nav-icon"></i>
                                    <p>Cetak Rapot</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('keuangan/jurnal')?>" class="nav-link">
                            <i class="nav-icon fas fa-circle"></i>
                            <p>
                                Keuangan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('keuangan/')?>" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Home Keuangan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('keuangan/anggaran')?>" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Rencana Anggaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('keuangan/akun')?>" class="nav-link">
                                    <i class="fas fa-user nav-icon"></i>
                                    <p>Akun</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('keuangan/dana')?>" class="nav-link">
                                    <i class="fas fa-share nav-icon"></i>
                                    <p>Dana Masuk Keluar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('keuangan/'); ?>" class="nav-link">
                                    <i class="fas fa-comments-dollar nav-icon"></i>
                                    <p>
                                        Laporan Keuangan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('keuangan/laporan_jurnalpenyesuaian'); ?>"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Laporan Jurnal</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('keuangan/laporan_bukubesar'); ?>"
                                            class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Laporan Buku Besar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('keuangan/pembayaran')?>" class="nav-link">
                                    <i class="nav-icon fas fa-money-bill"></i>
                                    <p>
                                        Pembayaran
                                    </p>
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