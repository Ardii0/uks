<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>/assets/dist/img/klinik.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Data Entry</p>
        <!--a href="#"><i class="fa fa-circle text-success"></i> Online</a-->
      </div>
    </div>

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">

      </li>
        <li><a href="<?php echo base_url('Konsumen/index') ?>"><i class="fa fa-circle-o text-red"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url('Konsumen/paket_wedding') ?>"><i class="fa fa-circle-o text-red"></i> <span>Paket Wedding</span></a></li>
        <li><a href="<?php echo base_url('Konsumen/pembayaran') ?>"><i class="fa fa-circle-o text-red"></i> <span>Pembayaran</span></a></li>
        <li><a href="<?php echo base_url('Konsumen/profil') ?>"><i class="fa fa-circle-o text-red"></i> <span>Profil</span></a></li>
      <li><a href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
