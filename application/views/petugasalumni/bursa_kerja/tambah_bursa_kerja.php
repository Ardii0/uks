<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bursa Kerja</title>
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
                            <h1>Tambah Bursa Kerja</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('PetugasAlumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('PetugasAlumni/bursa_kerja') ?>">Bursa Kerja</a></li>
                                <li class="breadcrumb-item active">Form Bursa Kerja</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white p-4 mx-4">
                <div class="container-fluid">
                    <form action="<?php echo base_url('PetugasAlumni/aksi_tambah_bursa_kerja') ?>" enctype="multipart/form-data" method="post">
                        <div class="form-group mb-4">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <label class="control-label">Nama Badan Usaha</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="nama_perusahaan" class="form-control"
                                        placeholder="Masukan Nama Badan Usaha">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Bidang Usaha</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="bidang_usaha" class="form-control"
                                        placeholder="Masukan Bidang Usaha">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Judul Lowongan</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="job_title" class="form-control"
                                        placeholder="Masukan Judul Lowongan">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Gambar</label>
                                </div>
                                <div class="col">
                                    <input type="file" name="gambar">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Akhir Waktu Pendaftaran</label>
                                </div>
                                <div class="col">
                                    <input type="date" name="akhir_waktu" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <label class="control-label">Deskripsi</label>
                                </div>
                                <div class="col">
                                    <textarea name="deskripsi" id="ckeditor" class="form-control"
                                        placeholder="Masukan Deskripsi*"></textarea>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Data Ditampilkan?</label>
                                </div>
                                <div class="col">
                                    <select name="is_tampil" class="form-control">
                                        <option>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
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
                            <input type="text" value="<?php echo $dt->id_level ?>" name="id_user" class="form-control" hidden>
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