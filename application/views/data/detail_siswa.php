<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data</title>
    <?php $this->load->view('style/head')?>
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>

        <div class="content-wrapper">
            <div class="container">
                <?php foreach ($siswa as $datas): ?>
                <div class="main-body">
                    <div class="row gutters-sm p-2">
                        <div class="col-md-4 mt-1">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <img style="width: 190px; height:190px;"
                                            src="<?php echo $datas->foto == null ? base_url('uploads/data/default_profile/logo_profil.png') : base_url('uploads/data/data_siswa')."/".$datas->foto ?>"
                                            alt="Foto Siswa" class="rounded-circle" width="150">
                                    </div>
                                    <div class="mt-4">
                                        <h4><?php echo $datas->nama_siswa ?></h4>
                                        <hr class="mt-2">
                                        <div class="justify-content-center text-secondary">
                                            <div>
                                                <?php echo $datas->kelas ?>
                                            </div>
                                        </div>
                                        <hr class="mt-2">
                                        <p class="text-muted font-size-sm mb-2"><?php echo $datas->alamat ?></p>
                                        <hr class="mt-0 mb-4">
                                    </div>
                                    <a class="btn btn-warning text-white text-bold w-100 mt-1 d-flex align-items-center justify-content-center"
                                        style="height: 47px"
                                        href="<?php echo base_url('datasiswa/edit_siswa/' . $datas->id)?>">Edit
                                        Data Siswa</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mt-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Tempat Tanggal Lahir</h6>
                                        </div>
                                        <div class="col-sm-1 text-secondary">:</div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $datas->tempat_lahir?>,
                                            <?php echo indonesian_date_time($datas->tanggal_lahir);?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Nama Orang Tua/Wali</h6>
                                        </div>
                                        <div class="col-sm-1 text-secondary">:</div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $datas->nama_wali ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">No. Telepon Orang Tua/Wali</h6>
                                        </div>
                                        <div class="col-sm-1 text-secondary">:</div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $datas->no_telepon_wali ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Tinggi Badan (TB)</h6>
                                        </div>
                                        <div class="col-sm-1 text-secondary">:</div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $datas->TB ?> cm
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Berat Badan (BB)</h6>
                                        </div>
                                        <div class="col-sm-1 text-secondary">:</div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $datas->BB ?> kg
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Golongan darah</h6>
                                        </div>
                                        <div class="col-sm-1 text-secondary">:</div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $datas->gol_darah ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Riwayat Penyakit</h6>
                                        </div>
                                        <div class="col-sm-1 text-secondary">:</div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $datas->riwayat_penyakit ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Alergi</h6>
                                        </div>
                                        <div class="col-sm-1 text-secondary">:</div>
                                        <div class="col-sm-7 text-secondary">
                                            <?php echo $datas->alergi ?>
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
    <?php $this->load->view('style/js')?>
    <script>
    function kembali() {
        window.history.go(-1);
    }
    </script>
</body>

</html>