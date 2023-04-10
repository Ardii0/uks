<?php if($this->session->userdata('level') === 'Admin') {?>
  <?php $this->load->view('petugas/style/sidebar')?>
<?php } else {?>
  <div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="<?php echo base_url('PetugasAlumni/'); ?>" class="brand-link">
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
          <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?php echo base_url('PetugasAlumni/') ;?>"  class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard Petugas
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('PetugasAlumni/data_angkatan') ;?>"  class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Angkatan
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