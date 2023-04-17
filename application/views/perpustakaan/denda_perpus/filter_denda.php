<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <?php $this->load->view('Perpustakaan/style/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('Perpustakaan/style/navbar') ?>
        <?php $this->load->view('Perpustakaan/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Rekap Denda Perpustakaan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Rekap Denda</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <section class="content">
                    <div class="container-fluid bg-white">
                        <div class="row">
                            <div class="col-12">
                                <div class="w-75 pt-2 px-3">
                                    <form action="<?php echo base_url('Perpustakaan/filter_tglrekap'); ?>" method="POST">
                                        <div class="row">
                                            <div class="form-group col-3">
                                                <label for="">Tanggal Awal</label>
                                                <input type="date" id="tanggalawal" class="validate form-control"
                                                    name="tanggalawal">
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="">Tanggal Akhir</label>
                                                <input type="date" id="tanggalakhir" class="validate form-control"
                                                    name="tanggalakhir">
                                            </div>
                                            <div class="form-group col-3 d-flex align-items-end">
                                                <div class="">
                                                    <button type="submit" class="btn btn-info">Tampilkan</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="text-sm text-bold font-italic">
                                            *menampilkan tanggal pinjam
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <table id="data-table" class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama peminjam</th>
                                                <th>Buku Dipinjam</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Jumlah Denda</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 0;foreach ($peminjam as $data): $id++;?>
                                            <tr>
                                                <td>
                                                    <?php echo $id ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_namadaftar_ByIdAnggota($data->id_anggota) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_namabuku_byPeminjamanId($data->id_index_buku) ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->tgl_pinjaman ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->tgl_kembali ?>
                                                </td>
                                                <td>
                                                    <?php echo convRupiah($data->denda) ?>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                            <tr>
                                                <td colspan="5" class="text-lg text-bold">
                                                    Total
                                                </td>
                                                <td class="text-lg text-bold">
                                                    <?php  
                                                            $totalprice = 0; 
                                                            foreach ($peminjam as $key) { 
                                                                $totalprice += $key->denda; 
                                                            } 
                                                            echo convRupiah($totalprice);?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>

        </div>

        <?php $this->load->view('Perpustakaan/style/js') ?>

</body>

</html>