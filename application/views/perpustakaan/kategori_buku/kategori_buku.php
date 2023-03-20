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
                                        <p style="font-size: 2.5rem">Data kategori Buku</p>
                                    </div>
                                    <div class="p-2 d-flex align-items-center gap-3">
                                        <div class="grid gap-3">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal_tambah_kategori">
                                                Tambah Kategori
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="container-fluid bg-white shadow p-4">
                                    <table id="datasiswa-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 25px">No</th>
                                                <th class="w-25">Nama Kategori</th>
                                                <th class="w-50">Keterangan Kategori</th>
                                                <th class="text-center" style="width: 125px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=0; foreach($data_kategori_buku as $row ): $no++;?>
                                            <tr class="">
                                                <td class="text-center"><?php echo $no?></td>
                                                <td><?php echo $row->nama_kategori_buku?></td>
                                                <td><?php echo $row->keterangan_kategori_buku?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('Perpustakaan/edit_kategori_buku/'.$row->id_kategori_buku)?>"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> </a>
                                                    <button onclick="hapus(<?php echo $row->id_kategori_buku?>)"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> </button>
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
            <div class="modal fade" id="modal_tambah_kategori" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?php echo base_url('Perpustakaan/aksi_tambah_kategori_buku') ?>"
                        enctype="multipart/form-data" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Buku</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="box-body">
                                    <div class="form-group col-sm-12">
                                        <label class=" control-label">Nama Kategori Buku</label>
                                        <div class="">
                                            <input type="text" name="nama_kategori_buku" class="form-control"
                                                placeholder="Masukan Nama Kategori"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class=" control-label">Keterangan</label>
                                        <div class="">
                                            <input type="text" name="keterangan_kategori_buku" class="form-control"
                                                placeholder="Masukan Keterangan"><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="kembali()"
                                    data-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <?php $this->load->view('perpustakaan/style/js')?>
        <script>
        function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Perpustakaan/hapus_kategori_buku/')?>" + "/" + id;
            }
        }
        </script>
</body>

</html>