<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>petugas</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('petugas/style/navbar') ?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('petugas/style/sidebar') ?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Hak Akses</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Admin/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Admin/setting') ?>">Setting</a>
                                </li>
                                <li class="breadcrumb-item active">Hak Akses</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <!-- <?php foreach ($user as $data): ?> -->
                <!-- <?php echo $data->id_hak_akses ?>
                <?php echo tampil_hak_akses($data->id_hak_akses)?> -->
                <div class="container-fluid bg-white shadow p-2">
                    <div class="row">
                        <div class="col-12 h3">Data User</div>
                        <div class="col-12 mt-2">
                            <table id="data-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Hak Akses</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach ($user as $data): $no++ ?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><?php echo $data->username?></td>
                                        <td><?php echo $data->email?></td>
                                        <td><?php echo $data->level?></td>
                                        <td>Page <?php echo tampil_hak_akses($data->id_hak_akses)?></td>
                                        <td class="text-center">
                                            <p data-toggle="modal" data-target="#modal_edit" class=" btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </p>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="<?php echo base_url('Admin/update_hak_akses') ?>"
                                    enctype="multipart/form-data" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Data Transaksi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body pb-1">
                                        <?php foreach ($user as $data): ?>
                                        <div class="box">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label class="control-label">Hak Akses</label>
                                                    <div>
                                                        <select name="id_hak_akses"
                                                            class="custom-select custom-select-md mb-3">
                                                            <?php foreach ($hak_akses as $row): ?>
                                                            <option value="<?php echo $row->id_hak_akses ?>">Page
                                                                <?php echo $row->akses?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <br>
                                                        <input type="hidden" name="id_level"
                                                            value="<?php echo $data->id_level ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="modal-footer d-flex">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" class="btn btn-secondary" onclick="kembali()"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <?php endforeach;?> -->
            </section>
        </div>
    </div>
    <?php $this->load->view('petugas/style/js') ?>
</body>

</html>