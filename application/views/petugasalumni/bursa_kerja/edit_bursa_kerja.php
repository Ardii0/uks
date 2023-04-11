<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bursa Kerja</title>
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
                            <h1>Edit Bursa Kerja</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('PetugasAlumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('PetugasAlumni/bursa_kerja') ?>">Bursa Kerja</a></li>
                                <li class="breadcrumb-item active">Edit Bursa Kerja</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white p-4 mx-4">
                <?php foreach ($bursa_kerja as $data): ?>
                <div class="container-fluid">
                    <form action="<?php echo base_url('PetugasAlumni/aksi_edit_bursa_kerja') ?>"
                        enctype="multipart/form-data" method="post">
                        <div class="form-group mb-4">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <label class="control-label">Nama Badan Usaha</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="nama_perusahaan"
                                        value="<?php echo $data->nama_perusahaan ?>" class="form-control"
                                        placeholder="Masukan Nama Badan Usaha">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Bidang Usaha</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="bidang_usaha" value="<?php echo $data->bidang_usaha ?>"
                                        class="form-control" placeholder="Masukan Bidang Usaha">
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Judul Lowongan</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="job_title" value="<?php echo $data->job_title ?>"
                                        class="form-control" placeholder="Masukan Judul Lowongan">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <label class="control-label">Gambar</label>
                                </div>
                                <div class="col">
                                    <input type="file" name="gambar" onchange="readURL(this);">
                                    <div class="row mt-2">
                                        <div class="col-3">
                                            <div>Foto Sebelum :</div>
                                            <img src="<?php echo base_url('uploads/petugas_alumni/bursa_kerja/').$data->gambar;?>"
                                                width="140" />
                                        </div>
                                        <div class="col-6">
                                            <div>Foto Sesudah :</div>
                                            <img id="blah" name="foto" width="140" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Akhir Waktu Pendaftaran</label>
                                </div>
                                <div class="col">
                                    <input type="date" name="akhir_waktu" value="<?php echo $data->akhir_waktu ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-2">
                                    <label class="control-label">Deskripsi</label>
                                </div>
                                <div class="col">
                                    <textarea name="deskripsi" id="ckeditor" class="form-control"
                                        placeholder="Masukan Deskripsi*"><?php echo $data->deskripsi ?></textarea>
                                </div>
                            </div>
                            <div class="row align-items-center mt-4">
                                <div class="col-2">
                                    <label class="control-label">Data Ditampilkan?</label>
                                </div>
                                <div class="col">
                                    <select name="is_tampil" class="form-control">
                                        <option style="display: none;" value="<?php echo $data->is_tampil ?>">
                                            <?php echo $data->is_tampil ?></option>
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
                                <input type="text" value="<?php echo $data->id_lowongan ?>" name="id_lowongan"
                                    class="form-control" hidden>
                                <input type="text" value="<?php echo $dt->id_level ?>" name="id_user"
                                    class="form-control" hidden>
                                <button type="submit" class="btn bg-blue"
                                    style="width: 150px; margin-right: 12px;">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endforeach ?>
            </section>
        </div>
    </div>

    <?php $this->load->view('petugasalumni/style/js')?>
    <script>
    function kembali() {
        window.history.go(-1);
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