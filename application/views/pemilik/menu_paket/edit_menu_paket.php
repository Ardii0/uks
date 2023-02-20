
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
                <center><b><h3 class="box-title">Edit Menu Paket</h3></b></center>
              </div>
              <?php foreach($menu_paket as $row ):?>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?php echo base_url('Pemilik/update_menu_paket')?>" method="post">
                <div class="box-body">
                  
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Paket 1</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->paket1?>" name="paket1" class="form-control" placeholder="Masukan Paket 1"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Paket 2</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->paket2?>" name="paket2" class="form-control" placeholder="Masukan Pake 2"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Paket 3</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->paket3?>" name="paket3" class="form-control" placeholder="Masukan Paket 3"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Paket 4</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->paket4?>" name="paket4" class="form-control" placeholder="Masukan Paket 4"><br>
                  </div>
                </div>
                
              </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="hidden" value="<?php echo $row->id_menu_paket?>" name="id_menu_paket">
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
  <?php $this->load->view('pemilik/style/footer')?>
</div>

<?php $this->load->view('pemilik/style/js')?>
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
