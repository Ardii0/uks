<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah anggota</title>
    <?php $this->load->view('perpustakaan/style/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('perpustakaan/style/navbar') ?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('perpustakaan/style/sidebar') ?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="p-5 bg-white d-flex justify-content-center">
                        <table class="border" style="padding: 20px">
                            <thead class="border">
                                <td>
                                    <img src="<?php echo base_url('') ?>" alt="">
                                </td>
                                <td class="p-4">
                                    <p class="text-bold">
                                    <h3 class=" text-center">
                                        PERPUSTAKAAN SEKOLAH <br>
                                        SMK BINA NUSANTARA<br>
                                        <P>jl kemantren</P>
                                    </h3>
                                    </p>
                                </td>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <?php foreach ($buku as $data): ?>
                <div class="container-fluid bg-white rounded">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group d-flex flex-row " style="width: fit-content;">
                                <div class="mt-2 mx-1">
                                    <h4>Barcode</h4>
                                    <h4><?php echo tampil_judul_buku_byid($data->id_buku)?></h4>
                                    <?php    
                                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                        echo $generator->getBarcode($data->id_buku, $generator::TYPE_CODE_128);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </section>
        </div>
    </div>
    <?php $this->load->view('perpustakaan/style/js') ?>
</body>

</html>