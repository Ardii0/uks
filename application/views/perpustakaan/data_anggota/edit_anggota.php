<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>haloo</title>
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
                                            <h3 class="box-title">Form Edit Anggota</h3>
                                        </b></center>
                                </div>
                                <?php foreach($data_anggota as $row ):?>
                                <!-- /.box-header -->
                                <form action="<?php echo base_url('Perpustakaan/update_anggota') ?>"
                                    enctype="multipart/form-data" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Nama Anggota</label>
                                            <div class="">
                                                <input type="text" value="<?php echo $row->nama_anggota ?>" name="nama_anggota" class="form-control"
                                                    placeholder=""><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">NISN</label>
                                            <div class="">
                                                <input type="number" value="<?php echo $row->nisn ?>" name="nisn" class="form-control"
                                                    placeholder=""><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Keterangan</label>
                                            <div class="">
                                                <input type="text" value="<?php echo $row->keterangan ?>" name="keterangan" class="form-control"
                                                    placeholder=""><br>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer d-flex justify-content-between">
                                    <input type="hidden" value="<?php echo $row->id_anggota ?>" name="id_anggota">
                                    <button type="submit" class="w-25 btn btn-primary">Simpan</button>
                                      <button type="button" class="w-25 btn btn-secondary" onclick="kembali()">Kembali</button>
                                    </div>
                                </form>
                                <!-- /.box-body -->
                                <?php endforeach;?>
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
        </script>

</body>
</html>