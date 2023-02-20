
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WO Putri Hanastari</title>
  <?php $this->load->view('pemilik/style/head')?>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('Pemilik') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>WO</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WO Putri Hanastari</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php $this->load->view('pemilik/style/navbar')?>
  </header>
  <?php $this->load->view('pemilik/style/sidebar')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Selamat Bekerja!!<br>
        Wedding Organizer Putri Hanastari
      </h1>
      <ol class="breadcrumb">
        <!--li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li-->
      </ol>
    </section>

    <section class="content">
      <?php if ($this->session->flashdata('pesan')) {
        echo $this->session->flashdata('pesan');
      } ?>
      <div class="container-fluid">
      <div class="row">
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $total_paket_wedding ?></h3>

                <p>Jumlah Paket Wedding</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="<?php echo base_url('Pemilik/paket_wedding/')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box btn-success">
              <div class="inner">
                <h3><?php echo $total_konsumen ?></h3>

                <p>Jumlah Konsumen</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('Pemilik/konsumen/')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $total_pesanan ?></h3>

                <p>Jumlah Pesanan</p>
              </div>
              <div class="icon">
                <i class="fa fa-bar-chart"></i>
              </div>
              <a href="<?php echo base_url('Pemilik/data_pesanan/')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $total_pembayaran_dp ?></h3>

                <p>Jumlah Pembayaran DP</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>
              <a href="<?php echo base_url('Pemilik/pembayaran_belum_dp/')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box btn-success">
              <div class="inner">
                <h3><?php echo $total_pembayaran_pelunasan ?></h3>

                <p>Jumlah Pembayaran Pelunasan</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>
              <a href="<?php echo base_url('Pemilik/pembayaran_belum_pelunasan/')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $total_pembayaran_lunas ?></h3>

                <p>Jumlah Pembayaran Lunas</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>
              <a href="<?php echo base_url('Pemilik/pembayaran_lunas/')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('pemilik/style/footer')?>
</div>

<?php $this->load->view('pemilik/style/js')?>
</body>
</html>
