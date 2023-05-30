<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pojok Baca</title>
    <?php $this->load->view('style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar') ?>
        <?php $this->load->view('style/sidebar') ?>

        <div class="content-wrapper py-3">
            <section class="content">
                <div class="container-fluid mb-4">
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Pojok Baca</div>
                        </div>
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div class="grid gap-3">
                                <a href="<?php echo base_url('pojokbaca/tambah_buku') ?>">
                                    <button class="btn btn-info"><i class="fas fa-plus"></i>&nbsp;
                                        Tambah</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light shadow">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <table id="data-table" class="table table-bordered table-striped">
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
                                                            src="<?php echo base_url('uploads/pojokbaca/buku') . "/" . $data->foto; ?>">
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
                                                        <a href="<?php echo base_url('pojokbaca/detail/' . $data->id_buku) ?>"
                                                            class="btn btn-success btn-sm">
                                                            <i class="fas fa-search-plus"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('pojokbaca/edit_buku/' . $data->id_buku) ?>"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fa fa-edit"></i></a>
                                                        <button class='btn btn-danger btn-sm'
                                                            onClick="hapus_buku(<?php echo $data->id_buku ?>)">
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
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('style/js') ?>
    <?php if ($this->session->flashdata('sukses')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('sukses') ?>",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
    });
    </script>
    <?php if (isset($_SESSION['sukses'])) {
            unset($_SESSION['sukses']);
        }
    endif; ?>
    <script>
    function hapus_buku(id) {
        swal.fire({
            title: 'Yakin untuk menghapus data ini?',
            text: "Data ini akan terhapus permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: ' Ya hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Dihapus',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function () {
                    window.location.href = "<?php echo base_url('pojokbaca/hapus_buku/') ?>" + id;
                });
            }
        });
    }
    </script>
</body>

</html>