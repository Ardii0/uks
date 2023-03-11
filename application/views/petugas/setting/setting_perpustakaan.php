<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>petugas</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('petugas/style/navbar') ?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('petugas/style/sidebar') ?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Setting Perpusatakaan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Admin/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Admin/setting') ?>">Setting</a>
                                </li>
                                <li class="breadcrumb-item active">Setting Perpustakaan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <?php  foreach ($perpus as $data): ?>
                <div class="container-fluid bg-white shadow p-2">
                    <form action="<?php echo base_url('Admin/update_setting_perpustakaan') ?>"
                        enctype="multipart/form-data" method="post">
                        <input type="hidden" name="id_setting_perpus" class="form-control"
                            value="<?php echo $data->id_setting_perpus ?>">
                        <div class="row">
                            <div class="row col-6 mt-3">
                                <div class="col-5 text-right font-weight-bold mt-1">Maksimal Pengembalian</div>
                                <div class="col-7">
                                    <input type="text" name="maksimal_pengembalian_hari" class="form-control"
                                        placeholder="Masukan Maksimal Pengembalian"
                                        value="<?php echo $data->maksimal_pengembalian_hari ?>">
                                </div>
                            </div>
                            <div class="row col-6 mt-3">
                                <div class="col-5 text-right font-weight-bold mt-1">denda</div>
                                <div class="col-7">
                                    <input type="number" name="denda" class="form-control" placeholder="Masukan Denda"
                                        value="<?php echo $data->denda ?>">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-success float-right">Update</button>
                            </div>
                        </div>
                    </form>
                    <?php endforeach ?>
            </section>
        </div>
    </div>
    <?php $this->load->view('petugas/style/js') ?>
</body>

</html>