<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Saran</title>
    <?php $this->load->view('PetugasAlumni/style/head')?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('PetugasAlumni/style/navbar') ?>
        <?php $this->load->view('PetugasAlumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid pl-4">
                    <div class="bg-white">
                        <div>
                            <div class="p-3">
                                <form action="<?php echo base_url('PetugasAlumni/aksi_tanggapan_saran') ?>"
                                    enctype="multipart/form-data" method="post">
                                    <div class="bg-warning p-2 d-flex justify-content-center" style="width: 85px">
                                        <div class="text-white text-lg text-bold">
                                            Saran
                                        </div>
                                    </div>
                                    <div>
                                        <?php $id=0; foreach($detail as $data ): $id++;?>
                                        <div class="pt-3">
                                            <h4>Di Posting Tanggal :
                                                <?php echo indonesian_date($data->tanggal_posting)?>
                                            </h4>
                                        </div>
                                        <div class="border-bottom">
                                            Isi Saran :
                                            <h5><?php echo $data->saran ?></h5>
                                        </div>

                                        <div class="bg-primary my-3 p-2 d-flex justify-content-center"
                                            style="width: 90px">
                                            <div class="text-white text-lg text-bold">
                                                Respon
                                            </div>
                                        </div>
                                        <textarea class="" name="respon" id="ckeditor" required=""
                                            value="<?php echo $data->respon ?>"><?php echo $data->respon ?></textarea>

                                        <?php endforeach;?>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-between">
                                        <div>
                                        <a href="<?php echo base_url('PetugasAlumni/admin_saran') ?>">
                                    <button class="btn btn-info"><i class="fa fa-arrow-left"></i>
                                        <b>Kembali</b></button>
                                </a>
                                        </div>
                                        <div>
                                            <input type="text" value="<?php echo $data->id_saran ?>" name="id_saran"
                                                class="form-control" hidden>
                                            <input type="text" value="<?php echo $dt->id_level ?>" name="id_user"
                                                class="form-control" hidden>
                                            <button type="submit" class="btn bg-blue"
                                                style="width: 150px; margin-right: 12px;">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
<?php $this->load->view('PetugasAlumni/style/js')?>
<script>
    $("form").submit( function(e) {
            var totalcontentlength = CKEDITOR.instances['ckeditor'].getData().replace(/<[^>]*>/gi, '').length;
            if( !totalcontentlength ) {
                alert( 'Isi Terlebih Dahulu!' );
                e.preventDefault();
            }
        });
</script>
</html>