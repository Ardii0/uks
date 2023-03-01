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
                                        <p style="font-size: 2.5rem">Data Buku</p>
                                    </div>
                                    <div class="p-2 d-flex align-items-center gap-3">
                                        <div class="grid gap-3">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal_tambah_rak">
                                                Tambah Buku
                                            </button>

                                            <a href="<?php echo base_url('Perpustakaan/tambah_buku'); ?>"
                                                class="btn btn-success">Tambah Buku</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="perpustakaan-table" class="table table-bordered">
                                        <thead>
                                            <tr class="text-center bg-secondary">
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>Penerbit</th>
                                                <th>Penulis</th>
                                                <th>Tahun Terbit</th>
                                                <th>ID Rak Buku</th>
                                                <th>Kategori</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=0; foreach($data_buku as $row ): $no++;?>
                                            <tr class="text-center">
                                                <td><?php echo $no?></td>
                                                <td><?php echo $row->judul_buku?></td>
                                                <td><?php echo $row->penerbit_buku?></td>
                                                <td><?php echo $row->penulis_buku?></td>
                                                <td><?php echo $row->tahun_terbit?></td>
                                                <td><?php echo $row->rak_buku_id?></td>
                                                <td><?php echo $row->kategori_id?></td>
                                                <td><?php echo $row->keterangan?></td>
                                                <td>
                                                    <a href="<?php echo base_url('Perpustakaan/edit_buku/'.$row->id_buku)?>"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url('Perpustakaan/barcode/'.$row->id_buku)?>"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-barcode"></i>
                                                    </a>
                                                    <button onClick="hapus(<?php echo $row->id_buku?>)"
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
        </div>
        <?php $this->load->view('perpustakaan/style/js')?>
        <script>
        function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Perpustakaan/hapus_buku/')?>" + "/" + id;
            }
        }
        </script>
</body>

</html>