<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keuangan</title>
    <?php $this->load->view('keuangan/style/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- navbar -->
        <?php $this->load->view('keuangan/style/navbar') ?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('keuangan/style/sidebar') ?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Rencana Anggaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
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
                                <div class="form-group d-flex flex-row " style="width: fit-content;">
                                    <div class="mt-2 mx-1">
                                        <h5>Pilih Rencana Anggaran</h5>
                                    </div>
                                    <div class="mx-1">
                                    <select class="form-control form-select px-2 py-1" name="id_rombel"
                                        aria-label="Default select example">
                                        <option selected>Pilih Rencana Anggaran</option>
                                        <?php $id = 0;foreach ($data_rencana_anggaran as $row): $id++;?>
                                        <option value="<?php echo $row->id_rencana_anggaran?>"><?php echo $row->nama_anggaran ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end align-self-start">

                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modal_tambah_rencana_anggaran"><i class="fa fa-plus pr-2"></i>Tambah</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <span class="h2">RAB 2018/2019</span>
                                        <button class="btn btn-danger btn-sm mx-1">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="mb-3">
                                            <button class="btn btn-danger mx-1" data-toggle="modal"
                                    data-target="#modal_tambah_pendapatan">
                                                <i class="fa fa-plus pr-2"></i>
                                                Tambah Pendapatan
                                            </button>
                                            <button class="btn btn-danger mx-1" data-toggle="modal"
                                    data-target="#modal_tambah_pengeluaran">
                                                <i class="fa fa-plus pr-2"></i>
                                                Tambah Pengeluaran
                                            </button>
                                            <button class="btn btn-success" onclick="tetapkan(1)">
                                                <i class="fa fa-download pr-2"></i>
                                                Tetapkan
                                            </button>
                                        </div>
                                        <div class="mb-3">
                                            <h5>Periode 01 Jun 2018/ 30 Jun 2019</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="">
                                            <table id="datasiswa-table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <h5 style="font-weight: bold">Pendapatan</h5>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-right">
                                                            <button class="btn btn-warning btn-sm">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            1. Dana Hibah
                                                        </td>
                                                        <td>
                                                            Bantuan Hibah
                                                        </td>
                                                        <td>
                                                            Rp.500000
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3">
                                                            <h5 style="font-weight: bold">Total Rencana Pendapatan</h5>
                                                        </td>
                                                        <td>
                                                        <p style="font-weight: bold"> Rp.500000</p>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <table id="datasiswa-table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <h5 style="font-weight: bold">Pengeluaran</h5>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-right">
                                                            <button class="btn btn-warning btn-sm">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            1. Gaji Staff
                                                        </td>
                                                        <td>
                                                            12 x 3 x 1000000
                                                        </td>
                                                        <td>
                                                            Rp.500000
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3">
                                                            <h5 style="font-weight: bold">Total Rencana Pengeluaran</h5>
                                                        </td>
                                                        <td>
                                                        <p style="font-weight: bold"> Rp.500000</p>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>

        </div>
        <!-- Modal Tambah Rencana Anggaran-->
        <div class="modal fade" id="modal_tambah_rencana_anggaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('keuangan/aksi_tambah_anggaran') ?>" enctype="multipart/form-data"
                    method="post">
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
                                    <!-- <input type="hidden" value="<?php echo $data->id_user?>"> -->
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
        <div class="modal fade" id="modal_tambah_pendapatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('keuangan/aksi_tambah_pendapatan') ?>" enctype="multipart/form-data"
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
                                            <input type="text" name="nama_pendapatan" class="form-control"
                                                placeholder="Masukan Nama Pendapatan"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Debit</label>
                                        <div class="">
                                        <select class="form-control form-select px-2 py-1" name="id_rombel"
                                        aria-label="Default select example">
                                        <option selected>Pilih Akun Debit</option>
                                        <?php $id = 0;foreach ($data_rencana_anggaran as $row): $id++;?>
                                        <option value="<?php echo $row->id_rencana_anggaran?>"><?php echo $row->nama_anggaran ?></option>
                                        <?php endforeach;?>
                                    </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Kredit</label>
                                        <div class="">
                                        <select class="form-control form-select px-2 py-1" name="id_rombel"
                                        aria-label="Default select example">
                                        <option selected>Pilih Akun Kredit</option>
                                        <?php $id = 0;foreach ($data_rencana_anggaran as $row): $id++;?>
                                        <option value="<?php echo $row->id_rencana_anggaran?>"><?php echo $row->nama_anggaran ?></option>
                                        <?php endforeach;?>
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
                                    <!-- <input type="hidden" value="<?php echo $data->id_user?>"> -->
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
        <div class="modal fade" id="modal_tambah_pengeluaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('keuangan/aksi_tambah_pengeluaran') ?>" enctype="multipart/form-data"
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
                                            <input type="text" name="nama_pengeluaran" class="form-control"
                                                placeholder="Masukan Nama Pengeluaran"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Debit</label>
                                        <div class="">
                                        <select class="form-control form-select px-2 py-1" name="id_rombel"
                                        aria-label="Default select example">
                                        <option selected>Pilih Akun Debit</option>
                                        <?php $id = 0;foreach ($data_rencana_anggaran as $row): $id++;?>
                                        <option value="<?php echo $row->id_rencana_anggaran?>"><?php echo $row->nama_anggaran ?></option>
                                        <?php endforeach;?>
                                    </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label class="control-label">Akun Kredit</label>
                                        <div class="">
                                        <select class="form-control form-select px-2 py-1" name="id_rombel"
                                        aria-label="Default select example">
                                        <option selected>Pilih Akun Kredit</option>
                                        <?php $id = 0;foreach ($data_rencana_anggaran as $row): $id++;?>
                                        <option value="<?php echo $row->id_rencana_anggaran?>"><?php echo $row->nama_anggaran ?></option>
                                        <?php endforeach;?>
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
                                    <!-- <input type="hidden" value="<?php echo $data->id_user?>"> -->
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
   
    </div>

    <?php $this->load->view('keuangan/style/js') ?>
    <script>
        function tetapkan(params) {
            alert("Tetapkan id = " + params);
        }
    </script>
</body>

</html>