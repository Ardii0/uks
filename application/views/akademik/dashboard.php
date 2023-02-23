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

<style>
    .example-1 {
    position: relative;
    overflow-y: scroll;
    height: 200px;
}

.example-1::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.example-1 {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}

</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php $this->load->view('akademik/style/sidebar')?>


        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="px-3 py-1">
                    <div class="pb-1 d-flex justify-content-between align-items-center text-center">
                        <div>
                            <p style="font-size: 2rem">Dashboard Akademik</p>
                        </div>
                        <div class="w-25">
                            <div class="input-group rounded-4">
                                <input type="text" class="form-control " placeholder="cari">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-8 col-sm-6 col-md-3">
                            <div>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Jumlah Kelas</p>
                                        <h3>150</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-door-closed"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 col-sm-6 col-md-3">
                            <div>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Jumlah Mapel</p>
                                        <h3>150</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-book"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 col-sm-6 col-md-3">
                            <div>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Jumlah Siswa</p>
                                        <h3>150</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-user"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 col-sm-6 col-md-3">
                            <div>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Jumlah Guru</p>
                                        <h3>150</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-user-tie"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="small-box bg-gradient-info text-white mb-3" style="max-width: 100%;">
                                <div class="card-header bg-transparent text-center fw-bold h3 border-white"> Jenjang
                                </div>
                                <div class="card-body text-white">
                                    <h5 class="card-title">Success card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and
                                        make
                                        up
                                        the bulk of the card's content.</p>
                                </div>
                                <a href="<?php echo base_url('Akademik/tahun_ajaran')?>" class="small-box-footer">More
                                    info
                                    <i class="fa fa-arrow-circle-right"></i></a>

                            </div>
                        </div>
                        <div class="col">
                            <div class="small-box border-success mb-3" style="max-width: 100%;">
                                <div class="card-header bg-transparent text-center fw-bold h3 border-white"> Tahun
                                    Ajaran</div>
                                <div class="card-body text-success">
                                    <div class="box-body example-1 scrollbar-ripe-malinka">
                                        <table id="table_1" class="table table-bordered">
                                            <thead>
                                                <tr class="fixed bg-secondary">
                                                    <th>No</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Total Siswa</th>
                                                    <th>Total Rombel</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>2017/2018</td>
                                                    <td>371</td>
                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>2019/2020</td>
                                                    <td>361</td>
                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>2021/2022</td>
                                                    <td>361</td>
                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>2023/2024</td>
                                                    <td>361</td>
                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>2023/2024</td>
                                                    <td>361</td>
                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>2023/2024</td>
                                                    <td>361</td>
                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>2023/2024</td>
                                                    <td>361</td>
                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>2023/2024</td>
                                                    <td>361</td>
                                                    <td>8</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>2023/2024</td>
                                                    <td>361</td>
                                                    <td>8</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
</body>

</html>