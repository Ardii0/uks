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
                            <h1>Edit Guru</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/guru') ?>">Guru</a></li>
                                <li class="breadcrumb-item active">Edit Guru</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white py-4">
            <div class="container-fluid">
              <?php foreach ($guru as $data): ?>
                <form action="<?php echo base_url('Akademik/update_guru') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Guru</label>
                                    <div class="">
                                        <input type="text" name="nama_guru" class="form-control"
                                            placeholder="Masukan Nama guru" value="<?php echo $data->nama_guru ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jekel</label>
                                    <div class="d-flex">
                                        <div class="form-check mr-3">
                                            <input class="form-check-input" value="L" type="radio" name="jekel"
                                            <?php if($data->jekel=='L') echo "checked='checked'"; ?> id="laki">
                                            <label class="form-check-label" for="laki">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" value="P" type="radio" name="jekel"
                                            <?php if($data->jekel=='P') echo "checked='checked'"; ?> id="perempuan">
                                            <label class="form-check-label" for="perempuan">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Alamat</label>
                                    <div class="">
                                        <textarea class="form-control" name="alamat" cols="88" rows="2" placeholder="Masukan Alamat">
                                            <?php echo $data->alamat ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">NIP</label>
                                    <div class="">
                                        <input type="text" name="nip" class="form-control"
                                            placeholder="Masukan NIP" value="<?php echo $data->nip ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No HP</label>
                                    <div class="">
                                        <input type="number" name="no_hp" class="form-control"
                                            placeholder="Masukan No HP" value="<?php echo $data->no_hp ?>">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="">
                            <input type="hidden" value="<?php echo $data->kode_guru ?>" name="kode_guru">
                            <button type="submit" class="btn btn-success" style="width: 150px; margin-right: 12px;">Ubah</button>
                        </div>
                    </div>
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