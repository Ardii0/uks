<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah anggota</title>
    <?php $this->load->view('perpustakaan/style/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('perpustakaan/style/navbar')?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('perpustakaan/style/sidebar')?>
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
                            <tbody >
                                <td class="p-4">foto</td>
                                <td class="p-4">keterangn</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('perpustakaan/style/js')?>
</body>

</html>