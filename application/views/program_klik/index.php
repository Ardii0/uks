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
                                <button data-toggle="modal" data-target="#modal_tambah_program_klik"
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
                                                <th>Nama Pasien</th>
                                                <th>Status Pasien</th>
                                                <th>Tanggal / Jam</th>
                                                <th>Keluhan</th>
                                                <th>Rujukan</th>
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
                                                    <?php if (!empty($data->siswa_id)) {
                                                            echo JoinOne('program_klik', 'siswa', 'siswa_id', 'id', 'program_klik.id', $data->id, 'nama_siswa');
                                                        } else if (!empty($data->guru_id)) {
                                                            echo JoinOne('program_klik', 'guru', 'guru_id', 'id', 'program_klik.id', $data->id, 'nama_guru');
                                                        } else if (!empty($data->karyawan_id)) {
                                                            echo JoinOne('program_klik', 'karyawan', 'karyawan_id', 'id', 'program_klik.id', $data->id, 'nama_karyawan');
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data->pasien_status ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data->create_date ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data->keluhan ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data->saran ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('program_klik/detail/' . $data->id) ?>"
                                                            class="btn btn-success btn-sm">
                                                            <i class="fas fa-search-plus"></i>
                                                        </a>
                                                            <button class="btn btn-warning btn-sm" type="button"
                                                                    data-toggle="modal"
                                                                    data-target="#modals">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                        <button class='btn btn-danger btn-sm' onclick="hapus_periksa(<?php echo $data->id ?>)">
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
                <div class="modal fade" id="modal_tambah_program_klik" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('program_klik/aksi_tambah_program_klik') ?>"
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
                                                <label class="control-label">Status Pasien</label>
                                                <div class="">
                                                    <select class="form-control form-select px-2 py-1" id="option"
                                                        onchange="selectStatus()" name="pasien_status">
                                                        <option value="Pilih" style="display: none;">
                                                            Pilih Status
                                                        </option>
                                                        <option value="Guru">
                                                            Guru
                                                        </option>
                                                        <option value="Siswa">
                                                            Siswa
                                                        </option>
                                                        <option value="Karyawan">
                                                            Karyawan
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Nama Pasien</label>
                                                <div class="" id="disabled">
                                                    <select class="form-control select2" disabled>
                                                        <option selected>
                                                            Pilih Pasien
                                                        </option>
                                                    </select>
                                                </div>
                                                <div id="guru" style="display: none;">
                                                    <select class="form-control select2" name="guru_id">
                                                        <option style="display: none;" selected disabled>
                                                            Pilih Pasien
                                                        </option>
                                                        <?php foreach ($guru as $guru): ?>
                                                        <option value="<?php echo $guru->id ?>">
                                                            <?php echo $guru->nama_guru ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div id="siswa" style="display: none;">
                                                    <select class="form-control select2" name="siswa_id">
                                                        <option style="display: none;" selected disabled>
                                                            Pilih Pasien
                                                        </option>
                                                        <?php foreach ($siswa as $siswa): ?>
                                                        <option value="<?php echo $siswa->id ?>">
                                                            <?php echo $siswa->nama_siswa ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div id="karyawan" style="display: none;">
                                                    <select class="form-control select2" name="karyawan_id">
                                                        <option style="display: none;" selected disabled>
                                                            Pilih Pasien
                                                        </option>
                                                        <?php foreach ($karyawan as $karyawan): ?>
                                                        <option value="<?php echo $karyawan->id ?>">
                                                            <?php echo $karyawan->nama_karyawan ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Keluhan Pasien</label>
                                                <div class="">
                                                    <textarea name="keluhan" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Saran Untuk Pasien</label>
                                                <div class="">
                                                    <textarea name="saran" class="form-control" required></textarea>
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
                <div class="modal fade" id="modals" tabindex="-1" role="dialog"
                    aria-labelledby="Modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('program_klik/aksi_tambah_program_klik') ?>"
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
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Status Pasien</label>
                                                <div class="">
                                                    <select class="form-control form-select px-2 py-1" id="edits"
                                                        onchange="selectStatus2()" name="pasien_status">
                                                        <option value="Pilih" style="display: none;">
                                                            Pilih Status
                                                        </option>
                                                        <option value="Guru">
                                                            Guru
                                                        </option>
                                                        <option value="Siswa">
                                                            Siswa
                                                        </option>
                                                        <option value="Karyawan">
                                                            Karyawan
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Nama Pasien</label>
                                                <div class="" id="disableds">
                                                    <select class="form-control select2" disabled>
                                                        <option selected>
                                                            Pilih Pasien
                                                        </option>
                                                    </select>
                                                </div>
                                                <div id="gurus" style="display: none;">
                                                    <select class="form-control select2" name="guru_id">
                                                        <option style="display: none;" selected disabled>
                                                            Pilih Pasien
                                                        </option>
                                                        <?php foreach ($guru as $guru): ?>
                                                        <option value="<?php echo $guru->id ?>">
                                                            <?php echo $guru->nama_guru ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div id="siswas" style="display: none;">
                                                    <select class="form-control select2" name="siswa_id">
                                                        <option style="display: none;" selected disabled>
                                                            Pilih Pasien
                                                        </option>
                                                        <?php foreach ($siswa as $siswa): ?>
                                                        <option value="<?php echo $siswa->id ?>">
                                                            <?php echo $siswa->nama_siswa ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div id="karyawans" style="display: none;">
                                                    <select class="form-control select2" name="karyawan_id">
                                                        <option style="display: none;" selected disabled>
                                                            Pilih Pasien
                                                        </option>
                                                        <?php foreach ($karyawan as $karyawan): ?>
                                                        <option value="<?php echo $karyawan->id ?>">
                                                            <?php echo $karyawan->nama_karyawan ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Keluhan Pasien</label>
                                                <div class="">
                                                    <textarea name="keluhan" class="form-control" required>
                                                        <?php echo $data->keluhan?>
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="control-label">Saran Untuk Pasien</label>
                                                <div class="">
                                                    <textarea name="saran" class="form-control" required>
                                                        <?php echo $data->saran?>
                                                    </textarea>
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
                <?php endforeach?>
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
        timer: 5000,
    });
    </script>
    <?php if (isset($_SESSION['sukses'])) {
            unset($_SESSION['sukses']);
        }
    endif; ?>
    <script>
<<<<<<< HEAD
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
                    window.location.href = "<?php echo base_url('program_klik/hapus_program_klik/') ?>" + id;
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Dihapus',
                        showConfirmButton: false,
                        timer: 5000
                    })

                }
            });
=======
    function hapus_periksa(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('periksa/hapus_periksa/') ?>" + id;
>>>>>>> 5b0ee5e86cba6d00d3113118823f5a8e7f6fd5bd
        }
    }
    </script>
</body>

</html>