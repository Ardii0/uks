<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sekolah</title>
    <?php $this->load->view('landingpage/style/head')?>
    <style>
    body {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    body::-webkit-scrollbar {
        display: none;
    }

    header {
        height: 100vh;
        background-size: cover;
        /* background-image: url('https://binusasmg.sch.id/ppdb/images/gstp.jpg'); */
        background-image: url('https://binusasmg.sch.id/ppdb/images/binus2.jpg');
    }

    .background-image-black {
        height: 100vh;
        background-color: rgb(0, 0, 0, 0.7);
    }

    .content-home {
        width: 50%;
    }

    .judul {
        color: #eaa825;
        font-size: 30px;
        font-weight: bold;
    }

    .sub-judul {
        margin-top: 10px;
        color: white;
        font-size: 50px;
        font-weight: bold;
    }

    .isi {
        color: white;
        font-size: 30px;
    }

    /* CSS BUTTON */
    .button-perpus {
        appearance: none;
        background-color: #536DFE;
        border: none;
        border-radius: 15px;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-size: 16px;
        font-weight: 600;
        line-height: normal;
        margin: 0;
        min-height: 30px;
        min-width: 0;
        outline: none;
        padding: 16px 24px;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 50%;
        will-change: transform;
    }

    .button-perpus:disabled {
        pointer-events: none;
    }

    .button-perpus:hover {
        box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
        transform: translateY(-2px);
    }

    .button-perpus:active {
        box-shadow: none;
        transform: translateY(0);
    }

    .button-login {
        appearance: none;
        background-color: #eaa825;
        border: none;
        border-radius: 15px;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-size: 16px;
        font-weight: 600;
        line-height: normal;
        margin: 0;
        min-height: 30px;
        min-width: 0;
        outline: none;
        padding: 16px 24px;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 50%;
        will-change: transform;
    }

    .button-login:disabled {
        pointer-events: none;
    }

    .button-login:hover {
        box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
        transform: translateY(-2px);
    }

    .button-login:active {
        box-shadow: none;
        transform: translateY(0);
    }

    hr.hr {
        margin-top: -20px;
        border-radius: 20px;
        border-top: 1px solid white;
    }

    hr.hr-hide {
        margin-left: 20rem;
        margin-right: 20rem;
        border-radius: 20px;
        border-top: 1px solid white;
    }

    .judul-testimoni {
        font-size: 35px;
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
    }

    .card-0 {
        color: #fff;
        background-color: #536DFE;
        position: relative;
        margin-left: 70px;
        border-radius: 10px;
        min-height: 312px;
    }

    .carousel-indicators li {
        cursor: pointer;
        border-radius: 50% !important;
        width: 10px;
        height: 10px;
    }

    .profile {
        color: #000;
        background-color: #FFD54F;
        position: absolute;
        left: -70px;
        top: 17%;
        border-radius: 8px;
        border-top-left-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .profile-pic {
        width: 120px;
        height: 120px;
        border-bottom-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .open-quotes {
        margin-left: 130px;
        margin-top: 100px;
    }

    .content {
        margin-left: 150px;
        margin-right: 80px;
    }

    .close-quotes {
        margin-bottom: 100px;
        margin-right: 60px
    }

    @media screen and (max-width: 600px) {
        .card-main {
            padding: 50px 10px;
        }

        .card-0 {
            min-height: 432px;
        }

        .profile {
            top: 24%;
        }

        .profile-pic {
            width: 90px;
            height: 90px;
        }

        .open-quotes {
            margin-left: 100px;
        }

        .content {
            margin-left: 120px;
            margin-right: 50px;
        }

        .close-quotes {
            margin-right: 30px
        }
    }

    .footer-atas {
        background-color: #536DFE;
    }

    .footer-bawah {
        background-color: #3a4cb2;
        font-size: 17px;
    }

    .judul-footer {
        font-size: 25px;
        font-weight: bold;
    }
    </style>
</head>

<body class="all">
    <header>
        <div class="text-center background-image-black py-2">
            <p class="judul">ASIS</p>
            <div class="d-flex vh-100 align-items-center justify-content-center m-auto content-home">
                <div style="margin-top: -100px;">
                    <img src="<?php echo base_url('assets/dist/img/logo-login.png'); ?>" width="182" height="159"
                        class="d-inline-block align-text-top me-3">
                    <h3 class="sub-judul">Sistem Informasi Sekolah</h3>
                    <hr class="hr-hide">
                    <hr class="hr">
                    <p class="isi">SMK Bina Nusantara Semarang</p>
                    <div class="row">
                        <div class="col-md-6 text-md-right">
                            <a href="landingpage/daftar_buku"><button class="button-perpus"
                                    role="button">Perpustakaan</button></a>
                        </div>
                        <div class="col-md-6 text-md-left">
                            <a href="login"><button class="button-login" role="button">Login</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php if ( $total_testimoni_yes === 0 ) : ?>
    <?php else : ?>
    <div class="testimoni mt-4">
        <p class="judul-testimoni mb-4">Apa Kata Alumni</p>
        <div class="container-fluid px-2 px-md-4 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-9 col-xl-8">
                    <div class="card card-main shadow-none text-center">
                        <div class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $count = 0; foreach($testimoni as $row ) {
                                    $count++;
                                    if ($count === 1) {
                                    $class = 'active';
                                    } else {
                                    $class = '';
                                }
                                echo '<div class="carousel-item ' . $class . '">'; ?>
                                <div class="card border-0 card-0">
                                    <div class="card profile py-3 px-4">
                                        <div class="text-center">
                                            <img src="<?php echo base_url('uploads/alumni/akun')."/".tampil_fotolevelById($row->id_level);?>"
                                                class="img-fluid profile-pic rounded-circle">
                                        </div>
                                        <h6 class="mb-0 mt-2"><?php echo tampil_usernamelevelById($row->id_level)?>
                                        </h6>
                                        <small><?php echo tampil_emaillevelById($row->id_level)?></small>
                                    </div>
                                    <img class="img-fluid open-quotes" src="https://i.imgur.com/Hp91vdT.png" width="20"
                                        height="20">
                                    <h3 class="content mb-0"><?php echo $row->pesan?></h3>
                                    <img class="img-fluid close-quotes ml-auto" src="https://i.imgur.com/iPcHyJK.png"
                                        width="20" height="20">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="footer-atas text-white">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-4 pr-5">
                    <div class="judul-footer">Tentang SIS</div>
                    <p class="text-justify mt-3">
                        SIS (Sistem Informasi Sekolah) adalah sebuah sarana atau alat yang bisa digunakan oleh
                        sekolah untuk meningkatkan pelayanan dan kualitas sekolah. Melalui sistem ini, pihak sekolah
                        bisa berinteraksi dengan banyak pihak terkait. Seperti calon siswa, masyarakat, siswa, orang
                        tua, dan lain-lain
                    </p>
                </div>
                <div class="col-lg-4 pr-5">
                    <div class="judul-footer">Hubungi Kami</div>
                    <p class="text-justify mt-3">
                        <i class="fas fa-home"></i> Jl. Kemantren Raya No.5, RT.02/RW.04, Wonosari, Kec. Ngaliyan, Kota
                        Semarang, Jawa Tengah 50186
                    </p>
                    <p class="text-justify">
                        <i class="fas fa-envelope"></i> binusasmg.sch.id
                    </p>
                    <p class="text-justify">
                        <i class="fas fa-phone"></i> (024) 8662971
                    </p>
                </div>
                <div class="col-lg-4 pr-5">
                    <div class="judul-footer">Peta Lokasi</div>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2858744478826!2d110.29925951477327!3d-6.9755591949607165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705fdc0235654d%3A0x97b3afe1b2104e70!2sSMK%20Bina%20Nusantara%20Semarang!5e0!3m2!1sid!2sid!4v1680677422479!5m2!1sid!2sid"
                        style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="mt-3"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bawah py-3 text-white text-center">
        © 2023 Copyright: Bina Nusantara SMG
    </div>
    <?php $this->load->view('landingpage/style/js')?>
</body>

</html>