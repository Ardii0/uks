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
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}

.example-2 {
    position: relative;
    overflow-x: scroll;
}

.example-2::-webkit-scrollbar {
    display: none;
}

.example-2 {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php if($this->session->userdata('level') === 'Admin') {?>
        <?php $this->load->view('petugas/style/sidebar')?>
        <?php } else {?>
        <?php $this->load->view('akademik/style/sidebar')?>
        <?php }?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="px-3 py-1">
                    <div class="pb-1 d-flex justify-content-between align-items-center text-center">
                        <div>
                            <p style="font-size: 2rem">Dashboard Akademik</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 col-sm-6 col-md-3">
                            <div>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Jumlah Kelas</p>
                                        <h3><?php echo $total_kelas;?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-door-closed"></i>
                                    </div>
                                    <a href="<?php echo base_url('Akademik/kelas')?>" class="small-box-footer">Info
                                        Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 col-sm-6 col-md-3">
                            <div>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Jumlah Mapel</p>
                                        <h3><?php echo $total_mapel;?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-book"></i>
                                    </div>
                                    <a href="<?php echo base_url('Akademik/pelajaran')?>" class="small-box-footer">Info
                                        Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 col-sm-6 col-md-3">
                            <div>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Jumlah Siswa</p>
                                        <h3><?php echo $total_siswa;?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-user"></i>
                                    </div>
                                    <a href="<?php echo base_url('Akademik/siswa_data')?>" class="small-box-footer">Info
                                        Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 col-sm-6 col-md-3">
                            <div>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <p>Jumlah Guru</p>
                                        <h3><?php echo $total_guru;?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-user-tie"></i>
                                    </div>
                                    <a href="<?php echo base_url('Akademik/guru')?>" class="small-box-footer">Info Lebih
                                        Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="small-box bg-gradient-info text-white mb-3" style="max-width: ;">
                                <div class="card-header bg-transparent text-center fw-bold h3 border-white"> Jenjang
                                </div>
                                <div class="">
                                    <div class="card-body d-flex p-2 example-2" style="height: ; ">
                                        <?php foreach($jenjang as $jenjang):?>
                                        <div class="info-box w-25 m-1 d-flex justify-content-center align-items-center">
                                            <div class="text-center">
                                                <span class="info-box-icon bg-info"><i class="fas fa-graduation-cap"></i>
                                                </span>
                                                <h5 class="text-dark">
                                                    <?php echo $jenjang->nama_jenjang?>
                                                </h5>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <a href="<?php echo base_url('Akademik/jenjang')?>" class="small-box-footer">
                                    Info Lebih Lanjut
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="small-box bg-info border-white mb-3" style="max-width: 100%;">
                                <div class="card-header bg-transparent text-center fw-bold h3 border-white"> Tahun
                                    Ajaran Aktif</div>
                                <div class="card-body text-white">
                                    <div class="box-body example-1 scrollbar-ripe-malinka">
                                        <table id="table_1" class="table table-bordered ">
                                            <thead>
                                                <tr class="text-bold">
                                                    <th>No</th>
                                                    <th>Tahun Ajaran</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php $id=0; foreach($ta as $ta): $id++?>
                                                <tr>
                                                    <td class="text-bold"><?php echo $id;?></td>
                                                    <td class="text-bold"><?php echo $ta->nama_angkatan;?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    
                                </div>
                                <a href="<?php echo base_url('Akademik/tahun_ajaran')?>" class="small-box-footer">
                                    Info Lebih Lanjut
                                    <i class="fa fa-arrow-circle-right"></i>
                                </a>
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