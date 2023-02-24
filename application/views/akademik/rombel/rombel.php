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

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php $this->load->view('akademik/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>rombel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                    <li class="breadcrumb-item active">rombel</li>
                    </ol>
                </div>
                </div>
            </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="row mx-2 pt-3 d-flex justify-content-end">
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <a href="<?php echo base_url('Akademik/rombel_form');?>">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-plus pr-2"></i>Tambah
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="akademik-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama rombel</th>
                                            <th>Kelas</th>
                                            <th>Kouta</th>
                                            <th>Nip</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach($rombel as $data ): $id++;?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo $data->nama_rombel?></td>
                                            <td><?php echo tampil_kelasById($data->id_kelas)?></td>
                                            <!-- <td><?php echo tampil_namajenjang_byid($data->id_jenjang)?></td> -->
                                            <td><?php echo $data->kuota?></td>
                                            <td><?php echo $data->nip?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('Akademik/edit_rombel/'.$data->id_rombel)?>"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i></a>
                                                <button onclick="hapus(<?php echo $data->id_rombel ;?>)"
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
            </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('akademik/style/js')?>
        <script>
        function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Akademik/hapus_rombel/')?>" + id;
            }
        }
        </script>
</body>

</html>