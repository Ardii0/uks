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
        var data = google.visualization.arrayToDataTable([
            [{
                type: 'string',
                label: 'Bulan'
            }, {
                type: 'number',
                label: 'Guru'
            }, 'Siswa', 'Karyawan'],
            <?php
            	foreach ($chart_data as $data) {
            		echo '[' . $data->performance_year . ',' . $data->performance_sales . ',' . $data->performance_expense . ',' . $data->performance_profit . '],';
            	}
            ?>
            // ['a', 0, 0, 0],
            // ['Januari', 1, 3, 5],
            // ['February', 2, 7, 9],
            // ['Maret', 3, 9, 7],
            // ['April', 4, 5, 8],
            // ['Mei', 9, 5, 6],
            // ['Juni', 4, 5, 2],
            // ['Juli', 8, 7, 2],
            // ['Agustus', 1, 6, 9],
            // ['September', 1, 6, 3],
            // ['Oktober', 4, 2, 8],
            // ['November', 5, 2, 2],
            // ['Desember', 7, 6, 1],
        ]);

        var options = {
            chart: {
                title: 'Pasien',
                subtitle: 'Data Pasien Perbulan'
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
    }
    </script>
</head>


<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper p-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
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
                    <div class="col-4">
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
                    <div class="col-4">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center"
                                style="background-color: #4ADE80; color: white; font-size: 25px;">
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
                                            <td><?php echo $row->nama_pasien?></td>
                                            <td><?php echo status_byid($row->pasien_status_id)?></td>
                                            <td><?php echo date("Y-m", strtotime($row->create_date))?></td>
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
    </div>
    <?php $this->load->view('style/js')?>
</body>

</html>