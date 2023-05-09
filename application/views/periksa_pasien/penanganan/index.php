<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKS SMPN1 SMG</title>
    <?php $this->load->view('style/head')?>
    <link rel="stylesheet" href="<?php echo base_url('builder/dist/css/penanganan.css'); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper p-3">
            <div class="container-fluid">
                <div class="badge">
                    <p>
                        Periksa Pasien: 
                        <strong><?php echo $periksa['nama_pasien']?>
                        </strong>
                    </p>
                </div>
                <form action="<?php echo base_url('Periksa/add_penanganan') ?>" enctype="multipart/form-data" method="post" class="theback">
                    <div class="row clearfix">
                        <div class="col-lg-6">
                            <label class="d-block">Nama Pasien</label>
                            <input type="text" value="<?php echo $periksa['nama_pasien']?>" name="name" class="form-control" disabled>
                        </div>
                        <div class="col-lg-6">
                            <label class="d-block">Status Pasien</label>
                            <input type="text" value="<?php echo $periksa['pasien_status_id']?>" name="name" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row clearfix my-1">
                        <div class="col-lg-12">
                            <label class="d-block">Keluhan Pasien</label>
                            <textarea class="form-control" disabled><?php echo $periksa['keluhan']?></textarea>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-3">
                            <label class="d-block">Penyakit Pasien</label>
                            <select name="diagnosa_penyakit_id" class="form-control select2">
                                <option value="">Pilih Penyakit</option>
                                <?php foreach($diagnosa as $diagnosa):?>
                                    <option value="<?php echo $diagnosa->id; ?>"><?php echo $diagnosa->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label class="d-block">Penanganan Pertama</label>
                            <select name="penanganan_pertama_id" class="form-control select2">
                                <option value="">Pilih Penanganan</option>
                                <?php foreach($penanganan as $penanganan):?>
                                    <option value="<?php echo $penanganan->id; ?>"><?php echo $penanganan->nama_penanganan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label class="d-block">Tindakan</label>
                            <select name="tindakan_id" class="form-control select2">
                                <option value="">Pilih Tindakan</option>
                                <?php foreach($tindakan as $tindakan):?>
                                    <option value="<?php echo $tindakan->id; ?>"><?php echo $tindakan->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label class="d-block">Catatan</label>
                            <input type="text" name="catatan" class="form-control">
                        </div>
                        <div class="col-lg-1 pt-2">
                            <button type="submit" class="btn btn-success mt-4" type="submit">Tambah</button>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $periksa['id']?>" name="memperiksa" class="form-control">
                </form>
            </div>
        </div>
    </div>

    <?php $this->load->view('style/js')?>
</body>
</html>