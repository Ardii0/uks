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
                                <div class="card-body p-4 p-lg-5 text-black ">

                                ss="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center"></div>
                                            <div><a href="Login">Login?</a></div>
                                        </div>


                                        <div class="pt-2 mb-4">
                                            <button value="Submit" class="btn btn-dark btn-lg btn-block" type="submit">Daftar</button>
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

    <script>
    function checkPassword(form) {
        const password = form.password.value;
        const konfirPassword = form.konfirPassword.value;

        if (password != konfirPassword) {
            alert("Error! Password tidak sama.");
            return false;
        } else {
            alert("Berhasil, anda telah melakukan register!");
            return true;
        }
    }
    </script>
</body>

</html>