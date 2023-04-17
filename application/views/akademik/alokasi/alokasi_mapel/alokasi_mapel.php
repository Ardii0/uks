<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <h1>Alokasi Mapel</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/pelajaran') ?>">Mata
                                        Pelajaran</a>
                                </li>
                                <li class="breadcrumb-item active">Alokasi Mata Pelajaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <form action="<?php echo base_url('Akademik/tambah_alokasimapel'); ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="d-flex justify-content-end p-3 font-weight-bold">
                            <p>
                                <?php foreach ($mapel as $mapel): ?>
                                <input type="hidden" name="id_mapel" value="<?php echo $mapel->id_mapel ?>">
                                <?php echo $mapel->nama_mapel ?>
                                <?php endforeach;?>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <section class="content">
                                    <div>
                                        <div class="text-center mb-3 d-flex justify-content-between"
                                            style="border-bottom: solid 1px; border-color: #">
                                            <div>
                                                <h3 class="">DATA KELAS</h3>
                                            </div>
                                            <div class="">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-plus pr-2"></i>Simpan
                                                </button>
                                            </div>
                                        </div>
                                        <table id="akademik-table" class="table table-bordered table-striped">
                                            <thead class="bg-info">
                                                <tr>
                                                    <th><input type="checkbox" class="checkAll"></th>
                                                    <th>Nama Kelas</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($kelas as $kelas ):?>
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" class="check" name="id_kelas[<?php echo $kelas->id_kelas ?>]">
                                                    </td>
                                                    <td>
                                                        <?php echo tampil_namatingkat_ById($kelas->id_tingkat).' '.$kelas->nama_kelas?>
                                                    </td>
                                                    <td>
                                                        <!-- <?php echo $kelas->id_kelas?> -->
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </form>
                                </section>
                            </div>
        <div class="col">
            <section class="content">
                <form action="<?php echo base_url('Akademik/hapus_alokasimapel/'); ?>" enctype="multipart/form-data"
                    method="post">
                    <input type="hidden" name="id_mapel" value="<?php echo $mapel->id_mapel ?>">
                    <div>
                        <div class="text-center mb-3 d-flex justify-content-between"
                            style="border-bottom: solid 1px; border-color: #">
                            <div>
                                <h3 class="">ALOKASI MATA PELAJARAN</h3>
                            </div>
                            <div class="row">
                                <?php foreach ($alokasimapel as $trial_data): ?>
                                    <form action="<?php echo base_url('Akademik/tambah_jam_belajar'); ?>" enctype="multipart/form-data" method="post" class="d-flex align-items-center justify-content-center">
                                    </form>
                                <?php endforeach; ?>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-minus pr-2"></i>Hapus
                                </button>
                            </div>
                        </div>
                        <table id="datasiswa-table" class="table table-bordered table-striped">
                            <thead class="bg-info">
                                <tr>
                                    <th><input type="checkbox" class="deleteAll"></th>
                                    <th>Nama Kelas</th>
                                    <th>Jam Per/</th>
                                    <th>Semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alokasimapel as $data): ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="deletealokmapel" name="id_alokasimapel[<?php echo $data->id_alokasimapel ?>]">
                                    </td>
                                    <td>
                                        <?php echo tampil_namatingkat_ByIdKelas($data->id_kelas).' '.tampil_kelas_byid($data->id_kelas) ?>
                                    </td>
                                    <td>
                                        <?php echo $data->semester ?>
                                    </td>
                                    <td>
                                        <?php echo $data->jam_belajar ?>
                                    </td>
                                    <td class="text-center">
                                        <form action="<?php echo base_url('Akademik/tambah_jam_belajar'); ?>" id="alokasi<?php echo $data->id_alokasimapel; ?>" enctype="multipart/form-data" method="post" class="d-flex align-items-center justify-content-center">
                                            <button type="button" class="btn btn-info" onclick="send(<?php echo $data->id_alokasimapel; ?>)">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </section>
        </div>
    </div>
    </div>
    </section>
    
    </div>
    </div>

<?php $this->load->view('akademik/style/js')?>
<script>
    $('.checkAll').click(function() {
    if ($(this).is(':checked')) {
        $('.check').attr('checked', true);
    } else {
        $('.check').attr('checked', false);
    }
    });
    $('.deleteAll').click(function() {
    if ($(this).is(':checked')) {
        $('.deletealokmapel').attr('checked', true);
    } else {
        $('.deletealokmapel').attr('checked', false);
    }
    });
    
    function send(id_alokasimapel) {
        $.ajax({
            url : "<?php echo base_url('akademik/get_mapelByAlokasimapel');?>",
            method : "POST",
            data : {id_alokasimapel: id_alokasimapel},
            async : true,
            dataType : 'json',
            success: function(data){
                console.log(data);
                var html = '<div class="d-flex"><input type="number" class="form-control" name="jam_belajar" value="'+data[0].jam_belajar+'">'+
                           '<input type="hidden" class="form-control" name="id_alokasimapel" value="'+data[0].id_alokasimapel+'">'+
                           '<button type="submit" class="ml-2 btn btn-info"><i class="fa fa-check"></i></button></div>';
                $('#alokasi'+data[0].id_alokasimapel).html(html);
            }
        });
    };
</script>
</body>

</html>