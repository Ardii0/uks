<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Petugas Alumni</title>
    <?php $this->load->view('petugasalumni/style/head') ?>
    <style>
        td:nth-child(1) {
            width: 20%;
        }
        td:nth-child(2) {
            width: 5%;
            text-align: center;
        }
        td:nth-child(3) {
            width: 45%;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('petugasalumni/style/navbar') ?>
        <?php $this->load->view('petugasalumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profil Alumni</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('PetugasAlumni/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('PetugasAlumni/data_angkatan') ?>">...</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('PetugasAlumni/detail_data_angkatan/'.$tahun_lulus) ?>">...</a></li>
                                <li class="breadcrumb-item active">Profil Alumni</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <div class="row">
                        <div class="col m-2 mt-3">
                            <h3>Data Alumni Lulusan Tahun <?php echo $tahun_lulus?></h3>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12 mb-3">
                            <div class="body table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>
                                        <tr class="bg-teal">
                                            <th colspan="4">Data Pribadi</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nama</td>
                                            <td>: </td>
                                            <td><?php echo tampil_nama_siswa_byid($id_daftar); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Program Studi</td>
                                            <td>: </td>
                                            <td><?php echo $jurusan_sekolah; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Jenis Kelamin</td>
                                            <td>: </td>
                                            <td><?php echo tampil_jekel_siswa_byid($id_daftar); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Tempat Tanggal Lahir</td>
                                            <td>: </td>
                                            <td><?php echo tampil_tempat_lahir_siswa_byid($id_daftar).', '.ChangeDateFormat('d F Y',tampil_tanggal_lahir_siswa_byid($id_daftar)); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">No. NIK</td>
                                            <td>: </td>
                                            <td><?php echo $nik; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Alamat Domisili</td>
                                            <td>: </td>
                                            <td><?php echo $alamat; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">No Telp.</td>
                                            <td>: </td>
                                            <td><?php echo $no_telp; ?></td>
                                        </tr>
                                        
                                        <tr class="bg-teal">
                                            <th colspan="4">Data Kelulusan</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Tahun Lulus</td>
                                            <td>: </td>
                                            <td><?php echo $tahun_lulus; ?></td>
                                        </tr>
                                        <tr class="bg-teal">
                                            <th colspan="4">Status</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Status</td>
                                            <td>: </td>
                                            <td><?php echo $status; ?></td>
                                        </tr>
                                        <tr class="bg-teal">
                                            <th colspan="4">Detail Kerja</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nama Instansi</td>
                                            <td>: </td>
                                            <td><?php echo $nama_instansi; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Jabatan</td>
                                            <td>: </td>
                                            <td><?php echo $jabatan; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Tahun Kerja</td>
                                            <td>: </td>
                                            <td><?php echo $tanggal_kerja; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nama Instansi 2</td>
                                            <td>: </td>
                                            <td><?php echo $nama_instansi2; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Jabatan 2</td>
                                            <td>: </td>
                                            <td><?php echo $jabatan2; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Tahun Kerja 2</td>
                                            <td>: </td>
                                            <td><?php echo $tanggal_kerja2; ?></td>
                                        </tr>
                                        <tr class="bg-teal">
                                            <th colspan="4">Detail Wirausaha</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nama Usaha</td>
                                            <td>: </td>
                                            <td><?php echo $nama_usaha; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Jenis Usaha</td>
                                            <td>: </td>
                                            <td><?php echo $jenis_usaha; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Tahun Usaha</td>
                                            <td>: </td>
                                            <td><?php echo $tahun_usaha; ?></td>
                                        </tr>
                                        <tr class="bg-teal">
                                            <th colspan="4">Detail Perguruan Tinggi</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nama Perguruan Tinggi</td>
                                            <td>: </td>
                                            <td><?php echo $nama_perguruan; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Jurusan</td>
                                            <td>: </td>
                                            <td><?php echo $jurusan; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Tahun Masuk Perguruan Tinggi</td>
                                            <td>: </td>
                                            <td><?php echo $tahun_perguruan; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="<?php echo base_url('PetugasAlumni/detail_data_angkatan/'.$tahun_lulus) ?>">
                                    <button type="button" class="btn btn-info">Kembali</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('petugasalumni/style/js') ?>
</body>

</html>