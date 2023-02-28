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
                    <h1>Mutasi Siswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/') ?>">Siswa</a></li>
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
                        <div class="form-group d-flex flex-row " style="width: fit-content;">
                        <div class="mt-2 mx-1">
                        <p style="font-weight: bold" >Pilih Kelas</p>
                        </div>
                        <div class="mx-1">
                        <select class="custom-select rounded" id="exampleSelectRounded0">
                            <option>X TKJ 1 / X TKJ 2</option>
                            <option>XI TKJ 1 / XI TKJ 2</option>
                            <option>XII TKJ 1 / XII TKJ 2</option>
                        </select>
                        </div>
                        <div  class="mx-1">
                        <button type="button" class="btn btn-primary">Tampilkan</button>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                        <div class="form-group">
                        <select class="custom-select rounded bg-success shadow" id="exampleSelectRounded0">
                            <option>Lihat Data</option>
                            <option>Value 2</option>
                            <option>Value 3</option>
                        </select>
                        </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div >
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="" id="">
                                            </th>
                                            <th>Rombel</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Jekel</th>
                                            <th>TTL</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $id=0; foreach($siswa as $data ): $id++;?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="select" id="">
                                            </td>
                                            <td><?php echo tampil_rombel_byid($data->id_rombel)?></td>
                                            <td><?php echo tampil_nisn_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_nama_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_jekel_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_tempat_lahir_siswa_byid($data->id_daftar)?>, <?php echo tampil_tanggal_lahir_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_alamat_siswa_byid($data->id_daftar)?></td>
                                            <td> 
                                                <a href="<?php echo base_url('Akademik/pindah_sekolah/' . $data->id_daftar) ?>"
                                                        class="btn btn-success btn-sm">
                                                        pindah sekolah</a>
                                                    <a href="<?php echo base_url('Akademik/pindah_kelas/' . $data->id_siswa) ?>"
                                                        class="btn btn-primary btn-sm">
                                                        pindah kelas</a>
                                                        <button onclick="hapus(<?php echo $data->id_daftar ;?>)"
                                                    class="btn btn-danger btn-sm">
                                                    naik kelas</button>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="col-4">
                            <div class="border-bottom h3">Mutasi Siswa</div>
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                        <div class="mt-2 mx-1">
                        <p  style="font-weight: bold" >Jenis</p>
                        </div>
                        <div class="mx-1">
                        <select class="custom-select rounded " id="exampleSelectRounded0">
                                    <option>Pilih</option>
                                    <option>Naik Kelas</option>
                                    <option>Pindah Kelas</option>
                                    <option>Pindah Sekolah</option>
                                    <option>Lulus</option>
                                </select>
                        </div>
                        </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
    <script>
        function hapus(id) {
                window.location.href = "<?php echo base_url('Akademik/naik_kelas/')?>" + id;
        }
        </script>
</body>

</html>