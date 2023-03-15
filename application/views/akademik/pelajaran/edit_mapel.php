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
                            <h1>Edit Mapel</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a href="<?php echo base_url('Akademik/mapel') ?>">Mapel</a></li>
                                <li class="breadcrumb-item active">Edit Mapel</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content bg-white py-4">
            <div class="container-fluid">
              <?php foreach ($mapel as $data): ?>
                <form action="<?php echo base_url('Akademik/update_mapel') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Mapel</label>
                                    <div class="">
                                        <input type="text" name="nama_mapel" class="form-control" autocomplete="off"
                                            placeholder="Masukan Nama mapel" value="<?php echo $data->nama_mapel ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Keterangan</label>
                                    <div class="">
                                        <input type="text" name="keterangan" class="form-control"
                                            placeholder="Masukan Keterangan" value="<?php echo $data->keterangan ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">JENIS MAPEL</label>
                                    <div class="">
                                    <select name="id_jenismapel" class="form-control form-select px-2 py-1" aria-label="jenismapel">
                                    <option style="display: none;" value="<?php echo $data->id_jenismapel?>">
                                    <?php echo tampil_jenismapelById($data->id_jenismapel)?>
                                    </option>
                                    <?php foreach($jenismapel as $jenis): ?>
	                                    <option value="<?php echo $jenis->id_jenismapel ?>"><?php echo $jenis->nama_jenismapel ?></option>
	                                    <?php endforeach;?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="">
                            <input type="hidden" value="<?php echo $data->id_mapel ?>" name="id_mapel">
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