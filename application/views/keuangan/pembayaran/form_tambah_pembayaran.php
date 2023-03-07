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
                            <h1>Tambah Pembayaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Keuangan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Akademik/pembayaran') ?>">Pembayaran</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Pembayaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow py-3 px-5">
                    <div class="row">
                        <div class="col-5">
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold">Id Transaksi</div>
                                <div class="col-8">
                                    768902378253
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold">Nama</div>
                                <div class="col-8">
                                    Secondta Ardiansyah
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold">Kelas/Rombel</div>
                                <div class="col-8">
                                    Kelas X/TKJ 2
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Jenis Pembayaran</div>
                                <div class="col-8">
                                    <select name="jenis_pembayran" class="custom-select custom-select-md">
                                        <option value="adasdad">Pembayaran SPP</option>
                                        <option value="adasdad">Pembayran UKT</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Nominal</div>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Nominal">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Keterangan</div>
                                <div class="col-8">
                                    <textarea cols="50" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-4 text-right font-weight-bold">
                                </div>
                                <div class="col-8">
                                    <button type="submit" class="btn btn-primary">Input</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <table id="data-table2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date Time</th>
                                        <th>Id Transaksi</th>
                                        <th>Jenis Bayar</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>07/07/2007</td>
                                        <td>976979646996</td>
                                        <td>SPP</td>
                                        <td>Keterangan ini bang</td>
                                        <td>250.000</td>
                                        <td>binusa@gmail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Cetak &
                                Simpan</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('keuangan/style/js') ?>
</body>

</html>