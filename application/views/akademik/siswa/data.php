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
                    <h1>Data Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                    <li class="breadcrumb-item active">Data Siswa</li>
                    </ol>
                </div>
                </div>
            </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Data Siswa</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <div class="mx-1">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-download pr-2"></i>Export Data</button>
                            </div>
                            <a href="#">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-eye pr-2"></i>Tampilkan Data
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rombel</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jekel</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $id=0; foreach($siswa as $data ): $id++;?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo tampil_rombel_byid($data->id_rombel)?></td>
                                            <td><?php echo $data->nis?></td>
                                            <td><?php echo tampil_siswa_byid($data->id_daftar)?></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                    <a href="#"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i></a>
                                                        <a href="#"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-eye"></i></a>
                                                    <button 
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i></button>
                                                </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
</body>

</html>