<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Sekolah</title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="icon" href="<?php echo base_url('assets/dist/img/logo-login.png'); ?>">
    <?php $this->load->view('petugas/style/head'); ?>
</head>

<body>
    <section class="min-vh-100" style="background-color: #4169e1;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-6 col-lg-7 ">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="">
                            <div class="d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="<?php echo base_url(); ?>login/aksi_login" method="post">
                                        <div class="text-center mb-2 pb-1">
                                            <img src="<?php echo base_url('assets/dist/img/logo-login.png'); ?>"
                                                width="152" height="129" class="d-inline-block align-text-top me-3">
                                            <div class="h2 mt-1 fw-bold mb-0 mx-2">Sistem Informasi Sekolah</div>
                                        </div>

                                        <h5 class="fw-normal mb-1 pb-3" style="letter-spacing: 1px;">Silahkan login ke
                                            akun anda</h5>
                                        <div class="form-outline mb-2">
                                            <label class="form-label" for="form2Example17">Username</label>
                                            <input id="form2Example17" type="full name" name="username"
                                                class="form-control form-control-lg" placeholder="Username" required
                                                oninvalid="this.setCustomValidity('Tidak boleh kosong')"
                                                oninput="setCustomValidity('')" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Password</label>
                                            <input id="form2Example27" type="password" name="password"
                                                class="form-control form-control-lg" placeholder="Password" required
                                                oninvalid="this.setCustomValidity('Tidak boleh kosong')"
                                                oninput="setCustomValidity('')" />
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a href="<?php echo base_url('Login/login_email'); ?>">Login menggunakan email</a>
                                            </div>
                                            <!-- <div class="">
                                                <a href="<?php echo base_url('Register'); ?>">Daftar Sekarang!</a>
                                            </div> -->
                                        </div>

                                        <div class="pt-2 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>

</html>