<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alumni</title>
    <?php $this->load->view('alumni/style/head') ?>
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('alumni/style/navbar') ?>
        <?php $this->load->view('alumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Diri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Alumni/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item active">Data Diri</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <?php if($this->db->get_where('data_diri', array('id_level' => $this->session->userdata('id_level')))->num_rows()) {?>
                    <form action="<?php echo base_url('Alumni/update_datadiri') ?>"
                        enctype="multipart/form-data" method="post" class="container-fluid bg-white shadow mb-5">
                <?php } else {?>
                    <form action="<?php echo base_url('Alumni/tambah_datadiri') ?>"
                        enctype="multipart/form-data" method="post" class="container-fluid bg-white shadow mb-5">
                <?php }?>
                    <div class="row mx-2 pt-3">
                        <div class="col">
                            <div class="mt-2 mx-1">
                                <h4>Lengkapi Data Diri Anda Dengan Niat, Bismillah</h4>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <?php $this->load->view('alumni/data_diri/form/data_pribadi')?>
                    <div class="row mx-2 mb-5">
                        <div class="col-12">
                            <div class="mt-1 mx-1">
                                <h4 class="">Data Status *</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="border-top my-3"></div>
                        </div>
                        <div class="col-12">
                            <?php $this->load->view('alumni/data_diri/lainnya/form')?>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <?php $this->load->view('alumni/style/js') ?>
    <?php $this->load->view('../../builder/dist/utils/Data') ?>
</body>

</html>