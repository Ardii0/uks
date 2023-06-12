<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <?php $this->load->view('style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <section class="content">
                    <div class="row px-3 py-2">
                        <div class="col-sm-12">
                            <div class="box">
                                <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                                    style="background-color:#4ADE80">
                                    <div class="p-2 d-flex align-items-center gap-3">
                                        <div style="font-size: 1.5rem">Daftar Karyawan</div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="p-2 d-flex align-items-center gap-3">
                                            <div class="grid gap-3">
                                                <a href="<?php echo base_url('datakaryawan/export_karyawan'); ?>">
                                                    <button type="button" class="btn btn-success"><i
                                                            class="fa fa-download pr-2"></i>Download Data
                                                        Karyawan</button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="p-2 d-flex align-items-center gap-3">
                                            <div class="grid gap-3">
                                                <button data-toggle="modal" data-target="#index2"
                                                    class="btn btn-success"><i class="fa fa-upload"></i>&nbsp;
                                                    Upload</button>
                                            </div>
                                        </div>
                                        <div class="p-2 d-flex align-items-center gap-3">
                                            <div class="grid gap-3">
                                                <button data-toggle="modal" data-target="#index1"
                                                    class="btn btn-info"><i class="fas fa-plus"></i>&nbsp;
                                                    Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body shadow p-4 mb-5 bg-white rounded">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tempat, Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=0; foreach($daf_karyawan as $datas ): $no++;?>
                                            <tr class="text-center">
                                                <td><?php echo $no?></td>
                                                <td><?php echo $datas->nama_karyawan?></td>
                                                <td><?php echo $datas->tempat_lahir?>,
                                                    <?php echo indonesian_date_time($datas->tanggal_lahir);?></td>
                                                <td><?php echo $datas->alamat?></td>
                                                <td>
                                                    <input type="hidden" id="id" name="id" value="<?= $datas->id?>">
                                                    <a
                                                        href="<?php echo base_url('datakaryawan/export_periksa_karyawan') ?>">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                    </a>

                                                    <a href="<?php echo base_url('datakaryawan/detail_karyawan/' . $datas->id)?>"
                                                        class="btn btn-warning btn-sm" type="button">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <?php if ( tampil_karyawan($datas->id) === null ) : ?>
                                                    <button onclick="hapus(<?php echo $datas->id ?>)"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> </button>
                                                    <?php else : ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="modal fade" id="index1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('datakaryawan/aksi_tambah_karyawan')?>" enctype="multipart/form-data"
                    method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pb-1">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <div class="">
                                            <input type="text" name="nama_karyawan" class="form-control" required=""
                                                placeholder="Masukan Nama"><br>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Tempat Lahir</label>
                                            <div class="">
                                                <input type="text" name="tempat_lahir" class="form-control" required=""
                                                    placeholder="Masukan Tempat Lahir"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Tanggal Lahir</label>
                                            <div class="">
                                                <input type="date" name="tanggal_lahir" class="form-control" required=""
                                                    placeholder="Masukan Tanggal Lahir"><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Alamat</label>
                                        <div class="">
                                            <input type='textarea' name="alamat" class="form-control" required=""
                                                placeholder="Masukan Alamat"><br>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-danger text-bold w-25" onclick="kembali()"
                                data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success text-bold w-25">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="index2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('datakaryawan/import_excel3/') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Data Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <p>Download template excel untuk mengisi data karyawan yang akan diupload.</p>
                                <a href="<?php echo base_url('assets/karyawan-format.xlsx') ?>" class="btn btn-success">
                                    <i class="fa fa-download"></i> Download Template
                                </a>
                                <br>
                                <hr>
                                <div>
                                    <label class="mr-3">
                                        Upload
                                    </label>
                                </div>
                                <div>
                                    <input type="file" name="fileExcel">
                                </div>
                                <p class="mt-1">Type File Upload .*xls</p>
                            </div>
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

    <?php $this->load->view('style/js')?>
</body>
<?php if ($this->session->flashdata('bisa')): ?>
<script>
swal.fire({
    title: "<?php echo $this->session->flashdata('bisa')?>",
    icon: "success",
    showConfirmButton: false,
    timer: 1500,
});
</script>
<?php if (isset($_SESSION['bisa'])) {
            unset($_SESSION['bisa']);
        }
    endif; ?>
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
        confirmButtonText: 'Ya Hapus'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Dihapus',
                showConfirmButton: false,
                timer: 1500,

            }).then(function() {
                window.location.href = "<?php echo base_url('datakaryawan/hapus_karyawan/')?>" + id;
            });
        }
    });
}
</script>

</html>