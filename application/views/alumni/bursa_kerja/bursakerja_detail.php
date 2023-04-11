<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alumni</title>
    <?php $this->load->view('alumni/style/head') ?>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('alumni/style/navbar') ?>
        <?php $this->load->view('alumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-7 ">
                            <h2>Bursa Kerja Detail</h2>

                        </div>
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Alumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Bursa Kerja Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content ">
                <div class="container-fluid ">
                    <?php foreach ($lowongan as $data) { ?>
                    <div class="">

                        <div class="row">

                            <div class="col-md-4">
                                <img src="<?php echo base_url('uploads/petugas_alumni/bursa_kerja/').$data->gambar;?>"
                                    alt="project-image" class="rounded img-detail h-50">
                                <div class="card p-4 mt-3">
                                    <p><b>Bidang Usaha:</b> <?php echo $data->bidang_usaha ?> CO</p>
                                    <hr>
                                    <p><b>Batas Waktu:</b>
                                        <?php echo date('l, j F Y',strtotime($data-> akhir_waktu) ) ?></p>

                                </div>
                            </div><!-- / column -->

                            <div class="col-md-8">

                                <div class="card p-4 mt-0 ">
                                    <h3><?php echo $data->job_title ?></h3>
                                    <p class=" border-none h-100"><?php echo $data->deskripsi ?></p>



                                </div>

                                <div class="card p-4">
                                    <p><b>Nama Perusahaan:</b> <?php echo $data->nama_perusahaan ?> CO</p>
                                    <hr>
                                    <p><b>Tanggal Posting:</b>
                                        <?php echo date('l, j F Y',strtotime($data-> tanggal_posting) ) ?></p>

                                </div>
                                <div class="float-right">
                                    <?php echo anchor('/Alumni/bursa_kerja', ' <i class="nav-icon  fa fa-arrow-left" aria-hidden="true"></i><span class="pl-1">Kembali</span>', 'class="btn btn-info waves-effect shadow"') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

        </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('alumni/style/js') ?>
</body>

</html>