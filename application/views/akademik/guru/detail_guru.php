<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head')?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');

    .tes {
        font-family: 'Nunito', sans-serif;
    }
    </style>
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
                            <h1>Detail Guru</h1>
                        </div>
                        <d iv class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Akademik/guru_data') ?>">Data Guru</a>
                                </li>
                                <li class="breadcrumb-item active">Detail Guru</li>
                            </ol>
                        </d>
                    </div>
                </div>
            </section>
            <div class="container">
                <?php foreach ($guru as $data): ?>
                <div class="row ">
                    <div class="col-md-4 mb-3">

                        <div class="card">
                            <div class="card-body  align-items-center text-center">

                                <div class="team-single-img">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="w-75 h-100" alt="">
                                </div>
                                <div class="mt-3">
                                    <h5>
                                        <?php foreach ($guru as $dataguru): ?>
                                        <?php echo $dataguru->nama_guru ?>
                                        <?php endforeach;?>
                                    </h5>
                                    <p class="text-secondary mb-2">
                                        <?php foreach ($guru as $dataguru): ?>
                                        <?php echo tampil_jabatanGuruById($dataguru->id_jabatan) ?>
                                        <?php endforeach;?>
                                    <p class="text-muted font-size-sm">
                                        <?php foreach ($guru as $dataguru): ?>
                                        <?php echo $dataguru->alamat ?>
                                        <?php endforeach;?>
                                    <div class="">
                                    <a href="<?php echo base_url('Akademik/cetak_guru/'.$dataguru->kode_guru.'/pdf') ?>" class="btn btn-success"><i class="fas fa-print"></i>
                                        Cetak
                                    </a>
                                        <a href="<?php echo base_url('Akademik/edit_guru/' . $dataguru->kode_guru) ?>"
                                            class="btn btn-info">Edit
                                            Data Pribadi </a>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">NIK</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($guru as $dataguru): ?>
                                        <?php echo $dataguru->nik ?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">NIP/Y</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($guru as $dataguru): ?>
                                        <?php echo $dataguru->nip ?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Jenis Kelamin</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($guru as $dataguru): ?>
                                            <?php $gender = tampil_jekel_guru_byid($dataguru->kode_guru) == "L" ? 'Laki - Laki' : 'Perempuan'; echo $gender ?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nomor Telepon</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($guru as $dataguru): ?>
                                        <?php echo $dataguru->no_hp ?>
                                        <?php endforeach;?>
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">TMT</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($guru as $dataguru): ?>
                                        <?php echo $dataguru->tmt ?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">No.SK</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($guru as $dataguru): ?>
                                        <?php echo $dataguru->no_sk ?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tanggal SK</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php foreach ($guru as $dataguru): ?>
                                        <?php echo $dataguru->tgl_sk ?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <hr>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <?php $this->load->view('akademik/style/js')?>
    <script>
    function kembali() {
        window.history.go(-1);
    }
    </script>
</body>

</html>