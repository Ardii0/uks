<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tindakan</title>
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
                            <!-- header -->
                            <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                                style="background-color:#4ADE80">
                                <div class="p-2 d-flex align-items-center gap-3">
                                    <div style="font-size: 1.5rem">Daftar Tindakan</div>
                                </div>
                                <div class="p-2 d-flex align-items-center gap-3">
                                    <div class="grid gap-3">
                                        <button data-toggle="modal" data-target="#modal_tambah_tindakan"
                                            class="btn btn-info rounded bg-sky-600"><i class="fas fa-plus"></i>&nbsp;
                                            Tambah</button>
                                    </div>
                                </div>
                            </div>
                            <!-- isi -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body bg-light shadow">
                                        <table id="table3" class="table  table-striped">
                                            <thead>
                                                <tr class="">
                                                    <th class="text-center" scope="col">NO</th>
                                                    <th class="text-center" scope="col">NAMA TINDAKAN</th>
                                                    <th class="text-center" scope="col">AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id=0; foreach($tindakan as $data ): $id++;?>
                                                <tr>
                                                    <th class="text-center" scope="row"><?php echo $id?></th>
                                                    <td class="text-center"><?php echo $data->nama?></td>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url('tindakan/edit_tindakan/' . $data->id) ?>"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="fa fa-edit"></i> </a>

                                                        <?php if ( tampil_tindakan($data->id) === null ) : ?>
                                                        <button onclick="hapus(<?php echo $data->id ?>)"
                                                            class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> </button>
                                                        <?php else : ?>
                                                        <!-- <button onclick="hapus(<?php echo $data->id ?>)"
                                                            class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i> </button> -->
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modal_tambah_tindakan" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?php echo base_url('tindakan/aksi_tambah_tindakan') ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Tindakan </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- <div class="box-body"> -->
                                <div class="form-group col-sm-12 mb-0">
                                    <label class="control-label">Nama Tindakan</label>
                                    <div class="">
                                        <input type="text" name="nama_tindakan" class="form-control" required
                                            placeholder="Masukan Nama Tindakan"><br>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
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

    <?php $this->load->view('style/js') ?>
    <!-- sweetalert success add -->
    <?php if ($this->session->flashdata('yes')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('yes')?>",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
    });
    </script>
    <?php if (isset($_SESSION['yes'])) {
            unset($_SESSION['yes']);
        }
    endif; ?>
    <!-- sweetalert error -->
    <?php if ($this->session->flashdata('salah')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('salah')?>",
        icon: "error",
        showConfirmButton: false,
        timer: 1000,
    });
    </script>
    <?php if (isset($_SESSION['salah'])) {
            unset($_SESSION['salah']);
        }
    endif; ?>
</body>

<script>
function hapus(id) {
    swal.fire({
        title: 'Yakin untuk menghapus data ini?',
        text: "Data ini akan terhapus permanen",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: ' Ya hapus!'
    }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire({
                icon: 'success',
                title: 'Berhasil Dihapus',
                showConfirmButton: false,
                timer: 1250
            }).then(function() {
                window.location.href = "<?php echo base_url('tindakan/hapus_tindakan/')?>" + id;
            })

        }
    });

}
</script>
</body>

</html>