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
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modal_tambah_event"><i class="fa fa-plus pr-2"></i>Tambah</button>
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
                                                <button class='btn btn-info btn-sm' 
                                                        onClick="show(<?php echo $data->id_event ?>)">
                                                        Tampilkan
                                                    </button>
                                                        <a href="#myModal" class="trash " data-id="1">
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

        <!-- Modal Tambah Event-->
        <div class="modal fade" id="modal_tambah_event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="<?php echo base_url('petugasalumni/aksi_tambah_event') ?>" enctype="multipart/form-data"
                    method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Input Event</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pb-1">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group ">
                                        <label class="control-label">Nama Event</label>
                                        <div class="">
                                            <input type="text" name="event_title" class="form-control"
                                                placeholder="Masukan Nama Event"><br>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Deskripsi</label>
                                        <div class="">
                                            <input type="text" name="deskripsi" class="form-control"
                                                placeholder="Masukan Deskripsi Event"><br>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Tanggal Event</label>
                                        <div class="">
                                            <input type="date" name="tanggal_event" class="form-control"><br>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label">Thumbnail</label>
                                        <div class="">
                                            <input type="file" name="gambar" class="form-control"
                                                onchange="readURL(this);"><br>
                                            <img id="blah" style="max-width: 100%" class="mt-3" />
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user"
                                        value="<?php echo $this->session->userdata('id_level') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" onclick="kembali()"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit Event-->
        <?php foreach ($data_event as $data): ?>
            <div class="modal fade" id="modal_event<?php echo $data->id_event ?>" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?php echo base_url('petugasalumni/aksi_edit_event') ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Edit Event</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body pb-1">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Nama Event</label>
                                            <div class="">
                                                <input type="text" name="event_title" class="form-control"
                                                    value="<?php echo $data->event_title ?>"><br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Deskripsi</label>
                                            <div class="">
                                                <!-- <?php echo $data->deskripsi ?> -->
                                                <input type="text" name="deskripsi" class="form-control"
                                                    value="<?php echo $data->deskripsi ?>">
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Tanggal Event</label>
                                            <div class="">  
                                                <input type="date" name="tanggal_event" class="form-control"
                                                    value="<?php echo $data->tanggal_event ?>"><br>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                        <label class="control-label">Thumbnail</label>
                                        <div class="">
                                        <img src="<?php $img = $data->gambar == null ? base_url('uploads/akademik/default_profile/User.png') : base_url('uploads/petugasalumni/event') . "/" . $data->gambar;
                                                    echo $img ?>" style="max-width: 100%">
                                        <input type="file" name="gambar" class="form-control"
                                            onchange="readURL(this);"><br>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_user"
                                        value="<?php echo $this->session->userdata('id_level') ?>">
                                    <input type="hidden" name="id_event"
                                        value="<?php echo $data->id_event ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" onclick="kembali()"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach ?>

        </section>
    </div>
    </div>
    <?php $this->load->view('petugasalumni/style/js') ?>
    <script>
            $('.trash').click(function() {
        var id = $(this).data('id');
        console.log(id);
        $('#modalDelete').attr('href', 'delete-cover.php?id=' + id);
    })

        function hapus_event(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('petugasalumni/hapus_event/') ?>" + id;
            }
        }

        function show(id) {
            var yes = confirm('Yakin Di Tampilkan?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('petugasalumni/hapus_event/') ?>" + id;
            }
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