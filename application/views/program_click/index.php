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
                                <button data-toggle="modal" data-target="#modal_tambah_program_click"
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
                                                            echo JoinOne('program_click', 'siswa', 'siswa_id', 'id', 'program_click.id', $data->id, 'nama_siswa');
                                                        } else if (!empty($data->guru_id)) {
                                                            echo JoinOne('program_click', 'guru', 'guru_id', 'id', 'program_click.id', $data->id, 'nama_guru');
                                                        } else if (!empty($data->karyawan_id)) {
                                                            echo JoinOne('program_click', 'karyawan', 'karyawan_id', 'id', 'program_click.id', $data->id, 'nama_karyawan');
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
                                                        <a href="<?php echo base_url('Periksa/export_pasien_to_excel'); ?>">
                                                            <button type="button" class="btn btn-success mr-1"
                                                                style="width: 150px"><i
                                                                    class="fa fa-download pr-2"></i>Export</button>
                                                        </a>
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
                <!-- Modal Tambah Program Click-->
                <div class="modal fade" id="modal_tambah_program_click" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('Program_Click/aksi_tambah_program_click') ?>"
                            enctype="multipart/form-data" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Form Input Program Click</h5>
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
        function hapus_periksa(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Periksa/hapus_periksa/') ?>" + id;
            }
        }
    </script>
</body>

</html>