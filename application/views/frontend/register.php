
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
<?php $this->load->view('petugas/style/head'); ?>
</head>
<body class="bg-img" style="background-image: url('<?= base_url('frontend/img/background1.jpg') ?>');">


<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url ('Frontend/index')?>"><img height="150" width="150" src="<?php echo base_url('uploads/logoo.png')?>"></a>
  </div>

  <div class="register-box-body" style="background:bisque;">
    <?php if ($this->session->flashdata('username_duplikat')){
    echo  $this->session->flashdata('username_duplikat');
    } ?>
    <?php if ($this->session->flashdata('email_duplikat')){
    echo  $this->session->flashdata('email_duplikat');
    } ?>

    <?php if ($this->session->flashdata('pesan')): ?>
      <?php echo $this->session->flashdata('pesan') ?>
      <?php else: ?>

    <p class="login-box-msg">Form Daftar </p>

    <form id="myForm" action="<?php echo base_url("Frontend/simpan_register")?>" method="post" data-toggle="validator" role="form">
      <div class="form-group">
        <input type="text"  id="username" name="username" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="password" id="password" name="password" class="form-control"  placeholder="Password" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
        <div class="help-block with-errors"></div>
      </div>
       <div class="form-group">
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required oninvalid="this.setCustomValidity('Tidak boleh kosong. Gunakan format email yang benar.')"oninput="setCustomValidity('')">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="text" id="no_telp" class="form-control" placeholder="No Telp" name="no_telp" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <select class="form-control select2" name="jenis_kelamin" style="width: 100%;" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
          <option value="">Jenis Kelamin</option>
          <option value="perempuan">Perempuan</option>
          <option value="laki-laki">Laki - Laki</option>
        </select>
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
        <div class="help-block with-errors"></div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->

      </div>
    </form>
  <?php endif; ?>

    <div class="text-center">
      <a class="d-block small mt-3" href="<?php echo base_url().'Login/index/';?>">Halaman Login</a><br>
    </div>

    <div class="social-auth-links text-center">
      <!--<p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a-->
    </div>

    <!--<a href="login.html" class="text-center">I already have a membership</a-->
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script type="text/javascript">
$(function() {
  $('.alphaonly').bind('keyup blur',function(){
      var node = $(this);
      node.val(node.val().replace(/[^a-zA-Z ]/g,'') ); }
  );
})
$(function() {
  $('.numberonly').bind('keyup blur',function(){
      var node = $(this);
      node.val(node.val().replace(/[^0-9 ]/gi,'') ); }
  );
})
</script>
<?php $this->load->view('petugas/style/js'); ?>

</body>
</html>
