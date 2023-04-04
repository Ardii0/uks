<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan</title>
    <?php $this->load->view('keuangan/style/head') ?>
</head>
<style>
.hidden {
    display: none;
}

.shis {
    display: block;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('keuangan/style/navbar') ?>
        <?php $this->load->view('keuangan/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Rencana Anggaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Rencana Anggaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid">
                <section class="content">
                    <div class="container-fluid bg-white">
                        <div class="row mx-2 pt-3 d-flex justify-content-between">
                            <div class="col-md-5">
                                <form action="<?php echo base_url('keuangan/anggaran_filter/') ?>" method="post">
                                    <div class="form-group d-flex flex-row " style="width: fit-content;">
                                        <div class="mt-2 mx-1">
                                            <p style="font-weight: bold">Pilih Rencana Anggaran</p>
                                        </div>
                                        <div class="mx-1">
                                            <select name="id_rencana_anggaran" id="id_rencana_anggaran"
                                                class="form-control" data-dropdown-css-class="select2-info">
                                                <option value="1">Pilih</option>
                                                <?php $id = 0; foreach ($data_rencana_anggaran as $data): $id++; ?>
                                                <option value="<?php echo $data->id_rencana_anggaran ?>">
                                                    <?php echo $data->nama_anggaran ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="mx-1">
                                            <button type="submit" class="btn btn-primary">Tampilkan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end align-self-start">

                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modal_tambah_rencana_anggaran"><i
                                        class="fa fa-plus pr-2"></i>Tambah</button>
                            </div>
                        </div>
                        <?php if ($data_rn != null ) : ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <span
                                            class="h2 align-middle"><?php echo tampil_rn_byid($data_rn[0]->id_rencana_anggaran)?></span>
                                        <span
                                            <?php if (tampil_tetapkan_byid($this->session->userdata('id_rn')) == 1) echo "class='hidden''" ?>>
                                            <?php if(!$this->db->where('rencana_anggaran',$data_rn[0]->id_rencana_anggaran)->get('tabel_jenis_transaksi')->result() &&
                                                 !$this->db->where('id_anggaran',$data_rn[0]->id_rencana_anggaran)->get('tabel_transaksi')->result()) {?>
                                            <button class="btn btn-danger btn-sm mx-1"
                                                onClick="hapus(<?php echo $data_rn[0]->id_rencana_anggaran ?>)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <?php } ?>
                                            <a href="#myModal" class="trash " data-id="1">
                                                <button class="btn btn-primary btn-sm" type="button"
                                                    class="btn btn-success" data-toggle="modal"
                                                    data-target="#modal<?php echo $data_rn[0]->id_rencana_anggaran ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3">
                                            <span
                                                <?php if (tampil_tetapkan_byid($this->session->userdata('id_rn')) == 1) echo "class='hidden''" ?>>
                                                <a href="#myModal" class="trash"
                                                    data-id="<?php echo $this->session->userdata("id_level") ?>">
                                                    <button class="btn btn-danger mx-1" data-toggle="modal"
                                                        data-target="#modal_tambah_pendapatan">
                                                        <i class="fa fa-plus pr-2"></i>
                                                        Tambah Pendapatan
                                                    </button>
                                                </a>
                                                <a href="#myModal" class="trash"
                                                    data-id="<?php echo $this->session->userdata("id_level") ?>">
                                                    <button class="btn btn-danger mx-1" data-toggle="modal"
                                                        data-target="#modal_tambah_pengeluaran">
                                                        <i class="fa fa-plus pr-2"></i>
                                                        Tambah Pengeluaran
                                                    </button>
                                                </a>
                                                <button class="btn btn-success"
                                                    onclick="tetapkan(<?php echo $this->session->userdata("id_rn") ?>)">
                                                    <i class="fa fa-download pr-2"></i>
                                                    Tetapkan
                                                </button>
                                            </span>
                                            <span
                                                <?php if (tampil_tetapkan_byid($this->session->userdata('id_rn')) == 1) echo "class='shis''"; else if (tampil_tetapkan_byid($this->session->userdata('id_rn')) == 0) echo "class='hidden''"; ?>>
                                                <div class="mb-3">
                                                    <button class="btn btn-secondary mx-1 disable">
                                                        Aktif
                                                    </button>
                                                </div>
                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <h5>Periode <?php 
                                             $date = tampil_periodeawal_byid($this->session->userdata("id_rn"));
                                            echo format_indo($date)?> / <?php 
                                            $date = tampil_periodeakhir_byid($this->session->userdata("id_rn"));
                                            echo format_indo($date)?></h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="">
                                            <table id="akademik-table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <h5 style="font-weight: bold">Pendapatan</h5>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $id = 0; foreach ($masuk as $data): $id++; ?>
                                                    <?php if ($data->jenis_transaksi === "k") continue; ?>
                                                    <tr>
                                                        <td class="text-right">
                                                            <div
                                                                <?php if (tampil_tetapkan_byid($this->session->userdata('id_rn')) == 1) echo "class='hidden''"; ?>>
                                                                <button class="btn btn-warning btn-sm" type="button"
                                                                    data-toggle="modal"
                                                                    data-target="#modal_pendapatan<?php echo $data->id ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-sm"
                                                                    onClick="hapus_jt(<?php echo $data->id ?>)">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php echo $id?>. <?php echo $data->nama_jenis_transaksi?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data->keterangan?>
                                                        </td>
                                                        <td>
                                                            <?php echo convRupiah($data->nominal)?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3">
                                                            <h5 style="font-weight: bold">Total Rencana Pendapatan</h5>
                                                        </td>
                                                        <td>
                                                            <p style="font-weight: bold"><?php 
                                                            $totalprice = 0;
                                                            foreach ($masuk as $key) {
                                                                $totalprice += $key->nominal;
                                                            }
                                                            echo convRupiah($totalprice);?></p>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <table id="akademik-table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <h5 style="font-weight: bold">Pengeluaran</h5>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $id = 0; foreach ($keluar as $data): $id++; ?>
                                                    <?php 
                                                //selain m lanjut
                                                if ($data->jenis_transaksi === "m") continue; ?>
                                                    <tr>
                                                        <td class="text-right">
                                                            <div
                                                                <?php if (tampil_tetapkan_byid($this->session->userdata('id_rn')) == 1) echo "class='hidden''"; ?>>
                                                                <button class="btn btn-warning btn-sm" type="button"
                                                                    data-toggle="modal"
                                                                    data-target="#modal_pengeluaran<?php echo $data->id ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button class="btn btn-danger btn-sm"
                                                                    onClick="hapus_jt(<?php echo $data->id ?>)">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php echo $id?>. <?php echo $data->nama_jenis_transaksi?>
                                                        </td>
                                                        <td>
                                                            <?php echo $data->keterangan?>
                                                        </td>
                                                        <td>
                                                            <?php echo convRupiah($data->nominal)?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3">
                                                            <h5 style="font-weight: bold">Total Rencana Pengeluaran</h5>
                                                        </td>
                                                        <td>
                                                            <p style="font-weight: bold"><?php 
                                                            $totalprice = 0;
                                                            foreach ($keluar as $key) {
                                                                $totalprice += $key->nominal;
                                                            }
                                                            echo convRupiah($totalprice);?></p>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php else : ?><?php endif; ?>
                    </div>
            </div>
            </section>

        </div>
        <!-- Modal Tambah Rencana Anggaran-->
        <div class="modal fade" id="modal_tambah_rencana_anggaran" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('keuangan/aksi_tambah_rencana_anggaran') ?>"
                    enctype="multipart/form-data" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Input Rencana Anggaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pb-1">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nama Anggaran</label>
                                        <div class="">
                                            <input type="text" name="nama_anggaran" class="form-control"
                                                placeholder="Masukan Nama Anggaran"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Periode Awal</label>
                                        <div class="">
                                            <input type="date" name="awal_periode" class="form-control"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Periode Akhir</label>
                                        <div class="">
                                            <input type="date" name="akhir_periode" class="form-control"><br>
                                        </div>
                                    </div>
                                    <input type="hidden" name="pencatat"
                                        value="<?php echo $this->session->userdata('id_level') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="kembali()"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Tambah Pendapatan-->
        <div class="modal fade" id="modal_tambah_pendapatan" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('keuangan/aksi_tambah_anggaran') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Input Rencana Pendapatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pb-1">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nama Pendapatan</label>
                                        <div class="">
                                            <input type="text" name="nama_jenis_transaksi" class="form-control"
                                                placeholder="Masukan Nama Pendapatan"><br>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_rencana_anggaran" id="id_rencana_anggaran"
                                        value="<?php echo $this->session->userdata('id_rn');?>">
                                    <input type="hidden" name="jenis_transaksi" value="m">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Debit</label>
                                        <div class="">
                                            <select class="form-control form-select px-2 py-1" name="debit"
                                                aria-label="Default select example">
                                                <option selected>Pilih Akun Debit</option>
                                                <?php $id = 0; foreach ($data_akun as $row):
                                                    $id++; ?>
                                                <option value="<?php echo $row->id_akun ?>">
                                                    <?php echo $row->nama_akun ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Kredit</label>
                                        <div class="">
                                            <select class="form-control form-select px-2 py-1" name="kredit"
                                                aria-label="Default select example">
                                                <option selected>Pilih Akun Kredit</option>
                                                <?php $id = 0; foreach ($data_akun as $row):
                                                    $id++; ?>
                                                <option value="<?php echo $row->id_akun ?>">
                                                    <?php echo $row->nama_akun ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nominal</label>
                                        <div class="">
                                            <input type="number" name="nominal" class="form-control"
                                                placeholder="Masukan Nominal"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Keterangan</label>
                                        <div class="">
                                            <input type="text" name="keterangan" class="form-control"
                                                placeholder="Masukan Keterangan"><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="kembali()"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Tambah Pengeluaran-->
        <div class="modal fade" id="modal_tambah_pengeluaran" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('keuangan/aksi_tambah_anggaran') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Input Rencana Pengeluaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body pb-1">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nama Pengeluaran</label>
                                        <div class="">
                                            <input type="text" name="nama_jenis_transaksi" class="form-control"
                                                placeholder="Masukan Nama Pengeluaran"><br>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_rencana_anggaran" id="id_rencana_anggaran"
                                        value="<?php echo $this->session->userdata('id_rn');?>">

                                    <input type="hidden" name="jenis_transaksi" value="k">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Debit</label>
                                        <div class="">
                                            <select class="form-control form-select px-2 py-1" name="debit"
                                                aria-label="Default select example">
                                                <option selected>Pilih Akun Debit</option>
                                                <?php $id = 0; foreach ($data_akun as $row):
                                                    $id++; ?>
                                                <option value="<?php echo $row->id_akun ?>">
                                                    <?php echo $row->nama_akun ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Kredit</label>
                                        <div class="">
                                            <select class="form-control form-select px-2 py-1" name="kredit"
                                                aria-label="Default select example">
                                                <option selected>Pilih Akun Kredit</option>
                                                <?php $id = 0; foreach ($data_akun as $row):
                                                    $id++; ?>
                                                <option value="<?php echo $row->id_akun ?>">
                                                    <?php echo $row->nama_akun ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nominal</label>
                                        <div class="">
                                            <input type="number" name="nominal" class="form-control"
                                                placeholder="Masukan Nominal"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Keterangan</label>
                                        <div class="">
                                            <input type="text" name="keterangan" class="form-control"
                                                placeholder="Masukan Keterangan"><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="kembali()"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit Rencana Anggaran-->
        <div class="modal fade" id="modal<?php echo $data_rn[0]->id_rencana_anggaran ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('keuangan/aksi_edit_rencana_anggaran') ?>"
                    enctype="multipart/form-data" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Rencana Anggaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pb-1">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nama Anggaran</label>
                                        <div class="">
                                            <input type="text" name="nama_anggaran" class="form-control"
                                                value="<?php echo tampil_rn_byid($data_rn[0]->id_rencana_anggaran)?>"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Periode Awal</label>
                                        <div class="">
                                            <input type="date" name="awal_periode" class="form-control"
                                                value="<?php echo tampil_periodeawal_byid($data_rn[0]->id_rencana_anggaran)?>"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Periode Akhir</label>
                                        <div class="">
                                            <input type="date" name="akhir_periode" class="form-control"
                                                value="<?php echo tampil_periodeakhir_byid($data_rn[0]->id_rencana_anggaran)?>"><br>
                                        </div>
                                    </div>
                                    <input type="hidden" name="pencatat"
                                        value="<?php echo $this->session->userdata('id_level') ?>">
                                    <input type="hidden" name="id_rencana_anggaran" id="id_rencana_anggaran"
                                        value="<?php echo $data_rn[0]->id_rencana_anggaran ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="kembali()"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php foreach ($masuk as $data): ?>
        <!-- Modal Edit Pendapatan-->
        <div class="modal fade" id="modal_pendapatan<?php echo $data->id?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('keuangan/aksi_edit_anggaran') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Rencana Pendapatan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pb-1">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <input type="hidden" name="id" id="id" value="<?php echo $data->id?>">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nama Pendapatan</label>
                                        <div class="">
                                            <input type="text" name="nama_jenis_transaksi" class="form-control"
                                                value="<?php echo $data->nama_jenis_transaksi?>"><br>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_rencana_anggaran" id="id_rencana_anggaran"
                                        value="<?php echo $this->session->userdata('id_rn');?>">
                                    <input type="hidden" name="jenis_transaksi" value="m">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Debit</label>
                                        <div class="">
                                            <select class="form-control form-select px-2 py-1" name="debit"
                                                aria-label="Default select example">
                                                <option value="<?php echo $data->debit ?>" selected>
                                                    <?php echo tampil_akun_byid($data->debit) ?></option>
                                                <?php $id = 0; foreach ($data_akun as $row):
                                                    $id++; ?>
                                                <option value="<?php echo $row->id_akun ?>">
                                                    <?php echo $row->nama_akun ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Kredit</label>
                                        <div class="">
                                            <select class="form-control form-select px-2 py-1" name="kredit"
                                                aria-label="Default select example">
                                                <option value="<?php echo $data->kredit ?>" selected>
                                                    <?php echo tampil_akun_byid($data->kredit) ?></option>
                                                <?php $id = 0; foreach ($data_akun as $row):
                                                    $id++; ?>
                                                <option value="<?php echo $row->id_akun ?>">
                                                    <?php echo $row->nama_akun ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nominal</label>
                                        <div class="">
                                            <input type="number" name="nominal" class="form-control"
                                                value="<?php echo $data->nominal?>"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Keterangan</label>
                                        <div class="">
                                            <input type="text" name="keterangan" class="form-control"
                                                value="<?php echo $data->keterangan?>"><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="kembali()"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Modal Edit Pengeluaran-->
        <?php foreach ($keluar as $data): ?>
        <div class="modal fade" id="modal_pengeluaran<?php echo $data->id ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('keuangan/aksi_edit_anggaran') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Rencana Pengeluaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body pb-1">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <input type="hidden" name="id" id="id" value="<?php echo $data->id?>">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nama Pendapatan</label>
                                        <div class="">
                                            <input type="text" name="nama_jenis_transaksi" class="form-control"
                                                value="<?php echo $data->nama_jenis_transaksi?>"><br>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_rencana_anggaran" id="id_rencana_anggaran"
                                        value="<?php echo $this->session->userdata('id_rn');?>">
                                    <input type="hidden" name="jenis_transaksi" value="k">
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Debit</label>
                                        <div class="">
                                            <select class="form-control form-select px-2 py-1" name="debit"
                                                aria-label="Default select example">
                                                <option value="<?php echo $data->debit ?>" selected>
                                                    <?php echo tampil_akun_byid($data->debit) ?></option>
                                                <?php $id = 0; foreach ($data_akun as $row):
                                                    $id++; ?>
                                                <option value="<?php echo $row->id_akun ?>">
                                                    <?php echo $row->nama_akun ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Kredit</label>
                                        <div class="">
                                            <select class="form-control form-select px-2 py-1" name="kredit"
                                                aria-label="Default select example">
                                                <option value="<?php echo $data->kredit ?>" selected>
                                                    <?php echo tampil_akun_byid($data->kredit) ?></option>
                                                <?php $id = 0; foreach ($data_akun as $row):
                                                    $id++; ?>
                                                <option value="<?php echo $row->id_akun ?>">
                                                    <?php echo $row->nama_akun ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Nominal</label>
                                        <div class="">
                                            <input type="number" name="nominal" class="form-control"
                                                value="<?php echo $data->nominal?>"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Keterangan</label>
                                        <div class="">
                                            <input type="text" name="keterangan" class="form-control"
                                                value="<?php echo $data->keterangan?>"><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="kembali()"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php endforeach?>

    </div>

    <?php $this->load->view('keuangan/style/js') ?>
    <script>
    $('.trash').click(function() {
        var id = $(this).data('id');
        console.log(id);
        $('#modalDelete').attr('href', 'delete-cover.php?id=' + id);
    })

    function tetapkan(id) {
        var yes = confirm('Yakin Di Tetapkan?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Keuangan/aksi_tetapkan/') ?>" + id;
        }
    }

    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Keuangan/hapus_rn/') ?>" + id;
        }
    }

    function hapus_jt(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Keuangan/hapus_jt/') ?>" + id;
        }
    }
    </script>
</body>

</html>