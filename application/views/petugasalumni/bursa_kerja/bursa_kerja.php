<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bursa Kerja</title>
    <?php $this->load->view('petugasalumni/style/head')?>
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
                            <h1>Bursa Kerja</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('PetugasAlumni/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Bursa Kerja</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Bursa Kerja</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <a href="<?php echo base_url('PetugasAlumni/tambah_bursa_kerja') ?>">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-plus pr-2"></i>Tambah Lowongan
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Nama Badan Usaha</th>
                                            <th>Judul Pekerjaan</th>
                                            <th>Deskripsi</th>
                                            <th>Akhir Lowongan</th>
                                            <th>Tanggal Posting</th>
                                            <th class="text-center">Ditampilkan?</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach ($bursa_kerja as $data): $id++ ?>
                                        <tr>
                                            <td class="text-center"><?php echo $id ?></td>
                                            <td><?php echo $data->nama_perusahaan ?></td>
                                            <td><?php echo $data->job_title ?></td>
                                            <td><?php echo $data->deskripsi ?></td>
                                            <td><?php echo $data->akhir_waktu ?></td>
                                            <td><?php echo $data->tanggal_posting ?></td>
                                            <td><div class="mx-auto text-center <?php $btn = $data->is_tampil === "Ya" ? 'btn-success' : 'btn-info'; echo $btn ?>" style="width: <?php $btn = $data->is_tampil === "Ya" ? '30px' : '50px'; echo $btn ?>"><?php echo $data->is_tampil ?></div></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('PetugasAlumni/edit_bursa_kerja/').$data->id_lowongan ?>"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i></a>
                                                <a href="<?php echo base_url('PetugasAlumni/hapus_bursa_kerja/').$data->id_lowongan ?>"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
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

    <?php $this->load->view('petugasalumni/style/js')?>

</body>

</html>