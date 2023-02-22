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
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form Pendaftaran Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/siswa_pendaftaran') ?>">Pendaftaran</a></li>
                    <li class="breadcrumb-item active">Form Pendaftaran</li>
                    </ol>
                </div>
                </div>
            </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col d-flex">Tahun Ajaran
                        <input type="text" class="form-control" disabled></div>
                        <div class="col d-flex">Tes
                            <div class="form-group">
                                <select class="form-control">
                                <option>Filter</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                                </select>
                            </div></div>
                        <div class="col d-flex">Tes
                        <input type="text" class="form-control"></div>
                        <!-- <div>Tes</div>
                        <div>Tes</div> -->
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex">
                                <p>NISN</p>
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                            <div class="d-flex">
                                <p>Nama Lengkap</p>
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                            <div class="d-flex">
                                <p>Jenis Kelamin</p>
                                <div>
                                    <input class="form-check-input" type="radio" name="radio1">
                                    <label class="form-check-label">Radio</label>
                                    <input class="form-check-input" type="radio" name="radio1">
                                    <label class="form-check-label">Radio</label>
                                </div>
                            </div>
                            <div class="d-flex">
                                <p>Tempat Lahir</p>
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                            <div class="d-flex">
                                <p>Tanggal Lahir</p>
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                            <div class="d-flex">
                                <p>Alamat</p>
                                <textarea class="form-control" placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex">
                                <p>Agama</p>
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                            <div class="d-flex">
                                <p>Warga Negara</p>
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
</body>

</html>