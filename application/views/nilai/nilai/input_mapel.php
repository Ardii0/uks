<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Input Nilai</title>
    <?php $this->load->view('nilai/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('nilai/style/navbar')?>
        <?php $this->load->view('nilai/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Modul Input Nilai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Modul Input Nilai</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="p-3 h5">
                        Pilih Mapel & Rombel
                    </div>
                    <div class="row px-1 pt-5">
                        <div class="col">
                            <div class="text-center" style="border-bottom: solid 2px; border-color: #">
                                <h3 class="">Mata Pelajaran Yang Diampu</h3>
                            </div>
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Mapel</th>
                                            <th style="width: 50px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach ($mapelAll as $data): $id++?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $data->nama_mapel ?></td>
                                                <td class="d-flex">
                                                    <a href="<?php echo base_url('Nilai/data_input/'.$data->id_mapel) ?>" class="btn btn-success btn-sm">
                                                        <i class="fa fa- fa-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                        <div class="col">
                            <div class="text-center" style="border-bottom: solid 2px; border-color: #">
                                <h3 class="">Alokasi Rombel</h3>
                            </div>
                            <div class="card-body">
                                <table id="data-table2" class="table table-bordered table-striped">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Rombel</th>
                                            <th style="width: 150px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach ($alokasimapel as $ampl): $id++?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <span>&nbsp;<?php echo tampil_kelasdaftar_ByIdSiswa($ampl->id_rombel) ?>
                                                        </span>
                                                        <span>&nbsp;<?php echo $ampl->nama_rombel ?>
                                                        </span></td>
                                                    </div>
                                                <td class="d-flex">
                                                    <a href="<?php echo base_url('Nilai/session/'.$ampl->id_mapel.'/'.$ampl->id_rombel.'/1') ?>" class="btn btn-success btn-sm">
                                                        Ganjil
                                                    </a>
                                                    <a href="<?php echo base_url('Nilai/session/'.$ampl->id_mapel.'/'.$ampl->id_rombel.'/2') ?>" class="btn btn-success btn-sm ml-2">
                                                        Genap
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('nilai/style/js')?>

</body>

</html>