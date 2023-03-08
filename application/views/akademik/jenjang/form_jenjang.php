<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                            <h1>Form Jenjang</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/jenjang') ?>">Jenjang</a></li>
                                <li class="breadcrumb-item active">Form Jenjang</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white py-4">
                <div class="container-fluid">
                    <form action="<?php echo base_url('Akademik/tambah_jenjang') ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Jenjang</label>
                                    <div class="">
                                        <input type="text" name="nama_jenjang" class="form-control"
                                            placeholder="Masukan Nama Jenjang">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Keterangan</label>
                                    <div class="">
                                        <textarea class="form-control" name="keterangan"
                                            placeholder="Masukan Keterangan"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Kode Jenjang</label>
                                    <div class="">
                                        <input type="text" name="kd_jenjang" class="form-control"
                                            placeholder="Masukan Kode Jenjang">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Paket</label>
                                    <div class="">
                                        <input type="text" name="paket" class="form-control"
                                            placeholder="Masukan Paket">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="">
                                <button type="submit" class="btn btn-success" style="width: 150px; margin-right: 12px;">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('akademik/style/js')?>
</body>

</html>