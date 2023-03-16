<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <?php $this->load->view('perpustakaan/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('perpustakaan/style/navbar')?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('perpustakaan/style/sidebar')?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="px-3 py-1">
                    <div class="pb-1 d-flex justify-content-between align-items-center text-center">
                        <div>
                            <p style="font-size: 2rem">Dashboard Perpustakaan</p>
                        </div>
                        <div class="w-25">
                            <div class="input-group rounded-4">
                                <input type="text" class="form-control " placeholder="cari">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6 col-md-4 col-sm-8">
                                    <div>
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <p>Jumlah Buku</p>
                                                <h3><?php echo $total_buku;?></h3>
                                            </div>
                                            <div class="icon">
                                                <i class="nav-icon fas fa-book"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-sm-8">
                                    <div>
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <p>Jumlah Rak</p>
                                                <h3><?php echo $total_rak_buku;?></h3>
                                            </div>
                                            <div class="icon">
                                                <i class="far fa-chart-bar"></i>
                                            </div>
                                            <a href="<?php echo base_url('Akademik/tahun_ajaran')?>"
                                                class="small-box-footer">More
                                                info
                                                <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-sm-8">
                                    <div>
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <p>Jumlah Kategori</p>
                                                <h3><?php echo $total_kategori_buku;?></h3>
                                            </div>
                                            <div class="icon">
                                                <i class="far fa-chart-bar"></i>
                                            </div>
                                            <a href="<?php echo base_url('Akademik/tahun_ajaran')?>"
                                                class="small-box-footer">More
                                                info
                                                <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="small-box  bg-gradient-warning text-white mb-3" style="max-width: 100%;">
                                        <div class="card-header bg-transparenttext-center fw-bold h3 border-white">
                                            Peminjaman</div>
                                        <div class="card-body text-white">
                                            <h5 class="card-title">Success card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make
                                                up
                                                the bulk of the card's content.</p>
                                        </div>
                                        <a href="<?php echo base_url('Akademik/tahun_ajaran')?>"
                                            class="small-box-footer">More
                                            info
                                            <i class="fa fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="small-box  bg-gradient-warning border-success mb-3" style="max-width: 100%;">
                                        <div class="card-header  text-center fw-bold h3 border-white">
                                            Peminjaman</div>
                                        <div class="card-body text-success">
                                            <h5 class="card-title">Success card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make
                                                up
                                                the bulk of the card's content.</p>
                                        </div>
                                        <a href="<?php echo base_url('Akademik/tahun_ajaran')?>"
                                            class="small-box-footer">More
                                            info
                                            <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="bg-warning">
                                <div class="" style="width: 100%; ">
                                    <div class="">
                                        <div class="small-box bg-warning" style="height:75vh">
                                            <div class="inner">
                                                <p>Jumlah Anggota</p>
                                                <h3><?php echo $total_anggota;?></h3>
                                            </div>
                                            <div class="icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('perpustakaan/style/js')?>
</body>

</html>