<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>/assets/dist/img/klinik.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
        <!--a href="#"><i class="fa fa-circle text-success"></i> Online</a-->
      </div>
    </div>

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">

      </li>
        <li><a href="<?php echo base_url('Admin/index') ?>"><i class="fa fa-circle-o text-red"></i> <span>Dashboard</span></a></li>
        
        <li><a href="<?php echo base_url('Admin/paket_wedding') ?>"><i class="fa fa-circle-o text-red"></i> <span>Paket Wedding</span></a></li>
        <li><a href="<?php echo base_url('Admin/konsumen') ?>"><i class="fa fa-circle-o text-red"></i> <span>Data Konsumen</span></a></li>
        <li><a href="<?php echo base_url('Admin/data_pesanan') ?>"><i class="fa fa-circle-o text-red"></i> <span>Data Pesanan</span></a></li>
        <li class="treeview"><a><i class="fa fa-circle-o text-red"></i>Data Pembayaran<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
         <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Admin/pembayaran_belum_dp')?>"><i class="fa fa-circle-o"></i>Belum Lunas DP</a></li>
            <li><a href="<?php echo base_url('Admin/pembayaran_belum_pelunasan')?>"><i class="fa fa-circle-o"></i>Belum Lunas Pelunasan</a></li>
            <li><a href="<?php echo base_url('Admin/pembayaran_lunas')?>"><i class="fa fa-circle-o"></i>Lunas</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('Admin/data_laporan_pesanan') ?>"><i class="fa fa-circle-o text-red"></i> <span>Data Laporan</span></a></li>
        
      <li><a href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Logout</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
