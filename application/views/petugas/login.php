
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WO</title>
  <!-- Tell the browser to be responsive to screen width -->
<?php $this->load->view('petugas/style/head'); ?>
</head>
<body class="body-login">

<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="signup">
				<form action="<?php echo base_url(); ?>login/aksi_login" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="full name" name="username" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
					<input type="password" name="password" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
					<button type="submit">Login</button>
				</form>
			</div>
	</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
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
