<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Nilai</title>
    <?php $this->load->view('nilai/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">

        <!-- navbar -->
        <?php $this->load->view('nilai/style/navbar')?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('nilai/style/sidebar')?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Entry</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Nilai/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Entry</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid shadow p-3 mb-5 bg-white rounded">
                    <div class="p-3 h5">
                        <p>Matematika</p>
                        <p class="mt-n2">X TKJ 1 (Semester 1)</p>
                    </div>
                    <div class="row px-1">
                        <div class="col">
                            <div class="card-body">
                                <table id="data-table" class="table table-bordered table-striped">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th style="width: 50px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1809599001</td>
                                            <td class="text-truncate" style="max-width: 150px;">Budi Santoso Ibra</td>
                                            <td>
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row card-body">
                                <div class="col-1 font-weight-bold">Nama</div>
                                <div class="col-5 text-truncate" style="max-width: 210px;">: Secondta Ardiansyah</div>
                                <div class="col-1 font-weight-bold">NIS</div>
                                <div class="col-5">: 1809599001</div>
                                <!-- START FORM -->
                                <div class="col-6 mt-3">
                                    <div class="form-group">
                                        <label class="control-label">Pekerjaan Rumah (PR)</label>
                                        <div>
                                            <input type="number" name="pr" class="form-control"
                                                placeholder="Masukan Nilai PR"><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="form-group">
                                        <label class="control-label">Ulangan Harian</label>
                                        <div>
                                            <input type="number" name="ulangan_harian" class="form-control"
                                                placeholder="Masukan Nilai Ulangan Harian"><br>
                                        </div>
                                    </div>
                                </div>
                                <!-- END FORM -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view('nilai/style/js')?>

</body>

</html>