<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>/assets/dist/img/poto.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->nama; ?></p>
        <!--a href="#"><i class="fa fa-circle text-success"></i> Online</a-->
      </div>
    </div>

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">

      </li>
      <li><a href="<?php echo base_url('Pasien/profil') ?>"><i class="fa fa-circle-o text-red"></i> <span>Profil</span></a></li>
      <li><a href="<?php echo base_url('Pasien/pendaftaran') ?>"><i class="fa fa-circle-o text-red"></i> <span>Pendaftaran</span></a></li>
      <li><a href="<?php echo base_url('Pasien/rekam_medis') ?>"><i class="fa fa-circle-o text-red"></i> <span>Rekam Medis</span></a></li>
      <li><a href="<?php echo base_url('Pasien/logout') ?>"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
