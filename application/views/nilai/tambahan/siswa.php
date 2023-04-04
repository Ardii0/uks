<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Siswa</title>
    <?php $this->load->view('nilai/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('nilai/style/navbar')?>
        <?php $this->load->view('nilai/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Data Siswa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="row pt-3 d-flex justify-content-between">
                        <div class="col">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Data Siswa</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rombel</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach($siswa as $data ): $id++;?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo tampil_rombel_byid($data->id_rombel)?></td>
                                            <td class="text-truncate" style="max-width: 150px;">
                                                <?php echo tampil_nama_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_jekel_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_tempat_lahir_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_tanggal_lahir_siswa_byid($data->id_daftar)?></td>
                                            <td class="text-truncate" style="max-width: 150px;">
                                                <?php echo tampil_alamat_siswa_byid($data->id_daftar) ?></td>
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
    </div>
    </div>
    <?php $this->load->view('nilai/style/js')?>
</body>

</html>