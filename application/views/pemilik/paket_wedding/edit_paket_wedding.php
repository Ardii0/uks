
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
              <div class="box-header with-border">
                <center><b><h3 class="box-title">Edit Paket Wedding</h3></b></center>
              </div>
              <?php foreach($paket_wedding as $row ):?>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?php echo base_url('Admin/update_paket_wedding')?>" method="post">
                <div class="box-body">
                  <div class="form-group col-sm-12 text-center">
                    <img style="width: 300px;height: 300px; " src="<?php echo base_url('uploads/admin/paket_wedding/')."/".$row->gambar_pw;?>" alt="">
                  </div>
                  <div class="form-group col-sm-12 text-center">
                    <h1><?php echo $row->judul_pw?></h1>
                  </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->harga_pw?>" name="harga_pw" class="form-control" placeholder="Masukan Harga"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Harga DP</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->dp_pw?>" name="dp_pw" class="form-control" placeholder="Masukan Harga DP"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Harga Pelunasan</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->pelunasan_pw?>" name="pelunasan_pw" class="form-control" placeholder="Masukan Harga Pelunasan"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->deskripsi_pw?>" name="deskripsi_pw" class="form-control" placeholder="Masukan Deskripsi"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Wedding Decoration</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->decoration_pw?>" name="decoration_pw" class="form-control" placeholder="Masukan Wedding Decoration"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Make Up Artist</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->makeup_artist_pw?>" name="makeup_artist_pw" class="form-control" placeholder="Masukan Make Up"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Wedding Documentation</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->documentation_pw?>" name="documentation_pw" class="form-control" placeholder="Masukan Wedding Documentation"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Catering</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->catering_pw?>" name="catering_pw" class="form-control" placeholder="Masukan Catering"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Entertainment</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->entertainment_pw?>" name="entertainment_pw" class="form-control" placeholder="Masukan Entertainment"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Efek dan Flashmob</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->efek_flashmob_pw?>" name="efek_flashmob_pw" class="form-control" placeholder="Masukan Efek Flashmob"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Exclusive Give</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->exclusive_pw?>" name="exclusive_pw" class="form-control" placeholder="Masukan Exclusive Give"><br>
                  </div>
                </div>
              </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="hidden" value="<?php echo $row->id_paket_wedding?>" name="id_paket_wedding">
                  <button type="submit" class="btn btn-primary">update</button>
                  <button type="button" class="btn btn-primary" onclick="kembali()">Kembali</button>
                </div>
                <!-- /.box-footer -->
              </form>
            <?php endforeach;?>
           
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
  });
  function kembali()
    {
      window.history.go(-1);
    }

</script>
</body>
</html>
