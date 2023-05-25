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
        <div class="content-wrapper p-2 py-3">
            <div class="container-fluid">
                <div class="header p-3 text-light rounded-top" style="background-color:#4ADE80">
                    <div class="row">
                        <div class="col pl-3 pt-1">
                            <h5>Edit Kegiatan</h5>
                        </div>
                    </div>
                </div>
                <section class="content bg-white p-3 rounded">
                    <form action="<?php echo base_url('kegiatan/update/'.$kegiatan['id']) ?>"
                        enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <div class="form-group col-sm-12 mb-0">
                                <label class="control-label">Nama Kegiatan</label>
                                <div class="">
                                    <input type="text" value="<?php echo $kegiatan['nama_kegiatan']; ?>"
                                        name="nama_kegiatan" class="form-control"
                                        placeholder="Masukan Nama Kegiatan"><br>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 mb-0">
                                <label class="control-label">Foto Kegiatan</label>
                                <div class="">
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="foto">
                                        <label class="custom-file-label"
                                            for="customFile"><?php echo $kegiatan['foto']; ?></label>
                                    </div>
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
                                    <textarea type="text" name="deskripsi" class="form-control"
                                        placeholder="Masukan Deskripsi Kegiatan"><?php echo $kegiatan['deskripsi']; ?></textarea><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 d-flex justify-content-between">
                            <a href="<?php echo base_url('kegiatan/')?>" class="btn btn-danger text-bold mr-2"><span
                                    class="p-3">Batal</span></a>
                            <button type="submit" class="btn btn-success text-bold"><span
                                    class="p-3">Update</span></button>
                        </div>

                    </form>
                </section>
            </div>
        </div>
    </div>

    <?php $this->load->view('style/js')?>
    <script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
</body>

</html>