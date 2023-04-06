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
                            <h1>Form Edit Buku</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Perpustakaan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Perpustakaan/data_buku') ?>">Data Buku</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Buku</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container p-3 bg-white rounded">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <b>
                                        <h3 class="box-title">Edit Buku</h3>
                                    </b>
                                </div>
                                <?php foreach($data_buku as $row ):?>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form action="<?php echo base_url('Perpustakaan/update_buku')?>"
                                    enctype="multipart/form-data" method="post">
                                    <div class="box-body row">
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Judul Buku</label>
                                            <div class="col-sm-12">
                                                <input type="text" value="<?php echo $row->judul_buku?>"
                                                    name="judul_buku" class="form-control"
                                                    placeholder="Masukan Judul Buku"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Penerbit Buku</label>
                                            <div class="col-sm-12">
                                                <input type="text" value="<?php echo $row->penerbit_buku?>"
                                                    name="penerbit_buku" class="form-control"
                                                    placeholder="Masukan Penerbit Buku"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Penulis Buku</label>
                                            <div class="col-sm-12">
                                                <input type="text" value="<?php echo $row->penulis_buku?>"
                                                    name="penulis_buku" class="form-control"
                                                    placeholder="Masukan Penulis Buku"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Rak Buku</label>
                                            <div class="col-sm-12">
                                                <select name="rak_buku_id" class="custom-select custom-select-md mb-3">
                                                    <option style="display: none;"
                                                        value="<?php echo $row->rak_buku_id ?>">
                                                        <?php echo $row->rak_buku_id ?>
                                                        <?php $no = 0;foreach ($data_rak_buku as $rak): $no++;?>
                                                    <option value="<?php echo $rak->nama_rak_buku ?>">
                                                        <?php echo $rak->nama_rak_buku ?>
                                                        <?php echo $rak->keterangan_rak_buku ?></option>

                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Kategori Buku</label>
                                            <div class="col-sm-12">
                                                <select name="kategori_id" class="custom-select custom-select-md mb-3">
                                                    <option style="display: none;"
                                                        value="<?php echo namakategori($row->kategori_id) ?>">
                                                        <?php echo namakategori($row->kategori_id) ?>
                                                    </option>
                                                    <?php $no = 0;foreach ($data_kategori_buku as $data): $no++;?>
                                                    <option value="<?php echo $data->id_kategori_buku ?>">
                                                        <?php echo $data->nama_kategori_buku ?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Tahun Terbit</label>
                                            <div class="col-sm-12">
                                                <input type="number" value="<?php echo $row->tahun_terbit?>"
                                                    name="tahun_terbit" class="form-control"
                                                    placeholder="Masukan Tahun Terbit"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Keterangan</label>
                                            <div class="col-sm-12">
                                                <input type="text" value="<?php echo $row->keterangan?>"
                                                    name="keterangan" class="form-control"
                                                    placeholder="Masukan Keterangan"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Cover</label>
                                            <div class="col-sm-12">
                                                <div class="mt-1">
                                                    <input type="file" name="foto" onchange="readURL(this);" />
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div>Foto Sebelum :</div>
                                                        <img src="<?php echo base_url('uploads/Perpustakaan/buku')."/".$row->foto;?>"
                                                            width="140" />
                                                    </div>
                                                    <div class="col-6">
                                                        <div>Foto Sesudah :</div>
                                                        <img id="blah" name="foto" width="140" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.box-body -->
                                    <div class="box-footer d-flex justify-content-between">
                                        <input type="hidden" value="<?php echo $row->id_buku?>" name="id_buku">
                                        <button type="button" class="btn btn-primary"
                                            onclick="kembali()">Kembali</button>
                                        <button type="submit" class="btn btn-primary">update</button>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                                <?php endforeach;?>

                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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