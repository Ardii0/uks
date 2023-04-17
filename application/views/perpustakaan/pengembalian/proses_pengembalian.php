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
                    <?php foreach($data_pinjaman as $data ):?>
                    <form action="<?php echo base_url('Perpustakaan/proses_pengembalian_pinjaman')?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pengembalian Buku</h5>
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
                                                <td class="px-2">-</td>
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
                                                <input type="hidden" name="tgl_pinjaman" value="<?php echo $data->tgl_pinjaman ?>">
                                            </tr>
                                            <tr>
                                                <th class="px-2">Tanggal Kembali</th>
                                                <td class="px-2"><?php echo $data->tgl_kembali ?></td>
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
                                                <td><?php echo tampil_namabuku_byPeminjamanId($data->id_index_buku) ?>
                                                </td>
                                                <td><?php echo tampil_pengarangbuku_byPeminjamanId($data->id_index_buku) ?>
                                                </td>
                                                <td><?php echo tampil_kategoribuku_byPeminjamanId($data->id_index_buku) ?>
                                                </td>
                                                <td><?php echo tampil_rakbuku_byPeminjamanId($data->id_index_buku) ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-end">
                            <input type="hidden" value="<?php echo $data->id_pinjaman?>" name="id_pinjaman">
                            <!-- <div class="d-flex align-items-center">
                                <label class="control-label" style="width: 300px;">Tanggal Dikembalikan</label>
                                <input type="date" value="<?php echo $data->tgl_kembali ?>" name="tgl_kembali"
                                    class="form-control" require>
                            </div> -->
                            <input type="hidden" value="<?php echo $data->id_index_buku ?>" name="id_index_buku">
                            <input type="hidden"
                                value="<?php echo tampil_idbuku_byPeminjamanId($data->id_index_buku) ?>"
                                name="id_buku_pinjam">
                            <button type="submit"
                                class="btn <?php $btn = $data->status == "DIPINJAM" ? 'btn-danger' : 'btn-success'; echo $btn ?>">
                                <?php $statuss = $data->status == "DIPINJAM" ? 'Kembalikan' : 'Sudah Dikembalikan'; echo $statuss ?>
                            </button>
                        </div>
                </div>
        </div>
        </form>
        <?php endforeach ?>
    </div>
    </div>
    </section>
    </div>
    <?php $this->load->view('perpustakaan/style/js')?>
</body>

</html>