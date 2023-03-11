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
                            <h1>Hak Akses</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Admin/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Admin/setting') ?>">Setting</a>
                                </li>
                                <li class="breadcrumb-item active">Hak Akses</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <?php foreach ($user as $data): ?>
                <!-- START CONDITIONAL -->
                <?php 
                    $level = "Guru"; 
                    $guru = $level == $data->level ? "checked='true'" : "";
                ?>
                <?php 
                    $level = "TU"; 
                    $keuangan = $level == $data->level ? "checked='true'" : "";
                ?>
                <?php 
                    $levelperpus = "PetugasPerpus"; 
                    $perpus = $levelperpus == $data->level ? "checked='true'" : "";
                ?>
                <?php 
                    $level = "Kesiswaan"; 
                    $akademik = $level == $data->level ? "checked='true'" : "";
                ?>
                <!-- END CONDITIONAL -->
                <div class="container-fluid bg-white shadow p-2">
                    <div class="row">
                        <div class="col-6 h5 mt-1">binusa@gmail.com</div>
                        <div class="col-6">
                            <button type="button" class="btn btn-success float-right">Simpan</button>
                        </div>
                        <div class="col-4">
                            <div class="font-weight-bold">
                                <!-- <?php echo $data->level ?> -->
                                Akademik
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="tahun_ajaran"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="tahun_ajaran">
                                    Tahun Ajaran
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="jenjang"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="jenjang">
                                    Jenjang
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="kelas"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="kelas">
                                    Kelas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="rombel"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="rombel">
                                    Rombel
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="guru"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="guru">
                                    Guru
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pendaftaran_siswa"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="pendaftaran_siswa">
                                    Pendaftaran Siswa
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pembagian_siswa"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="pembagian_siswa">
                                    Pembagian Siswa
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="data_siswa"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="data_siswa">
                                    Data Siswa
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="mutasi_siswa"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="mutasi_siswa">
                                    Mutasi Siswa
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="mata_pelajaran"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="mata_pelajaran">
                                    Mata Pelajaran
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="jenis_mata_pelajaran"
                                    <?php echo $akademik; ?>>
                                <label class="form-check-label" for="jenis_mata_pelajaran">
                                    Jenis Mata Pelajaran
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="font-weight-bold">Perpustakaan</div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="data_rak_buku"
                                    <?php echo $perpus; ?>>
                                <label class="form-check-label" for="data_rak_buku">
                                    Data Rak Buku
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="daftar_buku"
                                    <?php echo $perpus; ?>>
                                <label class="form-check-label" for="daftar_buku">
                                    Daftar Buku
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form_input_buku"
                                    <?php echo $perpus; ?>>
                                <label class="form-check-label" for="form_input_buku">
                                    Form Input Buku
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="kategoi_buku"
                                    <?php echo $perpus; ?>>
                                <label class="form-check-label" for="kategoi_buku">
                                    Kategori Buku
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="daftar_anggota"
                                    <?php echo $perpus; ?>>
                                <label class="form-check-label" for="daftar_anggota">
                                    Daftar Anggota
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form_input_anggota"
                                    <?php echo $perpus; ?>>
                                <label class="form-check-label" for="form_input_anggota">
                                    Form Input Anggota
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cetak_kartu_anggota"
                                    <?php echo $perpus; ?>>
                                <label class="form-check-label" for="cetak_kartu_anggota">
                                    Cetak Kartu Anggota
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="peminjaman"
                                    <?php echo $perpus; ?>>
                                <label class="form-check-label" for="peminjaman">
                                    Peminjaman
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pengembalian"
                                    <?php echo $perpus; ?>>
                                <label class="form-check-label" for="pengembalian">
                                    Pengembalian
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="font-weight-bold">Keuangan</div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="rencana_anggaran"
                                    <?php echo $keuangan; ?>>
                                <label class="form-check-label" for="rencana_anggaran">
                                    Rencana Anggaran
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="akun"
                                    <?php echo $keuangan; ?>>
                                <label class="form-check-label" for="akun">
                                    Akun
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="dana_masuk_keluar"
                                    <?php echo $keuangan; ?>>
                                <label class="form-check-label" for="dana_masuk_keluar">
                                    Dana Masuk & Keluar
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="jurnal_penyesuaian"
                                    <?php echo $keuangan; ?>>
                                <label class="form-check-label" for="jurnal_penyesuaian">
                                    Jurnal Penyesuain
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="laporan_keuangan"
                                    <?php echo $keuangan; ?>>
                                <label class="form-check-label" for="laporan_keuangan">
                                    Laporan Keuangan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="pembayaran"
                                    <?php echo $keuangan; ?>>
                                <label class="form-check-label" for="pembayaran">
                                    Pembayaran
                                </label>
                            </div>
                        </div>
                        <div class="col-4 mt-3">
                            <div class="font-weight-bold">Nilai</div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="input_nilai"
                                    <?php echo $guru; ?>>
                                <label class="form-check-label" for="input_nilai">
                                    Modul Input Nilai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="data_nilai"
                                    <?php echo $guru; ?>>
                                <label class="form-check-label" for="data_nilai">
                                    Modul Data Nilai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="cetak_rapot"
                                    <?php echo $guru; ?>>
                                <label class="form-check-label" for="cetak_rapot">
                                    Cetak Rapot
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </section>
        </div>
    </div>
    <?php $this->load->view('petugas/style/js') ?>
</body>

</html>