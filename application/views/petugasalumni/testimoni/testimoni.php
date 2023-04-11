<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Testimoni</title>
    <?php $this->load->view('petugasalumni/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('petugasalumni/style/navbar') ?>
        <?php $this->load->view('petugasalumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Testimoni</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('PetugasAlumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Testimoni</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content ">
                <div class="container-fluid bg-white shadow">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Surel Pengguna</th>
                                            <th>Testimoni</th>
                                            <th>Ditampilkan?</th>
                                            <th>Aksi?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0;
                                        foreach ($testimoni as $data):
                                            $id++; ?>
                                        <tr>
                                            <td>
                                                <?php echo $id ?>
                                            </td>
                                            <td>
                                                <?php echo $dt->email ?>
                                            </td>
                                            <td style="width: 50%">
                                                <?php echo $data->pesan ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($data->tampil === "YES"): ?>
                                                <a
                                                    href="<?php echo base_url('PetugasAlumni/nonactive/').$data-> id_testimoni ?>">
                                                    <button class="btn btn-success btn-sm"
                                                        style="width: 75px">YES</button></a>
                                                <?php else: ?>
                                                <a href="<?php echo base_url('PetugasAlumni/active/').$data-> id_testimoni ?>">
                                                    <button class="btn btn-secondary btn-sm"
                                                        style="width: 75px">NO</button></a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <button onclick="hapus(<?php echo $data->id_testimoni ;?>)"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('petugasalumni/style/js') ?>
    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('PetugasAlumni/hapus_testimoni/')?>" + id;
        }
    }
    </script>
</body>

</html>