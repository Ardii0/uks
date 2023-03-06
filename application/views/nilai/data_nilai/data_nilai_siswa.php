<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Siswa</title>
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
                            <h1>Data Nilai Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Nilai/modul_data_nilai_siswa') ?>">Modul Data Nilai
                                        Siswa</a>
                                </li>
                                <li class="breadcrumb-item active">Lihat Nilai</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid shadow p-3 mb-5 bg-white rounded">
                    <div class="px-3 pt-3 h5">
                        <p>Matematika</p>
                        <p class="mt-n2">X TKJ 1 (Semester 1)</p>
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
                                            <th>nuh1</th>
                                            <th>nuh2</th>
                                            <th>nuh3</th>
                                            <th>nt1</th>
                                            <th>nt2</th>
                                            <th>nt3</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0; foreach($data as $row ): $no++;?>
                                        <tr>
                                            <td><?php echo $no?></td>
                                            <td><?php echo tampil_nisn_siswa_byid(tampil_id_daftar_siswa_byid($row->id_siswa))?>
                                            </td>
                                            <td class="text-truncate" style="max-width: 150px;">
                                                <?php echo tampil_nama_siswa_byid(tampil_id_daftar_siswa_byid($row->id_siswa))?>
                                            </td>
                                            <td><?php echo $row->nuh1?></td>
                                            <td><?php echo $row->nuh2?></td>
                                            <td><?php echo $row->nuh3?></td>
                                            <td><?php echo $row->nt1?></td>
                                            <td><?php echo $row->nt2?></td>
                                            <td><?php echo $row->nt3?></td>
                                            <td class="d-flex justify-content-around">
                                                <a href="detail" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-search-plus"></i>
                                                </a>
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-print"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
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