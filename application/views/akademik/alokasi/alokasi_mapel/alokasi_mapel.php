<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alokasi Mapel</title>
    <?php $this->load->view('akademik/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php $this->load->view('akademik/style/sidebar')?>

        <div class="content-wrapper">
            <!-- HEADER -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Alokasi Mapel</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/pelajaran') ?>">Mata
                                        Pelajaran</a>
                                </li>
                                <li class="breadcrumb-item active">Alokasi Mata Pelajaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ENDHEADER -->

            <!-- BODY -->
            <section class="content">
                <div class="container-fluid bg-white">
                    <form action="<?php echo base_url('Akademik/tambah_alokasimapel'); ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="d-flex justify-content-end p-3 font-weight-bold">
                            <p>
                               
                                <?php foreach ($mapel as $mapel): ?>
                                <input type="hidden" name="id_mapel" value="<?php echo $mapel->id_mapel ?>">
                                <?php echo $mapel->nama_mapel ?>
                                <?php endforeach;?>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <section class="content">
                                    <div>
                                        <div class="text-center mb-3 d-flex justify-content-between"
                                            style="border-bottom: solid 1px; border-color: #">
                                            <div>
                                                <h3 class="">DATA KELAS</h3>
                                            </div>
                                            <div class="">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-plus pr-2"></i>Simpan
                                                </button>
                                            </div>
                                        </div>
                                        <table id="akademik-table" class="table table-bordered table-striped">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th><input type="checkbox"></th>
                                                    <th>Nama Kelas</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($rombel as $rombel ):?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="id_rombel[<?php echo $rombel->id_rombel ?>]">
                                                    </td>
                                                    <td class="d-flex">
                                                        <span>
                                                        <?php echo tampil_kelasById($rombel->id_kelas)?></span>
                                                        <span>&nbsp;
                                                        <?php echo $rombel->nama_rombel?></span>
                                                    </td>
                                                    <td>
                                                        <!-- <?php echo $rombel->id_kelas?> -->
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </form>
                                </section>
                            </div>
        <div class="col">
            <section class="content">
                <form action="<?php echo base_url('Akademik/hapus_alokasimapel/'); ?>" enctype="multipart/form-data"
                    method="post">
                    <div>
                        <div class="text-center mb-3 d-flex justify-content-between"
                            style="border-bottom: solid 1px; border-color: #">
                            <div>
                                <h3 class="">DATA ALOKASI KE KELAS</h3>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-minus pr-2"></i>Hapus
                                </button>
                            </div>
                        </div>
                        <table id="datasiswa-table" class="table table-bordered table-striped">
                            <thead class="bg-info">
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Nama Kelas</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alokasimapel as $data): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id_alokasimapel[<?php echo $data->id_alokasimapel ?>]">
                                    </td>
                                    <td class="d-flex">
                                        <span>
                                            <?php echo tampil_kelas_ByRombel($data->id_rombel) ?></span>
                                        <span>&nbsp;
                                            <?php echo tampil_rombel_byid($data->id_rombel) ?></span>
                                    </td>
                                    <td>
                                        <?php echo tampil_ket_kelasById($data->id_rombel) ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </section>
        </div>
    </div>
    </div>
    </section>
    <!-- ENDBODY -->
    </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
</body>

</html>