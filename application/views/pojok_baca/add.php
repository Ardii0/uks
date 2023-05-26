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

        <div class="content-wrapper py-3">
            <section class="content">
                <div class="container-fluid mb-4">
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Tambah Buku</div>
                        </div>
                    </div>

                    <div class="bg-light shadow">
                        <section class="content bg-white p-3 rounded">
                            <form action="<?php echo base_url('pojok_baca/aksi_tambah_buku') ?>"
                                enctype="multipart/form-data" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Judul Buku</label>
                                        <div class="">
                                            <input type="text" name="judul_buku" class="form-control"
                                                placeholder="Masukan Judul Buku" required><br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group ">
                                                <label class="control-label">Penerbit</label>
                                                <div class="">
                                                    <input type="text" name="penerbit_buku" class="form-control"
                                                        placeholder="Masukan Penerbit Buku" required><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group ">
                                                <label class="control-label">Penulis</label>
                                                <div class="">
                                                    <input type="text" name="penulis_buku" class="form-control"
                                                        placeholder="Masukan Penulis Buku" required><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group ">
                                                <label class="control-label">Tahun Terbit</label>
                                                <div class="">
                                                    <input type="number" name="tahun_terbit" class="form-control"
                                                        placeholder="Masukan Tahun Terbit" required><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col form-group">
                                            <label class="control-label">Keterangan</label>
                                            <div class="">
                                                <textarea name="keterangan" class="form-control"
                                                    placeholder="Masukan Keterangan" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col form-group">
                                            <label class="control-label">Tanggal Masuk Buku</label>
                                            <div class="">
                                                <input id="remove" type="date" name="tgl_masuk" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col form-group">
                                            <label class="control-label">Sumber</label>
                                            <div class="">
                                                <input type="text" name="sumber" class="form-control"
                                                    placeholder="Masukan Sumber" required><br>
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
                                        <button class="btn btn-danger text-bold mr-2" onclick="kembali()"><span
                                                class="p-3">Batal</span></button>
                                        <button type="submit" class="btn btn-success text-bold "><span
                                                class="p-3">Simpan</span></button>
                                    </div>
                            </form>
                        </section>
                        <!-- /.box-body -->
                    </div>
                </div>
            </section>
        </div>

        <?php $this->load->view('style/js') ?>

        <script>
        function kembali() {
            window.history.go(-1);
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#remove').removeAttr('required');
        </script>

</body>

</html>