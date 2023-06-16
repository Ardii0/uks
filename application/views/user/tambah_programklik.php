<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php $this->load->view('style/head')?>

</head>

<body>
    <div class="min-vh-100 ">
        <div class="wrapper">
            <div class="container ">
            <section class="content">
                    <div class="row px-3 py-2">
                        <div class="col-sm-12">
                            <div class="box">
                                <div class="header p-2 text-light rounded-top d-flex justify-content-center"
                                    style="background-color:#4ADE80">
                                    <div class="d-flex align-items-center">
                                        <div style="font-size: 2rem">Input Program Klik</div>
                                    </div>

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body shadow px-3 py-1 mb-5 bg-white rounded">
                                    
                                    <section class="content bg-white p-2 rounded">
                                        <form action="<?php echo base_url('user/aksi_add_programklik') ?>"
                                            enctype="multipart/form-data" method="post">
                                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <div class="">
                                        <input type="text" name="nama_siswa" class="form-control" required=""
                                            placeholder="Masukan Nama"><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label class="control-label">Kelas</label>
                                        <div class="">
                                            <input type="text" name="kelas" class="form-control" required=""
                                                placeholder="Masukan Kelas"><br>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label class="control-label">Keluhan</label>
                                        <div class="">
                                            <input type="text" name="keluhan" class="form-control" required=""
                                                placeholder="Masukan Keluhan"><br>
                                        </div>
                                    </div>
                                </div>
                               

                            </div>
                            <div class=" d-flex justify-content-between">
                        <div></div>
                        <button type="submit" class="btn btn-success text-bold w-25">Kirim Laporan</button>
                    </div>
                                        </form>
                                    </section>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php $this->load->view('style/js') ?>
        <!-- sweetalert succes -->
        <script src="<?php echo base_url('builder/dist/js/status.js'); ?>"></script>
    <?php if ($this->session->flashdata('berhasil')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('berhasil') ?>",
        icon: "success",
        showConfirmButton: false,
        timer: 2500,
    });
    </script>
    <?php if (isset($_SESSION['berhasil'])) {
            unset($_SESSION['berhasil']);
        }
    endif; ?>
    <script>
</body>

</html>