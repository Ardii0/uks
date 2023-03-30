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
                            <h1>Edit Rombongan Belajar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/rombel') ?>">Rombongan Belajar</a></li>
                                <li class="breadcrumb-item active">Edit Rombongan Belajar</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white py-4">
                <div class="container-fluid">
              <?php foreach ($rombel as $data): ?>
                    <form action="<?php echo base_url('Akademik/update_rombel') ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Rombel</label>
                                    <div class="">
                                        <input type="text" name="nama_rombel" class="form-control"
                                            placeholder="Masukan Nama Rombel" value="<?php echo $data->nama_rombel ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kelas</label>
                                    <div class="">
                                        <select name="id_kelas" class="form-control form-select px-2 py-1" aria-label="kelas">
                                            <option style="display: none;" value="<?php echo $data->id_kelas?>">
                                            <?php echo tampil_kelasById($data->id_kelas)?>
                                            </option>
                                            <?php foreach($kelas as $kelas): ?>
                                                <option value="<?php echo $kelas->id_kelas ?>"><?php echo $kelas->nama_kelas ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Guru</label>
                                    <div class="">
                                        <select name="kode_guru" class="form-control form-select px-2 py-1" aria-label="guru">
                                            <option style="display: none;" value="<?php echo $data->kode_guru?>">
                                            <?php echo tampil_guruById($data->kode_guru)?>
                                            </option>
                                            <?php foreach($guru as $guru): ?>
                                                <option value="<?php echo $guru->kode_guru ?>"><?php echo $guru->nama_guru ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kuota</label>
                                    <div class="">
                                        <input type="text" name="kuota" class="form-control"
                                               value="<?php echo $data->kuota ?>">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="">
                                <input type="hidden" value="<?php echo $data->id_rombel ?>" name="id_rombel">
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