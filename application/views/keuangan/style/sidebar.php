<?php if($this->session->userdata('level') === 'Admin') {?>
<?php $this->load->view('petugas/style/sidebar')?>
<?php } else {?>
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
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo base_url('keuangan/')?>"
                            class="nav-link <?=$menu == 'dashboard' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('keuangan/anggaran')?>"
                            class="nav-link <?=$menu == 'anggaran' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Rencana Anggaran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('keuangan/akun')?>"
                            class="nav-link <?=$menu == 'akun' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Akun
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('keuangan/dana')?>"
                            class="nav-link <?=$menu == 'dana' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-share"></i>
                            <p>
                                Dana Masuk & Keluar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item hidden" hidden>
                        <a href="<?php echo base_url('keuangan/jurnal')?>"
                            class="nav-link <?=$menu == 'jurnal' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Jurnal Penyesuaian
                            </p>
                        </a>
                    </li>
                    <li class="nav-item <?=$menu == 'laporan' ? 'menu-open' :'' ?>">
                        <a class="nav-link <?=$menu == 'laporan' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-comments-dollar"></i>
                            <p>
                                Laporan Keuangan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('keuangan/laporan_jurnalpenyesuaian')?>"
                                    class="nav-link <?=$submenu == 'penyesuaian' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Penyesuaian </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('keuangan/laporan_bukubesar')?>"
                                    class="nav-link <?=$submenu == 'bukubesar' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Buku Besar</p>
                                </a>
                            </li>
                        </ul>
                    <li class="nav-item">
                        <a href="<?php echo base_url('keuangan/pembayaran')?>"
                            class="nav-link <?=$menu == 'pembayaran' ? 'active' :'' ?>">
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
<?php }?>