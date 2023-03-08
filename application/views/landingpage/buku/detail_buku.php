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

<body class="hold-transition layout-fixed bg-light" data-panel-auto-height-mode="height">

    <div class="container">
        <div class="bg-white rounded">
            <div class="row p-2" style="margin-top: 80px">
                <?php $id=0; foreach($buku as $data ): $id++;?>
                <div class="rounded p-3">
                    <img style="width:240px; height: 390px"
                        src="<?php echo base_url('uploads/perpustakaan/buku')."/".$data->foto;?>" alt="">
                </div>
                <div class="col p-4 border-left  border-right">
                    <div class="pb-3 ">
                        Judul:
                        <h2 class="border-bottom"><?php echo $data->judul_buku ?></h2>
                    </div>
                    <div>
                    </div>
                    <div class="row pb-2">
                        <div class="col">
                            <h6 class="border-bottom">
                                Penerbit : <br />
                                <?php echo $data->penerbit_buku ?>
                            </h6>
                        </div>
                        <div class="col">
                            <h6 class="border-bottom">
                                Penulis : <br />
                                <?php echo $data->penulis_buku ?>
                            </h6>
                        </div>
                        <div class="col">
                            <h6 class="border-bottom">
                                Tahun Terbit : <br />
                                <?php echo $data->tahun_terbit ?>
                            </h6>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col">
                            <h6 class="border-bottom">
                                Kategori : <br />
                                <?php echo $data->kategori_id ?>
                            </h6>
                        </div>
                        <div class="col">
                            <h6 class="border-bottom">
                                Rak Buku : <br />
                                <?php echo $data->rak_buku_id    ?>
                            </h6>
                        </div>
                    </div>
                    <div class="pb-2">
                        <h6 class="border-bottom">
                            Stok : <br />
                            <?php echo $data->stok    ?>
                        </h6>
                    </div>
                    <div class="pb-2">
                        <h6 class="border-bottom">
                            Waktu Ditambahkan: <br />
                            <?php echo $data->created_at?>
                        </h6>
                    </div>
                    <div>
                        <h6 class="border-bottom">
                            Sumber: <br />
                            <?php echo $data->sumber?>
                        </h6>
                    </div>
                </div>
                <div class="col p-4">
                    Keterangan:
                    <h4 class="border-bottom"><?php echo $data->keterangan ?></h4>
                </div>
                <?php endforeach;?>
            </div>
        </div>
        <div class="pt-4 d-flex justify-content-end">
            <a href="<?php echo base_url ('Landingpage/daftar_buku')?>">
                <div class="btn btn-info">
                    Kembali
                </div>
            </a>
        </div>
    </div>

    <?php $this->load->view('landingpage/style/js')?>
</body>

</html>