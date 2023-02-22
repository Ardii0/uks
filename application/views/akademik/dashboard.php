<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head')?>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php $this->load->view('akademik/style/sidebar')?>

        <div class="content-wrapper">
        <div class="container-fluid mt-5">
            <!-- <section class="content-header">
                <h1>
                    Akademik
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Editors</li>
                </ol>
            </section> -->

            <section class="content">
                <!-- <div class="container-fluid"> -->
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box btn-success">
                                <div class="inner">
                                    <h3>-</h3>
                                    <!-- <h3><?php echo $total_guru ?></h3> -->
                                    <p>Tahun Ajaran</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-chart-bar"></i>
                                </div>
                                <a href="<?php echo base_url('Akademik/tahun_ajaran')?>" class="small-box-footer">More info
                                    <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box btn-success">
                                <div class="inner">
                                    <h3>-</h3>
                                    <!-- <h3><?php echo $total_guru ?></h3> -->
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
                                    <h3>-</h3>
                                    <!-- <h3><?php echo $total_murid ?></h3> -->
                                    <p>Jumlah Murid</p>
                                </div>
                                <div class="icon">
                                <i class="fas fa-user"></i>
                                </div>
                                <a href="<?php echo base_url('Akademik/siswa')?>" class="small-box-footer">More info
                                    <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box btn-success">
                                <div class="inner">
                                    <h3>SD</h3>
                                    <!-- <h3><?php echo $total_guru ?></h3> -->
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
                                    <h3>SMP</h3>
                                    <!-- <h3><?php echo $total_guru ?></h3> -->
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
                                    <h3>SMK</h3>
                                    <!-- <h3><?php echo $total_guru ?></h3> -->
                                    <p>Paket Jenjang</p>
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
    </div>

    <?php $this->load->view('akademik/style/js')?>
</body>

</html>