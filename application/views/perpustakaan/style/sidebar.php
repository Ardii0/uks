<?php if($this->session->userdata('level') === 'Admin') {?>
<?php $this->load->view('petugas/style/sidebar')?>
<?php } else {?>
<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="<?php echo base_url('Perpustakaan/')?>" class="brand-link">
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
            <nav class="mt-2" style="padding-bottom: 50px" data-scrollbar-auto-hide="n">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo base_url('Perpustakaan/')?>"
                            class="nav-link <?=$menu == 'dashboard' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Perpustakaan/rak_buku')?>"
                            class="nav-link <?=$menu == 'rak' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Data Rak Buku
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Perpustakaan/kategori_buku')?>"
                            class="nav-link <?=$menu == 'kategori' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Kategori Buku
                            </p>
                        </a>
                    </li>
                    <li class="nav-item <?=$menu == 'buku' ? 'menu-open' :'' ?>">
                        <a class="nav-link <?=$menu == 'buku' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Data Buku
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/data_buku')?>"
                                    class="nav-link <?=$submenu == 'buku' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Buku</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/tambah_buku');?>"
                                    class="nav-link <?=$submenu == 'form_buku' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Form Input Buku</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?=$menu == 'anggota' ? 'menu-open' :'' ?>">
                        <a class="nav-link <?=$menu == 'anggota' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Data Anggota
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/data_anggota')?>"
                                    class="nav-link <?=$submenu == 'anggota' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Anggota</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/form_anggota')?>"
                                    class="nav-link <?=$submenu == 'form_anggota' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Form Input Anggota</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Perpustakaan/peminjaman')?>"
                            class="nav-link <?=$menu == 'peminjaman' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Peminjaman
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Perpustakaan/pengembalian')?>"
                            class="nav-link  <?=$menu == 'pengembalian' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-inbox"></i>
                            <p>
                                Pengembalian
                            </p>
                        </a>
                    </li>
                    <li class="nav-item  <?=$menu == 'laporan' ? 'menu-open' :'' ?>">
                        <a class="nav-link  <?=$menu == 'laporan' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Laporan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/laporan_peminjaman')?>"
                                    class="nav-link  <?=$submenu == 'peminjaman' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Peminjaman </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/laporan_pengembalian')?>"
                                    class="nav-link <?=$submenu == 'pengembalian' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Pengembalian</p>
                                </a>
                            </li>
                        </ul>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Perpustakaan/rekap_denda')?>"
                            class="nav-link <?=$menu == 'denda_perpus' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Rekap Denda Perpus
                            </p>
                        </a>
                    </li>
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