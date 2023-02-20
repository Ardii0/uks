
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WO Putri Hanastari</title>
  <?php $this->load->view('konsumen/style/head')?>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>WO</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WO Putri Hanastari</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <?php $this->load->view('konsumen/style/navbar')?>
  </header>
  <?php $this->load->view('konsumen/style/sidebar')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hai <br> Selamat datang di Website Wedding Organizer "Putri Hanastari"
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
        <center>
          <h1>
            PAKET PERNIKAHAN
          </h1>
        </center>
          <?php foreach($menu_paket as $row):?>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box btn-success">
              <div class="inner">
                <center>
                <h4>Paket 1</h4>
                <p><?php echo $row->paket1?></p>
              </center>
              </div>
              <div class="icon">
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box btn-success">
              <div class="inner">
                <center>
                <h4>Paket 2</h4>
                <p><?php echo $row->paket2?></p>
              </center>
              </div>
              <div class="icon">
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box btn-success">
              <div class="inner">
                <center>
                <h4>Paket 3</h4>
                <p><?php echo $row->paket3?></p>
              </center>
              </div>
              <div class="icon">
              </div>
            </div>
          </div>
          <?php endforeach ?>
          <div class="col-lg-12">
            <!-- small box -->
                <center>
                <a href="<?php echo base_url('Konsumen/paket_wedding/')?>" class="btn btn-primary btn-sm">Selengkapnya</a>
              </center>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('konsumen/style/footer')?>
</div>

<?php $this->load->view('konsumen/style/js')?>
</body>
</html>
