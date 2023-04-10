<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alumni</title>
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
                            <h1>Event</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('petugasAlumni/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item active">Event</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <div class="row mx-2 pt-3">
                        <div class="col-md-5">
                            <a href="<?php echo base_url('PetugasAlumni/tambah_event'); ?>">
                            <button type="button" class="btn btn-success"><i class="fa fa-plus pr-2"></i>Tambah</button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 20%;">Thumbnail</th>
                                            <th>Detail Event</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0;
                                        foreach ($data_event as $data):
                                            $id++; ?>
                                            <tr>
                                                <td>
                                                    <?php echo $id ?>
                                                </td>
                                                <td>
                                                    <img src="<?php $img = $data->gambar == null ? base_url('uploads/akademik/default_profile/User.png') : base_url('uploads/alumni/event') . "/" . $data->gambar;
                                                    echo $img ?>"
                                                        alt="" srcset="" style="max-width: 100%">
                                                </td>
                                                <td>
                                                    Nama Event : <span style="font-weight: bold;">
                                                        <?php echo $data->event_title ?>
                                                    </span>
                                                    <br />
                                                    Diposting pada:
                                                    <?php echo format_indo($data->tanggal_posting) ?>
                                                    <br />
                                                    Oleh :
                                                    <?php echo $data->id_user ?>
                                                    <br />
                                                    Tanggal event :
                                                    <?php echo format_indo($data->tanggal_event) ?>
                                                    <br />
                                                    Deskripsi event :
                                                    <?php echo $data->deskripsi ?>
                                                </td>
                                                <td class="text-center">
                                                <?php if($data->status === "aktif"): ?>
                                                    <button onclick="nonactive(<?php echo $data->id_event ;?>)"
                                                        class="btn btn-secondary btn-sm">
                                                        <i class="fas fa-check d-flex" style="height: 21px; align-items: center"></i>
                                                    </button>
                                                <?php elseif($data->status === "nonaktif"): ?>
                                                    <button onclick="active(<?php echo $data->id_event ;?>)"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-minus d-flex" style="height: 21px; align-items: center"></i>
                                                    </button>
                                                <?php endif; ?>
                                                        <a href="<?php echo base_url('PetugasAlumni/edit_event/'.$data->id_event); ?>" class="trash " data-id="1">
                                                        <button class="btn btn-primary btn-sm" type="button"
                                                            class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal_event<?php echo $data->id_event ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </a>
                                                    <button class='btn btn-danger btn-sm' 
                                                        onClick="hapus_event(<?php echo $data->id_event ?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
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
        function hapus_event(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('petugasalumni/hapus_event/') ?>" + id;
            }
        }

        function active(id) {
            window.location.href = "<?php echo base_url('petugasalumni/activate_event/')?>" + id;
        }

        function nonactive(id) {
            window.location.href = "<?php echo base_url('petugasalumni/nonactivate_event/')?>" + id;
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>