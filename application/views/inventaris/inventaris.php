<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
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
                                        <div style="font-size: 1.5rem">Daftar Inventaris UKS</div>
                                    </div>
                                    <div class="p-2 d-flex align-items-center gap-3">
                                        <div class="grid gap-3">
                                            <button data-toggle="modal" data-target="#index1" class="btn btn-info"><i
                                                    class="fas fa-plus"></i>&nbsp;
                                                Tambah</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body shadow p-4 mb-5 bg-white rounded">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Pendanaan</th>
                                                <th>Jumlah Barang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=0; foreach($daf_invent as $datas ): $no++;?>
                                            <tr class="text-center">
                                                <td><?php echo $no?></td>
                                                <td><?php echo $datas->nama_barang?></td>
                                                <td><?php echo indonesian_date_time($datas->tgl_barang_masuk)?></td>
                                                <td><?php echo $datas->pendanaan?></td>
                                                <td><?php echo $datas->jumlah_barang?></td>
                                                <td>
                                                    <a href="<?php echo base_url('inventaris/edit_invent/' . $datas->id)?>"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button onclick="hapus(<?php echo $datas->id ?>)"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
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
    </div>
    <div class="modal fade" id="index1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?php echo base_url('inventaris/aksi_tambah')?>" enctype="multipart/form-data" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Inventaris</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-1">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label">Nama Barang</label>
                                    <div class="">
                                        <input type="text" name="nama_barang" class="form-control" required=""
                                            placeholder="Masukan Nama Barang"><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Pendanaan</label>
                                    <div class="">
                                        <input type='text' name="pendanaan" class="form-control" required=""
                                            placeholder="Masukan Asal Barang"><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Masuk</label>
                                    <div class="">
                                        <input type='date' name="tgl_barang_masuk" class="form-control" required=""
                                            placeholder="Masukan Asal Barang"><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jumlah Barang</label>
                                    <div class="">
                                        <input type='number' name="jumlah_barang" class="form-control" required=""
                                            placeholder="Masukan Jumlah Barang"><br>
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

    <?php $this->load->view('style/js')?>
</body>
<?php if ($this->session->flashdata('bisa')): ?>
<script>
swal.fire({
    title: "<?php echo $this->session->flashdata('bisa')?>",
    icon: "success",
    showConfirmButton: false,
    timer: 1250,
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
        confirmButtonText: ' Ya hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Dihapus',
                showConfirmButton: false,
                timer: 1250,
            }).then(function() {
                window.location.href = "<?php echo base_url('inventaris/hapus_invent/')?>" + id;
            });
        }
    });

}
</script>

</html>