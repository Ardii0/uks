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
            <div class="container-fluid">
                <section class="content">
                    <div class="row px-3 py-2">
                        <div class="col-sm-12">
                            <div class="box">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p style="font-size: 2rem">Data Rak Buku</p>
                                    </div>
                                    <div class="p-2 d-flex align-items-center gap-3">
                                        <div class="grid gap-3">
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal_tambah_rak">
                                                <i class="fas fa-plus"></i>&nbsp;
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="container-fluid bg-white shadow p-4">
                                    <table id="datasiswa-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="" style="width: 25px; text-align:center">No</th>
                                                <th class="w-25">ID Rak Buku</th>
                                                <th class="w-50">Keterangan</th>
                                                <th style="width: 125px; text-align:center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;foreach ($data_rak_buku as $row): $no++;?>
                                            <tr>
                                                <td class="text-center"><?php echo $no ?></td>
                                                <td><?php echo $row->nama_rak_buku ?></td>
                                                <td><?php echo $row->keterangan_rak_buku ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('Perpustakaan/edit_rak_buku/' . $row->id_rak_buku) ?>"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> </a>
                                                    <?php if ( tampil_bukuById_rak($row->nama_rak_buku) === null ) : ?>
                                                    <button onclick="hapus(<?php echo $row->id_rak_buku ?>)"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> </button>
                                                    <?php else : ?>
                                                    <!-- <button onclick="hapus(<?php echo $row->id_rak_buku ?>)"
                                                        class="btn btn-danger btn-sm" disabled="disabled">
                                                        <i class="fa fa-trash"></i> </button> -->
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal_tambah_rak" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?php echo base_url('Perpustakaan/aksi_tambah_rak_buku') ?>"
                        enctype="multipart/form-data" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Rak Buku</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pb-1">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">ID Rak Buku</label>
                                            <div class="">
                                                <input type="number" name="nama_rak_buku" class="form-control"
                                                    placeholder="Masukan ID Rak Buku"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Keterangan</label>
                                            <div class="">
                                                <input type="text" name="keterangan_rak_buku" class="form-control"
                                                    placeholder="Masukan Keterangan"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="kembali()"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $this->load->view('perpustakaan/style/js')?>
        <script>
        function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Perpustakaan/hapus_rak_buku/')?>" + "/" + id;
            }
        }
        </script>
</body>

</html>