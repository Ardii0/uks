<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>/assets/dist/img/klinik.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Pemilik</p>
        <!--a href="#"><i class="fa fa-circle text-success"></i> Online</a-->
      </div>
    </div>

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">

      </li>
        <li><a href="<?php echo base_url('Pemilik/index') ?>"><i class="fa fa-circle-o text-red"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url('Pemilik/petugas') ?>"><i class="fa fa-circle-o text-red"></i> <span>Data Petugas</span></a></li>
        <li><a href="<?php echo base_url('Pemilik/menu_paket') ?>"><i class="fa fa-circle-o text-red"></i> <span>Data Menu Paket</span></a></li>
        <li><a href="<?php echo base_url('Pemilik/menu_foto') ?>"><i class="fa fa-circle-o text-red"></i> <span>Data Menu Foto</span></a></li>
        <li><a href="<?php echo base_url('Pemilik/data_laporan_pesanan') ?>"><i class="fa fa-circle-o text-red"></i> <span>Data Laporan</span></a></li>
        
      <li><a href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
