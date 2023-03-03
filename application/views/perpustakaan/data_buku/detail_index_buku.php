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
                    <div class="row px-3 py-2 mb-2">
                        <div class="col-sm-6">
                            <h1>Detail Index Data Buku</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Perpustakaan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Perpustakaan/data_buku') ?>">Data Buku</a>
                                </li>
                                <li class="breadcrumb-item active">Detail Index Data Buku</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <?php foreach ($buku as $data): ?>
                <div class="container p-3">
                    <div class="row shadow p-4 mb-5 bg-white rounded">
                        <div class="col-12 row justify-content-between align-content-center">
                            <div class="h4 font-weight-bold">Detail Buku</div>
                            <div><a href="asdasd" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Stok</a>
                            </div>
                        </div>
                        <div class="col-6 row mt-1">
                            <div class="col-6 text-right font-weight-bold">Id Buku :</div>
                            <div class="col-6">1</div>
                        </div>
                        <div class="col-6 row mt-1">
                            <div class="col-6 text-right font-weight-bold">Penerbit :</div>
                            <div class="col-6"><?php echo tampil_penerbit_buku_byid($data->id_buku)?></div>
                        </div>
                        <div class="col-6 row mt-3">
                            <div class="col-6 text-right font-weight-bold">Judul Buku :</div>
                            <div class="col-6">
                                <?php echo tampil_judul_buku_byid($data->id_buku)?>
                            </div>
                        </div>
                        <div class="col-6 row mt-3">
                            <div class="col-6 text-right font-weight-bold">Tahun :</div>
                            <div class="col-6"><?php echo tampil_tahun_terbit_byid($data->id_buku)?></div>
                        </div>
                        <div class="col-6 row mt-3">
                            <div class="col-6 text-right font-weight-bold">Kategori :</div>
                            <div class="col-6"><?php echo tampil_kategori_id_byid($data->id_buku)?></div>
                        </div>
                        <div class="col-6 row mt-3">
                            <div class="col-6 text-right font-weight-bold">Rak :</div>
                            <div class="col-6"><?php echo tampil_rak_buku_id_byid($data->id_buku)?></div>
                        </div>
                        <div class="col-6 row mt-3">
                            <div class="col-6 text-right font-weight-bold">Pengarang :</div>
                            <div class="col-6"><?php echo tampil_penulis_buku_byid($data->id_buku)?></div>
                        </div>
                        <div class="col-6 row mt-3">
                            <div class="col-6 text-right font-weight-bold">Total Buku :</div>
                            <div class="col-6"><?php echo tampil_stok_byid($data->id_buku)?></div>
                        </div>
                    </div>
                    <div class="row shadow p-4 mb-5 bg-white rounded">
                        <div class="col-12">
                            <table id="perpustakaan-table" class="table table-bordered">
                                <thead>
                                    <tr class="text-center bg-secondary">
                                        <th>No</th>
                                        <th>Id Detail Buku</th>
                                        <th>Barcode</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=0; foreach($stok as $row ): $no++;?>
                                    <tr class="text-center">
                                        <td><?php echo $no?></td>
                                        <td><?php echo $row->id_detail_index_buku?></td>
                                        <td class="d-flex justify-content-center">
                                            <?php    
                                                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                                echo $generator->getBarcode($row->id_detail_index_buku, $generator::TYPE_CODE_128);
                                            ?>
                                        </td>
                                        <td><?php echo $row->status?></td>
                                        <td>
                                            <button onClick="hapus(<?php echo $row->id_stok?>)"
                                                class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> </button>
                                            <a href="asd" class="btn btn-success btn-sm">
                                                <i class="fas fa-barcode"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </section>
        </div>
        <?php $this->load->view('perpustakaan/style/js')?>

        <script>
        function kembali() {
            window.history.go(-1);
        }

        function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Perpustakaan/delete_detail_index_buku/')?>" + id;
            }
        }
        </script>

</body>

</html>