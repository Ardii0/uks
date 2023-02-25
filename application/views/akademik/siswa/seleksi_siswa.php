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
                            <h1>Seleksi Dan Pembagian Kelas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Seleksi Siswa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="d-flex p-3 justify-content-between">
                        <div>
                            <h5>seleksi siswa</h5>
                        </div>
                        <div style="width: 175px; height: 40px" class="">
                            <a href="<?php echo base_url('Akademik/siswa_pembagian_kelas') ;?>" class="btn w-100 h-100 p-2 btn-success btn-sm">
                                <i class="fa fa- fa-arrow-right">
                               Pembagian Kelass
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="row px-1 pt-5">
                        <div class="col">
                            <div class="text-center" style="border-bottom: solid 2px; border-color: #">
                                <h3 class="">DATA PENDAFTAR</h3>
                            </div>
                            <div class="row mx-2 pt-3 d-flex justify-content-between">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control select2 select2-info"
                                            data-dropdown-css-class="select2-info" style="width: 100%;">
                                            <option selected="selected">Pilih Rombel</option>
                                            <option>XI TKJ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex justify-content-end align-self-start">
                                    <div class="form-group">
                                        <select class="custom-select rounded-0" id="exampleSelectRounded0">
                                            <option>Jenjang</option>
                                            <option>Value 2</option>
                                            <option>Value 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="akademik-table" class="table table-bordered table-striped">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>No</th>
                                            <th>No Reg</th>
                                            <th>Nama</th>
                                            <th>Jenjang</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>230202221</td>
                                            <td>Ridwan Lewandowski</td>
                                            <td>SMK</td>
                                            <td>
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fas fa- fa-eye"></i> <i
                                                        class="fa-solid fa-magnifying-glass-plus"></i>
                                                </button>
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa- fa-arrow-right"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center" style="border-bottom: solid 2px; border-color: #">
                                <h3 class="">DATA SELEKSI</h3>
                            </div>
                            <div class="row mx-2 pt-3 d-flex justify-content-between">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control select2 select2-info"
                                            data-dropdown-css-class="select2-info" style="width: 100%;">
                                            <option selected="selected">Pilih Rombel</option>
                                            <option>XI TKJ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex justify-content-end align-self-start">
                                    <div class="form-group">
                                        <select class="custom-select rounded-0" id="exampleSelectRounded0">
                                            <option>Jenjang</option>
                                            <option>Value 2</option>
                                            <option>Value 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="akademik-table2" class="table table-bordered table-striped">
                                <thead class="bg-info">
                                        <tr>
                                            <th>No</th>
                                            <th>No Reg</th>
                                            <th>Nama</th>
                                            <th>Jenjang</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>230202221</td>
                                            <td>Ridwan Lewandowski</td>
                                            <td>SMK</td>
                                            <td>
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fas fa- fa-eye"></i> <i
                                                        class="fa-solid fa-magnifying-glass-plus"></i>
                                                </button>
                                                <button class="btn btn-success btn-sm">
                                                    <i class="fa fa- fa-arrow-left"></i>
                                                </button>
                                            </td>
                                        </tr>
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
</body>

</html>