<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sekolah</title>
    <link rel="stylesheet" href="<?php echo base_url('builder/dist/css/daftarbuku.css'); ?>">
    <?php $this->load->view('landingpage/style/head')?>
</head>
<body class="hold-transition layout-fixed" style="background-color: #E5E7EB" data-panel-auto-height-mode="height">
<?php $this->load->view('landingpage/style/navbar')?>

<div class="container-fluid db-up">
    <div class="row">
        <div class="col">
            <h1>Daftar Buku</h1>
        </div>
        <div class="col d-flex justify-content-end align-items-end">
            <h4>Total Data: 
                <span style="">
                    <?php echo $total_buku;?></h4>
                </span>
        </div>
    </div>
</div>
<div class="container-fluid db-content">
    <div class="row d-flex justify-content-center">
        <div class="form-group d-flex" style="width: 35%;">
            <select class="form-control select2" data-dropdown-css-class="select2-info" name="id_siswa" style="width: 100%;">
            <option>
            Pilih Buku
            </option>
                <?php $id = 0;foreach ($data_buku as $buku): $id++;?>
                    <option value="<?php echo $buku->id_buku ?>"><?php echo $buku->judul_buku ?></option>
                <?php endforeach;?>
            </select>
            <button class="ml-2 btn btn-success">Tampilkan</button>
        </div>
    </div>
    <div class="row">
        <?php $id=0; foreach($data_buku as $data ): $id++;?>
            <div class="col-md-5 col-sm-12 book" style="">
                <div class="img-wrap">
                    <img src="" alt="">
                </div>
                <div class="detail-wrap">
                    <div style="color: #15803D;">Tanggal Post: </div>
                    <h1 class="text-wrap"><a href="buku/<?php echo $data->id_buku?>" class="text-wrap"><?php echo $data->judul_buku?></a></h1>
                    <p style="margin: 10px 0 0 10px;"><?php echo $data->keterangan?></p>
                    <div class="sources">
                        <div>
                            <div><i class="fas fa-check-circle"></i><?php echo $data->kategori_id?></div>
                            <div class="text-wrap">
                                <span><i class="fas fa-user"></i><?php echo $data->penulis_buku?></span>
                            </div>
                            <div><i class="fas fa-calendar-alt"></i><?php echo $data->tahun_terbit?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>

<?php $this->load->view('landingpage/style/js')?>
</body>
</html>