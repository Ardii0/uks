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
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('petugasAlumni/event') ?>">Event</a></li>
                                <li class="breadcrumb-item active">Edit Event</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <?php foreach ($data_event as $data): ?>
                                    <form action="<?php echo base_url('petugasalumni/aksi_edit_event') ?>"
                                        enctype="multipart/form-data" method="post">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="control-label">Nama Event</label>
                                                <div class="">
                                                    <input type="text" name="event_title" class="form-control"
                                                        value="<?php echo $data->event_title ?>"><br>
                                                </div>
                                            </div>
                                            <div class="form-floating">
                                                <label class="control-label">Deskripsi</label>
                                                <textarea class="form-control" placeholder="Masukan Deskripsi Event"
                                                    name="deskripsi" id="deskripsi floatingTextarea2" style="height: 100px">
                                                <?php echo $data->deskripsi ?>
                                            </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Tanggal Event</label>
                                                <div class="">
                                                    <input type="date" name="tanggal_event" class="form-control"
                                                        value="<?php echo $data->tanggal_event ?>"><br>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label">Thumbnail</label>
                                                <div class="">
                                                    <img src="<?php $img = $data->gambar == null ? base_url('uploads/akademik/default_profile/User.png') : base_url('uploads/alumni/event') . "/" . $data->gambar;
                                                    echo $img ?>" style="max-width: 100%">
                                                    <input type="file" name="gambar" class="form-control"
                                                        onchange="readURL(this);"><br>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_user"
                                                value="<?php echo $this->session->userdata('id_level') ?>">
                                            <input type="hidden" name="id_event" value="<?php echo $data->id_event ?>">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                <?php endforeach; ?>
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