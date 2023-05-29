<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Program Klik</title>
    <?php $this->load->view('style/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar') ?>
        <?php $this->load->view('style/sidebar') ?>

        <div class="content-wrapper py-3">
            <section class="content">
                <div class="container-fluid mb-4">
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Detail Program Klik</div>
                        </div>
                    </div>
                    <div class="bg-light shadow">
                        <div class="row">
                            <div class="col-8">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-2 font-weight-bold">Nama Pasien</div>
                                        <div>:</div>
                                        <div class="col">
                                            <?php if (!empty($program['siswa_id'])) {
                                                echo JoinOne('Program_Klik', 'siswa', 'siswa_id', 'id', 'Program_Klik.id', $program['id'], 'nama_siswa');
                                            } else if (!empty($program['guru_id'])) {
                                                echo JoinOne('Program_Klik', 'guru', 'guru_id', 'id', 'Program_Klik.id', $program['id'], 'nama_guru');
                                            } else if (!empty($program['karyawan_id'])) {
                                                echo JoinOne('Program_Klik', 'karyawan', 'karyawan_id', 'id', 'Program_Klik.id', $program['id'], 'nama_karyawan');
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2 font-weight-bold">Pasien Status</div>
                                        <div>:</div>
                                        <div class="col">
                                            <?php echo $program['pasien_status'] ?>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2 font-weight-bold">Tanggal </div>
                                        <div>:</div>
                                        <div class="col">
                                            <?php echo $program['create_date'] ?>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2 font-weight-bold">Keluhan</div>
                                        <div>:</div>
                                        <div class="col">
                                            <?php echo $program['keluhan'] ?>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2 font-weight-bold">Saran</div>
                                        <div>:</div>
                                        <div class="col">
                                            <?php echo $program['saran'] ?>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2 font-weight-bold">
                                            <a href="<?php echo base_url('Program_Klik/cetak_Program_Klik/' . $program['id'] . '/pdf') ?>"
                                                class="btn btn-primary btn-sm" target="_blank">
                                                <i class="fas fa-print"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('style/js') ?>

        <script>
            function kembali() {
                window.history.go(-1);
            }
        </script>

</body>

</html>