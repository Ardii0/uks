<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Saran</title>
    <?php $this->load->view('alumni/style/head')?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('alumni/style/navbar') ?>
        <?php $this->load->view('alumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid pl-4">
                    <div class="bg-white">
                        <div class="border-bottom">
                            <div class="p-3">
                                <a href="">
                                    <button class="btn btn-info"><i class="fa fa-arrow-left"></i>
                                        <b>Kembali</b></button>
                                </a>
                            </div>
                        </div>
                        <div>
                            <div class="p-3">
                                <div class="bg-warning p-2 d-flex justify-content-center" style="width: 85px">
                                    <div class="text-white text-lg text-bold">
                                        Saran
                                    </div>
                                </div>
                                <div>
                                    <?php $id=0; foreach($detail as $data ): $id++;?>
                                    <div class="pt-3">
                                        <h4>Di Posting Tanggal : <?php echo indonesian_date($data->tanggal_posting)?>
                                        </h4>
                                    </div>
                                    <div class="border-bottom">
                                        Isi Saran :
                                        <h5><?php echo $data->saran ?></h5>
                                    </div>
                                    <div class="bg-primary mt-3 p-2 d-flex justify-content-center" style="width: 90px">
                                            <div class="text-white text-lg text-bold">
                                                Respon
                                            </div>
                                        </div>
                                        <textarea class="" name="kritik" id="ckeditor" required=""></textarea>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
</body>
<?php $this->load->view('alumni/style/js')?>

</html>