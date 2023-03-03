<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Nilai</title>
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
                        <?php foreach ($mapel as $information): ?>
                            <p><?php echo tampil_mapelById($information->id_mapel) ?></p>
                        <?php endforeach; ?>
                        <?php foreach ($siswa as $informationsiswa): ?>
                            <p class="mt-n2 d-flex">
                                <span>
                                 <?php echo tampil_kelasdaftar_ByIdSiswa($informationsiswa->id_siswa) ?> 
                                </span>
                                <span>&nbsp;
                                 <?php echo tampil_rombeldaftar_ByIdSiswa($informationsiswa->id_siswa) ?>
                                </span>
                                <span>&nbsp;
                                 (Semester 1)
                                </span></p>
                        <?php endforeach; ?>
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
                                        <tr>
                                            <td>1</td>
                                            <td>1809599001</td>
                                            <td class="text-truncate" style="max-width: 150px;">Budi Santoso Ibra</td>
                                            <td>
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <form class="" action="<?php echo base_url('Nilai/tambah_anggota') ?>" enctype="multipart/form-data" method="post">
                                <div class="row card-body">
                                    <?php foreach ($siswa as $data): ?>
                                        <div class="col-1 font-weight-bold">Nama</div>
                                        <div class="col-5 text-truncate" style="max-width: 210px;">: <?php echo tampil_namadaftar_ByIdSiswa($data->id_siswa) ?></div>
                                        <div class="col-1 font-weight-bold">NISN</div>
                                        <div class="col-5">: <?php echo tampil_nisndaftar_ByIdSiswa($data->id_siswa) ?></div>
                                    <?php endforeach; ?>
                                    <div class="col-6 mt-3">
                                        <div class="form-group">
                                            <label class="control-label">NUH1</label>
                                            <div>
                                                <input type="number" name="nuh1" class="form-control"
                                                    placeholder="Masukan Nilai PR"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NUH2</label>
                                            <div>
                                                <input type="number" name="nuh2" class="form-control"
                                                    placeholder="Masukan Nilai PR"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NUH3</label>
                                            <div>
                                                <input type="number" name="nuh3" class="form-control"
                                                    placeholder="Masukan Nilai PR"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">MID</label>
                                            <div>
                                                <input type="number" name="mid" class="form-control"
                                                    placeholder="Masukan Nilai PR"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">RNUH</label>
                                            <div>
                                                <input type="number" name="rnuh" class="form-control"
                                                    placeholder="Masukan Nilai PR" disabled><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NH</label>
                                            <div>
                                                <input type="number" name="nh" class="form-control"
                                                    placeholder="Masukan Nilai PR" disabled><br>
                                            </div>
                                        </div>
                                        <button type="submit">simpan</button>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <div class="form-group">
                                            <label class="control-label">NT1</label>
                                            <div>
                                                <input type="number" name="nt1" class="form-control"
                                                    placeholder="Masukan Nilai Ulangan Harian"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NT2</label>
                                            <div>
                                                <input type="number" name="nt2" class="form-control"
                                                    placeholder="Masukan Nilai Ulangan Harian"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NT3</label>
                                            <div>
                                                <input type="number" name="nt3" class="form-control"
                                                    placeholder="Masukan Nilai Ulangan Harian"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">SMT</label>
                                            <div>
                                                <input type="number" name="smt" class="form-control"
                                                    placeholder="Masukan Nilai Ulangan Harian"><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">RNT</label>
                                            <div>
                                                <input type="number" name="rnt" class="form-control"
                                                    placeholder="Masukan Nilai Ulangan Harian" disabled><br>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">NAR</label>
                                            <div>
                                                <input type="number" name="nar" class="form-control"
                                                    placeholder="Masukan Nilai Ulangan Harian" disabled><br>
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