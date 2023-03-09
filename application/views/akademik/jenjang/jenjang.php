<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar') ?>
        <?php $this->load->view('akademik/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Jenjang</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item active">Jenjang</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content ">
                <div class="container-fluid bg-white shadow">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Data Jenjang</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <div class="mx-1">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modal_tambah_rak">
                                    <i class="fa fa-plus pr-2"></i>Paket Jenjang</button>
                            </div>
                            <a href="<?php echo base_url('Akademik/jenjang_form'); ?>">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-plus pr-2"></i>Tambah
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
                                            <th>Nama</th>
                                            <th>Kode Jenjang</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0;
                                        foreach ($jenjang as $data):
                                            $id++; ?>
                                            <tr>
                                                <td>
                                                    <?php echo $id ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->nama_jenjang ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->kd_jenjang ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->keterangan ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('Akademik/edit_jenjang/' . $data->id_jenjang) ?>"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i></a>
                                                    <button onclick="hapus(<?php echo $data->id_jenjang; ?>)"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <div class="modal fade" id="modal_tambah_rak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('Akademik/tambah_paketjenjang') ?>" enctype="multipart/form-data" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Paket Jenjang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pb-1">
                            <div class="box">
                                <div class="box-body">
                                    <div class="form-group col-sm-12">
                                        <div class="form-group d-flex flex-row " style="width: 100%;">
                                            <div class="mt-2 mx-1">
                                                <p style="font-weight: bold">Paket Jenjang</p>
                                            </div>
                                            <div class="mx-1">
                                                <input type="text" name="nama_paket" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex flex-row " style="width: 100%;">
                                            <div class="mt-2 mx-1">
                                                <p style="font-weight: bold">Kode Jenjang</p>
                                            </div>
                                            <div class="mx-1">
                                                <input type="text" name="kode_paket" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <div class="hidden">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            <div class="justify-content-end align-self-start">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <?php $this->load->view('akademik/style/js') ?>
    <script>
        function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Akademik/hapus_jenjang/') ?>" + id;
            }
        }
    </script>
</body>

</html>