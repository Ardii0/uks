<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun</title>
    <?php $this->load->view('style/head')?>
</head>


<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper p-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="card-header text-center" style="background-color: #4ADE80; color: white;">
                                Akun Admin
                            </h5>
                            <div class="card-body">
                                <?php foreach ($akun as $data): ?>
                                <form action="<?php echo base_url('akun/update_akun') ?>" method="post">
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" required name="username" class="form-control"
                                                id="username" value="<?php echo $data->username ?>">
                                            <input type="hidden" name="id" class="form-control" id="id"
                                                value="<?php echo $data->id ?>">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" id="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="konfirmasi_password" class="col-sm-2 col-form-label">Konfirmasi
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="konfirmasi_password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                </form>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('style/js')?>
    <?php if ($this->session->flashdata('sukses')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('sukses')?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1000,
    });
    </script>
    <?php if (isset($_SESSION['sukses'])) {
            unset($_SESSION['sukses']);
        }
    endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <script>
    swal.fire({
        title: "<?php echo $this->session->flashdata('error')?>",
        icon: "error",
        showConfirmButton: false,
        timer: 1000,
    });
    </script>
    <?php if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
    endif; ?>
</body>

</html>