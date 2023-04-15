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
        <?php $this->load->view('perpustakaan/style/navbar')?>
        <?php $this->load->view('perpustakaan/style/sidebar')?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <section class="content">
                    <div class="row justify-content-center">
                        <div class="mt-4 col-sm-12">
                            <div class="box">
                                <section class="content-header">
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                <h1>Edit Kategori Buku</h1>
                                            </div>
                                            <div class="col-sm-6">
                                                <ol class="breadcrumb float-sm-right">
                                                    <li class="breadcrumb-item"><a
                                                            href="<?php echo base_url('Perpustakaan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a
                                                            href="<?php echo base_url('Perpustakaan/kategori_buku') ?>">Data
                                                            Kategori Buku</a>
                                                    </li>
                                                    <li class="breadcrumb-item active">Edit Kategori Buku</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <?php foreach($data_kategori_buku as $row ):?>

                                <section class="content bg-white p-3 rounded">
                                    <form action="<?php echo base_url('Perpustakaan/update_kategori_buku')?>"
                                        method="post">
                                        <div class="box-body">
                                            <div class="form-group col-sm-12">
                                                <label class="col-sm-12 control-label">Nama Kategori Buku</label>
                                                <div class="">
                                                    <input type="text" value="<?php echo $row->nama_kategori_buku?>"
                                                        name="nama_kategori_buku" class="form-control"
                                                        placeholder="Masukan Nama Kategori Buku"><br>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label class="col-sm-12 control-label">Keterangan</label>
                                                <div class="">
                                                    <input type="text"
                                                        value="<?php echo $row->keterangan_kategori_buku?>"
                                                        name="keterangan_kategori_buku" class="form-control"
                                                        placeholder="Masukan Keterangan"><br>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12 d-flex justify-content-between">
                                            <button type="button" class="btn btn-danger"
                                                onclick="kembali()">Kembali</button>
                                            <input type="hidden" value="<?php echo $row->id_kategori_buku?>"
                                                name="id_kategori_buku">
                                            <button type="submit" class="btn btn-primary">update</button>
                                        </div>

                                    </form>
                                </section>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php $this->load->view('perpustakaan/style/js')?>
    <script>
    function kembali() {
        window.history.go(-1);
    }
    </script>
</body>

</html>