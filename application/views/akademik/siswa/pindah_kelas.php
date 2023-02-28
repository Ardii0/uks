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
                            <h1>Pindah Kelas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/siswa') ?>">Siswa</a></li>
                                <li class="breadcrumb-item active">Pindah Kelas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white py-4">
            <div class="container-fluid">
              <?php foreach ($siswa as $data): ?>
                <form action="<?php echo base_url('Akademik/update_pindah_kelas') ?>"
                            enctype="multipart/form-data" method="post">
                            <!-- <select class="form-control form-select px-2 py-1" name="id_rombel"
                                aria-label="Default select example">
                                <option selected>Pilih Rombel</option>
                                <?php $id = 0;foreach ($rombel as $row): $id++;?>
                                <option value="<?php echo $row->id_rombel ?>"><?php echo $row->nama_rombel ?></option>
                                <?php endforeach;?>
                            </select> -->
                            <input type="hidden" name="id_siswa" value="<?php echo $data->id_siswa?>">
                            <input type="text" name="id_daftar" value="<?php echo $data->id_daftar?>">
                            <input type="text" name="id_rombel" value="<?php echo $data->id_rombel?>">
                            <input type="number" name="saldo_tabungan" value="<?php echo $data->saldo_tabungan?>">
                            <button type="submit" class="w-25 btn btn-primary">Simpan</button>
                        </form>
            <?php endforeach;?>
            </div>
            </section>
        </div>
    </div>
    </div>
    </div>
    <?php $this->load->view('akademik/style/js')?>
</body>

</html>