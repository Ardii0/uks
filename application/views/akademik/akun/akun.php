<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akun</title>
    <?php $this->load->view('Akademik/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('Akademik/style/navbar')?>
        <?php $this->load->view('Akademik/style/sidebar')?>

        <div class="content-wrapper">
            <div class="px-3 py-1">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Akun</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a
                                            href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                    </li>
                                    <li class="breadcrumb-item active">Akun</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="bg-white shadow container px-5 py-3 rounded-lg">
                    <?php foreach($user as $data ): ?>
                    <form action="<?php echo base_url('Akademik/update_akun') ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="row">
                            <div class="col-12 row mt-3">
                                <div class="col-3 font-weight-bold mt-1">Email</div>
                                <div class="col-9">
                                    <input type="email" name="email" class="form-control w-100"
                                        value="<?php echo $data->email?>">
                                    <input type="hidden" name="id_level" class="form-control w-100"
                                        value="<?php echo $data->id_level?>">
                                </div>
                            </div>
                            <div class="col-12 row mt-3">
                                <div class="col-3 font-weight-bold mt-1">Username</div>
                                <div class="col-9">
                                    <input required type="text" name="username" class="form-control w-100"
                                        value="<?php echo $data->username?>">
                                </div>
                            </div>
                            <div class="col-12 row mt-3">
                                <div class="col-3 font-weight-bold mt-1">Password</div>
                                <div class="col-9">
                                    <input type="password" id="remove" name="password_baru" class="form-control w-100">
                                </div>
                            </div>
                            <div class="col-12 row mt-3">
                                <div class="col-3 font-weight-bold mt-1">Konfirmasi Password</div>
                                <div class="col-9">
                                    <input type="password" id="remove" name="password_baru2" class="form-control w-100">
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('Akademik/style/js')?>
    <script>
    $('#remove').removeAttr('required');
    </script>
</body>

</html>