<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat</title>
    <?php $this->load->view('style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper py-3">
            <div class="container-fluid">
                <section class="content ">
                    <div class="container-fluid ">
                        <?php foreach ($obat as $row): ?>

                        <section class="content bg-white p-3 rounded">
                            <form action="<?php echo base_url('Daftar_obat/update_daftar_obat') ?>" method="post">
                                <div class="box-body">

                                    <div class="form-group col-sm-12">
                                        <label class="col-sm-2 control-label">Nama Obat</label>
                                        <div class="col-sm-">
                                            <input type="text" value="<?php echo $row->nama_obat ?>" name="nama_obat"
                                                class="form-control" placeholder="Masukan Nama Obat"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="col-sm-2 control-label">Dosis Obat</label>
                                        <div class="col-sm-">
                                            <input type="text" value="<?php echo $row->dosis ?>" name="dosis_obat"
                                                class="form-control" placeholder="Masukan Dosis Obat"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="col-sm-2 control-label">Expired Obat</label>
                                        <div class="col-sm-">
                                            <input type="date" value="<?php echo $row->expired ?>" name="expired_obat"
                                                class="form-control" placeholder="Masukan Expired Obat"><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-danger text-bold mr-2" onclick="kembali()"
                                    data-dismiss="modal"><span class="p-3">Batal</span></button>
                                <button type="submit" class="btn btn-success text-bold "><span class="p-3">Update</span></button>
                            </div>

                            </form>
                        </section>
                        <?php endforeach;?>
                    </div>
                </section>
            </div>

        </div>
    </div>
    </div>

    <?php $this->load->view('style/js')?>
    <script>
    function kembali() {
        window.history.go(-1);
    }
    </script>
</body>

</html>