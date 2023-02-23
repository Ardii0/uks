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
                <div class="container-fluid p-3 bg-white">
                    <div class="row">
                        <div class="col-4">
                            <div>
                                <label for="id-daftar" class="mr-3">
                                    Tahun Ajaran
                                </label>
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Tahun Ajaran" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <label for="jenjang" class="mr-3">
                                    Jenjang
                                </label>
                            </div>
                            <div>
                                <select class="form-control form-select px-2 py-1" aria-label="Default select example">
                                    <option selected>Pilih Jenjang</option>
                                    <?php $id = 0;foreach ($data_jenjang as $row): $id++;?>
                                    <option value="<?php echo $row->id_jenjang ?>"><?php echo $row->nama_jenjang ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <label for="id-daftar" class="mr-3">
                                    Tanggal Daftar
                                </label>
                            </div>
                            <div>
                                <input type="text" placeholder="Tanggal Daftar" class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <label for="nama-lengkap" class="mr-3">
                                    Nama Lengkap
                                </label>
                            </div>
                            <div>
                                <input id="nama-lengkap" type="text" class="form-control" placeholder="Nama Lengkap">
                                </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label for="jenjang" class="mr-3">
                                    Agama
                                </label>
                            </div>
                            <div>
                                <select id="jenjang" class="form-control form-select px-2 py-1"
                                    aria-label="Default select example">
                                    <option selected>Pilih Agama</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div>
                                <label for="nisn" class="mr-3">
                                    NISN
                                </label>
                            </div>
                            <div>
                                <input id="nisn" type="number" class="form-control" placeholder="NISN">
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div>
                                <label for="tlpn" class="mr-3">
                                    No Telepon
                                </label>
                            </div>
                            <div>
                                <input id="tlpn" type="number" class="form-control" placeholder="No Telepon">
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div>
                                <label class="mr-3">
                                    Jenis Kelamin
                                </label>
                            </div>
                            <div class="d-flex items-center">
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div>
                                <label for="alamat" class="mr-3">
                                    Alamat
                                </label>
                            </div>
                            <div>
                                <input id="alamat" type="text" class="form-control" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div>
                                <label for="tempat-lahir" class="mr-3">
                                    Tempat Lahir
                                </label>
                            </div>
                            <div>
                                <input id="tempat-lahir" type="text" class="form-control" placeholder="Tempat Lahir">
                                </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div>
                                <label for="tanggal-lahir" class="mr-3">
                                    Tanggal Lahir
                                </label>
                            </div>
                            <div>
                                <input id="tanggal-lahir" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div>
                                <div>
                                    <label class="mr-3">
                                        Foto Siswa
                                    </label>
                                </div>
                                <div>
                                    <input type="file" onchange="readURL(this);" />
                                </div>
                                <div>
                                    <img id="blah" src="#" alt="Image Preview" width="300" class="mt-3" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    </script>
</body>

</html>