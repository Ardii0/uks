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
                            <h1>Cetak Invoice
                                <button type="submit" class="btn btn-success"><i class="fas fa-print"></i>
                                    Cetak
                                </button>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Keuangan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Akademik/pembayaran') ?>">Pembayaran</a>
                                </li>
                                <li class="breadcrumb-item active">Cetak Pembayaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid py-3 px-5">
                    <div class="row">
                        <div class="col-4 px-2">
                            <div class="shadow bg-white px-3 py-2 rounded">
                                <div class="font-weight-bold">Dari :</div>
                                <div>Secondta Ardiansyah</div>
                                <div>Kelas XI</div>
                                <div>TKJ 2</div>
                            </div>
                        </div>
                        <div class="col-4 px-3">
                            <div class="shadow bg-white px-3 py-2 rounded">
                                <div class="font-weight-bold">Kepada :</div>
                                <div>SMK BINA NUSANTARA</div>
                                <div>Jalan Kemantren</div>
                                <div>binusa@gmail.com</div>
                            </div>
                        </div>
                        <div class="col-4 px-3">
                            <div class="shadow bg-white px-3 py-2 rounded" style="height: 112px;">
                                <div class="row">
                                    <div class="col-4 text-right font-weight-bold">Invoice :</div>
                                    <div class="col-8">
                                        9766823478
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 text-right font-weight-bold">Petugas :</div>
                                    <div class="col-8">
                                        Administrator
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 shadow bg-white py-3 px-5 rounded">
                        <table id="data-table2" class="table table-bordered table-striped col-12 m-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date Time</th>
                                    <th>Id Transaksi</th>
                                    <th>Jenis Bayar</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>07/07/2007</td>
                                    <td>976979646996</td>
                                    <td>SPP</td>
                                    <td>Keterangan ini bang</td>
                                    <td class="text-right">250.000</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-12 row text-right p-1 m-0" style="background: rgba(0, 0, 255, 0.3);">
                            <div class="col-10 font-weight-bold">
                                Subtotal :
                            </div>
                            <div class="col-2">
                                250.000
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