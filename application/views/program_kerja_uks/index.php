<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Program Kerja UKS</title>
    <?php $this->load->view('style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('style/navbar') ?>
        <?php $this->load->view('style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Program Kerja UKS</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Pojok_baca/') ?>">Program Kerja UKS</a>
                                </li>
                                <li class="breadcrumb-item active">Data Buku</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow mb-4">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Program Kerja UKS</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <a href="<?php echo base_url('Pojok_Baca/tambah_buku/') ?>"
                                class="btn btn-success">
                                <i class="fa fa-plus pr-2"></i>Tambah
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th>Cover Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0;
                                        foreach ($buku as $data):
                                            $id++; ?>
                                            <tr>
                                                <td>
                                                    <?php echo $id ?>
                                                </td>
                                                <td><img style="width: 70px; height:100px; "
                                                        src="<?php echo base_url('uploads/pojok_baca/buku')."/".$data->foto;?>">
                                                </td>
                                                <td>
                                                    <?php echo $data->judul_buku ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->penulis_buku ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->penerbit_buku ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->tahun_terbit ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('Pojok_Baca/detail_index_buku/' . $data->id_buku) ?>"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('Pojok_Baca/edit_buku/' . $data->id_buku) ?>"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i></a>
                                                    <button class='btn btn-danger btn-sm'
                                                        onClick="hapus_periksa(<?php echo $data->id_buku ?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
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
    <?php $this->load->view('style/js') ?>
    <script>
        function hapus_periksa(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Pojok_Baca/hapus_periksa/') ?>" + id;
            }
        }
    </script>
</body>

</html>