<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Petugas Alumni</title>
    <?php $this->load->view('petugasalumni/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    .anyClass {
        height: 230px;
        max-height: 300px;
        overflow-y: auto;
    }

    .anyClass::-webkit-scrollbar {
        display: none;
    }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('petugasalumni/style/navbar')?>
        <?php $this->load->view('petugasalumni/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="mb-2">
                        <div class="">
                            <h1>Dashboard Petugas Alumni</h1>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <div class="px-2 py-1">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="small-box btn-info">
                                <div class="inner">
                                    <h3><?php echo $count_alumni ?></h3>
                                    <p>JUMLAH ALUMNI</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="<?php echo base_url('PetugasAlumni/data_angkatan') ?>"
                                    class="small-box-footer">More
                                    info
                                    <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="small-box btn-info">
                                <div class="inner">
                                    <h3><?php echo $count_event; ?></h3>
                                    <p>EVENT BULAN INI</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <a href="<?php echo base_url('PetugasAlumni/event') ?>" class="small-box-footer">More
                                    info
                                    <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="small-box btn-info">
                                <div class="inner">
                                    <h3><?php echo $count_lowker; ?></h3>
                                    <p>LOWKER AKTIF</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <a href="<?php echo base_url('PetugasAlumni/bursa_kerja') ?>"
                                    class="small-box-footer">More info
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="bg-white shadow" style="border-radius: 15px 15px 15px 15px;">
                                <div class="bg-info p-2 text-center" style="border-radius: 5px 5px 0px 0px;">
                                    <strong class="h3">EVENT AKTIF</strong>
                                </div>
                                <div class="px-4 py-2 mt-3 anyClass" style="">
                                    <?php if($count_event > 0): ?>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Event</th>
                                                <th>Tanggal Event</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id=0; foreach ($event as $data): $id++ ?>
                                            <tr>
                                                <td class="text-center"><?php echo $id ?></td>
                                                <td><?php echo $data->event_title ?></td>
                                                <td><?php echo $data->tanggal_event ?></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    <?php else: ?>
                                    <div class="row mt-4 py-2">
                                        <div class="icon col-12 row align-items-center justify-content-center">
                                            <i style="font-size: 80px" class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="col-12 row align-items-center justify-content-center mt-3">
                                            <h4>Event Tidak Tersedia</h4>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="bg-info p-2 text-center" style="border-radius: 0px 0px 5px 5px;">
                                    <a href="<?php echo base_url('Alumni/event') ?>" class="">More info
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="bg-white shadow" style="border-radius: 15px 15px 15px 15px;">
                                <div class="bg-info p-2 text-center" style="border-radius: 5px 5px 0px 0px;">
                                    <strong class="h3">LOWONGAN KERJA AKTIF</strong>
                                </div>
                                <div class="px-4 py-2 mt-3 anyClass" style="">
                                    <?php if($count_lowker > 0): ?>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Judul Pekerjaan</th>
                                                <th>Akhir Lowongan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id=0; foreach ($bursa_kerja as $data): $id++ ?>
                                            <tr>
                                                <td class="text-center"><?php echo $id ?></td>
                                                <td><?php echo $data->nama_perusahaan ?></td>
                                                <td><?php echo $data->job_title ?></td>
                                                <td><?php echo $data->akhir_waktu ?></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    <?php else: ?>
                                    <div class="row mt-4">
                                        <div class="icon col-12 row align-items-center justify-content-center">
                                            <i style="font-size: 80px" class="fas fa-bullhorn"></i>
                                        </div>
                                        <div class="col-12 row align-items-center justify-content-center mt-3">
                                            <h4>Lowongan Kerja Tidak Tersedia</h4>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="bg-info p-2 text-center" style="border-radius: 0px 0px 5px 5px;">
                                    <a href="<?php echo base_url('Alumni/bursa_kerja') ?>" class="">More info
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('petugasalumni/style/js')?>
</body>

</html>