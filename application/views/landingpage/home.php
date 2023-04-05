<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sekolah</title>
    <?php $this->load->view('landingpage/style/head')?>
    <style>
    header {
        height: 100vh;
        height: 100wh;
        background-size: cover;
        /* background-image: url('https://foto.data.kemdikbud.go.id/getImage/20328986/7.jpg'); */
        /* background-image: url('https://binusasmg.sch.id/ppdb/images/gstp.jpg'); */
        background-image: url('https://binusasmg.sch.id/ppdb/images/binus2.jpg');
    }

    .bg-isi {
        background-color: rgba(0, 0, 0, 0.7);
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

    /* @media only screen and (max-width: 600px) {
        .button-27 {
            width: 100%;
            text-align: center;
        }
    } */

    /* CSS BUTTON */
    .button-27 {
        appearance: none;
        background-color: #000000;
        border: 2px solid #1A1A1A;
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
        min-height: 60px;
        min-width: 0;
        outline: none;
        padding: 16px 24px;
        text-align: center;
        text-decoration: none;
        transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        width: 90%;
        will-change: transform;
    }

    .button-27:disabled {
        pointer-events: none;
    }

    .button-27:hover {
        box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
        transform: translateY(-2px);
    }

    .button-27:active {
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
    </style>
</head>

<body class="hold-transition layout-fixed all">
    <header>
        <nav class="fixed-top trans text-center bg-isi py-2">
            <p class="judul">ASIS</p>
            <div class="d-flex vh-100 align-items-center justify-content-center m-auto content-home">
                <div style="margin-top: -100px;">
                    <img src="<?php echo base_url('assets/dist/img/logo-login.png'); ?>" width="182" height="159"
                        class="d-inline-block align-text-top me-3">
                    <h3 class="sub-judul">Sistem Informasi Sekolah</h3>
                    <!-- <p class="isi">
                        Sistem Informasi Sekolah adalah sebuah sarana atau alat yang bisa digunakan oleh
                        sekolah untuk meningkatkan pelayanan dan kualitas sekolah. Melalui sistem ini, pihak sekolah
                        bisa berinteraksi dengan banyak pihak terkait. Seperti calon siswa, masyarakat, siswa, orang
                        tua, dan lain-lain
                    </p> -->
                    <hr class="hr-hide">
                    <hr class="hr">
                    <p class="isi">SMK Bina Nusantara Semarang</p>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="landingpage/daftar_buku"><button class="button-27"
                                    role="button">Perpustakaan</button></a>
                        </div>
                        <div class="col-md-6">
                            <a href="login"><button class="button-27" role="button">Login</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <?php $this->load->view('landingpage/style/js')?>
</body>

</html>