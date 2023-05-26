<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKS SMPN1 SMG</title>
    <?php $this->load->view('style/head')?>
    <link rel="stylesheet" href="<?php echo base_url('builder/dist/css/kegiatan_uks.css'); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper p-2 py-3">
            <div class="container-fluid">
                <div class="badge d-flex justify-content-between">
                    <div class="d-flex justify-content-center">
                        <h4>Kegiatan UKS</h4>
                    </div>
                    <div>
                        <button class="btn btn-info px-5 rounded bg-sky-600" data-toggle="modal"
                            data-target="#modal_tambah">
                            <i class="fa fa-plus pr-2"></i>Tambah</button>
                    </div>
                </div>
                <div class="theback" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 8px 16px 0px">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Foto Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Deskripsi</th>
                                <th style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $id=0; foreach($kegiatan as $data): $id++;?>
                            <tr>
                                <td><?php echo $id?></td>
                                <td class="d-flex justify-content-center"><img style="width: 100px; height:100px;"
                                        src="<?php echo base_url('uploads/kegiatan_uks/'.$data->foto) ?>">
                                </td>
                                <td><?php echo $data->nama_kegiatan?></td>
                                <td><?php echo IDNTimes($data->tanggal_mulai)?></td>
                                <td><?php if($data->tanggal_akhir == '0000-00-00 00:00:00' || empty($data->tanggal_akhir)) {
                                                echo 'Sampai Selesai';
                                              } else if (isset($data->tanggal_akhir)) { 
                                                echo IDNTimes($data->tanggal_akhir); 
                                        } ?>
                                </td>
                                <td><?php echo $data->deskripsi?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('kegiatan/edit_kegiatan/'.$data->id)?>"
                                        class='btn btn-warning btn-sm'>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button onclick="hapus(<?php echo $data->id ?>)" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="Modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?php echo base_url('kegiatan/tambah_kegiatan') ?>" enctype="multipart/form-data"
                method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modal">Tambah Kegiatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-sm-12 mb-0">
                            <label class="control-label">Nama Kegiatan</label>
                            <div class="">
                                <input type="text" name="nama_kegiatan" class="form-control mb-2"
                                    placeholder="Masukan Nama Kegiatan" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group col-sm-12 mb-0">
                            <label class="control-label">Foto Kegiatan</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="foto">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 mb-0">
                            <label class="control-label">Tanggal Mulai Kegiatan</label>
                            <div class="">
                                <input type="datetime-local" name="tanggal_mulai" class="form-control" required><br>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 mb-0">
                            <label class="control-label">Tanggal Akhir Kegiatan</label>
                            <div class="">
                                <input type="datetime-local" name="tanggal_akhir" class="form-control"><br>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 mb-0">
                            <label class="control-label">Deskripsi Kegiatan</label>
                            <div class="">
                                <textarea type="text" name="deskripsi" class="form-control"
                                    placeholder="Masukan Deskripsi Kegiatan" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-danger text-bold w-25" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success text-bold w-25">Simpan</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <?php $this->load->view('style/js')?>
    <!-- <script src="<?php echo base_url('builder/plugins/jquery/jquery.slim.min.js') ?>"></script> -->
    <script>
    <?php if ($this->session->flashdata('bisa')): ?>
    swal.fire({
        title: "<?php echo $this->session->flashdata('bisa')?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1500,
    });
    <?php if (isset($_SESSION['bisa'])) {
            unset($_SESSION['bisa']);
        }
    endif; ?>

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
                    window.location.href = "<?php echo base_url('kegiatan/delete/')?>" + id;
                });
            }
        });
    }

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
</body>

</html>