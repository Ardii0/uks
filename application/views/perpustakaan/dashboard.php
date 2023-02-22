<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <?php $this->load->view('perpustakaan/style/head')?>
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<div class="wrapper">

 <!-- navbar -->
 <?php $this->load->view('perpustakaan/style/navbar')?>
 <!-- navbar -->
  <!-- Sidebar -->
  <?php $this->load->view('perpustakaan/style/sidebar')?>
  <!-- Sidebar -->

  <div class="content-wrapper">
      <div class="container-fluid">
      <div class="row">
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
              
                <p>Jumlah Paket Wedding</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box btn-success">
              <div class="inner">
               

                <p>Jumlah Konsumen</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                

                <p>Jumlah Pesanan</p>
              </div>
              <div class="icon">
                <i class="fa fa-bar-chart"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
               

                <p>Jumlah Pembayaran DP</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box btn-success">
              <div class="inner">
                
                <p>Jumlah Pembayaran Pelunasan</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
              

                <p>Jumlah Pembayaran Lunas</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>
              
            </div>
          </div>
          
        </div>
      </div>
   
  </div>
<?php $this->load->view('perpustakaan/style/js')?>

</body>
</html>
