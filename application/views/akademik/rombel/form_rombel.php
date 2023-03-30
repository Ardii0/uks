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
                            <h1>Form Rombongan Belajar</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/rombel') ?>">Rombongan Belajar</a></li>
                                <li class="breadcrumb-item active">Form Rombongan Belajar</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white py-4">
                <div class="container-fluid">
                    <form action="<?php echo base_url('Akademik/tambah_rombel') ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Rombel</label>
                                    <div class="">
                                        <input type="text" name="nama_rombel" class="form-control"
                                            placeholder="Masukan Nama Rombel">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kelas</label>
                                    <div class="">
                                        <select name="id_kelas" class="form-control form-select px-2 py-1" aria-label="kelas">
                                        <option style="display: none;">
                                        Pilih Kelas
                                        </option>
                                        <?php foreach($kelas as $data): ?>
                                            <option value="<?php echo $data->id_kelas ?>"><?php echo $data->nama_kelas ?>(<?php echo tampil_namajenjang_byid($data->id_jenjang) ?>)</option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Wali Kelas</label>
                                    <div class="">
                                        <select name="kode_guru" class="form-control form-select px-2 py-1" aria-label="guru">
                                        <option style="display: none;">
                                        Pilih Wali Kelas
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
                                        <input type="number" name="kuota" class="form-control"
                                            placeholder="Masukan Kuota">
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