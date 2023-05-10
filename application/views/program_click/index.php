<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Program Click</title>
    <?php $this->load->view('style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('style/navbar') ?>
        <?php $this->load->view('style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Program Click</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Program_Click/') ?>">Program Click</a>
                                </li>
                                <li class="breadcrumb-item active">Data Program Click</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <!-- FILTER REKAP DATA -->
                <div class="container-fluid bg-white shadow mb-4">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Filter Rekap Data</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modal_filter_tanggal">
                                Filter Tanggal
                            </button>
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
                                            <th>Keterangan</th>
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
                                                    <?php echo $data->pasien_status_id ?>
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
                                                    <a href="<?php echo base_url('Program_Click/edit_event/' . $data->id); ?>"
                                                        class="trash " data-id="1">
                                                        <button class="btn btn-primary btn-sm" type="button"
                                                            class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal_event<?php echo $data->id ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <button class='btn btn-danger btn-sm'
                                                        onClick="hapus_periksa(<?php echo $data->id ?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DATA PASIEN-->
                <div class="container-fluid bg-white shadow mb-4">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Data Pasien</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modal_tambah_periksa">
                                <i class="fa fa-plus pr-2"></i>Tambah
                            </button>
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
                                            <th>Keterangan</th>
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
                                                    <?php echo $data->pasien_status_id ?>
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
                                                    <a href="<?php echo base_url('Program_Click/edit_event/' . $data->id); ?>"
                                                        class="trash " data-id="1">
                                                        <button class="btn btn-primary btn-sm" type="button"
                                                            class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal_event<?php echo $data->id ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <button class='btn btn-danger btn-sm'
                                                        onClick="hapus_program_click(<?php echo $data->id ?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
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
                        <form action="<?php echo base_url('Program_Click/aksi_tambah_periksa') ?>" enctype="multipart/form-data"
                            method="post">
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
                <form action="<?php echo base_url('Program_Click/aksi_filter_tanggal') ?>" enctype="multipart/form-data"
                    method="post">
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
                window.location.href = "<?php echo base_url('Program_Click/hapus_program_click/') ?>" + id;
            }
        }
    </script>
</body>

</html>