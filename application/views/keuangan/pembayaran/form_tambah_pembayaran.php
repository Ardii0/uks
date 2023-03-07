<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Keuangan</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('keuangan/style/navbar') ?>
        <?php $this->load->view('keuangan/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Pembayaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Keuangan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                    href="<?php echo base_url('Keuangan/pembayaran') ?>">Pembayaran</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Pembayaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow py-3 px-5">
                    <form class="row" action="<?php echo base_url('Keuangan/aksi_tambah_pembayaran') ?>" enctype="multipart/form-data" method="post">
                        <div class="col-5">
                            <?php $id=0; foreach ($siswa as $data): $id++; ?>
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold">ID Transaksi</div>
                                    <div class="col-8">
                                        Dicoba buat generate nanti hehe
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold">Nama</div>
                                    <div class="col-8">
                                        <?php echo tampil_namadaftar_ByIdSiswa($data->id_siswa) ;?>
                                        <input type="hidden" name="id_siswa" value="<?php echo $data->id_siswa ;?>">
                                        <input type="hidden" name="akuntan" value="<?php echo $dt->email ;?>">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold">Kelas/Rombel</div>
                                    <div class="col-8 d-flex">
                                        <span>
                                            <?php echo tampil_kelasdaftar_ByIdSiswa($data->id_siswa) ;?>
                                        </span>&nbsp;
                                        <span>
                                            <?php echo tampil_rombeldaftar_ByIdSiswa($data->id_siswa) ;?>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-7">
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Jenis Pembayaran</div>
                                <div class="col-8">
                                    <select name="id_jenis" class="custom-select custom-select-md">
                                        <?php foreach ($jenisbayar as $jenis): ?>
                                            <option name="id_jenis" value="<?php echo $jenis->id_jenis ;?>"><?php echo $jenis->nama_jenis ;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Nominal</div>
                                <div class="col-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Nominal" name="nominal">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Keterangan</div>
                                <div class="col-8">
                                    <textarea cols="50" rows="2" name="keterangan"></textarea>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-4 text-right font-weight-bold">
                                </div>
                                <div class="col-8">
                                    <button type="submit" class="btn btn-primary">Input</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <table id="data-table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date Time</th>
                                        <th>ID Transaksi</th>
                                        <th>Jenis Bayar</th>
                                        <th>Keterangan</th>
                                        <th>Nominal</th>
                                        <th>User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id=0; foreach ($pembayaran as $databayar): $id++?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo $databayar->date?></td>
                                            <td><?php echo $id?></td>
                                            <td><?php echo $databayar->id_jenis?></td>
                                            <td><?php echo $databayar->keterangan?></td>
                                            <td><?php echo $databayar->nominal?></td>
                                            <td><?php echo $databayar->akuntan?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning"><i class="fas fa-print"></i> Cetak &
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('keuangan/style/js') ?>
</body>

</html>