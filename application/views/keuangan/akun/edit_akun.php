<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $this->load->view('keuangan/style/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('keuangan/style/navbar') ?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('keuangan/style/sidebar') ?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <div class="container-fluid">
            <?php foreach($data_akun as $data ):?>
                <section class="content">
                    <div class="row px-3">
                        <div class="col-sm-12 p-5">
                            <div class="box">
                                <div class="box-header">
                                    <center><b>
                                            <h3 class="box-title">Form Edit Akun</h3>
                                        </b></center>
                                </div>
                                <!-- /.box-header -->
                                <form action="<?php echo base_url('keuangan/aksi_edit_akun') ?>"
                                     method="post">
                                    <div class="box-body">
                                    <div class="form-group col-sm-12">
                                <label class=" control-label">Nama Akun</label>
                                <div class="">
                                    <input type="text" value="<?php echo $data->nama_akun?>" name="nama_akun" class="form-control"
                                        placeholder="Masukan Nama Akun"><br>
                                </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class=" control-label">Jenis Akun</label>
                                <div class="">
                                    <input type="text" value="<?php echo $data->jenis_akun?>" name="jenis_akun" class="form-control"
                                        placeholder="Masukan Jenis Akun"><br>
                                </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer d-flex justify-content-between">
                                        <input type="hidden" value="<?php echo $data->id_akun?>" name="id_akun">
                                      <button type="button" class="w-25 btn btn-secondary" onclick="kembali()">Kembali</button>
                                      <button type="submit" class="w-25 btn btn-primary">Simpan</button>
                                    </div> 
                                </form>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
                <?php endforeach ?>
            </div>
        </div>
        <?php $this->load->view('keuangan/style/js') ?>

        <script>
        function kembali() {
            window.history.go(-1);
        }
        </script>

</body>

</html>