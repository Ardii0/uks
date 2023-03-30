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
                            <h1>Cetak Invoice
                                <?php foreach ($idinvc as $idinvc): ?>
                                    <a href="<?php echo base_url('Keuangan/cetak_pembayaran/'.$idinvc->id_invoice.'/pdf') ?>" class="btn btn-success"><i class="fas fa-print"></i>
                                        Cetak
                                    </a>
                                <?php endforeach; ?>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Keuangan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                    href="<?php echo base_url('Keuangan/pembayaran') ?>">Pembayaran</a>
                                </li>
                                <li class="breadcrumb-item active">Cetak Pembayaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid py-3 px-5">
                    <div class="row">
                        <div class="col-4 px-2">
                            <div class="shadow bg-white px-3 py-2 rounded">
                                <div class="font-weight-bold">Dari :</div>
                                    <div><strong><?php echo tampil_namadaftar_ByIdSiswa($idinvc->id_siswa)?></strong></div>
                                    <div>Kelas <?php echo tampil_kelasdaftar_ByIdSiswa($idinvc->id_siswa)?></div>
                                    <div><?php echo tampil_rombeldaftar_ByIdSiswa($idinvc->id_siswa)?></div>
                            </div>
                        </div>
                        <div class="col-4 px-3">
                            <div class="shadow bg-white px-3 py-2 rounded">
                                <div class="font-weight-bold">Kepada :</div>
                                    <div><strong><?php echo tampil_namajenjang_ByIdSiswa($idinvc->id_siswa)?></strong></div>
                                    <div><?php echo tampil_almtjenjang_ByIdSiswa($idinvc->id_siswa)?></div>
                                    <?php echo tampil_emaillevelById($idinvc->id_level) ?>
                            </div>
                        </div>
                        <div class="col-4 px-3">
                            <div class="shadow bg-white px-3 py-2 rounded" style="height: 112px;">
                                <div class="row">
                                    <div class="col-6 text-right font-weight-bold">Invoice :</div>
                                    <div class="col-6 font-weight-bold">
                                        <?php echo $idinvc->id_invoice ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right font-weight-bold">Tanggal Bayar :</div>
                                    <div class="col-6">
                                        <?php echo changeDateFormat('j M Y',$idinvc->date) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-right font-weight-bold">Petugas :</div>
                                    <div class="col-6">
                                        <?php echo tampil_usernamelevelById($idinvc->id_level) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 bg-white pt-3 px-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date Time</th>
                                    <th>ID Transaksi</th>
                                    <th>Jenis Bayar</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id=0; foreach ($pembayaran as $databayar): $id++?>
                                    <tr>
                                        <td><?php echo $id?></td>
                                        <td><?php echo $databayar->date?></td>
                                        <td><?php echo $databayar->id_tf?></td>
                                        <td><?php echo tampil_jenisbayarById($databayar->id_jenis)?></td>
                                        <td><?php echo $databayar->keterangan?></td>
                                        <td class="text-right"><?php echo convRupiah($databayar->nominal)?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="col-12 row text-right p-1 m-0" style="background: rgba(0, 0, 255, 0.3);">
                            <div class="col-10 font-weight-bold">
                                Subtotal :
                            </div>
                            <div class="col-2 font-weight-bold">
                                <?php $subtotal = 0; 
                                      foreach ($pembayaran as $total) {
                                        $subtotal += $total->nominal;
                                      }
                                      echo convRupiah($subtotal) ?>
                            </div>
                        </div>
                        <div class="col-12 row text-left pt-5 m-0" style="">
                            <div class="col-6 font-weight-bold">
                                *Bukti ini sebagai tanda pembayaran yang sah
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <div class="mr-5">
                                    <h5 class="pb-5">Kepala Sekolah</h5>
                                    <p class="mt-5 d-flex justify-content-center">ttd</p>
                                </div>
                                <div class="ml-5">
                                    <h5 class="pb-5">Petugas</h5>
                                    <p class="mt-5 d-flex justify-content-center">ttd</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('keuangan/style/js') ?>
</body>

</html>