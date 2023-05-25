<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tindakan</title>
    <?php $this->load->view('style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper py-3">
            <div class="container-fluid">
                <section class="content ">
                    <div class="container-fluid ">
                        <div class="header p-2 text-light rounded-top d-flex justify-content-center"
                            style="background-color:#4ADE80">
                            <div class="d-flex align-items-center">
                                <div style="font-size: 2rem">Edit Tindakan</div>
                            </div>

                        </div>
                        <?php foreach ($tindakan as $row): ?>

                        <section class="content bg-white p-3 rounded">
                            <form action="<?php echo base_url('tindakan/update_tindakan') ?>" method="post">
                                <div class="box-body">

                                    <div class="form-group col-sm-12">
                                        <label class="col-sm-2 control-label">Nama Tindakan</label>
                                        <div class="col-sm-">
                                            <input type="text" value="<?php echo $row->nama ?>" name="nama_tindakan"
                                                class="form-control" required placeholder="Masukan Nama Tindakan"><br>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-sm-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-danger text-bold mr-2" onclick="kembali()"
                                        data-dismiss="modal"><span class="p-3">Batal</span></button>
                                    <input type="hidden" value="<?php echo $row->id ?>" name="id">
                                    <button  type="submit" class="btn btn-success text-bold "><span
                                            class="p-3">Update</span></button>
                                </div>

                            </form>
                        </section>
                        <?php endforeach;?>
                    </div>
                </section>
            </div>

        </div>
    </div>
    </div>

    <?php $this->load->view('style/js')?>
    <!-- sweetalert success add -->
    <?php if ($this->session->flashdata('yes')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('yes')?>",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
    });
    </script>
    <?php if (isset($_SESSION['yes'])) {
            unset($_SESSION['yes']);
        }
    endif; ?>
    <!-- sweetalert error -->
    <?php if ($this->session->flashdata('salah')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('salah')?>",
        icon: "error",
        showConfirmButton: false,
        timer: 2000,
    });
    </script>
    <?php if (isset($_SESSION['salah'])) {
            unset($_SESSION['salah']);
        }
    endif; ?>
    <script>

    function kembali() {
        window.history.go(-1);
    }
    </script>
</body>

</html>