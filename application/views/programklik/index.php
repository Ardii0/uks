<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Program Klik</title>
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
                <!-- DATA PASIEN-->
                <div class="container-fluid mb-4">
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Data Pasien</div>
                        </div>
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div class="grid gap-3">
                                <button data-toggle="modal" data-target="#modal_tambah_programklik"
                                    class="btn btn-info"><i class="fas fa-plus"></i>&nbsp;
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light shadow">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <table id="data-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">No</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Tanggal / Jam</th>
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
                                                    <?php echo $data->nama_siswa ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->kelas ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->create_date ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('programklik/detail/' . $data->id) ?>"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                    <button class="btn btn-warning btn-sm" type="button"
                                                        data-toggle="modal" data-target="#modal<?php echo $data->id ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class='btn btn-danger btn-sm'
                                                        onclick="hapus_periksa(<?php echo $data->id ?>)">
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
                </div>
                <!-- Modal Tambah Program Klik-->
                <div class="modal fade" id="modal_tambah_programklik" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('programklik/aksi_tambah_programklik') ?>"
                            enctype="multipart/form-data" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Input Program Klik</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body pb-1">
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Nama Siswa</label>
                                                <div class="">
                                                    <input type="text" name="nama_siswa" class="form-control"
                                                        required="" placeholder="Masukan Nama Siswa"><br>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Kelas</label>
                                                <div class="">
                                                    <input type="text" name="kelas" class="form-control"
                                                        required="" placeholder="Masukan Kelas Siswa"><br>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Keluhan </label>
                                                <div class="">
                                                    <input name="keluhan" class="form-control"
                                                        placeholder="Masukkan Keluhan Siswa" required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-danger text-bold w-25"
                                        data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success text-bold w-25">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Edit Program Klik -->
                <?php foreach ($periksa as $data): ?>
                <div class="modal fade" id="modal<?php echo $data->id ?>" tabindex="-1" role="dialog"
                    aria-labelledby="Modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('programklik/aksi_edit_program') ?>"
                            enctype="multipart/form-data" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Program Klik</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body pb-1">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <input type="hidden" name="id" value="<?php echo $data->id ?>">
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Nama Siswa</label>
                                                <div class="">
                                                    <input type="text" name="nama_siswa" class="form-control"
                                                        value="<?php echo $data->nama_siswa ?>">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Kelas </label>
                                                <div class="">
                                                    <input type="text" name="kelas" value="<?php echo $data->kelas ?>" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Keluhan </label>
                                                <div class="">
                                                    <input type="text" name="keluhan" value="<?php echo $data->keluhan ?>" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-danger text-bold w-25"
                                        data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success text-bold w-25">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endforeach ?>
        </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('style/js') ?>
    <script src="<?php echo base_url('builder/dist/js/status.js'); ?>"></script>
    <?php if ($this->session->flashdata('sukses')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('sukses') ?>",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
    });
    </script>
    <?php if (isset($_SESSION['sukses'])) {
            unset($_SESSION['sukses']);
        }
    endif; ?>
    <script>
    function hapus_periksa(id) {
        swal.fire({
            title: 'Yakin untuk menghapus data ini?',
            text: "Data ini akan terhapus permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: ' Ya hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Dihapus',
                    showConfirmButton: false,
                    timer: 1500,

                }).then(function() {
                    window.location.href = "<?php echo base_url('programklik/hapus_programklik/') ?>" +
                        id;
                });
            }
        });
    }
    </script>
</body>

</html>