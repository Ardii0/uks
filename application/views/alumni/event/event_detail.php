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
                            <h2>Event Detail</h2>
                        </div>
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Alumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Event Detail</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content ">
                <div class="container-fluid ">
                    <?php foreach ($event as $data) { ?>
                    <div>
                        <div class="row">
                            <div class="col-4 text-center">
                                <div class="card p-2">
                                    <img src="<?php echo base_url('uploads/alumni/event/').$data->gambar;?>"
                                        alt="project-image" style="height: auto; width: auto">
                                    <h3 class="mt-2"><?php echo $data->event_title ?></h3>
                                    <p><?php echo $data->deskripsi ?></p>
                                </div>
                            </div><!-- / column -->
                            <div class="col-8">
                                <div class="card p-5 mt-0 ">
                                    <p><b>Tanggal Pelaksanaan:</b>
                                        <?php echo date('l, j F Y',strtotime($data-> tanggal_event) ) ?></p>
                                    <hr>
                                    <p><b>Tanggal Posting:</b>
                                        <?php echo date('l, j F Y',strtotime($data-> tanggal_posting) ) ?></p>
                                </div>
                            </div><!-- / column -->
                        </div>
                    </div>
                    <div class="float-right">
                        <?php echo anchor('/Alumni/event', ' <i class="nav-icon  fa fa-arrow-left" aria-hidden="true"></i><span class="pl-1">Kembali</span>', 'class="btn btn-info waves-effect shadow"') ?>
                    </div>
                </div>
                <?php } ?>
            </section>
        </div>
    </div>
    <?php $this->load->view('alumni/style/js') ?>
</body>

</html>