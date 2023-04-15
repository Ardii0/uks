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
                            <a href="<?php echo base_url('Akademik/siswa_pembagian_kelas') ;?>"
                                class="btn w-100 h-100 p-2 btn-success btn-sm">
                                <i class="fa fa- fa-arrow-right">
                                    Pembagian Kelas
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="row px-1 pt-5">
                        <div class="col">
                            <form action="<?php echo base_url('Akademik/terima_all') ?>" method="post">
                                <div class="d-flex justify-content-between px-2 py-2"
                                    style="border-bottom: solid 2px; border-color: #">
                                    <div>
                                        <h3 class="">DATA SISWA PPDB</h3>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn p-2 btn-success btn-sm" style="width: 150px;">
                                            <i class="fa fa-arrow-right">
                                                Simpan
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="akademik-table" class="table table-bordered table-striped">
                                        <thead class="bg-info">
                                            <tr>
                                                <th><input type="checkbox" class="checkAll"></th>
                                                <th>No Reg</th>
                                                <th>Nama</th>
                                                <th>Jenjang</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id=0; foreach($data_siswa_daftar as $data ): $id++; ?>
                                            <tr>
                                                <td><input type="checkbox" class="check"
                                                        name="id_daftar[<?php echo $data->id_daftar ?>]"></td>
                                                <td><?php echo $data->no_reg ?></td>
                                                <td class="text-truncate" style="max-width: 150px;"><?php echo $data->nama ?></td>
                                                <td><?php echo tampil_namajenjang_byid($data->id_jenjang) ?></td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="<?php echo base_url('Akademik/tolak_siswa/').$data->id_daftar ?>"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa- fa-eject"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('Akademik/detail_pendaftaran/'.$data->id_daftar) ?>"
                                                        class="btn btn-info btn-sm mx-1">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('Akademik/terima_siswa/').$data->id_daftar ?>"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fa fa- fa-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <form action="<?php echo base_url('Akademik/kembalikan_all') ?>" method="post">
                                <div class="d-flex justify-content-between px-2 py-2"
                                    style="border-bottom: solid 2px; border-color: #">
                                    <div>
                                        <h3 class="">DATA TER-SELEKSI</h3>
                                    </div>
                                    <div>
                                        <button class="btn p-2 btn-danger btn-sm" style="width: 150px;">
                                            <i class="fa fa-arrow-left">
                                                Kembalikan
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="akademik-table2" class="table table-bordered table-striped">
                                        <thead class="bg-info">
                                            <tr>
                                                <th><input type="checkbox" class="checkAllForDelete"></th>
                                                <th>No Reg</th>
                                                <th>Nama</th>
                                                <th>Jenjang</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id=0; foreach($siswa_diterima as $data ): $id++; ?>
                                            <tr>
                                                <td><input type="checkbox" class="checkDelete"
                                                        name="id_daftar[<?php echo $data->id_daftar ?>]"></td>
                                                <td><?php echo $data->no_reg ?></td>
                                                <td class="text-truncate" style="max-width: 150px;"><?php echo $data->nama ?></td>
                                                <td><?php echo tampil_namajenjang_byid($data->id_jenjang) ?></td>
                                                <td class="d-flex justify-content-center">
                                                    <a href="<?php echo base_url('Akademik/detail_pendaftaran/'.$data->id_daftar) ?>"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('Akademik/kembalikan_siswa/').$data->id_daftar ?>"
                                                        class="btn btn-success btn-sm ml-1">
                                                        <i class="fa fa- fa-arrow-left"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
    <script>
    $('.checkAll').click(function() {
        if ($(this).is(':checked')) {
            $('.check').attr('checked', true);
        } else {
            $('.check').attr('checked', false);
        }
    });
    $('.checkAllForDelete').click(function() {
        if ($(this).is(':checked')) {
            $('.checkDelete').attr('checked', true);
        } else {
            $('.checkDelete').attr('checked', false);
        }
    });
    </script>
</body>

</html>