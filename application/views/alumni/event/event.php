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
<style>
<?php include 'builder/dist/css/bursa.css';
?>
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('alumni/style/navbar') ?>
        <?php $this->load->view('alumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-sm-6 ">
                            <h2>Event</h2>

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Alumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Event</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content ">
                <div class="container-fluid ">
                    <div class="row clearfix ">
                        <?php foreach ($event as $vent) { ?>

                        <div class="col-md-4 mb-4">
                            <div class="card card-bursa mt-4 py-5">
                                <div class=""> <img class="card-img card-img-bursa p-1"
                                        src="<?php echo base_url('uploads/alumni/event/').$vent->gambar;?>" /></div>

                                <div class="card-info-bursa mb-0">
                                    <h3 class="text-secondary" style="margin-top:-10px"><?php echo $vent->event_title ?></h3>
                                    <p style="font-size:15px; font-weight:bold">Waktu:
                                        <?php echo date('j F Y', strtotime($vent-> tanggal_event))?></p>

                                    <p class="text-body px-3 ">
                                        <?php echo character_limiter($vent->deskripsi,170); ?>
                                        <a href="<?php echo base_url('Alumni/detail_event/'.$vent->id_event)?>">
                                        <i class="text-info">selengkapnya</i> </a>
                                   

                                </div>
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('alumni/style/js') ?>
</body>

</html>