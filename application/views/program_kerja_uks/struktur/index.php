<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Program Kerja UKS</title>
    <?php $this->load->view('style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar') ?>
        <?php $this->load->view('style/sidebar') ?>

        <div class="content-wrapper py-3">
            <section class="content">
                <div class="container-fluid mb-4">
                    <div class="header p-1 text-light rounded-top d-flex justify-content-between"
                        style="background-color:#4ADE80">
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div style="font-size: 1.5rem">Program Kerja UKS</div>
                        </div>
                        <div class="p-2 d-flex align-items-center gap-3">
                            <div class="grid gap-3">
                                <button class="btn btn-info" data-toggle="modal" data-target="#modal_tambah_struktur"><i
                                        class="fas fa-plus"></i>&nbsp;
                                    Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light shadow">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body text-center mx-auto">
                                    <?php if($struktur !=  null) :?>
                                        <div id="card-text not_found" class="text-center mx-auto p-3">
                                        <img src="<?php echo base_url('uploads/program_kerja_uks/struktur') . "/" . end($struktur)->foto; ?>">
                                        </div>
                                        <?php else :?>
                                        <div id="not_found" class="text-center mx-auto p-3">
                                            <img src="https://cdn.iconscout.com/icon/free/png-256/free-data-not-found-1965034-1662569.png"
                                                alt="">
                                            <h4>Tambahkan Foto Struktur terlebih dahulu</h4>
                                        </div>
                                    <?php endif;?>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Tambah Struktur -->
                <div class="modal fade" id="modal_tambah_struktur" tabindex="-1" role="dialog" aria-labelledby="Modal"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="<?php echo base_url('program_kerja_uks/aksi_tambah_struktur') ?>"
                            enctype="multipart/form-data" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="Modal">Tambah Struktur</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-sm-12 mb-0">
                                        <label class="control-label">Foto Struktur</label>
                                        <div class="custom-file mb-3">
                                            <input type="file" name="foto" onchange="readURL(this);" />
                                        </div>
                                        <div>
                                            <img id="blah" style="width: 110px; hight:200px" class="mt-3" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-danger text-bold w-25"
                                        data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success text-bold w-25">Simpan</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('style/js') ?>
    <?php if ($this->session->flashdata('sukses')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('sukses') ?>",
        icon: "success",
        showConfirmButton: false,
        timer: 5000,
    });
    </script>
    <?php if (isset($_SESSION['sukses'])) {
            unset($_SESSION['sukses']);
        }
    endif; ?>
</body>

</html>