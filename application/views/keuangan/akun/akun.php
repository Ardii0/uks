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
                            <h1>Akun</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item active">Akun</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Data Akun</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_tambah_kategori">
                                <i class="fa fa-plus pr-2"></i>Tambah
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Akun</th>
                                            <th>Jenis Akun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0; foreach ($data_akun as $data): $id++; ?>
                                        <tr>
                                            <td>
                                                <?php echo $id ?>
                                            </td>
                                            <td>
                                                <?php echo $data->nama_akun?>
                                            </td>
                                            <td>
                                                <?php echo $data->jenis_akun?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('keuangan/edit_akun/'.$data->id_akun) ?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>Edit
                                                </a>
                                                <?php if(!$this->db->where('id_akun',$data->id_akun)->get('tabel_transaksi')->result()) {?>
                                                    <button onClick="hapus(<?php echo $data->id_akun ?>)" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                        Hapus
                                                    </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>

<!-- Modal -->
    <div class="modal fade" id="modal_tambah_kategori" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="<?php echo base_url('Keuangan/aksi_tambah_akun') ?>" enctype="multipart/form-data" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-sm-12">
                                <label class=" control-label">Nama Akun</label>
                                <div class="">
                                    <input type="text" name="nama_akun" class="form-control"
                                        placeholder="Masukan Nama Akun"><br>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class=" control-label">Jenis Akun</label>
                            <div class="">
                                <input type="text" name="jenis_akun" class="form-control"
                                    placeholder="Masukan Jenis Akun"><br>
                            </div>
                        </div>
                    </div>
                    </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="kembali()" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                     </div>
                </div>
            </form>
        </div>
    </div>
    <?php $this->load->view('keuangan/style/js') ?>
    <script>
        function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Keuangan/hapus_akun/') ?>" + id;
            }
        }
    </script>
</body>

</html>