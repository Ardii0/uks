<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php $this->load->view('akademik/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Data Siswa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                <?php foreach ($filter as $data): ?>
                                    <h4>Data Siswa Rombel <?php echo tampil_namarombel_byid($data->id_rombel) ?></h4>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo base_url('Akademik/finter_by_rombel_siswa') ?>" method="post">
                        <div class="row mx-2 pt-3 d-flex justify-content-between">
                            <div class="col">
                                <div class="form-group">
                                    <select name="id_rombel" class="form-control select2 select2-info"
                                        data-dropdown-css-class="select2-info" style="width: 100%;">
                                        <option>Pilih Rombel</option>
                                        <?php $id = 0;foreach ($rombel as $data): $id++;?>
                                        <option value="<?php echo $data->id_rombel ?>">
                                            <?php echo $data->nama_rombel ?>
                                        </option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-info ml-2"
                                style="height: 38px; width: 150px">Tampilkan</button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Rombel</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach($siswa as $data ): $id++;?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo tampil_rombel_byid($data->id_rombel)?></td>
                                            <td class="text-truncate" style="max-width: 150px;">
                                                <?php echo tampil_nama_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_jekel_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_tempat_lahir_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_tanggal_lahir_siswa_byid($data->id_daftar)?></td>
                                            <td class="text-truncate" style="max-width: 150px;">
                                                <?php echo tampil_alamat_siswa_byid($data->id_daftar) ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('Akademik/detail_siswa/'.$data->id_siswa)?>"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-eye"></i></a>
                                                <button onClick="hapus(<?php echo $data->id_siswa?>)"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i></button>
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
    </div>
    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Akademik/hapus_siswa/')?>" + id;
        }
    }
    </script>

    <?php $this->load->view('akademik/style/js')?>
</body>

</html>