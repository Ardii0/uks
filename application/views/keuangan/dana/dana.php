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

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
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
                            <h1>Input Dana Masuk Keluar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Input Dana Masuk Keluar</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Pencatatan Dana Masuk Keluar</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_lihat_data">
                                    Lihat Data
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 row">
                            <div class="col-5">
                                <div class="card-body w-full">
                                    <div class="card border-success mb-3 card-primary">
                                        <div class="card-header bg-primary border-success">Daftar Jenis Dana Masuk</div>
                                        <div class="card-body">
                                            <div class="card-text">
                                                <div class="card">
                                                    <ul class="list-group list-group-flush">
                                                        <?php $id = 0; foreach($data_pendapatan as $data): $id++ ?>
                                                            <a href="<?php echo base_url('Keuangan/input_dana/' . $data->id) ?>">
                                                                <li class="list-group-item" style="cursor: pointer;"><?php echo $data->nama_jenis_transaksi ?></li>
                                                            </a>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 row">
                            <div class="col-5">
                                <div class="card-body w-full">
                                    <div class="card border-success mb-3 card-primary">
                                        <div class="card-header bg-primary border-success">Daftar Jenis Dana Keluar
                                        </div>
                                        <div class="card-body">
                                            <div class="card-text">
                                                <div class="card">
                                                    <ul class="list-group list-group-flush">
                                                        <?php $id = 0; foreach($data_pengeluaran as $data): $id++ ?>
                                                            <a href="<?php echo base_url('Keuangan/input_dana/' . $data->id) ?>">
                                                                <li class="list-group-item" style="cursor: pointer;"><?php echo $data->nama_jenis_transaksi ?></li>
                                                            </a>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            </div>
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

    <!-- Modal -->
    <div class="modal fade" id="modal_lihat_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-1">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="data-table2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Uraian</th>
                                        <th>Pencatat</th>
                                        <th>Akun</th>
                                        <th>Debet</th>
                                        <th>Kredit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 0; foreach($data_transaksi as $data): $id++ ?>
                                        <tr <?php $btn = $data->id_akun == 0 ? 'hidden' : ''; echo $btn ?>>
                                            <td><?php echo $data->waktu ?></td>
                                            <td><?php echo $data->uraian ?></td>
                                            <td><?php echo $data->pencatat ?></td>
                                            <td><?php echo tampil_nama_akun_transaksi($data->id_akun) ?></td>
                                            <td><?php echo $data->debet ?></td>
                                            <td><?php echo $data->kredit ?></td>
                                            <td>
                                                <button onClick="hapus(<?php echo $data->id_transaksi ?>)" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div></div>
                    <button type="button" class="btn btn-secondary" onclick="kembali()"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <?php $this->load->view('keuangan/style/js') ?>
    <script>
    function hapus(id) {
         var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Keuangan/hapus_transaksi/') ?>" + id;
        }
    }
    </script>
</body>

</html>