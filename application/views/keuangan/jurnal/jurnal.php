<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Keuangan</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('keuangan/style/navbar') ?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('keuangan/style/sidebar') ?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Jurnal Penyesuaian</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Keuangan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Jurnal Penyesuaian</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow p-3">
                    <div class="row">
                        <div class="col-6 h5">Input Jurnal</div>
                        <div class="col-6"><button type="submit" class="btn btn-primary float-right">Lihat Data</button>
                        </div>
                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Uraian</div>
                                <div class="col-5">
                                    <input type="text" name="uraian" class="form-control" placeholder="Uraian">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Akun Debet</div>
                                <div class="col-5">
                                    <select name="akun_debit" class="custom-select custom-select-md">
                                        <option value="adasdad">AWIKWOK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Akun Kredit</div>
                                <div class="col-5">
                                    <select name="akun_debit" class="custom-select custom-select-md">
                                        <option value="adasdad">WOKWOKWOK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Nominal</div>
                                <div class="col-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="number" name="nominal" class="form-control" placeholder="Nominal">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold">
                                </div>
                                <div class="col-5">
                                    <button type="submit" class="btn btn-primary">Input</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('keuangan/style/js') ?>
</body>

</html>