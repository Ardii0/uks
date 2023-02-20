
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
                <center><b><h3 class="box-title">Edit Konsumen</h3></b></center>
              </div>
              <?php foreach($data_konsumen as $row ):?>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?php echo base_url('Admin/update_konsumen')?>" method="post">
                <div class="box-body">
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->username?>" name="username" class="form-control" placeholder="Masukan Username"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->nama?>" name="nama" class="form-control" placeholder="Masukan Nama"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">No Telp</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->no_telp?>" name="no_telp" class="form-control" placeholder="Masukan No Telp"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->email?>" name="email" class="form-control" placeholder="Masukan Email"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->jenis_kelamin?>" name="jenis_kelamin" class="form-control" placeholder="Masukan Jenis Kelamin"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->alamat?>" name="alamat" class="form-control" placeholder="Masukan Alamat"><br>
                  </div>
                </div>
              </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="hidden" value="<?php echo $row->id_admin?>" name="id_admin">
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
