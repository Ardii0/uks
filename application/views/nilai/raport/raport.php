<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Input Nilai</title>
    <?php $this->load->view('nilai/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('nilai/style/navbar')?>
        <?php $this->load->view('nilai/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cetak Raport</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Cetak Raport</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content container-fluid">
                <!-- <div class="container-fluid bg-white"> -->
                    <div class="row px-1 pt-2">
                        <div class="col-md-3">
                            <h4><u>Wali Kelas:</u></h4>
                            <h3><?php echo $dt->username ;?></h3>
                            <div class="alert alert-success d-flex">
                                    <span></span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span></span>
                                    <span>&nbsp;/&nbsp;</span>
                                    <span>Siswa</span>
                                <!-- <?php foreach($kelas as $wakel) {?> -->
                                <!-- <?php } ?> -->
                            </div>
                        </div>
                        <div class="col bg-white">
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th style="width: 4%;">No</th>
                                            <th>Nama</th>
                                            <th style="width: 15%;">Semester</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>
                                                    <!-- <?php echo $id ?> -->
                                                </td>
                                                <td>
                                                    <!-- <?php echo $data->nama_mapel ?> -->
                                                </td>
                                                <td class="d-flex">
                                                    <div class="btn-group">
                                                        <div class="btn btn-success">Ganjil</div>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#"><i class="fas fa-print"></i>&nbsp;Cetak PDF</a>
                                                                <a class="dropdown-item" href="#"><i class="fas fa-print"></i>&nbsp;Cetak Excel</a>
                                                            </div>
                                                        </div>
                                                    </div>&nbsp;
                                                    <div class="btn-group">
                                                        <div class="btn btn-success">Genap</div>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#"><i class="fas fa-print"></i>&nbsp;Cetak PDF</a>
                                                                <a class="dropdown-item" href="#"><i class="fas fa-print"></i>&nbsp;Cetak Excel</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <!-- <?php $id=0; foreach ($mapel as $data): $id++?> -->
                                        <!-- <?php endforeach; ?> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </section>
        </div>
    </div>
    <?php $this->load->view('nilai/style/js')?>

</body>

</html>