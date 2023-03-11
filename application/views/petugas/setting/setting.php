<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>petugas</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('petugas/style/navbar') ?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('petugas/style/sidebar') ?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Setting</h1>
                            <!-- <?= $this->session->flashdata('message'); ?> -->
                            <!-- <?php foreach ($user as $row): ?>
                            <div><?php echo $row->password ?></div>
                            <?php endforeach ?> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Admin/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Setting</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow p-0">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                role="tab" aria-controls="nav-home" aria-selected="true">Hak Akses</a>
                            <a class="nav-item nav-link" id="nav-perpustakaan-tab" data-toggle="tab"
                                href="#nav-perpustakaan" role="tab" aria-controls="nav-perpustakaan"
                                aria-selected="false">Perpustakaan</a>
                            <a class="nav-item nav-link" id="nav-info-sekolah-tab" data-toggle="tab"
                                href="#nav-info-sekolah" role="tab" aria-controls="nav-info-sekolah"
                                aria-selected="false">Info Sekolah</a>
                            <a class="nav-item nav-link" id="nav-ubah-password-tab" data-toggle="tab"
                                href="#nav-ubah-password" role="tab" aria-controls="nav-ubah-password"
                                aria-selected="false">Ubah Password</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <table id="data-table2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th class="text-center">Hak Akses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach ($data_user as $row): $no++ ?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><?php echo $row->email ?></td>
                                        <td><?php echo $row->username ?></td>
                                        <td><?php echo $row->level ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('Admin/hak_akses/'.$row->id_level)?>"
                                                class="btn btn-success">
                                                <i class="fas fa-key"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="nav-perpustakaan" role="tabpanel"
                            aria-labelledby="nav-perpustakaan-tab">
                            <div class="row">
                                <?php  foreach ($setting_perpustakan as $row): ?>
                                <div class="col-6">
                                    <h4>Setting Maksimal Peminjaman (Hari)</h4>
                                    <hr />
                                    <h5><?php echo $row->maksimal_pengembalian_hari ?> Hari</h5>
                                </div>
                                <div class="col-6">
                                    <h4>Tarif Denda Keterlambatan Pengembalian Buku</h4>
                                    <hr />
                                    <h5>Rp.<?php echo $row->denda ?> </h5>
                                </div>
                                <div class="col-12 mt-3">
                                    <a href="<?php echo base_url('Admin/setting_perpustakaan')?>"
                                        class="btn btn-success float-right">
                                        <i class="fas fa-edit"></i>
                                        Edit</a>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-info-sekolah" role="tabpanel"
                            aria-labelledby="nav-info-sekolah-tab">
                            <?php  foreach ($sekolah as $data): ?>
                            <form action="<?php echo base_url('Admin/update_setting_sekolah') ?>"
                                enctype="multipart/form-data" method="post">
                                <input type="hidden" name="id_sekolah" class="form-control"
                                    value="<?php echo $data->id_sekolah ?>">
                                <input type="hidden" name="tanggal_regristasi" class="form-control"
                                    value="<?php echo $data->tanggal_regristasi ?>">
                                <div class="row">
                                    <div class="col-6 row mt-3">
                                        <div class="col-4 text-right font-weight-bold mt-1">Tanggal Registrasi</div>
                                        <div class="col-8 mt-1"><?php echo $data->tanggal_regristasi ?></div>
                                    </div>
                                    <div class="col-6 row mt-3">
                                        <div class="col-4 text-right font-weight-bold mt-1">Nama Sekolah</div>
                                        <div class="col-8">
                                            <input type="text" name="nama_sekolah" class="form-control"
                                                value="<?php echo $data->nama_sekolah ?>">
                                        </div>
                                    </div>
                                    <div class="col-6 row mt-3">
                                        <div class="col-4 text-right font-weight-bold mt-1">Nomor Telepon</div>
                                        <div class="col-8">
                                            <input required type="number" name="nomor_telepon" class="form-control"
                                                value="<?php echo $data->nomor_telepon ?>">
                                        </div>
                                    </div>
                                    <div class="col-6 row mt-3">
                                        <div class="col-4 text-right font-weight-bold mt-1">Email</div>
                                        <div class="col-8">
                                            <input required type="email" name="email_sekolah" class="form-control"
                                                value="<?php echo $data->email_sekolah ?>">
                                        </div>
                                    </div>
                                    <div class="col-6 row mt-3">
                                        <div class="col-4 text-right font-weight-bold mt-1">Alamat</div>
                                        <div class="col-8">
                                            <textarea name="alamat" cols="44" class="form-control"
                                                rows="3"><?php echo $data->alamat ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6 row mt-3">
                                        <div class="col-4 text-right font-weight-bold mt-1">Foto</div>
                                        <div class="row col-8">
                                            <div class="col-12 mb-2">
                                                <!-- <input required type="file" name="foto" class="mt-2" onchange="readURL(this);" /> -->
                                                <div class="custom-file">
                                                    <input required type="file" name="foto"
                                                        class="custom-file-input form-control" id="inputGroupFile02"
                                                        onchange="readURL(this);">
                                                    <label class="custom-file-label" for="inputGroupFile02"
                                                        aria-describedby="inputGroupFileAddon02">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>Foto Sebelum :</div>
                                                <img src="<?php echo base_url('uploads/admin/setting_sekolah')."/".$data->foto;?>"
                                                    width="140" />
                                            </div>
                                            <div class="col-6">
                                                <div>Foto Sesudah :</div>
                                                <img id="blah" width="140" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            <?php endforeach ?>
                        </div>
                        <div class="tab-pane fade" id="nav-ubah-password" role="tabpanel"
                            aria-labelledby="nav-ubah-password-tab">
                            <form action="<?= base_url('Admin/changepassword'); ?>" method="post">
                                <div>
                                    <div class="row mt-3">
                                        <div class="col-3 text-right font-weight-bold mt-1">Password</div>
                                        <div class="col-5">
                                            <input required type="password" name="current_password" class="form-control"
                                                placeholder="Password Anda">
                                            <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-3 text-right font-weight-bold mt-1">Password Baru</div>
                                        <div class="col-5">
                                            <input required type="password" name="password_baru" class="form-control"
                                                placeholder="Password Baru">
                                            <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-3 text-right font-weight-bold mt-1">Konfirmasi Password Baru
                                        </div>
                                        <div class="col-5">
                                            <input required type="password" name="password_baru2" class="form-control"
                                                placeholder="Konfirmasi Password Baru">
                                            <?= form_error('password_baru2', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-3"></div>
                                        <div class="col-5">
                                            <button type="submit" class="btn btn-primary">Ubah Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('petugas/style/js') ?>
    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Akademik/hapus_guru/') ?>" + id;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

</html>