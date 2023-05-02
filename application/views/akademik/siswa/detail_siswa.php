<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');

    .tes {
        font-family: 'Nunito', sans-serif;
    }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php $this->load->view('akademik/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Detail Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Akademik/siswa_data') ?>">Data Siswa</a>
                                </li>
                                <li class="breadcrumb-item active">Detail Siswa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <?php foreach ($siswa as $data): ?>
                <div class="main-body">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img style="width: 150px; height:150px;"
                                            src="<?php $img = tampil_foto_siswa_byid($data->id_daftar) == null ? base_url('uploads/akademik/default_profile/User.png') : base_url('uploads/akademik/pendaftaran_siswa')."/".tampil_foto_siswa_byid($data->id_daftar); echo $img?>"
                                            alt="Foto Siswa" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4><?php echo tampil_nama_siswa_byid($data->id_daftar)?></h4>
                                            <div class="row justify-content-center text-secondary mb-1">
                                                <div>
                                                    <?php echo tampil_namatingkat_ByIdkelas($data->id_kelas)?>
                                                </div>
                                                <div class="ml-1">
                                                    <?php echo tampil_kelas_byid($data->id_kelas)?>
                                                </div>
                                            </div>
                                            <p class="text-muted font-size-sm">
                                                <?php echo tampil_alamat_siswa_byid($data->id_daftar)?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6 class="mb-0">Anak Ke</h6>
                                            </div>
                                            <div class="col-sm-4 text-secondary">
                                                <?php echo tampil_anak_ke_siswa_byid($data->id_daftar)?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6 class="mb-0">Nama Ayah</h6>
                                            </div>
                                            <div class="col-sm-4 text-secondary">
                                                <?php echo tampil_nama_ayah_siswa_byid($data->id_daftar)?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <h6 class="mb-0">Nama Ibu</h6>
                                            </div>
                                            <div class="col-sm-4 text-secondary">
                                                <?php echo tampil_nama_ibu_siswa_byid($data->id_daftar)?>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">No.NIK</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo tampil_nik_siswa_byid($data->id_daftar)?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">No.KK</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo tampil_kk_siswa_byid($data->id_daftar)?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Asal Sekolah</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo tampil_asal_sekolah_siswa_byid($data->id_daftar)?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">NISN</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo tampil_nisn_siswa_byid($data->id_daftar)?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">No Telepon</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo tampil_telepon_siswa_byid($data->id_daftar)?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tempat / Tanggal Lahir</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo tampil_tempat_lahir_siswa_byid($data->id_daftar)?> /
                                            <?php echo tampil_tanggal_lahir_siswa_byid($data->id_daftar)?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Agama</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?php echo tampil_agama_siswa_byid($data->id_daftar)?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Jenis Kelamin</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        <?php $gender = tampil_jekel_siswa_byid($data->id_daftar) == "L" ? 'Laki - Laki' : 'Perempuan'; echo $gender ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a class="btn btn-info"
                                                href="<?php echo base_url('Akademik/edit_siswa/'.$data->id_daftar)?>">Edit
                                                Data Pribadi Siswa</a>
                                            <a class="btn btn-info"
                                                href="<?php echo base_url('Akademik/edit_siswa_kelas/'.$data->id_siswa)?>">Edit
                                                Kelas Siswa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <?php $this->load->view('akademik/style/js')?>
    <script>
    function kembali() {
        window.history.go(-1);
    }
    </script>
</body>

</html>