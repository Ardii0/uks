<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">

            <span class="brand-text font-weight-light">SISTEM INFORMASI SEKOLAH</span>
        </a>

        <div class="sidebar">
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
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item ">
                        <a href="<?php echo base_url('Nilai') ;?>" class="nav-link <?=$submenu == 'nilai' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Nilai/modul_input_nilai') ?>" class="nav-link <?=$submenu == 'modul' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-percent"></i>
                            <p>
                                Input Nilai
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Nilai/modul_data_nilai') ?>" class="nav-link <?=$submenu == 'data_mapel' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                Data Nilai
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Nilai/cetak_raport') ;?>" class="nav-link <?=$submenu == 'rapot' ? 'active' :'' ?>">
                            <i class="nav-icon fas fa-print"></i>
                            <p>
                                Cetak Rapot
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