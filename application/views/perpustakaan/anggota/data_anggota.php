<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <?php $this->load->view('perpustakaan/style/head')?>
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">

<div class="wrapper">
    <?php $this->load->view('perpustakaan/style/navbar')?>
    <?php $this->load->view('perpustakaan/style/sidebar')?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Anggota Perpustakaan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Perpustakaan/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                        <li class="breadcrumb-item active">Data Anggota</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid bg-white">
                <div class="row mx-2 pt-3 d-flex justify-content-end">
                    <div class="col-md-3 d-flex justify-content-end align-self-start">
                        <a href="<?php echo base_url('Perpustakaan/form_anggota');?>">
                            <button type="button" class="btn btn-success">
                                <i class="fa fa-plus pr-2"></i>Tambah
                            </button>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">
                            <table id="perpustakaan-table" class="table table-bordered table-striped">
                                <thead class="bg-info">
                                    <tr>
                                        <th>No</th>
                                        <th>ID ANGGOTA</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Rombel</th>
                                        <th>Tgl Daftar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id=0; foreach($data_anggota as $data ): $id++;?>
                                    <tr>
                                        <td style="width: 4%;"><?php echo $id?></td>
                                        <td style="width: 15%;"><?php echo $data->id_anggota?></td>
                                        <td><?php echo tampil_namadaftar_ByIdSiswa($data->id_siswa)?></td>
                                        <td><?php echo tampil_kelasdaftar_ByIdSiswa($data->id_siswa)?></td>
                                        <td><?php echo tampil_rombeldaftar_ByIdSiswa($data->id_siswa)?></td>
                                        <td><?php echo $data->tgl_daftar?></td>
                                        <td class="text-center">
                                            <div class="btn btn-success btn-sm">
                                                <i class="fa fa-credit-card"></i>
                                            </div>
                                            <button onclick="hapus(<?php echo $data->id_anggota ;?>)"
                                                class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i></button>
                                                <a href="<?php echo base_url('Perpustakaan/kartu_anggota/'.$data->id_anggota)?>"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-barcode"></i>
                                                    </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php $this->load->view('perpustakaan/style/js')?>
<script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Perpustakaan/hapus_anggota/')?>" + id;
        }
    }
</script>
</body>
</html>