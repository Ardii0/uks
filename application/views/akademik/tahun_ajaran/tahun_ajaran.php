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
                    <h1>Tahun Ajaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                    <li class="breadcrumb-item active">Tahun Ajaran</li>
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
                        <h4 >Data Tahun Ajaran</h4>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <a href="<?php echo base_url('Akademik/tahun_ajaran_form');?>">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-plus pr-2"></i>Tambah
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kode Tahun Ajaran</th>
                                            <th>Awal Periode</th>
                                            <th>Akhir Periode</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach($tahunajar as $data ): $id++;?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo $data->nama_angkatan?></td>
                                            <td><?php echo $data->kd_angkatan?></td>
                                            <td><?php echo $data->tgl_a?></td>
                                            <td><?php echo $data->tgl_b?></td>
                                            <td><?php echo $data->keterangan?></td>
                                            <td><?php echo $data->status?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('Akademik/edit_ta/'.$data->id_angkatan)?>"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i></a>
                                                <button onclick="hapus(<?php echo $data->id_angkatan ;?>)"
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
        window.location.href = "<?php echo base_url('Akademik/hapus_ta/')?>" + id;
    }
}
</script>
</body>

</html>