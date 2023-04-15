<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $this->load->view('perpustakaan/style/head')?>
    <style>
    .width-modal {
        width: 1000px;
    }
    </style>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
            <section class="content mt-4">
                <div class="container-fluid bg-white shadow p-4">
                    <?php foreach($data_peminjam as $data ):?>
                    <div class="alert alert-danger d-flex justify-content-between" role="alert">
                        <div>
                            <i class="fas fa-danger -circle"></i> Jika buku tidak dikembalikan sesuai jatuh tempo maka
                            akan
                            dikenakan denda
                        </div>
                        <div class="d-flex align-items-center">
                            <i style="cursor: pointer;" class="fas fa-times" data-dismiss="alert"
                                aria-label="Close"></i>
                        </div>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman Buku</h5>
                    </div>
                    <div class="modal-body pb-1">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="d-flex justify-content-between">
                                <div>
                                    <table>
                                        <tr>
                                            <th class="px-2">No Peminjaman</th>
                                            <td class="px-2"><?php echo $data->no_pinjaman ?></td>
                                        </tr>
                                        <tr>
                                            <th class="px-2">Nama Siswa</th>
                                            <td class="px-2">
                                                <?php echo tampil_namadaftar_ByIdAnggota($data->id_anggota) ?></td>
                                        </tr>
                                        <tr>
                                            <th class="px-2">Denda</th>
                                            <td class="px-2">
                                                <?php if ( $data->denda === null ) : ?>
                                                -
                                                <?php else : ?>
                                                <?php echo $data->denda ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div>
                                    <table>
                                        <tr>
                                            <th class="px-2">ID Anggota</th>
                                            <td class="px-2"><?php echo $data->id_anggota ?></td>
                                        </tr>
                                        <tr>
                                            <th class="px-2">Tanggal Peminjaman</th>
                                            <td class="px-2"><?php echo $data->tgl_pinjaman ?></td>
                                        </tr>
                                        <tr>
                                            <th class="px-2">Jatuh Tempo</th>
                                            <td class="px-2"><?php echo $data->jatuh_tempo ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div style="margin-top: 30px; margin-bottom: 20px;">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID-Buku</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Kategori</th>
                                            <th>Rak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo tampil_id_index_buku($data->id_index_buku) ?></td>
                                            <td><?php echo tampil_namabuku_byPeminjamanId($data->id_index_buku) ?></td>
                                            <td><?php echo tampil_pengarangbuku_byPeminjamanId($data->id_index_buku) ?>
                                            </td>
                                            <td><?php echo tampil_kategoribuku_byPeminjamanId($data->id_index_buku) ?>
                                            </td>
                                            <td><?php echo tampil_rakbuku_byPeminjamanId($data->id_index_buku) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <a href="<?php echo base_url('Perpustakaan/cetak_bukti_peminjaman/'.$data->id_pinjaman.'/pdf')?>"
                            class="btn btn-primary">
                            Cetak Bukti Peminjaman
                        </a>
                        <button type="button" onClick="kembali()" class="btn btn-danger">
                            Kembali
                        </button>
                    </div>
                </div>
        </div>
        <?php endforeach ?>
    </div>
    </div>
    </section>
    </div>
    <?php $this->load->view('perpustakaan/style/js')?>
    <script>
    function kembali() {
        window.history.go(-1);
    }
    </script>
</body>

</html>