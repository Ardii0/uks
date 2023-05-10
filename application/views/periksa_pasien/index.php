<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Periksa Pasien</title>
    <?php $this->load->view('style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar') ?>
        <?php $this->load->view('style/sidebar') ?>

        <div class="content-wrapper py-3">
            <section class="content">
                <!-- FILTER REKAP DATA -->
                <div class="container-fluid mb-4">
                    <div class="header p-3 text-light rounded-top" style="background-color:#4ADE80">
                        <div class="row">
                            <div class="col pl-3 pt-1">
                                <h5>Filter Rekap Data</h5>
                            </div>
                            <div class="col">
                            </div>
                            <div class="col text-right">
                                <button type="button" data-toggle="modal" data-target="#modal_filter_tanggal"
                                    class="btn btn-info px-5 rounded bg-sky-600">Filter Tanggal</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light shadow">
                        <?php if (1 + 1 == 2):?>
                            <div id="not_found" class="text-center mx-auto p-3">
                                <img src="https://cdn.iconscout.com/icon/free/png-256/free-data-not-found-1965034-1662569.png" alt="">
                                <h4>Filter terlebih dahulu sesuai tanggal yang diinginkan.</h4>
                            </div>
                        <?php elseif(1 + 1 == 3): ?>
                            <div id="rekap_data" class="text-center mx-auto p-3">
                                <h1 style="font-weight: 600;">Rekap Data Pasien</h1>
                                <h4>(2023-05-10) - (2023-05-10)</h4>
                                <button type="button" class="btn btn-primary px-5 rounded">Download Rekap Data Pasien </button>
                            </div>
                        <?php endif;?>
                        </div>
                </div>

                <!-- DATA PASIEN-->
                <div class="container-fluid bg-white shadow mb-4">
                    <div class="header p-3 text-light rounded-top" style="background-color:#4ADE80">
                        <div class="row">
                            <div class="col pl-3 pt-1">
                                <h5>Data Pasien</h5>
                            </div>
                            <div class="col">
                            </div>
                            <div class="col text-right">
                                <button type="button" data-toggle="modal" data-target="#modal_tambah_periksa"
                                    class="btn btn-info px-5 rounded bg-sky-600"> <i
                                        class="fa fa-plus pr-2"></i>Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th>Nama Pasien</th>
                                            <th>Status Pasien</th>
                                            <th>Tanggal / Jam</th>
                                            <th>Keluhan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0;
                                        foreach ($periksa as $data):
                                            $id++; ?>
                                            <tr>
                                                <td>
                                                    <?php echo $id ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->nama_pasien ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_pasien_status_byid($data->pasien_status_id) ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->create_date ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->keluhan ?>
                                                </td>
                                                <td>
                                                    <?php if ($data->status == 1) {
                                                        echo "<p style='color: green'>Sudah Ditangani</p>";
                                                    } else {
                                                        echo "<p style='color: red'>Belum Ditangani</p>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($data->status == 1) : ?>
                                                        <a href="<?php echo base_url('periksa/status/' . $data->id); ?>"
                                                        class="trash " data-id="1">
                                                        <button class="btn btn-success btn-sm" type="button" data-toggle="modal">
                                                            Selesai
                                                        </button>
                                                    </a>
                                                    <?php elseif ($data->status == 0) : ?>
                                                        <a href="<?php echo base_url('periksa/status/' . $data->id); ?>"
                                                        class="trash " data-id="1">
                                                        <button class="btn btn-danger btn-sm" type="button" data-toggle="modal">
                                                            Tangani
                                                        </button>
                                                    </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Tambah Periksa-->
                <div class="modal fade" id="modal_tambah_periksa" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('Periksa/aksi_tambah_periksa') ?>"
                            enctype="multipart/form-data" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Input Periksa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body pb-1">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Status Pasien</label>
                                                <div class="">
                                                    <select class="form-control form-select px-2 py-1"
                                                        name="pasien_status_id" aria-label="Default select example">
                                                        <?php $id = 0;
                                                        foreach ($pasien_status as $row):
                                                            $id++; ?>
                                                            <option value="<?php echo $row->id ?>">
                                                                <?php echo $row->name ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Nama Pasien</label>
                                                <div class="">
                                                    <select class="form-control form-select px-2 py-1"
                                                        name="nama_pasien" aria-label="Default select example">
                                                        <?php $id = 0;
                                                        foreach ($siswa as $row):
                                                            $id++; ?>
                                                            <option value="<?php echo $row->nama_siswa ?>">
                                                                <?php echo $row->nama_siswa ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Keluhan Pasien</label>
                                                <div class="">
                                                    <input type="text" name="keluhan" class="form-control"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" onclick="kembali()"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Filter Tanggal-->
                <div class="modal fade" id="modal_filter_tanggal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('Periksa/aksi_filter_tanggal') ?>"
                            enctype="multipart/form-data" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Rekap Data Pasien</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body pb-1">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Dari Tanggal</label>
                                                <div class="">
                                                    <input type="date" name="awal_tanggal" class="form-control"><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-body">
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Sampai Tanggal</label>
                                                <div class="">
                                                    <input type="date" name="akhir_tanggal" class="form-control"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" onclick="kembali()"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </section>
        </div>
    </div>
    <?php $this->load->view('style/js') ?>
    <script>
        function hapus_periksa(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Periksa/hapus_periksa/') ?>" + id;
            }
        }
    </script>
</body>

</html>