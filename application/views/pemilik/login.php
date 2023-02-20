
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WO</title>
  <!-- Tell the browser to be responsive to screen width -->
<?php $this->load->view('petugas/style/head'); ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->

  <div class="login-box-body">
    <?php if ($this->session->flashdata('pesan')) {
      echo $this->session->flashdata('pesan');
    } ?>
    <p class="login-box-msg">Sign in </p>

    <form action="<?php echo base_url(); ?>login/aksi_login" method="post">
      <div class="form-group has-feedback">
        <input type="full name" name="username" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>
        <!-- /.col -->

    </form>
    </div>

    <div class="social-auth-links text-center">

    <!--a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<?php $this->load->view('petugas/style/js'); ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
