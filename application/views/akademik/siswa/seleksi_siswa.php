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
                            <h1>Seleksi Dan Pembagian Kelas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Seleksi Siswa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="d-flex p-3 justify-content-end">
                        <div style="width: 175px; height: 40px" class="">
                            <a href="<?php echo base_url('Akademik/siswa_pembagian_kelas') ;?>" class="btn w-100 h-100 p-2 btn-success btn-sm">
                                <i class="fa fa- fa-arrow-right">
                               Pembagian Kelass
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="row px-1 pt-5">
                        <div class="col">
                            <div class="text-center" style="border-bottom: solid 2px; border-color: #">
                                <h3 class="">DATA PENDAFTAR</h3>
                            </div>
                            <div class="card-body">
                                <table id="akademik-table" class="table table-bordered table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>No</th>
                                            <th>No Reg</th>
                                            <th>Nama</th>
                                            <th>Jenjang</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach($data_siswa_daftar as $data ): $id++; ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $data->no_reg ?></td>
                                                <td><?php echo $data->nama ?></td>
                                                <td><?php echo tampil_namajenjang_byid($data->id_jenjang) ?></td>
                                                <td class="d-flex">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fas fa- fa-eye"></i> <i
                                                            class="fa-solid fa-magnifying-glass-plus"></i>
                                                    </button>
                                                    <form action="<?php echo base_url('Akademik/terima_siswa') ?>" method="post" class="ml-1">
                                                        <input type="hidden" value="<?php echo $data->id_daftar ?>" name="id_daftar">
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            <i class="fa fa- fa-arrow-right"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center" style="border-bottom: solid 2px; border-color: #">
                                <h3 class="">DATA SELEKSI</h3>
                            </div>
                            <div class="card-body">
                                <table id="akademik-table2" class="table table-bordered table-striped">
                                <thead class="bg-info">
                                        <tr>
                                            <th>No</th>
                                            <th>No Reg</th>
                                            <th>Nama</th>
                                            <th>Jenjang</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $id=0; foreach($data_siswa as $row ): $id++; ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo tampil_noReg_byIdDaftar($row->id_daftar) ?></td>
                                            <td><?php echo tampil_nama_byIdDaftar($row->id_daftar) ?></td>
                                            <td><?php echo tampil_namaJenjang_byIdDaftar($row->id_daftar) ?></td>
                                            <td class="d-flex">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fas fa- fa-eye"></i> <i
                                                    class="fa-solid fa-magnifying-glass-plus"></i>
                                                </button>
                                                <form action="<?php echo base_url('Akademik/hapus_seleksi/') .$row->id_siswa ;?>" method="post" class="ml-1">
                                                    <input type="hidden" value="<?php echo $row->id_daftar ?>" name="id_daftar">
                                                    <button class="btn btn-success btn-sm">
                                                        <i class="fa fa- fa-arrow-left"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
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