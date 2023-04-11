<?php if($this->session->userdata('level') === 'Admin') {?>
<?php $this->load->view('petugas/style/sidebar')?>
<?php } else {?>
<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="<?php echo base_url('Alumni/'); ?>" class="brand-link">
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
            <nav class="mt-2" data-scrollbar-auto-hide="n">
                <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo base_url('Alumni/') ;?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard Alumni
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Alumni/data_diri') ;?>" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Data Diri
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Alumni/') ;?>" class="nav-link">
                            <i class="nav-icon fas fa-suitcase"></i>
                            <p>
                                Bursa Kerja
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Alumni/') ;?>" class="nav-link">
                            <i class="nav-icon fas fa-calendar-day"></i>
                            <p>
                                Event
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Alumni/testimoni') ;?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Testimoni
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-comment-dots"></i>
                            <p>
                                Kritik & Saran
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('Alumni/user_kritik') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kritik</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Alumni/user_saran') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Saran</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Alumni/akun') ;?>" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Akun
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