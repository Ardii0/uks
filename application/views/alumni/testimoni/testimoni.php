<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alumni</title>
    <?php $this->load->view('alumni/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
    hr.hr {
        margin-left: 20rem;
        margin-right: 20rem;
        border-radius: 20px;
        border-top: 5px solid skyblue;
    }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('alumni/style/navbar')?>
        <?php $this->load->view('alumni/style/sidebar')?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="px-3 py-1">
                    <div class="row px-3 py-2 mb-2">
                        <div class="col-sm-6">
                            <h1>Testimoni</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right bg-transparent">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Alumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Testimoni</li>
                            </ol>
                        </div>
                    </div>
                    <div class="bg-white shadow container px-5 py-3 rounded-lg">
                        <div class="text-center h3">
                            TESTIMONIAL
                        </div>
                        <hr class="hr">
                        <?php if ( tampil_pesan_byId_alumni($this->session->userdata('id_level')) === null ) : ?>
                        <form class="row" action="<?php echo base_url('Alumni/aksi_tambah_testimoni') ?>"
                            enctype="multipart/form-data" method="post">
                            <div class="form-group col-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email"
                                    value="<?php echo $this->session->userdata('email'); ?>" disabled>
                                <input type="hidden" class="form-control" name="id_level"
                                    value="<?php echo $this->session->userdata('id_level'); ?>">
                            </div>
                            <div class="form-group col-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username"
                                    value="<?php echo $this->session->userdata('username'); ?>" disabled>
                            </div>
                            <div class="col-12">
                                <label for="pesan">Testimoni</label>
                                <textarea class="w-100 form-control" name="pesan" id="pesan"
                                    placeholder="Masukan Testimoni Anda"></textarea>
                            </div>
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-primary float-right">Tambah Testimoni</button>
                            </div>
                        </form>
                        <?php else : ?>
                        <p class="h5 font-weight-bold">
                            Silahkan tekan icon delete <i class="fa fa-trash text-danger"></i> untuk menghapus testimoni
                            anda.
                        </p>
                        <p class="text-sm">anda hanya diijinkan untuk menghapus testimoni dan menginputkannya ulang agar
                            melalui proses
                            validasi dari kami guna dapat ditampilkan dalam halaman testimoni kami</p>
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr class="text-center">
                                    <th>Testimoni</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=0; foreach($testimoni as $row ): $no++;?>
                                <tr>
                                    <td><?php echo $row->pesan?></td>
                                    <td>
                                        <button onClick="hapus(<?php echo $row->id_testimoni?>)"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php $this->load->view('alumni/style/js')?>

    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('ALumni/delete_testimoni/')?>" + id;
        }
    }
    </script>
</body>

</html>