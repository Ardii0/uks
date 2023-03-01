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
                            <h1>Alokasi Guru</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Akademik/guru') ?>">Guru</a></li>
                                <li class="breadcrumb-item active">Alokasi Guru</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <form action="<?php echo base_url('Akademik/tambah_alokasiguru'); ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="container-fluid bg-white">
                        <div class="d-flex p-3 justify-content-between">
                            <div>
                                <h5>
                                    <?php foreach ($guru as $dataguru): ?>
                                    <input type="hidden" name="kode_guru" value="<?php echo $dataguru->kode_guru ?>">
                                    <?php echo $dataguru->nama_guru ?>
                                    <?php endforeach;?>
                                </h5>
                            </div>
                        </div>
                        <div class="row px-1 pt-5">
                            <div class="col">
                                <div class="d-flex justify-content-between"
                                    style="border-bottom: solid 2px; border-color: #">
                                    <h3 class="text-start pl-3">DATA MATA PELAJARAN</h3>
                                    <div class="">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-plus pr-2"></i>Simpan
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datasiswa-table" class="table table-bordered table-striped">
                                        <thead class="bg-info">
                                            <tr>
                                                <th style="width: 4%;">
                                                    <input type="checkbox" id="checkAll">
                                                </th>
                                                <th>Nama Mapel</th>
                                                <th>keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($mapel as $data): ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="mapel" name="id_mapel[<?php echo $data->id_mapel ?>]">
                                                </td>
                                                <td>
                                                    <?php echo $data->nama_mapel ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_jenismapelById($data->id_jenismapel) ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            <section class="content">
                <form action="<?php echo base_url('Akademik/hapus_alokasiguru'); ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="container-fluid bg-white">
                        <div class="row px-1 pt-5">
                            <div class="col">
                                <div class="d-flex justify-content-between"
                                    style="border-bottom: solid 2px; border-color: #">
                                    <h3 class="text-start pl-3">DATA ALOKASI KE GURU</h3>
                                    <div class="">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-minus pr-2"></i>Hapus
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="datasiswa-table2" class="table table-bordered table-striped">
                                        <thead class="bg-info">
                                            <tr>
                                                <th style="width: 4%;">
                                                    <input type="checkbox">
                                                </th>
                                                <th>Nama Mapel</th>
                                                <th>keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($alokasiguru as $datamapel): ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="alokasiguru" name="id_alokasiguru[<?php echo $datamapel->id_alokasiguru ?>]"
                                                        value="<?php echo $datamapel->id_alokasiguru ?>">
                                                </td>
                                                <td>
                                                    <?php echo tampil_mapelById($datamapel->id_mapel) ?>
                                                </td>
                                                <td>
                                                    <form action="<?php echo base_url('Akademik/hapus_alokasiguru/'.$datamapel->id_alokasiguru); ?>" 
                                                    method="post">
                                                    <button
                                                    type="submit"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <?php $this->load->view('akademik/style/js')?>
    <script>
        $("#checkAll").click(function () {
            $('.mapel').prop('checked',$(this).prop('checked'))
        });
        $('#datasiswa-table').on('click'. '.mapel', function(){
            var ca = true
            $('.mapel').each(function(){
                if(!$(this).prop('checked')){
                    ca = false
                }
            })
            $("$checkAll").prop('checked', ca)
        })
        $('#datasiswa-table2').on('click'. '.alokasiguru', function(){
            var ca = true
            $('.alokasiguru').each(function(){
                if(!$(this).prop('checked')){
                    ca = false
                }
            })
            $("$checkAll").prop('checked', ca)
        })
        $('#checkAll').click(function () {    
            $('input:checkbox').prop('checked', this.checked);    
        });
    </script>
</body>

</html>