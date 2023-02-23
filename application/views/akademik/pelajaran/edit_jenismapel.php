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
                            <h1>Edit Jenis Mapel</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/jenismapel') ?>">Jenis Mapel</a></li>
                                <li class="breadcrumb-item active">Edit Jenis Mapel</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white py-4">
            <div class="container-fluid">
              <?php foreach ($jenismapel as $data): ?>
                <form action="<?php echo base_url('Akademik/update_jenismapel') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Jenis Mapel</label>
                                    <div class="">
                                        <input type="text" name="nama_jenismapel" class="form-control" autocomplete="off"
                                            placeholder="Masukan Nama jenismapel" value="<?php echo $data->nama_jenismapel ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Keterangan</label>
                                    <div class="">
                                        <input type="text" name="keterangan" class="form-control"
                                            placeholder="Masukan Keterangan" value="<?php echo $data->keterangan ?>">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="">
                            <input type="hidden" value="<?php echo $data->id_jenismapel ?>" name="id_jenismapel">
                            <button type="submit" class="btn btn-success" style="width: 150px; margin-right: 12px;">Ubah</button>
                        </div>
                    </div>
                </form>
            <?php endforeach;?>
            </div>
            </section>
        </div>
    </div>
    </div>
    </div>
    <?php $this->load->view('akademik/style/js')?>
</body>

</html>