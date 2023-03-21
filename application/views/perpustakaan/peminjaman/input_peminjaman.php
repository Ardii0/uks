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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Input Peminjaman Buku</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Perpustakaan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Perpustakaan/peminjaman') ?>">Peminjaman Buku</a>
                                </li>
                                <li class="breadcrumb-item active">Input Peminjaman Buku</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow p-4">
                    <form action="<?php echo base_url('Perpustakaan/aksi_input_peminjaman') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="control-label">Anggota</label>
                                <div class="">
                                    <select name="id_anggota" class="form-control select2 select2-info"
                                        data-dropdown-css-class="select2-info" style="width: 100%;">
                                        <option selected="selected">Pilih Anggota</option>
                                        <?php $id = 0; foreach ($data_anggota as $data): $id++ ?>
                                        <option value="<?php echo $data->id_anggota ?>">
                                            <?php echo tampil_namadaftar_ByIdSiswa($data->id_siswa) ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Buku</label>
                                <div class="">
                                    <select id="buku" name="id_buku_pinjam" class="form-control select2 select2-info"
                                        data-dropdown-css-class="select2-info" style="width: 100%;">
                                        <option selected="selected">Pilih Buku</option>
                                        <?php $id = 0; foreach ($data_buku as $data): $id++ ?>
                                        <option value="<?php echo $data->id_buku ?>"><?php echo $data->judul_buku ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Index Buku</label>
                                <div class="">
                                    <select id="idx-buku" name="id_index_buku" class="form-control select2 select2-info"
                                        data-dropdown-css-class="select2-info" style="width: 100%;">
                                        <option selected="selected">Pilih Index Buku</option>
                                        <?php $id = 0; foreach ($index_buku as $data): $id++ ?>
                                        <option value="<?php echo $data->id_stok ?>">
                                            <?php echo $data->id_detail_index_buku ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer d-flex justify-content-end">
                            <!-- <div class="d-flex align-items-center">
                                <label class="control-label" style="width: 180px;">Tanggal Pinjam</label>
                                <input type="date" name="tgl_pinjaman" class="form-control">
                            </div> -->
                            <div>
                                <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
        </section>
    </div>
    <?php $this->load->view('perpustakaan/style/js')?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#buku').change(function() {
            var id_buku = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Perpustakaan/get_index_buku_by_id_buku');?>",
                method: "POST",
                data: {
                    id_buku: id_buku
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html += '<option>Pilih Index Buku</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_stok + '>' + data[i]
                            .id_detail_index_buku + '</option>';
                    }
                    $('#idx-buku').html(html);

                }
            });
            return false;
        });
    });
    </script>
</body>

</html>