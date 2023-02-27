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
                <form action="<?php echo base_url('Akademik/terapkan_kelas') ?>" method="post">
                    <div class="container-fluid bg-white">
                        <div class="row mx-2 pt-3 d-flex justify-content-between">
                            <div class="col">
                                <div class="form-group">
                                <select name="id_rombel" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                                    <option selected="selected">Pilih Rombel</option>
                                    <?php $id=0; foreach($rombel as $data ): $id++; ?>
                                        <option value="<?php echo $data->id_rombel ?>"><?php echo $data->nama_rombel ?></option>
                                    <?php endforeach ?>
                                </select>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-info" style="height: 38px">SIMPAN</button>
                            <div class="col d-flex justify-content-end align-self-start">
                            <div class="form-group">
                            <select class="custom-select rounded-0" id="exampleSelectRounded0">
                                <option>Jenjang</option>
                                <?php $id=0; foreach($jenjang as $data ): $id++; ?>
                                <option value="<?php echo $data->nama_jenjang ?>"><?php echo $data->nama_jenjang ?></option>
                                <?php endforeach ?>
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
                                        <?php $id=0; foreach($data_siswa_diterima as $row ): $id++; ?>
                                            <tr>
                                                <td><input type="checkbox" name="id_siswa" value="<?php echo $row->id_siswa ?>" id="flexCheckDefault"></td>
                                                <td><?php echo tampil_noReg_byIdDaftar($row->id_daftar) ?></td>
                                                <td><?php echo tampil_tahunajaran_byIdDaftar($row->id_daftar) ?></td>
                                                <td><?php echo tampil_namaJenjang_byIdDaftar($row->id_daftar) ?></td>
                                                <td><?php echo tampil_nama_byIdDaftar($row->id_daftar) ?></td>
                                                <td><?php echo tampil_jekel_byIdDaftar($row->id_daftar) ?></td>
                                                <td><?php echo tampil_tempatlahir_byIdDaftar($row->id_daftar) ?></td>
                                                <td><?php echo tampil_tanggallahir_byIdDaftar($row->id_daftar) ?></td>
                                                <td><?php echo tampil_alamattinggal_byIdDaftar($row->id_daftar) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
</body>

</html>