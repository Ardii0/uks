<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <?php $this->load->view('perpustakaan/style/head')?>
    <style>
    .anyClass {
        height: 200px;
        overflow-y: auto;
    }
    .anyClass::-webkit-scrollbar {
        display: none;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('perpustakaan/style/navbar')?>
        <?php $this->load->view('perpustakaan/style/sidebar')?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="px-3 py-1">
                    <div class="pb-1 d-flex justify-content-between align-items-center text-center">
                        <div>
                            <p style="font-size: 2rem">Dashboard Perpustakaan</p>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-6 col-md-4 col-sm-8">
                                    <div>
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <p>Jumlah Buku</p>
                                                <h3><?php echo $total_buku; ?></h3>
                                            </div>
                                            <div class="icon">
                                                <i class="nav-icon fas fa-book"></i>
                                            </div>
                                            <a href="<?php echo base_url('Perpustakaan/data_buku') ?>"
                                                class="small-box-footer">Info Lebih Lanjut
                                                <i class="fas fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-sm-8">
                                    <div>
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <p>Jumlah Rak</p>
                                                <h3><?php echo $total_rak_buku; ?></h3>
                                            </div>
                                            <div class="icon">
                                                <i class="far fa-chart-bar"></i>
                                            </div>
                                            <a href="<?php echo base_url('Perpustakaan/rak_buku') ?>"
                                                class="small-box-footer">Info Lebih Lanjut
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-sm-8">
                                    <div>
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <p>Jumlah Kategori</p>
                                                <h3><?php echo $total_kategori_buku; ?></h3>
                                            </div>
                                            <div class="icon">
                                                <i class="far fa-chart-bar"></i>
                                            </div>
                                            <a href="<?php echo base_url('Perpustakaan/kategori_buku') ?>"
                                                class="small-box-footer">
                                                Info Lebih Lanjut
                                                <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="small-box  bg-gradient-info mb-3" style="max-width: 100%;">
                                        <div class="card-header bg-transparent text-center fw-bold h3 border-white">
                                            Peminjaman Buku</div>
                                        <a href="<?php echo base_url('Perpustakaan/peminjaman') ?>"
                                            class="small-box-footer">
                                            Info Lebih Lanjut
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="small-box  bg-gradient-info mb-3" style="max-width: 100%;">
                                        <div class="card-header bg-transparent text-center fw-bold h3 border-white">
                                            Pengembalian Buku</div>
                                        <a href="<?php echo base_url('Perpustakaan/pengembalian') ?>"
                                            class="small-box-footer">
                                            Info Lebih Lanjut
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div>
                                <div style="width: 100%; ">
                                    <div>
                                        <div class="" style="height:75vh">
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <p>Jumlah Anggota</p>
                                                    <h3><?php echo $total_anggota; ?></h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="far fa-user"></i>
                                                </div>
                                                <a href="<?php echo base_url('Perpustakaan/data_anggota') ?>"
                                                    class="small-box-footer">Info Lebih Lanjut
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                            <div class="small-box  bg-gradient-info mb-3" style="max-width: 100%;">
                                                <div
                                                    class="card-header bg-transparent text-center fw-bold h3 border-white">
                                                    Data Anggota</div>
                                                <div class="card-body bg-white anyClass">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr class="text-center bg-info">
                                                                <th>No</th>
                                                                <th>Nama</th>
                                                                <th>Kelas</th>
                                                                <th>Rombel</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $id = 0;foreach ($data_anggota as $data): $id++;?>
                                                            <tr class="bg-white text-center">
                                                                <td style="width: 4%;"><?php echo $id ?></td>
                                                                <td><?php echo tampil_namadaftar_ByIdSiswa($data->id_siswa) ?>
                                                                </td>
                                                                <td><?php echo tampil_kelasdaftar_ByIdSiswa($data->id_siswa) ?>
                                                                </td>
                                                                <td><?php echo tampil_rombeldaftar_ByIdSiswa($data->id_siswa) ?>
                                                                </td>
                                                            </tr>
                                                            <tr class="bg-white text-center">
                                                                <td style="width: 4%;"><?php echo $id ?></td>
                                                                <td><?php echo tampil_namadaftar_ByIdSiswa($data->id_siswa) ?>
                                                                </td>
                                                                <td><?php echo tampil_kelasdaftar_ByIdSiswa($data->id_siswa) ?>
                                                                </td>
                                                                <td><?php echo tampil_rombeldaftar_ByIdSiswa($data->id_siswa) ?>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a href="<?php echo base_url('Perpustakaan/data_anggota') ?>"
                                                    class="small-box-footer">
                                                    Info Lebih Lanjut
                                                    <i class="fa fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('perpustakaan/style/js')?>
</body>

</html>