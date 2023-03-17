<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Keuangan</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- navbar -->
        <?php $this->load->view('keuangan/style/navbar') ?>
        <!-- navbar -->
        <!-- Sidebar -->
        <?php $this->load->view('keuangan/style/sidebar') ?>
        <!-- Sidebar -->

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Neraca Lajur</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Laporan Neraca Lajur</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white shadow">
                    <div class="row mx-2 pt-3  d-flex">
                        <div class="col-2 col-sm-6 ">
                            <div class="form-group border-bottom d-flex flex-row" style="width: fit-content;">

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="align-top">Akun</th>
                                            <th colspan="2">Neraca Saldo</th>
                                            <th colspan="2">Penyesuaian</th>
                                            <th colspan="2">Rugi/Laba</th>
                                            <th colspan="2">Neraca</th>
                                        </tr>
                                        <tr>

                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0;foreach ($data_transaksi as $data): $id++;?>
                                        <tr>
                                            <td>
                                                <?php echo tampil_nama_akun_transaksi($data->id_akun) ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo tampil_debet_transaksi($data->id_anggaran) ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo tampil_kredit_transaksi($data->id_anggaran) ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo tampil_debet_transaksi($data->id_anggaran) ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo tampil_kredit_transaksi($data->id_anggaran) ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo tampil_debet_transaksi($data->id_anggaran) ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo tampil_kredit_transaksi($data->id_anggaran) ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo tampil_debet_transaksi($data->id_anggaran) ?>
                                            </td>
                                            <td>
                                                Rp. <?php echo tampil_kredit_transaksi($data->id_anggaran) ?>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                        <tr>
                                            <td> <strong>
                                                    Total
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    <?php  
                                                            $debet= 0;
                                                            foreach ($data_transaksi as $key) { 
                                                                $debet += tampil_debet_transaksi($key->id_anggaran); 
                                                            } 
                                                            echo $debet;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    <?php  
                                                            $kredit= 0;
                                                            foreach ($data_transaksi as $key) { 
                                                                $kredit += tampil_kredit_transaksi($key->id_anggaran); 
                                                            } 
                                                            echo $kredit;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                            <?php  
                                                            $debet= 0;
                                                            foreach ($data_transaksi as $key) { 
                                                                $debet += tampil_debet_transaksi($key->id_anggaran); 
                                                            } 
                                                            echo $debet;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    -
                                                </strong>
                                            </td>
                                            <td> <strong>
                                            <?php  
                                                            $debet= 0;
                                                            foreach ($data_transaksi as $key) { 
                                                                $debet += tampil_debet_transaksi($key->id_anggaran); 
                                                            } 
                                                            echo $debet;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    Rp. 800.000
                                                </strong>
                                            </td>
                                            <td> <strong>
                                            <?php  
                                                            $debet= 0;
                                                            foreach ($data_transaksi as $key) { 
                                                                $debet += tampil_debet_transaksi($key->id_anggaran); 
                                                            } 
                                                            echo $debet;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    -
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> <strong>
                                                    Laba/Rugi Bersih
                                                </strong>
                                            </td>
                                            <td> <strong>
                                            <?php  
                                                            $debet= 0;
                                                            $kredit=0;
                                                            foreach ($data_transaksi as $key) { 
                                                                $debet += tampil_debet_transaksi($key->id_anggaran); 
                                                                $kredit += tampil_kredit_transaksi($key->id_anggaran); 
                                                                $total = $debet - $kredit;
                                                            } 
                                                            echo $total;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                            <?php  
                                                            $debet= 0;
                                                            $kredit=0;
                                                            foreach ($data_transaksi as $key) { 
                                                                $debet += tampil_debet_transaksi($key->id_anggaran); 
                                                                $kredit += tampil_kredit_transaksi($key->id_anggaran); 
                                                                $total = $kredit + $debet;
                                                            } 
                                                            echo $total;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                            <?php  
                                                                            $debet= 0;
                                                                            $kredit=0;
                                                                            foreach ($data_transaksi as $key) { 
                                                                                $debet += tampil_debet_transaksi($key->id_anggaran); 
                                                                                $kredit += tampil_kredit_transaksi($key->id_anggaran); 
                                                                                $total = $debet - $kredit;
                                                                            } 
                                                                            echo $total;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    
                                            <?php  
                                                            $debet= 0;
                                                            $kredit=0;
                                                            foreach ($data_transaksi as $key) { 
                                                                $debet += tampil_debet_transaksi($key->id_anggaran); 
                                                                $kredit += tampil_kredit_transaksi($key->id_anggaran); 
                                                                $total = $kredit + $debet;
                                                            } 
                                                            echo $total;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    
                                                            <?php  
                                                                            $debet= 0;
                                                                            $kredit=0;
                                                                            foreach ($data_transaksi as $key) { 
                                                                                $debet += tampil_debet_transaksi($key->id_anggaran); 
                                                                                $kredit += tampil_kredit_transaksi($key->id_anggaran); 
                                                                                $total = $debet - $kredit;
                                                                            } 
                                                                            echo $total;?>
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    Rp. 800.000
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    -
                                                </strong>
                                            </td>
                                            <td> <strong>
                                                    -
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('keuangan/style/js') ?>
    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Akademik/hapus_guru/') ?>" + id;
        }
    }
    </script>
</body>

</html>