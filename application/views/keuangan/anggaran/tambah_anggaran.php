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
                <section class="content">
                    <div class="row px-3">
                        <div class="col-sm-12 p-5">
                            <div class="box">
                                <div class="box-header">
                                    <center><b>
                                            <h3 class="box-title">Form Tambah Anggaran</h3>
                                        </b></center>
                                </div>
                                <!-- /.box-header -->
                                <form action="<?php echo base_url('keuangan/aksi_tambah_rencana_anggaran') ?>"
                                     method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">
                                                Tanggal
                                            </label>
                                            <div class="">
                                                <input type="date" name="tanggal" class="form-control"
                                                    placeholder="Masukan Tanggal"><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                          <div class="form-group ">
                                            <label class="control-label">Keterangan</label>
                                            <div class="">
                                                <input type="text" name="keterangan" class="form-control"
                                                    placeholder="Masukan Keterangan"><br>
                                            </div>
                                        </div>
                                          </div>
                                          <div class="col">
                                          <div class="form-group ">
                                            <label class="control-label">Debit</label>
                                            <div class="">
                                                <input type="number" name="debit" class="form-control"
                                                    placeholder="Masukan Debit"><br>
                                            </div>
                                        </div>
                                          </div>
                                          <div class="col">
                                          <div class="form-group ">
                                            <label class="control-label">Kredit</label>
                                            <div class="">
                                                <input type="number" name="kredit" class="form-control"
                                                    placeholder="Masukan Kredit"><br>
                                            </div>
                                        </div>
                                          </div>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label class="control-label">Saldo</label>
                                            <div class="">
                                                <input type="text" name="saldo" class="form-control"
                                                    placeholder="Masukan Saldo"><br>
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
        <?php $this->load->view('keuangan/style/js') ?>

        <script>
        function kembali() {
            window.history.go(-1);
        }
        </script>

</body>

</html>