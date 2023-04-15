<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar') ?>
        <?php $this->load->view('akademik/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Mutasi Siswa</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Akademik/') ?>">Siswa</a></li>
                                <li class="breadcrumb-item active">Mutasi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">   
                            <form action="<?php echo base_url('akademik/filter_kelas/') ?>" method="post">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <p style="font-weight: bold">Pilih Kelas</p>
                                </div>
                                <div class="mx-1">
                                    <select name="id_kelas" id="id_kelas" class="form-control select2 select2-info"
                                            data-dropdown-css-class="select2-info">
                                            <option selected="selected">Pilih Kelas</option>
                                            <?php $id = 0; foreach ($rombel as $data): $id++; ?>
                                                <option value="<?php echo $data->id_kelas ?>"><?php echo $data->nama_kelas ?></option>
                                            <?php endforeach ?>
                                        </select>
                                </div>
                                <div class="mx-1">
                                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <div class="form-group">
                            <form action="<?php echo base_url('akademik/tampil_data_mutasi/') ?>" method="post">
                            <div class="mx-1">
                                    <select name="id_kelas" id="id_kelas" class="form-control bg-success" onchange="this.form.submit();">
                                            <option value="0">Lihat Data</option>
                                            <option value="1">Pindah</option>
                                            <option value="2">Lulus</option>
                                        </select>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <form id="store" name="store" action="<?php echo base_url('Akademik/aksi_mutasi_siswa'); ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-8">
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="sample" class="selectall"/>
                                            </th>
                                            <th>Rombel</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jekel</th>
                                            <th>TTL</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0;
                                        foreach ($siswa as $data):
                                            $id++; ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox"
                                                        name="id_daftar[<?php echo $data->id_daftar ?>]" id="id_siswa_boss">
                                                </td>
                                                <td>
                                                    <?php echo tampil_rombel_byid($data->id_kelas) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_nisn_siswa_byid($data->id_daftar) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_nama_siswa_byid($data->id_daftar) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_jekel_siswa_byid($data->id_daftar) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_tempat_lahir_siswa_byid($data->id_daftar) ?>,
                                                    <?php echo tampil_tanggal_lahir_siswa_byid($data->id_daftar) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_alamat_siswa_byid($data->id_daftar) ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="border-bottom h3">Mutasi Siswa</div>
                            <div id="pilih" class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <p style="font-weight: bold">Jenis</p>
                                </div>
                                <div class="mx-1">
                                    <select class="form-control select2 select2-info" id="option"
                                        onchange="findmyvalue()" name="option"
                                        data-dropdown-css-class="select2-info">
                                        <option selected="selected" selected>Pilih</option>
                                        <option value="Naik Kelas">Naik Kelas</option>
                                        <option value="Pindah Kelas">Pindah Kelas</option>
                                        <option value="Pindah Sekolah">Pindah Sekolah</option>
                                        <option value="Lulus">Lulus</option>
                                    </select>
                                </div>
                            </div>
                            <div id="naik_kelas" style="display: none; width: fit-content;">
                                <div class="form-group d-flex">
                                    <div class="mt-2 mx-1">
                                        <p style="font-weight: bold">Kelas</p>
                                    </div>
                                    <div class="mx-1">
                                        <select name="id_kelas2" class="form-control select2 select2-info"
                                            data-dropdown-css-class="select2-info">
                                            <option selected="selected">Pilih Kelas</option>
                                            <?php $id = 0; foreach ($rombel2 as $data):
                                                $id++; ?>
                                                <option value="<?php echo $data->id_kelas ?>"><?php echo $data->nama_kelas ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="pindah_rombel" style="display: none; width: fit-content;">
                                <div class="form-group d-flex">
                                    <div class="mt-2 mx-1">
                                        <p style="font-weight: bold">Kelas</p>
                                    </div>
                                    <div class="mx-1">
                                        <select name="id_kelas" class="form-control select2 select2-info"
                                            data-dropdown-css-class="select2-info">
                                            <option selected="selected">Pilih Rombel</option>
                                            <?php $id = 0; foreach ($rombel as $data):
                                                $id++; ?>
                                                <option value="<?php echo $data->id_kelas ?>"><?php echo $data->nama_kelas ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="pindah_sekolah" style="display: none; width: fit-content;">
                                <label class="control-label">Nama Sekolah</label>
                                <div class="">
                                    <input type="text" name="nama_sekolah" class="form-control" autocomplete="off"
                                        placeholder="Masukan Nama Sekolah">
                                </div>
                            </div>
                            <div id="lulus" style="display: none; width: fit-content;">
                                <label class="control-label">Tanggal Lulus</label>
                                <div class="">
                                    <input type="date" name="tanggal_lulus" class="form-control" autocomplete="off"
                                        placeholder="Masukan Tanggal Lulus">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-1">Ubah</button>
                        </div>
                    </div> <!-- row -->
                    </form>
                </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('akademik/style/js') ?>
    <script>
    $('.selectall').click(function() {
        if ($(this).is(':checked')) {
            $('div input').attr('checked', true);
        } else {
            $('div input').attr('checked', false);
        }
    });
    </script>
</body>

</html>