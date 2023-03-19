<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light">SISTEM INFORMASI SEKOLAH</span>
        </a>

            <div class="form-inline p-2">
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
        <div class="sidebar">

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
                                <a href="<?php echo base_url('Akademik/')?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard Akademik</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Perpustakaan/')?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard Perpustakaan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Nilai/')?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard Nilai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Keuangan/')?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard Keuangan</p>
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