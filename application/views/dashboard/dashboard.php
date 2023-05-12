<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php $this->load->view('style/head')?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    google.load("visualization", "1.1", {
        packages: ['bar', 'timeline']
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Bulan');
        data.addColumn('number', 'Guru');
        data.addColumn('number', 'Siswa');
        data.addColumn('number', 'Karyawan');
        data.addRows([
            <?php foreach ($graph_data as $row) : ?>['<?= $row['bulan'] ?>', <?= $row['guru'] ?>,
                <?= $row['siswa'] ?>, <?= $row['karyawan'] ?>],
            <?php endforeach; ?>
        ]);

        var options = {
            lineWidth: 3,
            pointSize: 6,
            series: {
                0: {
                    color: '#1E90FF'
                },
                1: {
                    color: '#FFA500'
                },
                2: {
                    color: '#4CAF50'
                }
            },
            title: 'Grafik Jumlah Guru, Siswa, dan Karyawan',
            legend: {
                position: 'top'
            },
            hAxis: {
                title: 'Bulan',
                format: 'MMM yyyy',
                gridlines: {
                    count: -1,
                    units: {
                        months: 1
                    }
                }
            },
            vAxis: {
                title: 'Jumlah',
                minValue: 0,
                format: '0'
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
    }
    </script>
    <style>
    marquee {
        box-shadow: 2px 2px 3px rgba(0, 0, 0, .05);
        background: #4CAF50;
        /* background: #4CAF50; */
        color: white;
        height: 50px;
        margin: 0px 8px 0px 8px;
    }
    </style>
</head>


<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper p-3">
            <div class="container-fluid">
                <div class="row my-3 mt-n1">
                    <marquee direction="left" class="d-flex align-items-center rounded shadow-sm">
                        <h5 class="mt-2"> Motto : TERDEPAN
                            “ Terintegritas
                            Dedikasi Empati
                            Profesional Akurat Normatif ” &nbsp;
                            &nbsp;
                            Visi : “ Luhur Budi, Cerdas, Berprestasi ” &nbsp; &nbsp;
                            Misi : 1. Menyelenggarakan pendidikan yang lebih baik dan bermutu sehingga dapat
                            menciptakan
                            peserta
                            didik yang komprehensif dan kompetitif, berpenghayatan terhadap ajaran yang dianut
                            dan
                            berbudi pekerti luhur sehingga siswa mampu mengaktualisasikan dalam kehidupannya
                            sehari-hari.
                            2. Melaksanakan kegiatan belajar mengajar yang intensif, efektif, dan efisien, serta
                            memberikan
                            bimbingan yang maksimal kepada peserta didik sehingga mampu berkembang secara
                            optimal
                            sesuai
                            dengan potensi yang dimiliki.
                            3. Melaksanakan kegiatan ekstrakurikuler secara intensif sehingga dapat memupuk bakat
                            dan
                            minat
                            yang dimiliki para peserta didik.
                            4. Melaksanakan kegiatan jam tambahan secara intensif, ekstensif secara terstruktur dan
                            terprogram.
                            5. Melaksanakan kegiatan lain yang mendukung dan berkaitan dengan kegiatan sekolah yang
                            lebih
                            baik, transparan, akuntabel, dan demokratis.</h5>
                    </marquee>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <div class="icon">
                                    <i class="fa fa-user-injured p-3 rounded-circle"
                                        style="background-color: #4CAF50; color: white; font-size: 35px;"></i>
                                </div>
                                <div class="total-pasien-guru">
                                    <h2 class="font-weight-bold">
                                        <?php echo $guru ?>
                                    </h2>
                                </div>
                                <div class="keterangan mt-n2">
                                    <h6>Jumlah Pasien Guru</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <div class="icon">
                                    <i class="fa fa-user-injured p-3 rounded-circle"
                                        style="background-color: #4CAF50; color: white; font-size: 35px;"></i>
                                </div>
                                <div class="total-pasien-siswa">
                                    <h2 class="font-weight-bold"><?php echo $siswa ?></h2>
                                </div>
                                <div class="keterangan mt-n2">
                                    <h6>Jumlah Pasien Siswa</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <div class="icon">
                                    <i class="fa fa-user-injured p-3 rounded-circle"
                                        style="background-color: #4CAF50; color: white; font-size: 35px;"></i>
                                </div>
                                <div class="total-pasien-karyawan">
                                    <h2 class="font-weight-bold"><?php echo $karyawan ?></h2>
                                </div>
                                <div class="keterangan mt-n2">
                                    <h6>Jumlah Pasien Karyawan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header text-center" style="background-color: #4CAF50; color: white;">
                                Riwayat Pasien
                            </h5>
                            <div class="card-body">
                                <table id="table_dashboard" class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pasien</th>
                                            <th scope="col">Status Pasien</th>
                                            <th scope="col">Tanggal/Jam Periksa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; foreach ($periksa as $row): $no++ ?>
                                        <tr>
                                            <th scope="row"><?php echo $no?></th>
                                            <td><?php echo $row->nama_pasien?></td>
                                            <td><?php echo tampil_pasien_status_byid($row->pasien_status_id)?></td>
                                            <td><?php echo $row->create_date?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-2">
                    <div id="columnchart_material" style="width: auto; height: 350px;"></div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('style/js')?>
    <?php if ($this->session->flashdata('yeay')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('yeay')?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1000,
    });
    </script>
    <?php if (isset($_SESSION['yeay'])) {
            unset($_SESSION['yeay']);
        }
    endif; ?>
</body>

</html>