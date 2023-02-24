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
                    <div class="row px-3 py-2 mb-2">
                        <div class="col-sm-6">
                            <h1>Form Edit Pendaftaran Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Akademik/siswa_pendaftaran') ?>">Pendaftaran</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Pendaftaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content px-3 pb-5">
            <?php foreach($data_siswa_daftar as $row ):?>
            <form action="<?php echo base_url('Akademik/update_pendaftaran') ?>" enctype="multipart/form-data" method="post">
                <div class="container-fluid">
                    <div class="row p-1">
                        <div class="col-3">
                            <div>
                                <label for="id-daftar" class="mr-3">
                                    Tahun Ajaran
                                </label>
                            </div>
                            <div>
                                <input type="text" value="TA 2023/2024" class="form-control" placeholder="Tahun Ajaran" disabled>
                            </div>
                        </div>
                        <div class="col-3">
                            <div>
                                <label for="jenjang" class="mr-3">
                                    Jenjang
                                </label>
                            </div>
                            <div>
                                <input type="number" value="<?php echo $row->id_jenjang?>" placeholder="ID Registrasi" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-3">
                            <div>
                                <label for="id-daftar" class="mr-3">
                                    ID Registrasi
                                </label>
                            </div>
                            <div>
                                <input type="number" value="<?php echo $row->no_reg?>" placeholder="ID Registrasi" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-3">
                            <div>
                                <label for="id-daftar" class="mr-3">
                                    Tanggal Daftar
                                </label>
                            </div>
                            <div>
                                <input type="date" value="<?php echo $row->tgl_daftar?>" name="tgl_daftar" class="form-control" placeholder="Tahun Ajaran">
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
                                <input id="nama-lengkap" value="<?php echo $row->nama?>" type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                                </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label for="jenjang" class="mr-3">
                                    Agama
                                </label>
                            </div>
                            <div>
                                <select id="agama" value="<?php echo $row->agama?>" name="agama" class="form-control form-select px-2 py-1"
                                    aria-label="Default select example">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
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
                                <input id="nisn" value="<?php echo $row->nisn?>" type="number" name="nisn" class="form-control" placeholder="NISN">
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div>
                                <label for="tlpn" class="mr-3">
                                    No Telepon
                                </label>
                            </div>
                            <div>
                                <input id="tlpn" type="number" value="<?php echo $row->telepon?>" name="telepon" class="form-control" placeholder="No Telepon">
                            </div>
                        </div>
                        <!-- <div class="col-6 mt-2">
                            <div>
                                <label class="mr-3">
                                    Jenis Kelamin
                                </label>
                            </div>
                            <div class="d-flex items-center">
                                <div class="form-check mr-3">
                                    <input class="form-check-input" value="L" type="radio" name="jekel"
                                        id="jekel">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="P" type="radio" name="jekel"
                                        id="jekel1">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-6 mt-2">
                            <div>
                                <label for="alamat" class="mr-3">
                                    Alamat
                                </label>
                            </div>
                            <div>
                                <input id="alamat" type="text" value="<?php echo $row->alamat?>" name="alamat" class="form-control" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div>
                                <label for="tempat-lahir" class="mr-3">
                                    Tempat Lahir
                                </label>
                            </div>
                            <div>
                                <input id="tempat-lahir" type="text" value="<?php echo $row->tempat_lahir?>" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div>
                                <label for="tanggal-lahir" class="mr-3">
                                    Tanggal Lahir
                                </label>
                            </div>
                            <div>
                                <input id="tanggal-lahir" value="<?php echo $row->tgl_lahir?>" name="tgl_lahir" type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                        <div class="mt-3 pb-4 box-footer d-flex justify-content-between">
                            <input type="hidden" value="<?php echo $row->id_daftar?>" name="id_daftar">
                            <button type="button" onClick="kembali()" class="w-25 btn btn-secondary">Kembali</button>
                            <button type="submit" class="w-25 btn btn-primary">Simpan</button>
                        </div>
                </div>
                </form>
                <?php endforeach ?>
            </section>
        </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
    <script type="text/javascript">
        function kembali()
    {
      window.history.go(-1);
    }
    </script>
</body>

</html>
