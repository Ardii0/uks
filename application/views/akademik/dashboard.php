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
        <?php $this->load->view('akademik/style/sidebar')?>

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
                            <div>
                                <div class="small-box bg-info border-white mb-3" style="max-width: 100%;">
                                    <div class="card-header bg-transparent text-center fw-bold h3 border-white">
                                        Jabatan Guru
                                    </div>
                                    <div class="table-responsive  bg-info">
                                        <div class="box-body example-1 scrollbar-ripe-malinka">
                                            <table
                                                class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th>Nama Jabatan</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center  text-light ">1</td>
                                                        <td>
                                                            Kepala Sekolah
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_kepsek;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/1')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">2</td>
                                                        <td>
                                                            Waka Kurikulum
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_wakaKur;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/2')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">3</td>
                                                        <td>
                                                            Waka Kesiswaan
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_wakaKesis;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/3')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">4</td>
                                                        <td>
                                                            Waka Sarana dan Prasarana
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_wakaSar;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/4')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">5</td>
                                                        <td>
                                                            Guru Mapel Sejarah
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_sejarah;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/5')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">6</td>
                                                        <td>
                                                            K3 Teknik Komputer dan Jaringan
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_K3TKJ;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/6')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">7</td>
                                                        <td>
                                                            K3 Tata Busana
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_K3TB;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/7')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">8</td>
                                                        <td>
                                                            K3 Teknik Bisnis Sepeda Motor
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_K3TBSM;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/8')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">9</td>
                                                        <td>
                                                            K3 Akuntansi dan Keuangan Lembaga
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_K3AKL;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/9')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">10</td>
                                                        <td>
                                                            Sekretaris Jurusan Teknik Komputer dan Jaringan
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_SekreTKJ;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/10')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">11</td>
                                                        <td>
                                                            Sekretaris Jurusan Tata Busana
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_SekreTabus;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/11')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">12</td>
                                                        <td>
                                                            Ka. Lab Teknik Bisnis Sepeda Motor
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_LabTBSM;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/12')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">13</td>
                                                        <td>
                                                            Sekretaris Jurusan Akuntansi dan Keuangan Lembaga
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_SekreAKL;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/13')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">14</td>
                                                        <td>
                                                            Ka. Lab Jurusan Teknik Komputer dan Jaringan
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_LabTKJ;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/14')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">15</td>
                                                        <td>
                                                            Ka. Lab Jurusan Tata Busana
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_LabTB;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/15')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">16</td>
                                                        <td>
                                                            Ka. Lab Sekretaris Jurusan Teknik Bisnis Sepeda Motor
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_SekreTBSM;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/16')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">17</td>
                                                        <td>
                                                            Guru Mapel Bahasa Indonesia
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_bIndo;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/17')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">18</td>
                                                        <td>
                                                            Guru Mapel Bahasa Jawa
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_bJawa;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/18')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">19</td>
                                                        <td>
                                                            Guru Mapel Matematika
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_mtk;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/19')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">20</td>
                                                        <td>
                                                            Guru Mapel Penjasorkes
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_pjok;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/=20')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">21</td>
                                                        <td>
                                                            Guru Mapel Bahasa Inggris
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_bInggris;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/21')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">22</td>
                                                        <td>
                                                            Guru Mapel Agama Islam
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_pai;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/22')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">23</td>
                                                        <td>
                                                            Guru Mapel Bahasa Jepang
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_bJepang;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/23')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">24</td>
                                                        <td>
                                                            Guru BK
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_BK;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/24')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center  text-light ">25</td>
                                                        <td>
                                                            Waka Humas
                                                        </td>
                                                        <td class="text-center">
                                                            <h3><?php echo $total_jabatan_humas;?></h3>
                                                        </td>
                                                        <td class="text-center"><a href="<?php echo base_url('Akademik/detail_jabatan/25')?>" class="btn btn-light btn-sm">
                                                            <i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url('Akademik/guru')?>"
                                        class="small-box-footer text-center p-1">
                                        Info Lebih Lanjut
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </a>

                                </div>
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