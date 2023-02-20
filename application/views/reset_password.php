
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
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
    <p class="login-box-msg">Lupa Password </p>

    <form action="<?php echo base_url(); ?>login/reset_phone" method="post">
      <div class="form-group">
        <input type="number" name="telp" class="form-control" placeholder="Nomor Telepon" required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
      </div>

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">KIRIM</button>

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
<script type="text/javascript">
					$(function() {

						<?php if ($this->session->flashdata('message')==true) {
					    echo $this->session->flashdata('message');
					  } ?>
						<?php if ($this->session->flashdata('send')==true) {
					    echo $this->session->flashdata('send');
					  } ?>

					})
					function reset(url) { //url dari flashdata yang dikirim server php / function
						$.ajax({
				      url : url,
				      type: "GET",
				      success: function(data)
				      {
								var respon = xmlToJson(data)['response']['message']['text']
				        if (respon=='Success') {
				          alert("Pemulihan berhasil.");
				        }else {
				          alert("Pemulihan gagal, coba lagi.");
				        }
				      },
				      error: function (jqXHR, textStatus, errorThrown)
				      {
				          alert('Error get API SMS. Coba beberapa saat lagi.');
				      }
				  });

					}
					function xmlToJson(xml) {

						// Create the return object
						var obj = {};

						if (xml.nodeType == 1) { // element
							// do attributes
							if (xml.attributes.length > 0) {
							obj["@attributes"] = {};
								for (var j = 0; j < xml.attributes.length; j++) {
									var attribute = xml.attributes.item(j);
									obj["@attributes"][attribute.nodeName] = attribute.nodeValue;
								}
							}
						} else if (xml.nodeType == 3) { // text
							obj = xml.nodeValue;
						}

						// do children
						// If just one text node inside
						if (xml.hasChildNodes() && xml.childNodes.length === 1 && xml.childNodes[0].nodeType === 3) {
							obj = xml.childNodes[0].nodeValue;
						}
						else if (xml.hasChildNodes()) {
							for(var i = 0; i < xml.childNodes.length; i++) {
								var item = xml.childNodes.item(i);
								var nodeName = item.nodeName;
								if (typeof(obj[nodeName]) == "undefined") {
									obj[nodeName] = xmlToJson(item);
								} else {
									if (typeof(obj[nodeName].push) == "undefined") {
										var old = obj[nodeName];
										obj[nodeName] = [];
										obj[nodeName].push(old);
									}
									obj[nodeName].push(xmlToJson(item));
								}
							}
						}
						return obj;
					}

				</script>
</body>
</html>
