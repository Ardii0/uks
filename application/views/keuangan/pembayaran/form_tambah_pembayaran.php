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
                                    <button type="reset" class="btn btn-primary">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold">Nama</div>
                                    <div class="col-8">
                                        <?php echo tampil_namadaftar_ByIdSiswa($data->id_siswa) ;?>
                                        <input type="hidden" name="id_siswa" value="<?php echo $data->id_siswa ;?>">
                                        <input type="hidden" name="id_ta" value="<?php echo tampil_idta_ByIdDaftar($data->id_daftar) ;?>">
                                        <input type="hidden" name="akuntan" value="<?php echo $dt->email ;?>">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold">Kelas/Rombel</div>
                                    <div class="col-8">
                                        <?php echo tampil_rombeldaftar_ByIdSiswa($data->id_siswa) ;?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-7">
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Jenis Pembayaran</div>
                                <div class="col-8">
                                    <select name="id_jenis" class="custom-select custom-select-md">
                                        <option value="" style="display: none;">Pilih Jenis Pembayaran</option>
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
                                        <th></th>
                                        <th>No</th>
                                        <th>Date Time</th>
                                        <th>ID Transaksi</th>
                                        <th>Jenis Bayar</th>
                                        <th>Keterangan</th>
                                        <th>Akuntan</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id=0; foreach ($pembayaran as $databayar): $id++?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo base_url('Keuangan/hapus_pembayaran/'.$databayar->id_pembayaran) ?>"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i></a></td>
                                            <td><?php echo $id?></td>
                                            <td><?php echo $databayar->date?></td>
                                            <td><?php echo $databayar->id_tf?></td>
                                            <td><?php echo tampil_jenisbayarById($databayar->id_jenis)?></td>
                                            <td><?php echo $databayar->keterangan?></td>
                                            <td><?php echo $databayar->akuntan?></td>
                                            <td class="d-flex justify-content-end"><?php echo convRupiah($databayar->nominal)?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="col-12 row text-right p-1 m-0" style="background: rgba(0, 0, 255, 0.3);">
                                <div class="col-10 font-weight-bold">
                                    Subtotal :
                                </div>
                                <div class="col-2 font-weight-bold">
                                &emsp;
                                <?php $subtotal = 0; 
                                      foreach ($pembayaran as $total) {
                                        $subtotal += $total->nominal;
                                      }
                                      echo convRupiah($subtotal) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end mt-3">
                            <?php foreach ($siswa as $data): ?>
                                <!-- <a href="<?php echo base_url('Keuangan/cetak_pembayaran/'.$data->id_siswa.'/'.$data->id_rombel.'/pdf') ?>" class="btn btn-warning"><i class="fas fa-print"></i> Cetak & -->
                                <a href="<?php echo base_url('Keuangan/cetak_invoice/'.$data->id_siswa) ?>" class="btn btn-warning"><i class="fas fa-print"></i> Cetak &
                                    Simpan</a>
                            <?php endforeach; ?>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('keuangan/style/js') ?>
    <script>
        function hapus(id) {
            window.location.href = "<?php echo base_url('Keuangan/hapus_pembayaran/') ?>" + id;
        }
    </script>
</body>

</html>