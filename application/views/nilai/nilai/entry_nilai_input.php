<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai</title>
    <?php $this->load->view('nilai/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
    <?php $this->load->view('nilai/style/navbar')?>
    <?php $this->load->view('nilai/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Entry Nilai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Nilai/modul_input_nilai') ?>">Input Nilai </a>
                                </li>
                                <li class="breadcrumb-item active">Entry</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid shadow p-3 mb-5 bg-white rounded">
                    <div class="p-3 h5">
                        <?php foreach ($mapelById as $showmapel): ?>
                            <p><?php echo $showmapel->nama_mapel ?></p>
                        <?php endforeach; ?>
                        <p class="mt-n2 d-flex">
                            <?php foreach ($rombel as $information): ?>
                                 <?php echo $information->nama_rombel ?>
                            <?php endforeach; ?>
                            <?php foreach ($semester as $smt): ?>
                                <span>&nbsp;
                                 (Semester <?php echo $smt->semester ?>)
                                </span>
                            <?php endforeach; ?>
                        </p>
                    </div>
                    <div class="row px-1">
                        <div class="col">
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th style="width: 50px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach ($row as $data): $id++; ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo tampil_nisndaftar_ByIdSiswa($data->id_siswa) ?></td>
                                                <td class="text-truncate" style="max-width: 150px;"><?php echo $data->nama ?></td>
                                                <td>
                                                    <?php foreach ($mapelById as $mapel): ?>
                                                        <?php foreach ($semester as $smt): ?>
                                                            <a href="<?php echo base_url(['Nilai/input_session/'.$mapel->id_mapel.'/'.$data->id_rombel.'/'.$smt->semester.'/'.$data->id_siswa]) ?>" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </a>
                                                        <?php endforeach; ?>
                                                    <?php endforeach; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <form class="" action="<?php echo base_url('Nilai/tambah_nilai') ?>" enctype="multipart/form-data" method="post">
                                <div class="row card-body">
                                    <?php foreach ($semester as $inputsmt): ?>
                                        <input type="hidden" name="id_semester" value="<?php echo $inputsmt->semester ?>">
                                    <?php endforeach; ?>
                                    <?php foreach ($mapelById as $inputmapel): ?>
                                        <input type="hidden" name="id_mapel" value="<?php echo $inputmapel->id_mapel ?>">
                                    <?php endforeach; ?>
                                    <?php foreach ($siswa as $inputdata): ?>
                                        <div class="col-1 font-weight-bold">Nama</div>
                                        <div class="col-5 text-truncate" style="max-width: 210px;">: <?php echo tampil_namadaftar_ByIdSiswa($inputdata->id_siswa) ?></div>
                                        <input type="hidden" name="id_siswa" value="<?php echo $inputdata->id_siswa ?>">
                                        <input type="hidden" name="id_rombel" value="<?php echo $inputdata->id_rombel ?>">
                                        <div class="col-1 font-weight-bold">NISN</div>
                                        <div class="col-5">: <?php echo tampil_nisndaftar_ByIdSiswa($inputdata->id_siswa) ?></div>
                                    <?php endforeach; ?>
                                    <div class="col-6 mt-3">
                                        <div class="form-group">
                                            <label class="control-label">NUH1</label>
                                            <div>
                                                <input type="number" name="nuh1" class="form-control"
                                                    placeholder="Masukan Nilai Ulangan Harian 1"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NUH2</label>
                                            <div>
                                                <input type="number" name="nuh2" class="form-control"
                                                    placeholder="Masukan Nilai Ulangan Harian 2"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NUH3</label>
                                            <div>
                                                <input type="number" name="nuh3" class="form-control"
                                                    placeholder="Masukan Nilai Ulangan Harian 3"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">MID</label>
                                            <div>
                                                <input type="number" name="mid" class="form-control"
                                                    placeholder="Masukan Nilai Ujian Tengah Semester"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">RNUH</label>
                                            <div>
                                                <input type="number" name="rnuh" class="form-control"
                                                    placeholder="Nilai Rata-Rata Ulangan Harian" disabled><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NH</label>
                                            <div>
                                                <input type="number" name="nh" class="form-control"
                                                    placeholder="Rata-Rata Tugas dan Ulangan Harian" disabled><br>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="form-group">
                                            <label class="control-label">NT1</label>
                                            <div>
                                                <input type="number" name="nt1" class="form-control"
                                                    placeholder="Masukan Nilai Tugas 1"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NT2</label>
                                            <div>
                                                <input type="number" name="nt2" class="form-control"
                                                    placeholder="Masukan Nilai Tugas 2"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NT3</label>
                                            <div>
                                                <input type="number" name="nt3" class="form-control"
                                                    placeholder="Masukan Nilai Tugas 3"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">SMT</label>
                                            <div>
                                                <input type="number" name="smt" class="form-control"
                                                    placeholder="Masukan Nilai Ujian Akhir Semester"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">RNT</label>
                                            <div>
                                                <input type="number" name="rnt" class="form-control"
                                                    placeholder="Nilai Rata-Rata Tugas" disabled><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NAR</label>
                                            <div>
                                                <input type="number" name="nar" class="form-control"
                                                    placeholder="Nilai Keseluruhan" disabled><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view('nilai/style/js')?>

</body>

</html>