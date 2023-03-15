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
                            <h1>Edit Kelas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/kelas') ?>">Kelas</a></li>
                                <li class="breadcrumb-item active">Edit Kelas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white py-4">
                <div class="container-fluid">
              <?php foreach ($kelas as $data): ?>
                    <form action="<?php echo base_url('Akademik/update_kelas') ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Kelas</label>
                                    <div class="">
                                        <input type="text" name="nama_kelas" class="form-control"
                                            placeholder="Masukan Nama Kelas" value="<?php echo $data->nama_kelas ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Keterangan</label>
                                    <div class="">
                                        <textarea class="form-control" name="keterangan"
                                            placeholder="Masukan Keterangan"><?php echo $data->keterangan ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Jenjang</label>
                                    <div class="">
                                        <select class="form-control form-select px-2 py-1" name="id_jenjang" aria-label="idjenjang">
                                            <option name="id_jenjang" value="<?php echo $data->id_jenjang?>" style="display: none;">
                                            <?php echo tampil_namajenjang_byid($data->id_jenjang)?></option>
                                            <?php $id = 0;foreach ($jenjang as $datajenjang): $id++;?>
                                                <option name="id_jenjang" value="<?php echo $datajenjang->id_jenjang ?>"><?php echo $datajenjang->nama_jenjang ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="">
                                <input type="hidden" value="<?php echo $data->id_kelas ?>" name="id_kelas">
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