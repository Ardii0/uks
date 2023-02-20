<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WO Putri Hanastari</title>
  <?php $this->load->view('petugas/style/head')?>
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
    <?php $this->load->view('petugas/style/navbar')?>
  </header>
  <?php $this->load->view('petugas/style/sidebar')?>

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
            <div class="box-header">
              <center><b><h3 class="box-title">Tambah Paket Wedding</h3></b></center>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo base_url('Admin/aksi_tambah_paket_wedding')?>" enctype="multipart/form-data" method="post">
              <div class="box-body">
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul_pw" class="form-control" placeholder="Masukan Judul Paket"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-10">
                    <input type="text" name="harga_pw" class="form-control" placeholder="Masukan Harga"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Harga DP</label>
                  <div class="col-sm-10">
                    <input type="text" name="dp_pw" class="form-control" placeholder="Masukan Harga DP"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Harga Pelunasan</label>
                  <div class="col-sm-10">
                    <input type="text" name="pelunasan_pw" class="form-control" placeholder="Masukan Harga Pelunasan"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi_pw" class="form-control" placeholder="Masukan Deskripsi"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Wedding Decoration</label>
                  <div class="col-sm-10">
                    <input type="text" name="decoration_pw" class="form-control" placeholder="Masukan Wedding Decoration"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Make Up Artist</label>
                  <div class="col-sm-10">
                    <input type="text" name="makeup_artist_pw" class="form-control" placeholder="Masukan Make Up"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Wedding Documentation</label>
                  <div class="col-sm-10">
                    <input type="text" name="documentation_pw" class="form-control" placeholder="Masukan Wedding Documentation"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Catering</label>
                  <div class="col-sm-10">
                    <input type="text" name="catering_pw" class="form-control" placeholder="Masukan Catering"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Entertainment</label>
                  <div class="col-sm-10">
                    <input type="text" name="entertainment_pw" class="form-control" placeholder="Masukan Entertainment"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Efek dan Flashmob</label>
                  <div class="col-sm-10">
                    <input type="text" name="efek_flashmob_pw" class="form-control" placeholder="Masukan Efek Flashmob"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Exclusive Give</label>
                  <div class="col-sm-10">
                    <input type="text" name="exclusive_pw" class="form-control" placeholder="Masukan Exclusive Give"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Unggah Foto</label>
                    <div class="col-sm-10">
                      <input type="file" name="gambar_pw" class="form-control">
                    </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-primary" onclick="kembali()">Kembali</button>
              </div>
            </form>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('petugas/style/footer')?>
</div>

<?php $this->load->view('petugas/style/js')?>
<script>
  $(function () {
    $('#table_1').DataTable()
  })

  function kembali()
    {
      window.history.go(-1);
    }
</script>
</body>
</html>
