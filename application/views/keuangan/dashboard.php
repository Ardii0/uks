<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Keuangan</title>
    <?php $this->load->view('akademik/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style>
.example-1 {
    position: relative;
    overflow-y: scroll;
    height: 200px;
}

.example-1::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.example-1 {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('keuangan/style/navbar') ?>
        <?php $this->load->view('keuangan/style/sidebar') ?>

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="px-3 py-1">
                    <div class="pb-1 d-flex justify-content-between align-items-center text-center">
                        <div>
                            <p style="font-size: 2rem">Dashboard Keuangan</p>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col">
                            
                            <div class="row">
                                <div class="col">
                                <div>
                                <div class="small-box bg-gradient-info">
                                    <div class="inner">
                                        <p>Jumlah jenis Anggaran</p>
                                        <h3><?php echo $total_anggaran?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-th"></i>
                                    </div>
                                    <a href="<?php echo base_url('keuangan/anggaran')?>" class="small-box-footer">Info Lebih Lanjut <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                                </div>
                            <div class="col">
                                <div>
                                <div class="small-box bg-gradient-info">
                                    <div class="inner">
                                        <p>Jumlah Jenis Dana Transaksi</p>
                                        <h3><?php echo $total_jenis_trans;  ?></h3>
                                    </div>
                                    <div class="icon">
                                        <i class="nav-icon fas fa-money-bill"></i>
                                    </div>
                                    <a href="<?php echo base_url('keuangan/dana')?>" class="small-box-footer">Info Lebih Lanjut <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <div class="small-box bg-gradient-info d-flex">
                                    <div class="inner col-4 d-flex justify-content-center align-items-center">
                                        <i class="nav-icon fas fa-money-bill" style="font-size: 55px;"></i>
                                    </div>
                                    <div class="inner">
                                        <p>Jumlah Pembayaran Hari ini</p>
                                            <?php foreach ($pembayaran as $totalprch) { ?>
                                                <h5><?php if($totalprch->total == 0) {
                                                    echo "Rp. -";
                                                } else {
                                                    echo convRupiah($totalprch->total);
                                                }
                                                ?></h5>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="">
                                <div class="" style="width: 100%; ">
                                    <div class="">
                                        <div class="" style="height:75vh">
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <p>Jumlah Akun</p>
                                                    <h3><?php echo $total_akun; ?></h3>
                                                </div>
                                                <div class="icon">
                                                    <i class="far fa-user"></i>
                                                </div>
                                                <a href="<?php echo base_url('keuangan/akun') ?>"
                                                 class="small-box-footer">Infor Lebih Lanjut
                                                 <i class="fa fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                            <div class="m-2 anyClass">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="text-center bg-info">
                                                            <th>No</th>
                                                            <th>Nama Akun</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $id = 0;foreach ($data_akun as $data): $id++;?>
                                                        <tr class="bg-white text-center">
                                                            <td style="width: 4%;"><?php echo $id ?></td>
                                                            <td>  <?php echo $data->nama_akun?>
                                                            </td>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php $this->load->view('akademik/style/js')?>
</body>

</html>