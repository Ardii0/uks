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
                            <h1>Jurnal Penyesuaian</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Keuangan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Jurnal Penyesuaian</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow p-3">
                    <div class="row">
                        <div class="col-6 h5">Input Jurnal</div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#modal_lihat_data">
                                Lihat Data
                            </button>
                        </div>
                        <div class="col-12">
                            <form action="<?php echo base_url('Keuangan/aksi_input_jurnal') ?>" method="post">
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold mt-1">Uraian</div>
                                    <div class="col-5">
                                        <input type="text" name="uraian" class="form-control" placeholder="Uraian">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold mt-1">Jenis Anggaran</div>
                                    <div class="col-5">
                                        <select name="id_anggaran" class="form-control select2"
                                            data-dropdown-css-class="select2-info">
                                            <option>
                                                Pilih Jenis Anggaran
                                            </option>
                                            <?php $id = 0;foreach ($data_anggaran as $data): $id++;?>
                                            <option value="<?php echo $data->id ?>">
                                                <?php echo $data->nama_jenis_transaksi ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold mt-1">Akun Debit</div>
                                    <div class="col-5">
                                        <select name="id_akun" class="custom-select custom-select-md">
                                            <option selected>-- Pilih Akun --</option>
                                            <?php foreach ($data_akun as $data): ?>
                                            <option value="<?php echo $data->id_akun ?>"><?php echo $data->nama_akun ?>
                                            </option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold mt-1">Nominal</div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
                                            <input type="number" name="nominal" class="form-control"
                                                placeholder="Nominal">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-4 text-right font-weight-bold">
                                    </div>
                                    <div class="col-5">
                                        <input type="hidden" value="<?php echo $dt->email ?>" name="pencatat">
                                        <button type="submit" class="btn btn-primary">Input</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal_lihat_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pb-1">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="data-table2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Uraian</th>
                                            <th>Pencatat</th>
                                            <th>Akun</th>
                                            <th>Nominal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0; foreach($data_transaksi as $data): $id++ ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $data->waktu ?></td>
                                            <td><?php echo $data->uraian ?></td>
                                            <td><?php echo $data->pencatat ?></td>
                                            <td><?php echo tampil_nama_akun_transaksi($data->id_akun) ?></td>
                                            <td><?php echo $data->nominal ?></td>
                                            <td>
                                                <button onClick="hapus(<?php echo $data->id_transaksi ?>)"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <div></div>
                        <button type="button" class="btn btn-secondary" onclick="kembali()"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->load->view('keuangan/style/js') ?>
    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Keuangan/hapus_jurnal/') ?>" + id;
        }
    }
   
    </script>
</body>

</html>