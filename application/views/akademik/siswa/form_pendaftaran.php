<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php $this->load->view('akademik/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Form Pendaftaran Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Akademik/siswa_pendaftaran') ?>">Pendaftaran</a>
                                </li>
                                <li class="breadcrumb-item active">Form Pendaftaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <form action="<?php echo base_url('Akademik/aksi_tambah_pendaftaran_siswa') ?>"
                    enctype="multipart/form-data" method="post">
                    <div class="container-fluid p-3 bg-white">
                        <div class="row">
                            <div class="col-3">
                                <div>
                                    <label for="id-daftar" class="mr-3">
                                        Tahun Ajaran
                                    </label>
                                </div>
                                <div>
                                    <select name="id_angkatan" class="form-control select2 select2-info"
                                        data-dropdown-css-class="select2-info">
                                        <option selected>Pilih Tahun Ajaran</option>
                                        <?php $id = 0;foreach ($tahun_ajaran_aktif as $row): $id++;?>
                                        <option value="<?php echo $row->id_angkatan ?>"><?php echo $row->kd_angkatan ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <label for="id-daftar" class="mr-3">
                                        Tanggal Daftar
                                    </label>
                                </div>
                                <div>
                                    <input type="date" name="tgl_daftar" class="form-control"
                                        placeholder="Tahun Ajaran">
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <label for="jenjang" class="mr-3">
                                        Jenjang
                                    </label>
                                </div>
                                <div>
                                    <input type="text" value="<?php echo $data_jenjang[0]->nama_jenjang ?>" class="form-control" disabled>
                                    <input type="text" name="id_jenjang" value="<?php echo $data_jenjang[0]->id_jenjang ?>" class="form-control" hidden>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <label for="asal_sekolah" class="mr-3">
                                        Asal Sekolah
                                    </label>
                                </div>
                                <div>
                                    <input id="asal_sekolah" type="text" name="asal_sekolah" class="form-control"
                                        placeholder="Asal Sekolah">
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-4">
                                <div>
                                    <label for="nik" class="mr-3">
                                        No. NIK
                                    </label>
                                </div>
                                <div>
                                    <input id="nik" type="number" name="nik" class="form-control"
                                        placeholder="NIK Siswa">
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label for="kk" class="mr-3">
                                        No. KK
                                    </label>
                                </div>
                                <div>
                                    <input id="kk" type="number" name="kk" class="form-control" placeholder="No KK">
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label for="nisn" class="mr-3">
                                        NISN
                                    </label>
                                </div>
                                <div>
                                    <input id="nisn" type="number" name="nisn" class="form-control" placeholder="NISN">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="nama-lengkap" class="mr-3">
                                        Nama Lengkap
                                    </label>
                                </div>
                                <div>
                                    <input id="nama-lengkap" type="text" name="nama" class="form-control"
                                        placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="jenjang" class="mr-3">
                                        Agama
                                    </label>
                                </div>
                                <div>
                                    <select id="agama" name="agama" class="form-control select2 select2-info"
                                        data-dropdown-css-class="select2-info">
                                        <option selected>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Konghucu">Konghucu</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="tlpn" class="mr-3">
                                        No Telepon
                                    </label>
                                </div>
                                <div>
                                    <input id="tlpn" type="number" name="telepon" class="form-control"
                                        placeholder="No Telepon">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="alamat" class="mr-3">
                                        Alamat
                                    </label>
                                </div>
                                <div>
                                    <input id="alamat" type="text" name="alamat" class="form-control"
                                        placeholder="Alamat">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="tempat-lahir" class="mr-3">
                                        Tempat Lahir
                                    </label>
                                </div>
                                <div>
                                    <input id="tempat-lahir" type="text" name="tempat_lahir" class="form-control"
                                        placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="anak" class="mr-3">
                                        Anak Ke
                                    </label>
                                </div>
                                <div>
                                    <input id="anak" type="number" name="anak_ke" class="form-control"
                                        placeholder="Anak Ke">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="ayah" class="mr-3">
                                        Nama Ayah
                                    </label>
                                </div>
                                <div>
                                    <input id="ayah" type="text" name="ayah" class="form-control"
                                        placeholder="Nama Ayah">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="pekerjaan_ayah" class="mr-3">
                                        Pekerjaan Ayah
                                    </label>
                                </div>
                                <div>
                                    <input id="pekerjaan_ayah" type="text" name="pekerjaan_ayah" class="form-control"
                                        placeholder="Pekerjaan Ayah">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="gaji_ayah" class="mr-3">
                                        Gaji Ayah
                                    </label>
                                </div>
                                <div>
                                    <select id="gaji_ayah" name="gaji_ayah" class="form-control">
                                        <option selected>Pilih</option>
                                        <option value="kurang dari 1jt">kurang dari 1jt</option>
                                        <option value="1jt - 2jt">1jt - 2jt</option>
                                        <option value="2jt - 3jt">2jt - 3jt</option>
                                        <option value="3jt - 4jt">3jt - 4jt</option>
                                        <option value="4jt - 5jt">4jt - 5jt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="ibu" class="mr-3">
                                        Nama Ibu
                                    </label>
                                </div>
                                <div>
                                    <input id="ibu" type="text" name="ibu" class="form-control" placeholder="Nama Ibu">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="pekerjaan_ibu" class="mr-3">
                                        Pekerjaan Ibu
                                    </label>
                                </div>
                                <div>
                                    <input id="pekerjaan_ibu" type="text" name="pekerjaan_ibu" class="form-control"
                                        placeholder="Pekerjaan Ayah">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="gaji_ibu" class="mr-3">
                                        Gaji Ibu
                                    </label>
                                </div>
                                <div>
                                    <select id="gaji_ibu" name="gaji_ibu" class="form-control">
                                        <option selected>Pilih</option>
                                        <option value="kurang dari 1jt">kurang dari 1jt</option>
                                        <option value="1jt - 2jt">1jt - 2jt</option>
                                        <option value="2jt - 3jt">2jt - 3jt</option>
                                        <option value="3jt - 4jt">3jt - 4jt</option>
                                        <option value="4jt - 5jt">4jt - 5jt</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label for="tanggal-lahir" class="mr-3">
                                        Tanggal Lahir
                                    </label>
                                </div>
                                <div>
                                    <input id="tanggal-lahir" name="tgl_lahir" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <label class="mr-3">
                                        Jenis Kelamin
                                    </label>
                                </div>
                                <div class="d-flex mt-2">
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" value="L" type="radio" name="jekel" id="jekel">
                                        <label class="form-check-label" for="jekel">
                                            Laki-Laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="P" type="radio" name="jekel" id="jekel1">
                                        <label class="form-check-label" for="jekel1">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mt-2">
                                <div>
                                    <div>
                                        <label class="mr-3">
                                            Foto Siswa
                                        </label>
                                    </div>
                                    <div>
                                        <input type="file" name="foto" onchange="readURL(this);" />
                                    </div>
                                    <div>
                                        <img id="blah" width="300" class="mt-3" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 box-footer d-flex justify-content-between">
                            <button type="button" onClick="kembali()" class="w-25 btn btn-secondary">Kembali</button>
                            <button type="submit" class="w-25 btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
    <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function kembali() {
        window.history.go(-1);
    }
    </script>
</body>

</html>