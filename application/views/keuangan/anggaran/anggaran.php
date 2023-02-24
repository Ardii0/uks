<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan</title>
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
                    <div class="row px-3 py-2">
                        <div class="col-sm-12">
                            <div class="box">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p style="font-size: 2.5rem">Rencana Anggaran</p>
                                    </div>
                                    <div class="p-2 d-flex align-items-center gap-3">
                                        <div class="grid gap-3">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal_tambah_rak">
                                                Tambah Anggaran
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="">
                                    <table id="table_1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="bg-secondary">
                                                <th class="" style="width: 25px; text-align:center">No</th>
                                                <th class="w-50">Tanggal</th>
                                                <th class="w-50">Keterangan</th>
                                                <th class="w-50">Debit</th>
                                                <th class="w-50">Kredit</th>
                                                <th class="w-50">Saldo</th>
                                                <th style="width: 125px; text-align:center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($data_keuangan as $row):
                                                $no++; ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no ?></td>
                                                    <td><?php echo $row->tanggal ?></td>
                                                    <td id="tanggal"><?php echo $row->keterangan ?></td>
                                                    <td><?php echo $row->debit ?></td>
                                                    <td><?php echo $row->kredit ?></td>
                                                    <td><?php echo $row->saldo ?></td>
                                                    <td class="text-center">
                                                    <button 
                                                    data-toggle="modal"
                                                data-target="#modal_edit_anggaran"
                                                href="/#"
                                                id="submit"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit edit"></i></button>
                                                    <button
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modal_tambah_rak" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?php echo base_url('keuangan/aksi_tambah_anggaran') ?>"
                        enctype="multipart/form-data" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Anggaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pb-1">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Tanggal</label>
                                            <div class="">
                                                <input type="date" name="tanggal" class="form-control"
                                                    placeholder="Masukan Tanggal"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Keterangan</label>
                                            <div class="">
                                                <input type="text" name="keterangan" class="form-control"
                                                    placeholder="Masukan Keterangan"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Debit</label>
                                            <div class="">
                                                <input type="number" name="debit" class="form-control"
                                                    placeholder="Masukan Debit"><br>
                                            </div>
                                        </div>                                 
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Kredit</label>
                                            <div class="">
                                                <input type="number" name="kredit" class="form-control"
                                                    placeholder="Masukan Kredit"><br>
                                            </div>
                                        </div>                                 
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Saldo</label>
                                            <div class="">
                                                <input type="number" name="saldo" class="form-control"
                                                    placeholder="Masukan Saldo"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="kembali()"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="modal_edit_anggaran" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?php echo base_url('keuangan/aksi_edit_anggaran') ?>"
                        enctype="multipart/form-data" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Anggaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body pb-1">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                    <h6 id="modal_body"></h6>
                                    <input type="hidden" value="<?php echo $row->id?>" name="id">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Tanggal</label>
                                            <div class="">
                                                <input type="date" name="tanggal" class="form-control"
                                                value="<?php echo $row->tanggal?>"
                                                    placeholder="Masukan Tanggal"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Keterangan</label>
                                            <div class="">
                                                <input type="text" name="keterangan" class="form-control"
                                                value="<?php echo $row->keterangan?>"
                                                    placeholder="Masukan Keterangan"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Debit</label>
                                            <div class="">
                                                <input type="number" name="debit" class="form-control"
                                                value="<?php echo $row->debit?>"
                                                    placeholder="Masukan Debit"><br>
                                            </div>
                                        </div>                                 
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Kredit</label>
                                            <div class="">
                                                <input type="number" name="kredit" class="form-control"
                                                value="<?php echo $row->kredit?>"
                                                    placeholder="Masukan Kredit"><br>
                                            </div>
                                        </div>                                 
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Saldo</label>
                                            <div class="">
                                                <input type="number" name="saldo" class="form-control"
                                                value="<?php echo $row->saldo?>"
                                                    placeholder="Masukan Saldo"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="kembali()"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $this->load->view('keuangan/style/js') ?>
        <script>
        $("#submit").click(function () {
            var name = $("#tanggal").val();
            var str = "You Have Entered " 
                + "Name: " + name 
            $("#modal_body").html(str);
        });
        </script>
</body>

</html>