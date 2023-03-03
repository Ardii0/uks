<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sekolah</title>
    <link rel="stylesheet" href="<?php echo base_url('builder/dist/css/detailbuku.css'); ?>">
    <?php $this->load->view('landingpage/style/head')?>
</head>
<body class="hold-transition layout-fixed" style="background-color: #E5E7EB" data-panel-auto-height-mode="height">
<?php $this->load->view('landingpage/style/navbar')?>

<div class="container deb-body">
    <div class="row">
        <?php $id=0; foreach($buku as $data ): $id++;?>
            <div>
                <img src="" alt="">
            </div>
            <div class="col">
            <div>
                <?php echo $data->judul_buku?>
            </div>
            <div>
                <?php echo $data->keterangan?>
            </div>
            <div>
                <?php echo $data->kategori_id?>
            </div>
            <div>
                <?php echo $data->penulis_buku?>
            </div>
            <div>
                <?php echo $data->tahun_terbit?>
            </div>
        <?php endforeach;?>
    </div>
</div>

<?php $this->load->view('landingpage/style/js')?>
</body>
</html>