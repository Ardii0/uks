<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Siswa</title>
    <?php $this->load->view('nilai/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- navbar -->
        <?php $this->load->view('nilai/style/navbar')?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('nilai/style/sidebar')?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Detail Data Nilai Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Nilai/modul_data_nilai') ?>">Modul Data Nilai
                                        Siswa</a>
                                </li>
                                <li class="breadcrumb-item active">Detail Data Siswa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid shadow p-3 mb-5 bg-white rounded">
                    <?php foreach($data as $nilai ):?>
                    <div class="row">
                        <div class="col-12 text-center h4">
                            <div><?php echo tampil_nama_siswa_byid(tampil_id_daftar_siswa_byid($nilai->id_siswa))?>
                            </div>
                            <div><?php echo tampil_kelas_byid(tampil_id_kelas_rombel_byid($nilai->id_rombel))?>
                                <?php echo tampil_rombel_byid($nilai->id_rombel)?> (Semester
                                <?php echo $nilai->id_semester?>)</div>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3 row">
                            <div class="col-10 text-right">Ulangan Harian 1 :</div>
                            <div class="col-2"><?php echo $nilai->nuh1?></div>
                            <div class="col-10 mt-2 text-right">Ulangan Harian 2 :</div>
                            <div class="col-2 mt-2"><?php echo $nilai->nuh2?></div>
                            <div class="col-10 mt-2 text-right">Ulangan Harian 3 :</div>
                            <div class="col-2 mt-2"><?php echo $nilai->nuh3?></div>
                        </div>
                        <div class="col-3 row">
                            <div class="col-10 text-right">Nilai Tugas 1 :</div>
                            <div class="col-2"><?php echo $nilai->nt1?></div>
                            <div class="col-10 mt-2 text-right">Nilai Tugas 2 :</div>
                            <div class="col-2 mt-2"><?php echo $nilai->nt2?></div>
                            <div class="col-10 mt-2 text-right">Nilai Tugas 3 :</div>
                            <div class="col-2 mt-2"><?php echo $nilai->nt3?></div>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                        <div class="col-3 row mt-2">
                            <div class="col-10 text-right">Nilai Rata Rata (Ulangan) :</div>
                            <div class="col-2"><?php echo $nilai->rnuh?></div>
                            <div class="col-10 mt-2 text-right">Nilai Rata Rata (Tugas) :</div>
                            <div class="col-2 mt-2"><?php echo $nilai->rnt?></div>
                            <div class="col-10 mt-2 text-right">Nilai Rata Rata (Harian) :</div>
                            <div class="col-2 mt-2"><?php echo $nilai->nh?></div>
                        </div>
                        <div class="col-3 row mt-2">
                            <div class="col-10 text-right">Nilai Tengah Semester :</div>
                            <div class="col-2"><?php echo $nilai->mid?></div>
                            <div class="col-10 mt-2 text-right">Nilai Semesteran :</div>
                            <div class="col-2 mt-2"><?php echo $nilai->smt?></div>
                            <div class="col-10 mt-2 text-right">Nilai Keseluruhan :</div>
                            <div class="col-2 mt-2"><?php echo $nilai->nar?></div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <?php endforeach;?>
                </div>
            </section>
        </div>
        <?php $this->load->view('nilai/style/js')?>
</body>

</html>