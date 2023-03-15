<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Nilai</title>
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
                            <h1>Entry Nilai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Nilai/modul_input_nilai') ?>">Input Nilai </a>
                                </li>
                                <li class="breadcrumb-item active">Entry</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid shadow p-3 mb-5 bg-white rounded">
                    <div class="p-3 h5">
                        <?php foreach ($mapelById as $mapel): ?>
                            <p><?php echo $mapel->nama_mapel ?></p>
                        <?php endforeach; ?>
                        <p class="mt-n2 d-flex">
                            <?php foreach ($rombel as $information): ?>
                                 <?php echo $information->nama_rombel ?>
                            <?php endforeach; ?>
                            <?php foreach ($semester as $smt): ?>
                                <span>&nbsp;
                                 (Semester <?php echo $smt->semester ?>)
                                </span>
                            <?php endforeach; ?>
                        </p>
                    </div>
                    <div class="row px-1">
                        <div class="col">
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th style="width: 50px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach ($row as $data): $id++; ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo tampil_nisndaftar_ByIdSiswa($data->id_siswa) ?></td>
                                                <td class="text-truncate" style="max-width: 150px;"><?php echo $data->nama ?></td>
                                                <td>
                                                    <?php foreach ($mapelById as $mapel): ?>
                                                        <?php foreach ($semester as $smt): ?>
                                                            <a href="<?php echo base_url(['Nilai/input_session/'.$mapel->id_mapel.'/'.$data->id_rombel.'/'.$smt->semester.'/'.$data->id_siswa]) ?>" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </a>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view('nilai/style/js')?>

</body>

</html>