<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php $this->load->view('style/head')?>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        font-weight: 400;
        color: #666666;
        background: #eaeff4;
    }

    .container {
        position: relative;
        display: flex;
        background: #ffffff;
        box-shadow: 0 0 15px rgba(0, 0, 0, .1);

    }

    /* * * * * Login Form CSS * * * * */
    h3,
    h5 {
        margin: 0 0 15px 0;
        font-weight: 700;
        text-align: center;
    }

    p {
        margin: 0 0 20px 0;
        font-weight: 500;
        line-height: 5px;
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
        width: 40%;
        padding: 10px;
        display: flex;
        height: 650px;
    }

    .col-left {
        width: 75%;
        background: #4CAF50;
        -webkit-clip-path: polygon(98% 17%, 100% 34%, 98% 51%, 100% 68%, 98% 84%, 100% 100%, 0 100%, 0 0, 100% 0);
        clip-path: polygon(98% 17%, 100% 34%, 98% 51%, 100% 68%, 98% 84%, 100% 100%, 0 100%, 0 0, 100% 0);
        margin-left: -8px;
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
        height: 50px;
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

    /* tab */
    li {
        line-height: 20px;
        font-size: 15px;
        margin-right: 20px;
    }

    .tabs {
        position: relative;
        display: flex;
        min-height: 300px;
        border-radius: 8px 8px 0 0;
    }

    .tabby-tab {
        flex: 1;
    }

    .tabby-tab label {
        display: block;
        box-sizing: border-box;
        height: 40px;

        padding: 10px;
        text-align: center;
        background: #4CAF50;
        border: 1px solid #abce80;
        cursor: pointer;
        transition: background 0.5s ease;
    }

    .tabby-tab label:hover {
        background: #4CAF50;
    }

    .tabby-content {
        position: absolute;
        left: 0;
        top: 40px;
        border-radius: 0 0 8px 8px;
        margin-top: 15px;
        opacity: 0;
    }

    /* MAKE IT WORK ----- */

    .tabby-tab [type=radio] {
        display: none;
    }

    [type=radio]:checked~label {
        background: #abce80;
        border: 1px solid #abce80;
        z-index: 2;
    }

    [type=radio]:checked~label~.tabby-content {
        z-index: 1;

        /* show/hide */
        opacity: 1;
        transform: scale(1);
    }
    </style>
</head>

<body>
    <div class="min-vh-100 d-flex justify-content-center align-items-center">
        <div class="wrapper">
            <div class="container ">
                <div class="col-left">
                    <div class="login-text">
                        <div class="header">
                            <h5 class="mt-2">Motto</h5>
                            <h6 class="text-center "><b> TERDEPAN</b></h6>
                            <p class="text-center mt-2">“ Terintegritas Dedikasi Empati Profesional Akurat Normatif ”
                            </p>
                            <h5>Visi</h5>
                            <div class="text-center" style="margin-top: -10px;">“ Terwujudnya Pelayanan Kesehatan Yang
                                Bermutu Menuju Sekolah
                                Sehat, Aman, Bersih, Dan Menyenangkan ”</div>
                        </div>

                        <!-- tab -->
                        <div class="mt-3">
                            <div class="tabs">
                                <div class="tabby-tab">
                                    <input type="radio" id="tab-1" name="tabby-tabs" checked>
                                    <label for="tab-1">Indikator</label>
                                    <div class="tabby-content">
                                        <ol type="1">
                                            <li>Terpenuhinya hak dan kebutuhan murid akan kesehatan.</li>
                                            <li>Terdapat komitmen dari sekolah yang memuat tentang sekolah sehat, aman ,
                                                bersih dan menyenangkan.</li>
                                            <li>Terdapat Tim pendampingan sekolah sehat, aman, bersih, dan menyenangkan.
                                            </li>
                                            <li>Kurikulum sekolah menempatkan pengetahuan tentang kesehatan terintegrasi
                                                dengan mata pelajaran.</li>
                                            <li>Terdapat rencana dan aksi secara berkala, tahunan, dan bersinambungan
                                                untuk mewujudkan sekolah sehat, aman, ramah anak, dan menyenangkan yang
                                                terintegrasi dalam kebijakan Usaha Kesehatan Sekolah, Sekolah Adiwiyata,
                                                Sekolah Ramah Anak, Sekolah Standar Kependudukan.</li>
                                            <li>Tercukupinya kebutuhan sarana dan prasarana kesehatan (cuci tangan,
                                                jamban, air bersih, sampah dan pengelolannya).</li>
                                            <li>Lingkungan Sekolah terbebas dari perundungan, pergaulan bebas, asap
                                                rokok dan narkoba (NAPZA).</li>
                                            <li>Terselenggaranya kegiatan untuk menjaga kesehatan warga sekolah.</li>
                                            <li>Terdapat rambu-rambu keamanan dan kenyamanan warga sekolah untuk
                                                perlindungan dari bencana.</li>
                                        </ol>
                                    </div>
                                </div>

                                <div class="tabby-tab">
                                    <input type="radio" id="tab-2" name="tabby-tabs">
                                    <label for="tab-2">Misi</label>
                                    <div class="tabby-content">
                                        <ol type="1">
                                            <li>Menyelenggarakan pemenuhan kebutuhan kesehatan bagi warga sekolah sesuai
                                                dengan standar keamanan dan kenyamanan.</li>
                                            <li>Melaksanakan pemeliharaan ruang dan gedung sesuai standar keamanan dan
                                                kesehatan.</li>
                                            <li>Membentuk Tim Pendampingan Sekolah sehat, aman, bersih, dan
                                                menyenangkan.</li>
                                            <li>Semua mata pelajaran mengintegrasikan sekolah sehat, aman, bersih, dan
                                                menyenangkan.</li>
                                            <li>Menyusun Program Tahunan untuk mewujudkan sekolah sehat, aman, ramah
                                                anak, dan menyenangkan yang terintegrasi dalam kebijakan Usaha Kesehatan
                                                Sekolah, Sekolah Adiwiyata, Sekolah Ramah Anak, Sekolah Standar
                                                Kependudukan.</li>
                                            <li>Menyediakan kebutuhan sarana dan prasarana kesehatan (cuci tangan,
                                                jamban, air bersih, sampah dan pengelolannya).</li>
                                            <li>Menciptakan Lingkungan Sekolah terbebas dari perundungan, pergaulan
                                                bebas, asap rokok dan narkoba (NAPZA).</li>
                                            <li>Melaksanakan Kegiatan secara terprogram untuk menjaga kesehatan warga
                                                sekolah.</li>
                                            <li>Menyediakan rambu-rambu keamanan dan kenyamanan warga sekolah untuk
                                                perlindungan dari bencana.</li>
                                        </ol>
                                    </div>
                                </div>

                                <div class="tabby-tab">
                                    <input type="radio" id="tab-3" name="tabby-tabs">
                                    <label for="tab-3">Tujuan</label>
                                    <div class="tabby-content">
                                        <ol type="1">
                                            <li>Dapat menyelenggarakan pemenuhan kebutuhan kesehatan bagi warga sekolah
                                                sesuai dengan standar keamanan dan kenyamanan.</li>
                                            <li>Dapat melaksanakan pemeliharaan ruang dan gedung sesuai standar keamanan
                                                dan kesehatan.</li>
                                            <li>Dapat membentuk Tim Pendampingan Sekolah sehat, aman, bersih, dan
                                                menyenangkan.</li>
                                            <li>Dapat mengintegrasikakn sekolah sehat, aman, bersih, dan menyenangkan
                                                pada semua mata pelajaran.</li>
                                            <li>Dapat menyusun Program Tahunan untuk mewujudkan sekolah sehat, aman,
                                                ramah anak, dan menyenangkan yang terintegrasi dalam kebijakan Usaha
                                                Kesehatan Sekolah, Sekolah Adiwiyata, Sekolah Ramah Anak, Sekolah
                                                Standar Kependudukan.</li>
                                            <li>Dapat menyediakan kebutuhan sarana dan prasarana kesehatan (cuci tangan,
                                                jamban, air bersih, sampah dan pengelolannya).</li>
                                            <li>Dapat menciptakan Lingkungan Sekolah terbebas dari perundungan,
                                                pergaulan bebas, asap rokok dan narkoba (NAPZA).</li>
                                            <li>Dapat melaksanakan Kegiatan secara terprogram untuk menjaga kesehatan
                                                warga sekolahDapat mengoptimalkan kegiatan sesuai standar sekolah sehat,
                                                aman, dan menyenangkan.</li>
                                            <li>Dapat menyediakan rambu-rambu keamanan dan kenyamanan warga sekolah
                                                untuk perlindungan dari bencana</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-right">
                    <div class="login-form p-3">
                        <h3 class="mt-2">UKS SMP N 1 SEMARANG</h3>
                        <h5>
                            <img src="<?php echo base_url('assets/logo_login.png'); ?>" width="240" height="240"
                                class="d-inline-block align-text-top me-3">
                        </h5>
                        <h3>Register</h3>
                        <form action="<?php echo base_url('register/aksi_registrasi')?>" method="post">
                            <p>
                                <input type="text" name="username" placeholder="Username" required>
                            </p>
                            <p style="display: flex">
                                <input type="password" name="password" placeholder="Password" id="myPass">
                                <span id="showPass">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    <i class="fa fa-eye-slash" aria-hidden="true" style="display:none;"></i>
                                </span>
                            </p>
                            <p>
                                <button class="btn btn-success w-100" type="submit" style="height: 50px">Sign
                                    Up</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('style/js') ?>

        <!-- show/hidden password -->
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

        <!-- sweetalert -->
        <?php if ($this->session->flashdata('salah')): ?>
        <script>
        swal.fire({
            title: "<?php echo $this->session->flashdata('salah')?>",
            icon: "error",
            showConfirmButton: false,
            timer: 1250,
        });
        </script>
        <?php if (isset($_SESSION['salah'])) {
            unset($_SESSION['salah']);
        }
    endif; ?>

        <!-- sweetalert register -->
        <?php if ($this->session->flashdata('register')): ?>
        <script>
        swal.fire({
            title: "<?php echo $this->session->flashdata('register')?>",
            icon: "success",
            showConfirmButton: false,
            timer: 1250,
        });
        </script>
        <?php if (isset($_SESSION['register'])) {
            unset($_SESSION['register']);
        }
    endif; ?>
</body>

</html>