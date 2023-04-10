<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Saran</title>
    <?php $this->load->view('alumni/style/head')?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('alumni/style/navbar') ?>
        <?php $this->load->view('alumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid pl-4">
                    <div class="text-xl">
                        Saran
                    </div>
                    <div class="bg-white">
                        <div class="border-bottom">
                            <div class="p-3">
                                <h5>Perhatian!
                                    saran yang anda masukkan tidak dapat di ubah!
                                </h5>
                            </div>
                        </div>
                        <div>
                            <div class="p-3">
                                <?php $this->session->userdata('id_level') === null ?>
                                <form action="<?php echo base_url('Alumni/aksi_add_saran') ?>" method="post">
                                    <div class="">
                                    <input type="hidden" class="form-control" name="id_user"
                                    value="<?php echo $this->session->userdata('id_level'); ?>">
                                            <textarea class="" name="saran" id="ckeditor" required=""></textarea>
                                        </div>
                                        <div class="mt-5 d-flex justify-content-between">
                                            <a href="<?php echo base_url('alumni/user_saran/')?>"
                                                class="btn btn-warning text-white">
                                                kembali
                                            </a>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
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
<?php $this->load->view('alumni/style/js')?>
<script>
function kembali() {
    window.history.go(-1)
}
$("form").submit( function(e) {
            var totalcontentlength = CKEDITOR.instances['ckeditor'].getData().replace(/<[^>]*>/gi, '').length;
            if( !totalcontentlength ) {
                alert( 'Isi Terlebih Dahulu!' );
                e.preventDefault();
            }
        });
</script>

</html>