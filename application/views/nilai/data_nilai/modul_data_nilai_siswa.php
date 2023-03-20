<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Data Nilai Siswa</title>
    <?php $this->load->view('nilai/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- navbar -->
        <?php $this->load->view('nilai/style/navbar')?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('nilai/style/sidebar')?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Modul Data Nilai Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Modul Data Nilai Siswa</li>
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
                                <h3 class="">Mapel Yang Mampu</h3>
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
                                        <?php if($this->session->userdata('level') === 'Admin') {?>
                                            <?php $id=0; foreach ($allMapel as $data): $id++?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td><?php echo tampil_mapelById($data->id_mapel) ?></td>
                                                    <td class="d-flex">
                                                        <a href="<?php echo base_url('Nilai/modul_data_nilai_filter/'.$data->id_mapel) ?>" class="btn btn-success btn-sm">
                                                            <i class="fa fa-arrow-right"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php } else {?>
                                        <?php $id=0; foreach ($mapel as $data): $id++?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo tampil_mapelById($data->id_mapel) ?></td>
                                            <td class="d-flex">
                                                <a href="<?php echo base_url('Nilai/modul_data_nilai_filter/'.$data->id_mapel)?>"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa- fa-arrow-right"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php } ?>
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
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view('nilai/style/js')?>

</body>

</html>