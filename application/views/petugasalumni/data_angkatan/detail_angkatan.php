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
                            <h1>Detail Data Angkatan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('PetugasAlumni/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('PetugasAlumni/data_angkatan') ?>">Data Angkatan</a></li>
                                <li class="breadcrumb-item active">Detail Data Angkatan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <div class="row"
                         style="border-bottom: solid #CCCCCC 1px;">
                        <div class="col m-2 mt-3">
                            <h3>Data Angkatan Untuk Lulusan Tahun <span style="background-color: #FF9600; color: white; padding: 2px 10px; border-radius: 10px;"><?php echo $this->uri->segment(3); ?></span></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Jurusan</th>
                                            <th>Status</th>
                                            <th style="width: 5%;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0; foreach($user as $alumni): $id++;?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $alumni->username; ?></td>
                                                <td><?php echo $alumni->email; ?></td>
                                                <td><?php echo tampil_nama_siswa_byid($alumni->id_daftar); ?></td>
                                                <td><?php echo $alumni->jurusan_sekolah; ?></td>
                                                <td><?php echo $alumni->status; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('PetugasAlumni/detail_alumni/'.$alumni->id_data_diri)?>" class='btn btn-info btn-sm'>
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