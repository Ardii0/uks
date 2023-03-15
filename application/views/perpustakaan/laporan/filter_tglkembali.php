<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $this->load->view('perpustakaan/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('perpustakaan/style/navbar')?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('perpustakaan/style/sidebar')?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Laporan Perpustakaan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Perpustakaan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Laporan Peminjaman</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="w-75">
                    <form action="<?php echo base_url('Perpustakaan/filter_tglkembali'); ?>" method="POST">
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="">Tanggal Awal</label>
                                <input type="date" id="tanggalawal" class="validate form-control" name="tanggalawal">
                            </div>
                            <div class="form-group col-3">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" id="tanggalakhir" class="validate form-control" name="tanggalakhir">
                            </div>
                            <div class="form-group col-3 d-flex align-items-end">
                                <div class="">
                                    <button type="submit" class="btn btn-info">Tampilkan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid bg-white rounded">
                    <div class="row mx-2 pt-2 d-flex justify-content-between">
                        <div class="col-12">
                            <div>
                                <h4>Laporan Peminjaman Buku</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="laporan" class="table table-bordered table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <th class="" style="width: 20px">No</th>
                                            <th class="w-25">No Pinjaman</th>
                                            <th class="w-20">Nama Anggota</th>
                                            <th class="w-20">Tanggal Pinjam</th>
                                            <th class="w-10 text-center" style="">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0; foreach ($peminjam as $data): $id++ ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $data->no_pinjaman ?></td>
                                            <td><?php echo tampil_namadaftar_ByIdAnggota($data->id_anggota) ?></td>
                                            <td><?php echo $data->tgl_pinjaman ?></td>
                                            <td class="text-center d-flex justify-content-center">
                                                <div class="text-center <?php $btn = $data->status == "DIPINJAM" ? 'bg-danger' : 'bg-success'; echo $btn ?> btn-sm"
                                                    style="width: 100px">
                                                    <?php $statuss = $data->status == "DIPINJAM" ? 'Belum Selesai' : 'Selesai'; echo $statuss ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view('perpustakaan/style/js')?>
</body>

</html>