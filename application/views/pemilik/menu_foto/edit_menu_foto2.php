
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
                <center><b><h3 class="box-title">Edit Menu Foto</h3></b></center>
              </div>
              <?php foreach($menu_foto as $row ):?>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?php echo base_url('Pemilik/update_menu_foto2')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  
                <div class="form-group col-sm-12 text-center"> 
                    <img style="width: 300px;height: 300px; " src="<?php echo base_url('uploads/admin/foto_frontend')."/".$row->foto2;?>" alt="">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Ganti foto</label>
                    <input type="hidden" name="foto2_lama" value="<?php echo $row->foto2 ?>">
                    <input type="file" class="form-control"  name="foto2" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
                  </div>
                
              </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="hidden" value="<?php echo $row->id_foto?>" name="id_foto">
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
