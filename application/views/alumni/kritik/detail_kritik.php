<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kritik</title>
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
                        <div>
                            <div class="p-3">
                                <div class="bg-warning p-2 d-flex justify-content-center" style="width: 85px">
                                    <div class="text-white text-lg text-bold">
                                        Kritik
                                    </div>
                                </div>
                                <div>
                                    <?php $id=0; foreach($detail as $data ): $id++;?>
                                    <div class="pt-3">
                                        <h4>Di Posting Tanggal : <?php echo indonesian_date($data->tanggal_posting)?>
                                        </h4>
                                    </div>
                                    <div class="border-bottom">
                                        Isi Kritik :
                                        <h5><?php echo $data->kritik ?></h5>
                                    </div>
                                    <?php echo (empty($data->respon) ? '' :
                                            '<div class="bg-primary mt-3 p-2 d-flex justify-content-center" style="width: 90px">
                                            <div class="text-white text-lg text-bold">
                                                Respon
                                            </div>
                                        </div>'); ?>
                                    <?php echo (empty($data->respon) ? '' :'<div class="pt-3">
                                    <h4>Di Posting Tanggal :' . indonesian_date($data->tanggal_respon) . '</h4>');?>
                                </div>
                                <?php echo (empty($data->respon) ? '':'<div class="border-bottom">
                                    Isi Respon :
                                    <h5>' . $data->respon . '</h5>                                  
                                </div>')?>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="p-3">
                                <a href="<?php echo base_url('alumni/user_kritik') ?>">
                                    <button class="btn btn-info"><i class="fa fa-arrow-left"></i>
                                        <b>Kembali</b></button>
                                </a>
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