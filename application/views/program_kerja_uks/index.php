<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Program Kerja UKS</title>
    <?php $this->load->view('style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar') ?>
        <?php $this->load->view('style/sidebar') ?>

        <div class="content-wrapper py-3">
            <section class="content">
                <div class="container-fluid mb-4">
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Program Kerja UKS</div>
                        </div>
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div class="grid gap-3">
                                <button class="btn btn-info" data-toggle="modal"
                                    data-target="#modal_tambah_program_kerja"><i class="fas fa-plus"></i>&nbsp;
                                    Tambah</button>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light shadow">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <table id="data-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;">No</th>
                                                <th>Foto</th>
                                                <th>Nama Program</th>
                                                <th>Tanggal Pelaksanaan</th>
                                                <th>Deskripsi Pelaksanaan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $id = 0;
                                            foreach ($program as $data):
                                                $id++; ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $id ?>
                                                    </td>
                                                    <td><img style="width: 70px; height:100px; "
                                                            src="<?php echo base_url('uploads/Program_Kerja_UKS/foto') . "/" . $data->foto; ?>">
                                                    </td>
                                                    <td>
                                                        <?php echo $data->nama_program ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data->tanggal ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $data->deskripsi ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-warning btn-sm" type="button"
                                                            data-toggle="modal" data-target="#modal<?php echo $data->id ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class='btn btn-danger btn-sm'
                                                            onClick="hapus_program(<?php echo $data->id ?>)">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Tambah Program Kerja -->
                <div class="modal fade" id="modal_tambah_program_kerja" tabindex="-1" role="dialog"
                    aria-labelledby="Modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('Program_Kerja_UKS/aksi_tambah_program') ?>"
                            enctype="multipart/form-data" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="Modal">Tambah Program Kerja</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-sm-12 mb-0">
                                        <label class="control-label">Nama Program</label>
                                        <div class="">
                                            <input type="text" name="nama_program" class="form-control mb-2"
                                                placeholder="Masukan Nama Program" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 mb-0">
                                        <label class="control-label">Foto Program</label>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="foto"
                                                onchange="readURL(this);">
                                            <label class="custom-file-label" for="customFile">Pilih File</label>
                                        </div>
                                        <div>
                                            <img id="blah" style="width: 110px; hight:200px" class="mt-3" />
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 mb-0">
                                        <label class="control-label">Tanggal Pelaksanaan</label>
                                        <div class="">
                                            <input type="datetime-local" name="tanggal" class="form-control"
                                                required><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 mb-0">
                                        <label class="control-label">Deskripsi Pelaksanaan</label>
                                        <div class="">
                                            <textarea type="text" name="deskripsi" class="form-control"
                                                placeholder="Masukan Deskripsi Pelaksanaan" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-danger text-bold w-25"
                                        data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success text-bold w-25">Simpan</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>

                <!-- Modal Edit Program Kerja -->
                <?php foreach ($program as $data): ?>
                    <div class="modal fade" id="modal<?php echo $data->id ?>" tabindex="-1" role="dialog"
                        aria-labelledby="Modal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="<?php echo base_url('Program_Kerja_UKS/aksi_edit_program') ?>"
                                enctype="multipart/form-data" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Modal">Edit Program Kerja</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?php echo $data->id ?>">
                                        <div class="form-group col-sm-12 mb-0">
                                            <label class="control-label">Nama Program</label>
                                            <div class="">
                                                <input type="text" name="nama_program" class="form-control mb-2"
                                                    value="<?php echo $data->nama_program ?>" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 mb-0">
                                            <label class="control-label">Foto Program</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="customFile" name="foto"
                                                    onchange="readURL(this);">
                                                <label class="custom-file-label" for="customFile">Pilih File</label>
                                            </div>
                                            <img src="<?php $img = $data->foto == null ? "" : base_url('uploads/Program_Kerja_UKS/foto') . "/" . $data->foto;
                                            echo $img ?>" style="width: 110px; hight:200px">
                                            <div>
                                                <img id="blah" style="width: 110px; hight:200px" class="mt-3" />
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 mb-0">
                                            <label class="control-label">Tanggal Pelaksanaan</label>
                                            <div class="">
                                                <input type="datetime-local" name="tanggal" class="form-control"
                                                    value="<?php echo $data->tanggal ?>" required><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 mb-0">
                                            <label class="control-label">Deskripsi Pelaksanaan</label>
                                            <div class="">
                                                <textarea type="text" name="deskripsi" class="form-control"
                                                    required><?php echo $data->deskripsi ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="btn btn-danger text-bold w-25"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success text-bold w-25">Simpan</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </div>
    <?php $this->load->view('style/js') ?>
    <?php if ($this->session->flashdata('sukses')): ?>
        <script>
            swal.fire({
                title: "<?php echo $this->session->flashdata('sukses') ?>",
                icon: "success",
                showConfirmButton: false,
                timer: 5000,
            });
        </script>
        <?php if (isset($_SESSION['sukses'])) {
            unset($_SESSION['sukses']);
        }
    endif; ?>
    <script>
        $('.trash').click(function () {
            var id = $(this).data('id');
            console.log(id);
            $('#modalDelete').attr('href', 'delete-cover.php?id=' + id);
        })

        function hapus_program(id) {
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
                        timer: 5000
                    }).then(function () {
                        window.location.href = "<?php echo base_url('Program_Kerja_UKS/hapus_program/') ?>" + id;
                    });
                }
            });
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>