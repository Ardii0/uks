<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Petugas Alumni</title>
    <?php $this->load->view('petugasalumni/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('petugasalumni/style/navbar') ?>
        <?php $this->load->view('petugasalumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Angkatan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('PetugasAlumni/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item active">Data Angkatan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <!-- <div class="row">
                        Filter Section
                    </div> -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width: 5%;">No</th>
                                            <th>Tahun Lulus Angkatan</th>
                                            <th>Jumlah Data Alumni</th>
                                            <th style="width: 5%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0; foreach($tahun_lulus as $tahun): $id++;?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td class="text-center">Tahun Lulus <?php echo $tahun->tahun_lulus; ?></td>
                                                <td class="text-center"><?php echo $tahun->jumlah_lulusan; ?> Lulusan</td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('PetugasAlumni/detail_data_angkatan/'.$tahun->tahun_lulus)?>" class='btn btn-info btn-sm'>
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('petugasalumni/style/js') ?>
</body>

</html>