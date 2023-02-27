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

<body class="hold-transition skin-blue sidebar-mini">
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

            <section class="content">
                <div class="container-fluid bg-white p-3 rounded">
                    <?php foreach ($siswa as $data): ?>
                    <div class="row">
                        <div class="col-5">
                            <div class="d-flex justify-content-center">
                                <img src="https://static.thenounproject.com/png/5034901-200.png" alt="Foto Siswa"
                                    width="200px" height="200px">
                            </div>
                            <div class="text-center tes">
                                <h3 class="font-weight-bold mt-n2"><?php echo tampil_nama_siswa_byid($data->id_daftar)?>
                                </h3>
                                <h5 class="font-weight-bold mt-n2"><?php echo tampil_rombel_byid($data->id_rombel)?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-7 tes">
                            <div class="row">
                                <div class="col-4">
                                    <h6>Alamat</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_alamat_siswa_byid($data->id_daftar)?></h6>
                                </div>
                                <div class="col-4">
                                    <h6>Tempat / Tanggal Lahir</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_tempat_lahir_siswa_byid($data->id_daftar)?> /
                                        <?php echo tampil_tanggal_lahir_siswa_byid($data->id_daftar)?></h6>
                                </div>
                                <div class="col-4">
                                    <h6>Jenis Kelamin</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_jekel_siswa_byid($data->id_daftar)?></h6>
                                </div>
                                <div class="col-4">
                                    <h6>Agama</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_agama_siswa_byid($data->id_daftar)?></h6>
                                </div>
                                <div class="col-4">
                                    <h6>Kewarganegaraan</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_wn_siswa_byid($data->id_daftar)?></h6>
                                </div>
                                <div class="col-4">
                                    <h6>NISN</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_nisn_siswa_byid($data->id_daftar)?></h6>
                                </div>
                                <div class="col-4">
                                    <h6>No Telepon</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_telepon_siswa_byid($data->id_daftar)?></h6>
                                </div>
                                <div class="col-4">
                                    <h6>Anak Ke-</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_anak_ke_siswa_byid($data->id_daftar)?></h6>
                                </div>
                                <div class="col-4">
                                    <h6>Jumlah Saudara (Kandung)</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_sdr_kandung_siswa_byid($data->id_daftar)?></h6>
                                </div>
                                <div class="col-4">
                                    <h6>Jumlah Saudara (Angkat)</h6>
                                </div>
                                <div class="col-8">
                                    <h6>: <?php echo tampil_sdr_angkat_siswa_byid($data->id_daftar)?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" onClick="kembali()" class="w-25 btn btn-secondary">Kembali</button>
                    </div>
                    <?php endforeach;?>
                </div>
            </section>
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