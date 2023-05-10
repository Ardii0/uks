<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <?php $this->load->view('style/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar') ?>
        <?php $this->load->view('style/sidebar') ?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <section class="content">
                    <div class="row px-3">
                        <div class="col-sm-12 p-1">
                            <div class="box">
                                <section class="content-header">
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                <h1>Tambah Buku</h1>
                                            </div>
                                            <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="<?php echo base_url('Pojok_Baca/') ?>">Pojok Baca</a>
                                                </li>
                                                <li class="breadcrumb-item active">Tambah Buku</li>
                                            </ol>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- /.box-header -->
                                <section class="content bg-white p-3 rounded">
                                    <form action="<?php echo base_url('Pojok_Baca/aksi_tambah_buku') ?>"
                                        enctype="multipart/form-data" method="post">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Judul Buku</label>
                                                <div class="">
                                                    <input type="text" name="judul_buku" class="form-control"
                                                        placeholder="Masukan Judul Buku"><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label class="control-label">Penerbit</label>
                                                        <div class="">
                                                            <input type="text" name="penerbit_buku" class="form-control"
                                                                placeholder="Masukan Penerbit Buku"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label class="control-label">Penulis</label>
                                                        <div class="">
                                                            <input type="text" name="penulis_buku" class="form-control"
                                                                placeholder="Masukan Penulis Buku"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group ">
                                                        <label class="control-label">Tahun Terbit</label>
                                                        <div class="">
                                                            <input type="number" name="tahun_terbit"
                                                                class="form-control"
                                                                placeholder="Masukan Tahun Terbit"><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col form-group">
                                                    <label class="control-label">Keterangan</label>
                                                    <div class="">
                                                        <input type="text" name="keterangan" class="form-control"
                                                            placeholder="Masukan Keterangan"><br>
                                                    </div>
                                                </div>
                                                <div class="col form-group">
                                                    <label class="control-label">Tanggal Masuk Buku</label>
                                                    <div class="">
                                                        <input id="remove" type="datetime-local" name="tgl_masuk"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col form-group">
                                                    <label class="control-label">Sumber</label>
                                                    <div class="">
                                                        <input type="text" name="sumber" class="form-control"
                                                            placeholder="Masukan Sumber"><br>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="col form-group">
                                                    <label class="control-label">Cover</label>
                                                    <div class="mt-1">
                                                        <input type="file" name="foto" onchange="readURL(this);" />
                                                    </div>
                                                    <div>
                                                        <img id="blah" style="width: 110px; hight:200px" class="mt-3" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->

                                            <div class="box-footer d-flex justify-content-between">
                                                <button type="button" class="w-25 btn btn-secondary"
                                                    onclick="kembali()">Kembali</button>
                                                <button type="submit" class="w-25 btn btn-primary">Simpan</button>
                                            </div>
                                    </form>
                                </section>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php $this->load->view('style/js') ?>

        <script>
            function kembali() {
                window.history.go(-1);
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#remove').removeAttr('required');
        </script>

</body>

</html>