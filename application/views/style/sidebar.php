<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">SISTEM APLIKASI UKS <br> SMPN 1 SEMARANG</span>
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
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo base_url('Admin/') ;?>"
                            class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Periksa/') ;?>"
                            class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Periksa Pasien
                            </p>
                        </a>
                    </li>
                    <li class="nav-item <?=$menu == 'data' ? 'menu-open' :'' ?>">
                        <a class="nav-link <?=$menu == 'guru' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Data 
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('data/daf_guru')?>"
                                    class="nav-link <?=$submenu == 'guru' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Guru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('data/daf_siswa')?>"
                                    class="nav-link <?=$submenu == 'siswa' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('data/daf_karyawan')?>"
                                    class="nav-link <?=$submenu == 'karyawan' ? 'active' :'' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daftar Karyawan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Diagnosa/') ;?>"
                            class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Diagnosa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Penanganan/') ;?>"
                            class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Penanganan Pertama
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Tindakan/') ;?>"
                            class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Tindakan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?php echo base_url('Daftar_Obat/') ;?>"
                            class="nav-link">
                            <i class="nav-icon fas fa-capsules"></i>
                            <p>
                                Daftar Obat P3K
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