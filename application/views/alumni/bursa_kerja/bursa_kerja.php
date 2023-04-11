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
                    <div class="row mb-2">
                        <div class="col-sm-7 ">
                            <h2>Bursa Kerja </h2>
                            <p style="margin-top:-5px">Daftar Lowongan akan tampil sampai batas tanggal yang telah
                                ditetapkan oleh pemberi informasi.</p>
                        </div>
                        <div class="col-sm-5">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Alumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Bursa Kerja</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content mt-3 p-1">
                <div class="container-fluid ">
                    <div class="row clearfix ">
                        <?php foreach ($bursakerja as $val) { ?>

                        <div class="col-md-4 mb-4">
                            <div class="card card-bursa mt-4">
                                <div class=""> <img class="card-img card-img-bursa p-1"
                                        src="<?php echo base_url('uploads/petugas_alumni/bursa_kerja/').$val->gambar;?>" /></div>

                                <div class="card-info card-info-bursa mt-0 ">
                                    <h3 class="text-secondary"><?php echo $val->job_title ?></h3>
                                    <p class="text-title text-info"><?php echo $val->nama_perusahaan ?></p>
                                    
                                    
                                    <p class="text-body px-3 pb-4"><?php echo character_limiter($val->deskripsi,170); ?>
                                    <a href="<?php echo base_url('Alumni/detail_bursaKerja/'.$val->id_lowongan)?>">
                                        <i class="text-info">selengkapnya</i> </a>
                                        <p style="font-size:15px; font-weight:bold">batas waktu: 
                                 <?php echo date('j M Y', strtotime($val-> akhir_waktu))?></p>
                                        
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