<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKS SMPN1 SMG</title>
    <?php $this->load->view('style/head')?>
    <link rel="stylesheet" href="<?php echo base_url('builder/dist/css/kegiatan_uks.css'); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper p-3">
            <div class="container-fluid">
                <section class="content bg-white p-3 rounded">
                    <form action="<?php echo base_url('Kegiatan/update/'.$kegiatan['id']) ?>" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <div class="form-group col-sm-12 mb-0">
                                <label class="control-label">Nama Kegiatan</label>
                                <div class="">
                                    <input type="text" value="<?php echo $kegiatan['nama_kegiatan']; ?>"
                                        name="nama_kegiatan" class="form-control" placeholder="Masukan Nama Kegiatan"><br>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 mb-0">
                                <label class="control-label">Foto Kegiatan</label>
                                <div class="">
                                    <input type="file" name="foto" class="form-control"/><br>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 mb-0">
                                <label class="control-label">Tanggal Mulai Kegiatan</label>
                                <div class="">
                                    <input type="datetime-local" value="<?php echo $kegiatan['tanggal_mulai']; ?>"
                                        name="tanggal_mulai" class="form-control"><br>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 mb-0">
                                <label class="control-label">Tanggal Akhir Kegiatan</label>
                                <div class="">
                                    <input type="datetime-local" value="<?php echo $kegiatan['tanggal_akhir']; ?>"
                                        name="tanggal_akhir" class="form-control"><br>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 mb-0">
                                <label class="control-label">Deskripsi Kegiatan</label>
                                <div class="">
                                    <textarea type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi Kegiatan"><?php echo $kegiatan['deskripsi']; ?></textarea><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-danger text-bold mr-2" onclick="<?php echo $_SERVER['HTTP_REFERER']?>"><span class="p-3">Batal</span></button>
                        <button type="submit" class="btn btn-success text-bold "><span class="p-3">Update</span></button>
                    </div>

                    </form>
                </section>
            </div>
        </div>
    </div>

    <?php $this->load->view('style/js')?>
</body>
</html>