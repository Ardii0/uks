<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sekolah</title>
    <?php $this->load->view('landingpage/style/head')?>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap');
    </style>
    <style>
    .all {
        font-family: 'Libre Baskerville', serif;
    }

    /* .border-dotted {
        border: 2px dotted black;
    }

    .size-icon {
        font-size: 70px;
    } */

    header {
        height: 100vh;
        min-height: 100wh;
        background-size: cover;
        /* background-image: url('https://foto.data.kemdikbud.go.id/getImage/20328986/7.jpg'); */
        /* background-image: url('https://binusasmg.sch.id/ppdb/images/gstp.jpg'); */
        background-image: url('https://binusasmg.sch.id/ppdb/images/binus2.jpg');
    }

    .bg-isi {
        background-color: rgba(0, 0, 0, 0.5);
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
        color: white;
        font-size: 20px;
        font-weight: bold;
    }

    .isi {
        color: white;
        font-size: 18px;
    }

    /* CSS */
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
        width: 25%;
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
    </style>
</head>

<body class="hold-transition layout-fixed all">
    <!-- <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <img src="https://perpusnas.go.id/_next/image?url=%2Fimages%2Fwww%2Fabout-img.png&w=640&q=75"
                    class="lp-img" alt="" height="364px" width="440px">
            </div>
            <div class="col-md-5 my-auto">
                <div class="lp-asis">
                    <span class="d-md-flex" style="color:  #012269;"><span style="color: #16A34A;">A</span> SiS</span>
                    <p class="desc"><a href="Login">Sistem Informasi Sekolah</a></p>
                    <div class="row">
                        <div class="col">
                            <p><a href="<?php echo base_url ('Akademik')?>"><i
                                        class="fa fa-check-circle"></i>Akademik</a>
                            </p>
                            <p><a href="<?php echo base_url ('Landingpage/daftar_buku')?>"><i
                                        class="fa fa-check-circle"></i>Perpustakaan</a></p>
                            <p><a href="<?php echo base_url ('Akademik/guru')?>"><i
                                        class="fa fa-check-circle"></i>Manajemen
                                    Guru</a></p>
                        </div>
                        <div class="col">
                            <p><a href="<?php echo base_url ('Akademik/siswa')?>"><i
                                        class="fa fa-check-circle"></i>Manajemen Siswa</a></p>
                            <p><a href="<?php echo base_url ('Keuangan')?>"><i
                                        class="fa fa-check-circle"></i>Administrasi</a></p>
                            <p><a href="<?php echo base_url ('Admin')?>"><i class="fa fa-check-circle"></i>Manajemen
                                    Karyawan</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row lp-layanan">
            <div class="col lp-layan">
                <div class="lp-lay">
                    <span class="d-md-flex" style="color:  #012269;"><span
                            style="color: #16A34A; margin-right: 5px;">Layanan</span>Kami</span>
                    <p class="desc"><a href="Login">Layanan Sistem Informasi Sekolah</a></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row m-auto">
                <div class="col-4 p-4">
                    <div class="row d-flex items-center border-dotted px-4 py-3">
                        <div class="col-5"><i class="fas fa-graduation-cap size-icon"></i></div>
                        <div class="col-7 m-auto">
                            <span class="h5 font-weight-bold">Akademik</span>
                            <br />
                            Data Siswa
                        </div>
                    </div>
                </div>
                <div class="col-4 p-4">
                    <div class="row d-flex items-center border-dotted px-4 py-3">
                        <div class="col-5"><i class="fas fa-book size-icon"></i></div>
                        <div class="col-7 m-auto">
                            <span class="h5 font-weight-bold">Perpustakaan</span>
                            <br />
                            Data Buku
                        </div>
                    </div>
                </div>
                <div class="col-4 p-4">
                    <div class="row d-flex items-center border-dotted px-4 py-3">
                        <div class="col-5"><i class="fas fa-percent size-icon"></i></div>
                        <div class="col-7 m-auto">
                            <span class="h5 font-weight-bold">Nilai</span>
                            <br />
                            Data Nilai
                        </div>
                    </div>
                </div>
                <div class="col-4 p-4"></div>
                <div class="col-4 p-4">
                    <div class="row d-flex items-center border-dotted px-4 py-3">
                        <div class="col-5"><i class="fas fa-money-check-alt size-icon"></i></div>
                        <div class="col-7 m-auto">
                            <span class="h5 font-weight-bold">TU</span>
                            <br />
                            Data Keuangan
                        </div>
                    </div>
                </div>
                <div class="col-4 p-4"></div>
            </div>
        </div>
        <div class="row lp-layanan mb-4">
            <div class="col lp-layan">
                <div class="lp-lay">
                    <span class="d-md-flex" style="color:  #012269;"><span
                            style="color: #16A34A; margin-right: 5px;">Halaman</span>Guest</span>
                    <p class="desc"><a href="landingpage/daftar_buku">Perpustakaan</a></p>
                    <img src="https://i.ibb.co/jGCfwL9/Screenshot-97.png" alt="Image Page Perpustakaan">
                </div>
            </div>
        </div>
    </div> -->
    <header>
        <nav class="fixed-top trans text-center bg-isi py-2">
            <p class="judul">ASIS</p>
            <div class="d-flex vh-100 align-items-center justify-content-center m-auto content-home">
                <div style="margin-top: -100px;">
                    <h3 class="sub-judul">Sistem Informasi Sekolah</h3>
                    <p class="isi">Sistem Informasi Sekolah adalah sebuah sarana atau alat yang bisa digunakan oleh
                        sekolah
                        untuk
                        meningkatkan
                        pelayanan dan kualitas sekolah. Melalui sistem ini, pihak sekolah bisa berinteraksi dengan
                        banyak
                        pihak
                        terkait. Seperti calon siswa, masyarakat, siswa, orang tua, dan lain-lain</p>
                    <a href="landingpage/daftar_buku"><button class="button-27" role="button">Perpustakaan</button></a>
                    <a href="login"><button class="button-27" role="button">Login</button></a>
                </div>
            </div>
        </nav>
    </header>
    <!--container-->
    <?php $this->load->view('landingpage/style/js')?>
</body>

</html>