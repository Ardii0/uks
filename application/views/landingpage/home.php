<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sekolah</title>
    <?php $this->load->view('landingpage/style/head')?>
</head>
<body class="hold-transition layout-fixed" data-panel-auto-height-mode="height">
<?php $this->load->view('landingpage/style/navbar')?>

<div class="container-fluid lp-body">
    <div class="row lp-layanan">
        <div class="col lp-layan">
            <div class="lp-lay">
                <span class="d-md-flex" style="color:  #012269;"><span style="color: #16A34A;">Layanan</span>&ensp;Kami</span>
                <p class="desc">Layanan Sistem Informasi Sekolah</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row lp-control-card">
            <div class="row lp-card">
                <a href="">
                    <img src="https://perpusnas.go.id/images/www/isbn.png" alt="">
                </a>
                <a href="">
                    Tes <br>
                    tes
                </a>
            </div>
            <div class="lp-card">
                <img src="https://perpusnas.go.id/images/www/isbn.png" alt="">
                Tes
            </div>
            <div class="lp-card">
                <img src="https://perpusnas.go.id/images/www/isbn.png" alt="">
                Tes
            </div>
        </div>
        <div class="row lp-control-card">
            <div class="lp-card">
                <img src="https://perpusnas.go.id/images/www/isbn.png" alt="">
                Tes
            </div>
            <div class="lp-card">
                <img src="https://perpusnas.go.id/images/www/isbn.png" alt="">
                Tes
            </div>
            <div class="lp-card">
                <img src="https://perpusnas.go.id/images/www/isbn.png" alt="">
                Tes
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="">
            <img src="https://perpusnas.go.id/_next/image?url=%2Fimages%2Fwww%2Fabout-img.png&w=640&q=75" 
            class="lp-img" alt="" height="364px" width="440px">
        </div>
        <div class="col-md-4 lp-layout">
            <div class="lp-asis">
                <span class="d-md-flex" style="color:  #012269;"><span style="color: #16A34A;">A</span> SiS</span>
                <p class="desc">Sistem Informasi Sekolah</p>
                <div class="col">
                    <p><a href="<?php echo base_url ('Akademik')?>"><i class="fa fa-check-circle"></i>Akademik</a></p>
                    <p><a href="<?php echo base_url ('Landingpage/daftar_buku')?>"><i class="fa fa-check-circle"></i>Perpustakaan</a></p>
                    <p><a href="<?php echo base_url ('Akademik/guru')?>"><i class="fa fa-check-circle"></i>Manajemen Guru</a></p>
                </div>
                <div class="col">
                    <p><a href="<?php echo base_url ('Akademik/siswa')?>"><i class="fa fa-check-circle"></i>Manajemen Siswa</a></p>
                    <p><a href="<?php echo base_url ('Keuangan')?>"><i class="fa fa-check-circle"></i>Administrasi</a></p>
                    <p><a href="<?php echo base_url ('Admin')?>"><i class="fa fa-check-circle"></i>Manajemen Karyawan</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('landingpage/style/js')?>
</body>
</html>