<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <?php $this->load->view('petugas/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- navbar -->
        <?php $this->load->view('petugas/style/navbar')?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('petugas/style/sidebar')?>
        <!-- Sidebar -->

        <div class="content-wrapper p-2">
            <div class="container-fluid">
                <section class="content">
                    <!-- <div class="container-fluid"> -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box btn-success">
                                <div class="inner">
                                    <h3>2022/2023</h3>
                                    <p>Tahun Ajaran</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <a href="aa" class="small-box-footer">More
                                    info
                                    <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box btn-success">
                                <div class="inner">
                                    <h3>24</h3>
                                    <p>Jumlah Guru</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <a href="<?php echo base_url('Akademik/guru')?>" class="small-box-footer">More info
                                    <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box btn-success">
                                <div class="inner">
                                    <h3>279</h3>
                                    <p>Jumlah Murid</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <a href="<?php echo base_url('Akademik/siswa')?>" class="small-box-footer">More info
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box btn-success">
                                <div class="inner">
                                    <h3>24</h3>
                                    <p>Jumlah Buku</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="<?php echo base_url('Akademik/jenjang')?>" class="small-box-footer">More info
                                    <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box btn-success">
                                <div class="inner">
                                    <h3>Jumlah</h3>
                                    <p>Paket Jenjang</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="<?php echo base_url('Akademik/jenjang')?>" class="small-box-footer">More info
                                    <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box btn-success">
                                <div class="inner">
                                    <h3>3</h3>
                                    <p>Jumlah Paket Jenjang</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <a href="<?php echo base_url('Akademik/jenjang')?>" class="small-box-footer">More info
                                    <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </section>

            </div>
            <?php $this->load->view('petugas/style/js')?>

</body>

</html>