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
                            <h1>Laporan Jurnal Penyesuaian</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Laporan Jurnal Penyesuaian</li>
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
                                    <h6>Periode 1 Jul 2018/30 Jun 2019</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-2 pt-2 pl-2">
                    <form action="<?php echo base_url('Keuangan/filter_'); ?>" method="POST">
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="">Tanggal Awal</label>
                                <input type="date" id="tanggalawal" class="validate form-control" name="tanggalawal">
                            </div>
                            <div class="form-group col-3">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" id="tanggalakhir" class="validate form-control" name="tanggalakhir">
                            </div>
                            <div class="form-group col-3 d-flex align-items-end">
                                <div class="">
                                    <button type="submit" class="btn btn-info">Tampilkan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="p-2">
                                    <h4>
                                        Jurnal keuangan 

                                    </h4>
                                </div>
                                <table id="data-table2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date Time</th>
                                            <th>Uraian</th>
                                            <!-- <th>Nominal</th> -->
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $id = 0; foreach($data_transaksi as $data): $id++ ?>
                                        <tr <?php $btn = $data->id_akun == 0 ? 'hidden' : ''; echo $btn ?>>
                                            <td rowspan="3">
                                                <div>
                                                <?php echo $data->waktu ?>
                                                </div>
                                            </td>
                                            <td colspan="3">
                                                <div class="font-italic font-weight-bold"><u>
                                                        <strong><?php echo $data->uraian ?></strong>
                                                    </u>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo tampil_nama_jenis_transaksi($data->id_anggaran) ?>
                                            </td>
                                            <td>
                                            <?php echo $data->debet ?>
                                        </td>
                                        <td>
                                        <?php echo $data->kredit ?>
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                        <?php endforeach ?>
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