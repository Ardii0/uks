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
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Filter Rekap Data</div>
                        </div>
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div class="grid gap-3">
                                <button class="btn btn-info" data-toggle="modal" data-target="#modal_filter_tanggal"><i
                                        class="fas fa-filter"></i>&nbsp;
                                    Filter Tanggal</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light shadow">
                        <?php if ($export == 0): ?>
                        <div id="not_found" class="text-center mx-auto p-3">
                            <img src="https://cdn.iconscout.com/icon/free/png-256/free-data-not-found-1965034-1662569.png"
                                alt="">
                            <h4>Filter terlebih dahulu sesuai tanggal yang diinginkan.</h4>
                        </div>
                        <?php elseif ($export != 0): ?>
                        <div id="rekap_data" class="text-center mx-auto p-3">
                            <h1 style="font-weight: 600;">Rekap Data Pasien</h1>
                            <h4>
                                <?= '(' . $awal_tanggal . ') - (' . $akhir_tanggal . ')' ?>
                            </h4>
                            <form action="<?php echo base_url('periksa/export_pasien_to_excel') ?>"
                                enctype="multipart/form-data" method="post">
                                <input type="hidden" id="awal_tanggal" name="awal_tanggal" value="<?= $awal_tanggal?>">
                                <input type="hidden" id="akhir_tanggal" name="akhir_tanggal"
                                    value="<?= $akhir_tanggal?>">
                                <button type="submit" class="btn btn-primary px-5 rounded">Download Rekap Data Pasien
                                </button>
                            </form>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- DATA PASIEN-->
                <div class="container-fluid bg-white shadow mb-4">
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Data Pasien</div>
                        </div>
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div class="grid gap-3">
                                <button class="btn btn-info" data-toggle="modal" data-target="#modal_tambah_periksa"><i
                                        class="fas fa-plus"></i>&nbsp;
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
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
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0;
                                        foreach ($periksa as $data):
                                            $id++; ?>
                                        <?php $ditangani = $this->db->get_where('penanganan_periksa', array('periksa_id' => $data->id))->num_rows();?>
                                        <tr>
                                            <td>
                                                <?php echo $id ?>
                                            </td>
                                            <td>
                                                <?php if(!empty($data->siswa_id)) {
                                                            echo JoinOne('periksa', 'siswa', 'siswa_id', 'id','periksa.id',$data->id, 'nama_siswa');
                                                        } else if(!empty($data->guru_id)) {
                                                            echo JoinOne('periksa', 'guru', 'guru_id', 'id','periksa.id',$data->id, 'nama_guru');
                                                        } else if(!empty($data->karyawan_id)) {
                                                            echo JoinOne('periksa', 'karyawan', 'karyawan_id', 'id','periksa.id',$data->id, 'nama_karyawan');
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
                                                <?php if ($ditangani > 0) {
                                                        echo "<p style='color: green'>Sudah Ditangani</p>";
                                                    } else {
                                                        echo "<p style='color: red'>Belum Ditangani</p>";
                                                    }
                                                    ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($ditangani > 0): ?>
                                                <a href="<?php echo base_url('periksa/status/' . $data->id); ?>"
                                                    class="trash " data-id="1">
                                                    <button class="btn btn-success btn-sm" type="button"
                                                        data-toggle="modal">
                                                        Selesai
                                                    </button>
                                                </a>
                                                <?php elseif ($ditangani == 0): ?>
                                                <a href="<?php echo base_url('periksa/status/' . $data->id); ?>"
                                                    class="trash " data-id="1">
                                                    <button class="btn btn-danger btn-sm" type="button"
                                                        data-toggle="modal">
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
                        <form action="<?php echo base_url('periksa/aksi_tambah_periksa') ?>"
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
                                                        <?php foreach($guru as $guru): ?>
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
                                                        <?php foreach($siswa as $siswa): ?>
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
                                                        <?php foreach($karyawan as $karyawan): ?>
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

                <!-- Modal Filter Tanggal-->
                <div class="modal fade" id="modal_filter_tanggal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('periksa/aksi_filter_tanggal') ?>"
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
    <script src="<?php echo base_url('builder/dist/js/status.js'); ?>"></script>
    <?php if ($this->session->flashdata('bisa')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('bisa')?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1500,
    });
    </script>
    <?php if (isset($_SESSION['bisa'])) {
            unset($_SESSION['bisa']);
        }
    endif; ?>
    <script>
    function hapus_periksa(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('periksa/hapus_periksa/') ?>" + id;
        }
    }
    </script>
</body>

</html>