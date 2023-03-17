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
        <?php $this->load->view('keuangan/style/navbar') ?>
        <?php $this->load->view('keuangan/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pembayaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Keuangan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Pembayaran</li>
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
                                    <h4>History Pembayaran</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 grid gap-2 text-right align-self-start">
                            <a class="btn btn-primary" href="<?php echo base_url('Keuangan/tambah_pembayaran');?>">
                                <i class="fa fa-plus pr-2"></i>Tambah
                            </a>
                            <a class="btn btn-success" href="<?php echo base_url('Keuangan/cari_data');?>">
                                <i class="fa fa-search pr-2"></i>Cari
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="data-table2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>ID Transaksi</th>
                                            <th>Nama/Rombel</th>
                                            <th>Jenis Bayar</th>
                                            <th>Keterangan</th>
                                            <th>Nominal</th>
                                            <th>User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach ($pembayaran as $history): $id++?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo $history->date?></td>
                                            <td><?php echo $history->id_tf?></td>
                                            <td class="d-flex">
                                                <span>
                                                    <?php echo tampil_namadaftar_ByIdSiswa($history->id_siswa)?>
                                                </span>/&nbsp;
                                                <span>
                                                    <?php echo tampil_rombeldaftar_ByIdSiswa($history->id_siswa)?>
                                                </span>
                                            </td>
                                            <td><?php echo tampil_namajenisbayarById($history->id_jenis)?></td>
                                            <td><?php echo $history->keterangan?></td>
                                            <td><?php echo $history->nominal?></td>
                                            <td><?php echo $history->akuntan?></td>
                                        </tr>
                                        <?php endforeach; ?>
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
    <?php $this->load->view('keuangan/style/js') ?>
    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Akademik/hapus_guru/') ?>" + id;
        }
    }
    </script>
</body>

</html>