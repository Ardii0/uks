<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                        <div class="">
                            <div class="header p-3 text-light rounded-top" style="background-color:#4ADE80">
                                <div class="row">
                                    <div class="col pl-3 pt-1">
                                        <h5>Diagnosa Penyakit</h5>
                                    </div>
                                    <div class="col">
                                    </div>
                                    <div class="col text-right">
                                        <button type="button" data-toggle="modal" data-target="#modal_tambah_diagnosa"
                                            class="btn btn-info px-5 rounded bg-sky-600">Tambah</button>
                                    </div>
                                </div>
                            </div>
                            <div class=" bg-light shadow">
                                <div class="isi-tabel p-4">
                                    <table class="table">
                                        <thead>
                                            <tr class="">
                                                <th class="text-center" scope="col">NO</th>
                                                <th class="text-center" scope="col">NAMA OBAT</th>
                                                <th class="text-center" scope="col">DOSIS</th>
                                                <th class="text-center" scope="col">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id=0; foreach($obat as $data ): $id++;?>
                                            <tr>
                                                <th class="text-center" scope="row"><?php echo $id?></th>
                                                <td class="text-center"><?php echo $data->nama_obat?></td>
                                                <td class="text-center"><?php echo $data->dosis?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('Daftar_Obat/edit_daftar_obat/' . $data->id) ?>" class="btn btn-primary btn-sm" >
                                                        <i class="fa fa-edit"></i> </a>
                                                    <button onclick="hapus(<?php echo $data->id ?>)"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> </button>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modal_tambah_diagnosa" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?php echo base_url('Daftar_Obat/aksi_tambah_daftar_obat') ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Obat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <div class="box-body"> -->
                                <div class="form-group col-sm-12 mb-0">
                                    <label class="control-label">Nama Obat</label>
                                    <div class="">
                                        <input type="text" name="nama_obat" class="form-control"
                                            placeholder="Masukan Nama Obat"><br>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 mb-0">
                                    <label class="control-label">Dosis Obat</label>
                                    <div class="">
                                        <input type="text" name="dosis_obat" class="form-control"
                                            placeholder="Masukan Dosis Obat"><br>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 mb-0">
                                    <label class="control-label">Expired Obat</label>
                                    <div class="">
                                        <input type="date" name="expired_obat" class="form-control"
                                            placeholder="Masukan Expired Obat"><br>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>
                            <div class="modal-footer d-flex justify-content-end">
                                <button type="button" class="btn btn-danger text-bold w-25" onclick="kembali()"
                                    data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success text-bold w-25">Simpan</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <?php $this->load->view('style/js')?>
    <script>
    function hapus(id_obat) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Daftar_Obat/hapus_daftar_obat/')?>" + "/" + id_obat;
        }
    }
    </script>
</body>

</html>