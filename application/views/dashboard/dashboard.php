<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel='shorcut icon' href="<?php echo base_url('assets/logo_login.png'); ?>">
    <?php $this->load->view('style/head')?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
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
        // data.addColumn('number', 'Karyawan');
        data.addRows([
            <?php foreach ($graph_data as $row) : ?>['<?= $row['bulan'] ?>', <?= $row['guru'] ?>,
                <?= $row['siswa'] ?>
                
            ],
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
                    color: '#4ADE80'
                }
            },
            title: 'Grafik Jumlah Guru dan, Siswa',
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
    <script type="text/javascript">
    google.load("visualization", "1.1", {
        packages: ['bar', 'timeline']
    });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Tanggal');
        data.addColumn('number', 'Guru');
        data.addColumn('number', 'Siswa');
        // data.addColumn('number', 'Karyawan');
        data.addRows([
            <?php foreach ($graph_data_hari as $row) : ?>['<?= $row['hari'] ?>', <?= $row['guru'] ?>,
                <?= $row['siswa'] ?>],
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
                    color: '#4ADE80'
                }
            },
            title: 'Grafik Jumlah Guru dan Siswa',
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

        var chart = new google.charts.Bar(document.getElementById('columnchart_material_hari'));

        chart.draw(data, options);
    }
    </script>
    <style>
    marquee {
        box-shadow: 2px 2px 3px rgba(0, 0, 0, .05);
        background: #4ADE80;
        /* background: #4ADE80; */
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
        <div class="content-wrapper p-2">
            <div class="container-fluid">
                <div class="row my-3">
                    <marquee direction="left" class="d-flex align-items-center rounded shadow-sm">
                        <h5 class="mt-2"> Motto : TERDEPAN
                            “ Terintegritas
                            Dedikasi Empati
                            Profesional Akurat Normatif ” &nbsp;
                            &nbsp;
                            Visi : “ Terwujudnya Pelayanan Kesehatan Yang Bermutu Menuju Sekolah Sehat, Aman, Bersih,
                            Dan Menyenangkan ” &nbsp; &nbsp;

                            Indikator : 1.Terpenuhinya hak dan kebutuhan murid akan kesehatan.
                            2. Terdapat komitmen dari sekolah yang memuat tentang sekolah sehat, aman ,
                            bersih dan menyenangkan.
                            3. Terdapat Tim pendampingan sekolah sehat, aman, bersih, dan menyenangkan.
                            4. Kurikulum sekolah menempatkan pengetahuan tentang kesehatan terintegrasi
                            dengan mata pelajaran.
                            5. Terdapat rencana dan aksi secara berkala, tahunan, dan bersinambungan
                            untuk mewujudkan sekolah sehat, aman, ramah anak, dan menyenangkan yang
                            terintegrasi dalam kebijakan Usaha Kesehatan Sekolah, Sekolah Adiwiyata,
                            Sekolah Ramah Anak, Sekolah Standar Kependudukan.
                            6. Tercukupinya kebutuhan sarana dan prasarana kesehatan (cuci tangan,
                            jamban, air bersih, sampah dan pengelolannya).
                            7. Lingkungan Sekolah terbebas dari perundungan, pergaulan bebas, asap
                            rokok dan narkoba (NAPZA).
                            8. Terselenggaranya kegiatan untuk menjaga kesehatan warga sekolah.
                            9. Terdapat rambu-rambu keamanan dan kenyamanan warga sekolah untuk
                            perlindungan dari bencana. &nbsp; &nbsp;

                            Misi : 1. Menyelenggarakan pemenuhan kebutuhan kesehatan bagi warga sekolah sesuai
                            dengan standar keamanan dan kenyamanan.
                            2. Melaksanakan pemeliharaan ruang dan gedung sesuai standar keamanan dan
                            kesehatan.
                            3. Membentuk Tim Pendampingan Sekolah sehat, aman, bersih, dan
                            menyenangkan.
                            4. Semua mata pelajaran mengintegrasikan sekolah sehat, aman, bersih, dan
                            menyenangkan.
                            5. Menyusun Program Tahunan untuk mewujudkan sekolah sehat, aman, ramah
                            anak, dan menyenangkan yang terintegrasi dalam kebijakan Usaha Kesehatan
                            Sekolah, Sekolah Adiwiyata, Sekolah Ramah Anak, Sekolah Standar
                            Kependudukan.
                            6. Menyediakan kebutuhan sarana dan prasarana kesehatan (cuci tangan,
                            jamban, air bersih, sampah dan pengelolannya).
                            7. Menciptakan Lingkungan Sekolah terbebas dari perundungan, pergaulan
                            bebas, asap rokok dan narkoba (NAPZA).
                            8. Melaksanakan Kegiatan secara terprogram untuk menjaga kesehatan warga
                            sekolah.
                            9. Menyediakan rambu-rambu keamanan dan kenyamanan warga sekolah untuk
                            perlindungan dari bencana. &nbsp; &nbsp;

                            Tujuan : 1. Dapat menyelenggarakan pemenuhan kebutuhan kesehatan bagi warga sekolah
                            sesuai dengan standar keamanan dan kenyamanan.
                            2. Dapat melaksanakan pemeliharaan ruang dan gedung sesuai standar keamanan
                            dan kesehatan.
                            3. Dapat membentuk Tim Pendampingan Sekolah sehat, aman, bersih, danmenyenangkan.
                            4. Dapat mengintegrasikakn sekolah sehat, aman, bersih, dan menyenangkan
                            pada semua mata pelajaran.
                            5. Dapat menyusun Program Tahunan untuk mewujudkan sekolah sehat, aman,
                            ramah anak, dan menyenangkan yang terintegrasi dalam kebijakan Usaha
                            Kesehatan Sekolah, Sekolah Adiwiyata, Sekolah Ramah Anak, Sekolah
                            Standar Kependudukan.
                            6. Dapat menyediakan kebutuhan sarana dan prasarana kesehatan (cuci tangan,
                            jamban, air bersih, sampah dan pengelolannya).
                            7. Dapat menciptakan Lingkungan Sekolah terbebas dari perundungan,
                            pergaulan bebas, asap rokok dan narkoba (NAPZA).
                            8. Dapat melaksanakan Kegiatan secara terprogram untuk menjaga kesehatan
                            warga sekolahDapat mengoptimalkan kegiatan sesuai standar sekolah sehat,
                            aman, dan menyenangkan.
                            9. Dapat menyediakan rambu-rambu keamanan dan kenyamanan warga sekolah
                            untuk perlindungan dari bencana.
                        </h5>
                    </marquee>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <div class="icon">
                                    <i class="fa fa-user-injured p-3 rounded-circle"
                                        style="background-color: #4ADE80; color: white; font-size: 35px;"></i>
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
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <div class="icon">
                                    <i class="fa fa-user-injured p-3 rounded-circle"
                                        style="background-color: #4ADE80; color: white; font-size: 35px;"></i>
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
                    <!-- <div class="col-4">
                        <div class="card shadow">
                            <div class="card-body text-center">
                                <div class="icon">
                                    <i class="fa fa-user-injured p-3 rounded-circle"
                                        style="background-color: #4ADE80; color: white; font-size: 35px;"></i>
                                </div>
                                <div class="total-pasien-karyawan">
                                    <h2 class="font-weight-bold"><?php echo $karyawan ?></h2>
                                </div>
                                <div class="keterangan mt-n2">
                                    <h6>Jumlah Pasien Karyawan</h6>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center"
                                style="background-color: #4ADE80; color: white; font-size: 1.5rem">
                                Riwayat Pasien
                            </div>
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
                                            <td>
                                                <?php if(!empty($row->siswa_id)) {
                                                echo tampil_siswa_byid($row->siswa_id);
                                                } else if(!empty($row->guru_id)) {
                                                    echo tampil_guru_byid($row->guru_id);
                                                }
                                                //  else if(!empty($row->karyawan_id)) {
                                                //     echo tampil_karyawan_byid($row->karyawan_id);
                                                // }
                                                ?>
                                            </td>
                                            <td><?php echo $row->pasien_status?></td>
                                            <td><?php echo $row->create_date?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Grafik Pasien Tahun <?php echo date('Y') ?></div>
                        </div>
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div class="grid gap-3">
                                <button type="button" id="download_grafik_full" class="btn btn-primary">Download
                                    Grafik</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if ( $this->session->userdata('bulan') === null ) : ?>
                        <form action="<?php echo base_url('admin/pilih_bulan') ?>" method="POST">
                            <select id="sel_id" name="bulan" onchange="this.form.submit();"
                                class="form-control select2">
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </form>
                        <?php else : ?>
                        <?php endif; ?>
                        <div id="columnchart_material" style="width: auto; height: 350px; padding: 20px;"></div>
                    </div>
                </div>
                <?php if ( $this->session->userdata('bulan') === null ) : ?>
                <?php else : ?>
                <div class="card">
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Grafik Pasien Bulan
                                <?php
                                    $monthName = date("F", mktime(0, 0, 0, $this->session->userdata('bulan'), 10));
                                    echo $monthName;
                                ?>
                            </div>
                        </div>
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div class="grid gap-3">
                                <button type="button" id="download_grafik_hari" class="btn btn-primary">Download
                                    Grafik</button>
                                <button type="button" onclick="window.location='<?= base_url(); ?>Admin/reset'"
                                    class="btn btn-primary">Reset</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('admin/pilih_bulan') ?>" method="POST">
                            <select id="sel_id" name="bulan" onchange="this.form.submit();"
                                class="form-control select2">
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </form>
                        <div id="columnchart_material_hari" style="width: auto; height: 350px; padding: 20px;"></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php $this->load->view('style/js')?>
    <script>
    document.getElementById("download_grafik_full").addEventListener("click", function() {
        html2canvas(document.querySelector("#columnchart_material")).then(canvas => {
            canvas.toBlob(function(blob) {
                saveAs(blob, "grafik.png");
            });
        });
    });
    document.getElementById("download_grafik_hari").addEventListener("click", function() {
        html2canvas(document.querySelector("#columnchart_material_hari")).then(canvas => {
            canvas.toBlob(function(blob) {
                saveAs(blob, "grafik_perbulan.png");
            });
        });
    });
    </script>
</body>

</html>