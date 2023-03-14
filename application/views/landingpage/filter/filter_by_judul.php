<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Sekolah</title>
    <link rel="stylesheet" href="<?php echo base_url('builder/dist/css/daftarbuku.css'); ?>">
    <?php $this->load->view('landingpage/style/head')?>
    <?php $this->load->view('landingpage/style/card')?>
</head>

<body class="hold-transition layout-fixed" style="background-color: #E5E7EB" data-panel-auto-height-mode="height">
    <div class="container-fluid py-3 fixed-top mb-2 bg-light">
        <div class="container d-flex justify-content-between align-items-center">
             <a href="<?php echo base_url ('Landingpage/daftar_buku')?>"> <div class="text-dark">
                <h3>E-Perpus</h3>
            </div></a>
            <div class="d-flex gap-4 justify-content-between align-items-center">
                <div>
                    <form action="<?php echo base_url('LandingPage/filter_ByJudulBuku') ?>" method="post">
                        <div class="form-group d-flex" style="width: 160%;">
                            <select name="judul_buku" class="form-control select2"
                                data-dropdown-css-class="select2-info" name="id_siswa" style="width: 100%;">
                                <option>
                                    Pilih Buku
                                </option>
                                <?php $id = 0;foreach ($data_buku as $buku): $id++;?>
                                <option value="<?php echo $buku->judul_buku ?>"><?php echo $buku->judul_buku ?></option>
                                <?php endforeach;?>
                            </select>
                            <button type="submit" style="width: " class="ml-2 w-20 btn btn-success">Tampilkan</button>
                        </div>
                </div>
            </div>
            <div>
                <!-- sengaja biar kosong -->
            </div>
        </div>
    </div>

    </div>
    <div class="container-fluid db-content" style="margin-top:110px">
        <div class="row d-flex justify-content-center">
            <?php $id=0; foreach($datafilter as $data ): $id++;?>
            <h1>Search : " <?php echo $data->judul_buku?> "</h1>
            <?php endforeach;?>
        </div>
        <div class="cards-1 section-gray">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <?php $id=0; foreach($datafilter as $data ): $id++;?>
                    <div class="col-md-4">
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="">
                                    <img class="img"
                                        src="<?php echo base_url('uploads/perpustakaan/buku')."/".$data->foto;?>"
                                        alt="">
                                </a>
                                <div class="ripple-cont"></div>
                            </div>
                            <div class="table">
                                <h5 class="category text-success"></i><?php echo $data->kategori_id?></h6>
                                    <h3 class="card-caption">
                                        <a href="buku/<?php echo $data->id_buku?>"
                                            class="text-wrap"><?php echo $data->judul_buku?></a>
                                    </h3>
                                    <p class="card-description overflow-hidden" style="height: 100px;">
                                        <?php echo $data->keterangan?></p>
                                    <div class="ftr">
                                        <div class="author">
                                            <a><span><strong><?php echo $data->penulis_buku?></strong></span></a>
                                        </div>
                                        <div class="stats"><strong><?php echo $data->tahun_terbit?></strong></div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>

                </div>
            </div>
        </div>
    </div>
    </div>

    <?php $this->load->view('landingpage/style/js')?>
</body>

</html>