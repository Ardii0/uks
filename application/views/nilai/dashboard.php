<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
    <?php $this->load->view('nilai/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('nilai/style/navbar')?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('nilai/style/sidebar')?>
        <!-- Sidebar -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="px-3 py-1">
                    <div>
                        <p style="font-size: 2rem">Dashboard Nilai</p>
                    </div>
                    <div class="row ">
                        <div class="col-12  col-sm-6 col-md-4">
                            <div>
                                <div class="small-box bg-gradient-secondary">
                                    <div class="inner">
                                        <p>Jumlah Mapel</p>
                                        <h3><?php echo $total_mapel;?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-book"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div>
                                <div class="small-box bg-gradient-secondary">
                                    <div class="inner">
                                        <p>Jumlah Siswa</p>
                                        <h3><?php echo $total_siswa;?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-user"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-4">
                            <div>
                                <div class="small-box bg-gradient-secondary">
                                    <div class="inner">
                                        <p>Jumlah Guru</p>
                                        <h3><?php echo $total_guru;?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-user-tie"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="small-box bg-gradient-secondary text-white mb-3" style="max-width: 100%;">
                                <div class="card-header bg-transparent text-center fw-bold h3 border-white"> Dashboard
                                    Nilai
                                </div>
                                <div class="card-body text-white">
                                    <h5 class="card-title">Fitur : </h5>
                                    <p class="card-text">Dashboard nilai ini berfungsi untuk memberi dan juga melihat
                                        nilai siswa di SMK BINA NUSANTARA Semarang</p>
                                </div>
                                <a href="<?php echo base_url('Nilai/modul_input_nilai')?>" class="small-box-footer">More
                                    info
                                    <i class="fa fa-arrow-circle-right"></i></a>

                            </div>
                        </div>
                        <div class="col">
                            <div class="small-box border-success mb-3" style="max-width: 100%;">
                                <div class="card-header bg-transparent text-center fw-bold h3 border-white"> Tahun
                                    Ajaran</div>
                                <div class="card-body text-success">
                                    <div class="box-body example-1 scrollbar-ripe-malinka">
                                        <table id="table_1" class="table table-bordered">
                                            <thead>
                                                <tr class="fixed bg-gradient-secondary">
                                                    <th>No</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Total Siswa</th>
                                                    <th>Total Rombel</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id=0; foreach($ta as $ta): $id++?>
                                                <tr>
                                                    <td><?php echo $id;?></td>
                                                    <td><?php echo $ta->nama_angkatan;?></td>
                                                    <td><?php echo $total_siswa;?></td>
                                                    <td><?php echo $total_kelas;?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('nilai/style/js')?>

</body>

</html>