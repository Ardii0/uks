<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php $this->load->view('style/head')?>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
        font-weight: 400;
        color: #666666;
        background: #eaeff4;
    }

    .wrapper {
        width: 100%;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .container {
        position: relative;
        /* max-width: 1000px; */
        display: flex;
        background: #ffffff;
        box-shadow: 0 0 15px rgba(0, 0, 0, .1);

    }

    /* * * * * Login Form CSS * * * * */
    h4,
    h2 {
        margin: 0 0 15px 0;
        /* font-size: 30px; */
        font-weight: 700;
        text-align: center;
    }

    p {
        margin: 0 0 20px 0;
        font-size: 16px;
        font-weight: 500;
        line-height: 15px;
    }

    .btn {
        display: inline-block;
        padding: 7px 20px;
        font-size: 16px;
        letter-spacing: 1px;
        text-decoration: none;
        border-radius: 5px;
        color: #ffffff;
        outline: none;
        border: 1px solid #ffffff;
        transition: .3s;
        -webkit-transition: .3s;
    }

    .btn:hover {
        color: #4CAF50;
        background: #ffffff;
    }

    .col-left,
    .col-right {
        width: 55%;
        padding: 25px;
        display: flex;
    }

    .col-left {
        width: 85%;
        background: #4CAF50;
        -webkit-clip-path: polygon(98% 17%, 100% 34%, 98% 51%, 100% 68%, 98% 84%, 100% 100%, 0 100%, 0 0, 100% 0);
        clip-path: polygon(98% 17%, 100% 34%, 98% 51%, 100% 68%, 98% 84%, 100% 100%, 0 100%, 0 0, 100% 0);
        margin-left: -7px;

    }

    .login-text {
        position: relative;
        width: 100%;
        color: #ffffff;
        text-align: justify;
        margin-right: 15px;
    }

    .login-form {
        position: relative;
        width: 100%;
        color: #666666;
    }

    .login-form p:last-child {
        margin: 0;
    }

    .login-form p a {
        color: #4CAF50;
        font-size: 14px;
        text-decoration: none;
    }

    .login-form p:last-child a:last-child {
        float: right;
    }

    .login-form input {
        display: block;
        width: 100%;
        height: 60px;
        padding: 0 10px;
        font-size: 16px;
        letter-spacing: 1px;
        outline: none;
        border: 1px solid #cccccc;
        border-radius: 5px;
    }

    .login-form input:focus {
        border-color: #4CAF50;
    }

    #showPass {
        display: inline-block;
        margin-left: -40px;
        align-self: center;
    }
    </style>
</head>

<body>
    <div class="wrapper mb-5 mt-5">
        <div class="container ">
            <div class="col-left">
                <div class="login-text">
                    <h2 class="text-center " style="font-weight: 700">UKS SMP N 1 SEMARANG</h2>
                    <h4 class="mt-4">Motto</h4>
                    <h5 class="text-center "><b> TERDEPAN</b></h5>
                    <p class="text-center mt-2">“ Terintegritas Dedikasi Empati Profesional Akurat Normatif ”</p>
                    <h4>Visi</h4>
                    <p class="text-center ">“ Luhur Budi, Cerdas, Berprestasi ”</p>
                    <h4>Misi</h4>
                    <ol type="1">
                        <li>Menyelenggarakan pendidikan yang lebih baik dan bermutu sehingga dapat menciptakan
                            peserta
                            didik yang komprehensif dan kompetitif, berpenghayatan terhadap ajaran yang dianut dan
                            berbudi pekerti luhur sehingga siswa mampu mengaktualisasikan dalam kehidupannya
                            sehari-hari.</li>
                        <li>Melaksanakan kegiatan belajar mengajar yang intensif, efektif, dan efisien, serta
                            memberikan
                            bimbingan yang maksimal kepada peserta didik sehingga mampu berkembang secara optimal
                            sesuai
                            dengan potensi yang dimiliki.</li>
                        <li>Melaksanakan kegiatan ekstrakurikuler secara intensif sehingga dapat memupuk bakat dan
                            minat
                            yang dimiliki para peserta didik.</li>
                        <li>Melaksanakan kegiatan jam tambahan secara intensif, ekstensif secara terstruktur dan
                            terprogram.</li>
                        <li>Melaksanakan kegiatan lain yang mendukung dan berkaitan dengan kegiatan sekolah yang
                            lebih
                            baik, transparan, akuntabel, dan demokratis.</li>
                    </ol>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h4>
                        <img src="<?php echo base_url('assets/logo_login.png'); ?>" width="320" height="320"
                            class="d-inline-block align-text-top me-3">
                    </h4>
                    <h2>Register</h2>
                    <form action="<?php echo base_url('Register/aksi_registrasi')?>" method="post">
                        <p>
                            <input type="text" name="username" placeholder="Username" required>
                        </p>
                        <p style="display: flex">
                            <input type="password" name="password" placeholder="Password" id="myPass">
                            <span id="showPass">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                <i class="fa fa-eye" aria-hidden="true" style="display:none;"></i>
                            </span>
                        </p>
                        <p>
                            <button class="btn btn-success w-100" type="submit" style="height: 60px">Sign Up</button>
                        </p>
                        <!-- <p>
                            <a href="Register">Create an account.</a>
                        </p> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('style/js')?>
    <script>
    $(document).ready(function() {
        $("#showPass").click(function() {
            if ($("#myPass").attr("type") == "password") {
                $("#myPass").attr("type", "text");
            } else {
                $("#myPass").attr("type", "password");
            }
        });
        $("#showPass").click(function() {
            $("#showPass i").toggle();
        });
    });
    </script>
</body>

</html>