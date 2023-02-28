<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah anggota</title>
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Data Anggota</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Perpustakaan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Perpustakaan/data_anggota') ?>">Data Anggota</a>
                                </li>
                                <li class="breadcrumb-item active">Form Tambah Anggota</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="p-5">
                        <div class="row p-1">
                            <div class="col-2 text-right d-flex justify-content-end align-items-center">
                                Tanggal
                            </div>
                            <div class="col-6 align-items-center">
                                <div class="input-group date">
                                    <input type="date" class="form-control"
                                        />
                                </div>
                            </div>
                            <div class="col-2 align-items-center"></div>
                        </div>
                        <div class="row p-1">
                            <div class="col-2 text-right d-flex justify-content-end align-items-center">
                                Nama Siswa
                            </div>
                            <div class="col-6 align-items-center">
                                <div class="form-group">
                                    <select class="form-control select2" style="width: 100%;">
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2 align-items-center"></div>
                        </div>
                        <div class="row p-1">
                            <div class="col-2 text-right d-flex justify-content-end align-items-center"></div>
                            <div class="col-6 align-items-center">
                                <div class="btn btn-info">Tambah</div>
                            </div>
                            <div class="col-2 align-items-center"></div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </section>
    </div>
    <?php $this->load->view('perpustakaan/style/js')?>
</body>

</html>