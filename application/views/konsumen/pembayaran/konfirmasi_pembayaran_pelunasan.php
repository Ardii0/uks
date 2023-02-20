
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
    <a href="<?php echo base_url('Admin') ?>" class="logo">
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
        Website Wedding Organizer Putri Hanastari
      </h1>
      <?php if($this->session->flashdata('error')==TRUE):?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Gagal!</h4>
        <?php echo $this->session->flashdata('error') ?>
      </div>

      <ol class="breadcrumb">
        <!--li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li-->
      </ol>
    </section>
    <?php endif;?>
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <div class="box">
              <div class="box-header with-border">
                <center><b><h3 class="box-title">Konfirmasi Pembayaran</h3></b></center>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?php echo base_url('Konsumen/konfirmasi_pelunasan')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                <div class="form-group col-sm-12" hidden>
                  <label class="col-sm-2 control-label">Tagihan Pelunasan</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $dt->pelunasan_pw?>" name="bayar_pelunasan" class="form-control" placeholder="Masukan Pelunasan"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Tanggal Pesan</label>
                  <div class="col-sm-10">
                    <input type="date" value="<?php echo $dt->tanggal_pesanan?>" name="tanggal_pesanan" class="form-control" placeholder="Masukan Tanggal Pesan"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Nama Bank</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $dt->nama_bank_pelunasan?>" name="nama_bank_pelunasan" class="form-control" placeholder="Masukan Nama Bank"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">No Invoice</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $dt->no_invoice_pelunasan?>" name="no_invoice_pelunasan" class="form-control" placeholder="Masukan No Invoice"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Tanggal Bayar</label>
                  <div class="col-sm-10">
                    <input type="date" value="<?php echo $dt->tanggal_bayar_pelunasan?>" name="tanggal_bayar_pelunasan" class="form-control" placeholder="Masukan Tanggal Bayar"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Unggah Bukti Pembayaran</label>
                    <div class="col-sm-10">
                      <input type="file" name="bukti_pembayaran_pelunasan" class="form-control" placeholder="Masukan Bukti Pembayaran"><br>
                    </div>
                </div>
              </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="hidden" value="<?php echo $dt->id_admin?>" name="id_admin">
                  <button type="submit" class="btn btn-primary">update</button>
                  <button type="button" class="btn btn-primary" onclick="kembali()">Kembali</button>
                </div>
                <!-- /.box-footer -->
              </form>
           
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('konsumen/style/footer')?>
</div>

<?php $this->load->view('konsumen/style/js')?>
<script>
  $(function () {
    $('#table_1').DataTable()
  });
  function kembali()
    {
      window.history.go(-1);
    }

</script>
</body>
</html>
