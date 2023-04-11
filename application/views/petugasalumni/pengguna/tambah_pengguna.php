<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <?php $this->load->view('petugasalumni/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('petugasalumni/style/navbar') ?>
        <?php $this->load->view('petugasalumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Pengguna</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('PetugasAlumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('PetugasAlumni/pengguna') ?>">Pengguna</a></li>
                                <li class="breadcrumb-item active">Form Tambah Pengguna</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white p-4 mx-4">
                <div class="container-fluid">
                    <form action="<?php echo base_url('PetugasAlumni/aksi_tambah_pengguna') ?>" method="post">
                        <div class="form-group mb-4">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <label class="control-label">Username</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="username" class="form-control"
                                        placeholder="Masukan Username">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">email</label>
                                </div>
                                <div class="col">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Masukan Email">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Password</label>
                                </div>
                                <div class="col">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Masukan Password">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Role</label>
                                </div>
                                <div class="col">
                                    <select name="level" class="form-control">
                                        <option>-- Pilih Role --</option>
                                        <option value="PetugasAlumni">PetugasAlumni</option>
                                        <option value="Alumni">Alumni</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Hak Akses</label>
                                </div>
                                <div class="col">
                                    <select name="id_hak_akses" class="form-control">
                                        <option>-- Pilih Hak Akses --</option>
                                        <option value="7">PetugasAlumni</option>
                                        <option value="8">Alumni</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-between mt-4">
                            <div class="">
                                <button type="button" onClick="kembali()" class="btn bg-gray"
                                    style="width: 150px; margin-right: 12px;">Kembali</button>
                            </div>
                            <div class="">
                                <button type="submit" class="btn bg-blue"
                                    style="width: 150px; margin-right: 12px;">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <?php $this->load->view('petugasalumni/style/js')?>
    <script>
    function kembali() {
        window.history.go(-1);
    }
    </script>
</body>

</html>