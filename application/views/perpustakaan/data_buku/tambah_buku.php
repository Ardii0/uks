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
                    <div class="row px-3">
                        <div class="col-sm-12 p-5">
                            <div class="box">
                                <div class="box-header">
                                    <center><b>
                                            <h3 class="box-title">Form Tambah Buku</h3>
                                        </b></center>
                                </div>
                                <!-- /.box-header -->
                                <form action="<?php echo base_url('Perpustakaan/aksi_tambah_buku') ?>"
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
                                                    <label class=" control-label">Rak Buku</label>
                                                    <div class="">
                                                    <select name="rak_buku_id"
                                                            class="custom-select custom-select-md mb-3">
                                                            <option selected>-- Pilih Rak --</option>
                                                            <?php $no = 0;foreach ($data_rak_buku as $row): $no++;?>
                                                            <option value="<?php echo $row->nama_rak_buku ?>">
                                                                <?php echo $row->nama_rak_buku ?> <?php echo $row->keterangan_rak_buku ?></option>
                                                                
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class=" control-label">Kategori Buku</label>
                                                    <div class="">
                                                        <select name="kategori_id"
                                                            class="custom-select custom-select-md mb-3">
                                                            <option selected>-- Pilih Kategori --</option>
                                                            <?php $no = 0;foreach ($data_kategori_buku as $row): $no++;?>
                                                            <option value="<?php echo $row->nama_kategori_buku ?>">
                                                                <?php echo $row->nama_kategori_buku ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class=" control-label">Stok Buku</label>
                                                    <div class="">
                                                    <input type="number" name="stok" class="form-control"
                                                        placeholder="Masukan Stok Buku"><br>
                                                    </div>
                                                </div>
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
                                                <input type="number" name="tahun_terbit" class="form-control"
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
                                      <button type="button" class="w-25 btn btn-secondary" onclick="kembali()">Kembali</button>
                                      <button type="submit" class="w-25 btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php $this->load->view('perpustakaan/style/js')?>

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
        </script>

</body>

</html>