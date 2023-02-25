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
                    <h1>Pembagian Kelas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/siswa_seleksi_siswa') ?>">Seleksi Siswa</a> </li>
                    <li class="breadcrumb-item active">Pembagian Kelas</li>
                    </ol>
                </div>
                </div>
            </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col">
                            <div class="form-group">
                            <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                                <option selected="selected">Pilih Rombel</option>
                                <option>XI TKJ</option>
                            </select>
                            </div>
                        </div>
                        <div class="btn bg-info" style="height: 38px">SIMPAN</div>
                        <div class="col d-flex justify-content-end align-self-start">
                        <div class="form-group">
                        <select class="custom-select rounded-0" id="exampleSelectRounded0">
                            <option>Jenjang</option>
                            <option>Value 2</option>
                            <option>Value 3</option>
                        </select>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="akademik-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Pilih</th>
                                            <th>No Reg</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Jenjang</th>
                                            <th>Nama</th>
                                            <th>Jekel</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>  
                                            <th>Alamat Tinggal</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" value="" id="flexCheckDefault"></td>
                                            <td>93293723</td>
                                            <td>TA2017/2019</td>
                                            <td>SMK</td>
                                            <td>Dandy</td>
                                            <td>L</td>
                                            <td>Depok</td>
                                            <td>18-19-2002</td>
                                            <td>Jl Buah Batu</td>
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