<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alumni</title>
    <?php $this->load->view('alumni/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('alumni/style/navbar') ?>
        <?php $this->load->view('alumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Diri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Alumni/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item active">Data Diri</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <div class="row mx-2 pt-3">
                        <div class="col">
                            <div class="mt-2 mx-1">
                                <h4>Lengkapi Data Diri Anda Dengan Niat, Bismillah</h4>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mx-2">
                        <div class="col">
                            <div class="alert alert-info d-flex justify-content-between" role="alert">
                                <div>
                                    <i class="fas fa-exclamation-triangle"></i> Menu akan tampil jika anda telah mengisi dan melengkapi data diri.
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-times" data-dismiss="alert" aria-label="Close"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-2">
                        <div class="col-12">                            
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nama">Nama</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <?php foreach ($user as $user): ?>
                                            <?php echo $user->username?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nama">Alamat Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <?php echo $user->email?>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nama_lengkap">Nama Lengkap *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukan Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nama_lengkap">Jurusan *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="id_jenismapel" class="form-control select2">
                                                <option selected disabled>
                                                    Pilih Jurusan
                                                </option>
                                                <option value="">Akl</option>
                                                <option value="">Tkj</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('alumni/style/js') ?>
</body>

</html>