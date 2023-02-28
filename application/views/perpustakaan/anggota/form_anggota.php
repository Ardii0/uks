<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <?php $this->load->view('perpustakaan/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('perpustakaan/style/navbar')?>
        <?php $this->load->view('perpustakaan/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Data Anggota</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Perpustakaan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Perpustakaan/data_anggota') ?>">Data Anggota</a>
                                </li>
                                <li class="breadcrumb-item active">Form Tambah Anggota</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <form action="<?php echo base_url('Perpustakaan/aksi_tambah_anggota') ?>" enctype="multipart/form-data" method="post">
                    <div class="container-fluid bg-white">
                        <div class="p-5">
                            <div class="row p-1">
                                <div class="col-2 text-right d-flex justify-content-end align-items-center">
                                    Tanggal
                                </div>
                                <div class="col-6 align-items-center">
                                    <div class="input-group date">
                                        <input type="date" name="tgl_daftar" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-2 align-items-center"></div>
                            </div>
                            <div class="row p-1">
                                <div class="col-2 text-right d-flex justify-content-end align-items-center">
                                    Nama Siswa
                                </div>
                                <div class="col-6 align-items-center">
                                    <div class="form-group">
                                        <select class="form-control select2" data-dropdown-css-class="select2-info" name="id_siswa" style="width: 100%;">
                                        <option>
                                        Pilih Siswa
                                        </option>
                                            <?php $id = 0;foreach ($siswa as $data): $id++;?>
                                                <option value="<?php echo $data->id_siswa ?>"><?php echo tampil_nama_byIdDaftar($data->id_daftar) ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2 align-items-center"></div>
                            </div>
                            <div class="row p-1">
                                <div class="col-2 text-right d-flex justify-content-end align-items-center"></div>
                                <div class="col-6 align-items-center">
                                    <button type="submit" class="btn btn-info">Tambah</button>
                                </div>
                                <div class="col-2 align-items-center"></div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    </section>
    </div>
    <?php $this->load->view('perpustakaan/style/js')?>
</body>

</html>