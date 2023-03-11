<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sekolah</title>
    <?php $this->load->view('landingpage/style/head')?>
    <style>
    .border-dotted {
        border: 2px dotted black;
    }

    .size-icon {
        font-size: 70px;
    }
    </style>
</head>

<body class="hold-transition layout-fixed" data-panel-auto-height-mode="height">
    <?php $this->load->view('landingpage/style/navbar')?>

    <div class="container-fluid lp-body">
        <div class="row lp-layanan">
            <div class="col lp-layan">
                <div class="lp-lay">
                    <span class="d-md-flex mt-3" style="color:  #012269;"><span
                            style="color: #16A34A; margin-right: 5px;">Layanan</span>Kami</span>
                    <p class="desc">Layanan Sistem Informasi Sekolah</p>
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
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <img src="https://perpusnas.go.id/_next/image?url=%2Fimages%2Fwww%2Fabout-img.png&w=640&q=75"
                    class="lp-img" alt="" height="364px" width="440px">
            </div>
            <div class="col-md-5 my-auto">
                <div class="lp-asis">
                    <span class="d-md-flex" style="color:  #012269;"><span style="color: #16A34A;">A</span> SiS</span>
                    <p class="desc">Sistem Informasi Sekolah</p>
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
        <div class="row lp-layanan mb-4">
            <div class="col lp-layan">
                <div class="lp-lay">
                    <span class="d-md-flex" style="color:  #012269;"><span
                            style="color: #16A34A; margin-right: 5px;">Halaman</span>Guest</span>
                    <p class="desc">Perpustakaan </p>
                    <img src="https://i.ibb.co/jGCfwL9/Screenshot-97.png" alt="Image Page Perpustakaan">
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('landingpage/style/js')?>
</body>

</html>