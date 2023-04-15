<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar') ?>
        <?php $this->load->view('akademik/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Mutasi Siswa - Tampil Data <?php if( $this->session->userdata('id_select') == "1")echo "Pindah"; elseif( $this->session->userdata('id_select') == "2")echo "Lulus"?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item active"><a
                                        href="<?php echo base_url('Akademik/') ?>">Siswa</a></li>
                                <li class="breadcrumb-item active">Mutasi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="row mx-2 pt-3 d-flex justify-content-between">
                        <div class="col-2 col-sm-6 ">   
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <div class="form-group">
                            <form action="<?php echo base_url('akademik/tampil_data_mutasi/') ?>" method="post">
                            <div class="mx-1">
                                    <select name="id_kelas" id="id_kelas" class="form-control bg-success" onchange="this.form.submit();">
                                            <option value="0">Lihat Data</option>
                                            <option value="1">Pindah</option>
                                            <option value="2">Lulus</option>
                                        </select>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <form id="store" name="store" action="<?php echo base_url('Akademik/aksi_mutasi_siswa'); ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="sample" class="selectall"/>
                                            </th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jekel</th>
                                            <th>TTL</th>
                                            <th>Alamat</th>
                                            <?php
                                                if( $this->session->userdata('id_select') == "1")
                                                echo "<th>Nama Sekolah</th>"; 
                                                elseif( $this->session->userdata('id_select') == "2")
                                                echo "<th>Tanggal Lulus</th>"?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id = 0;
                                        foreach ($siswa as $data):
                                            $id++; ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox"
                                                        name="id_daftar[<?php echo $data->id_daftar ?>]" id="">
                                                </td>
                                                <td>
                                                    <?php echo tampil_nisn_siswa_byid($data->id_daftar) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_nama_siswa_byid($data->id_daftar) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_kelas_byid($data->id_kelas) ?>
                                                </td>
                                                <td> 
                                                    <?php echo tampil_jekel_siswa_byid($data->id_daftar) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_tempat_lahir_siswa_byid($data->id_daftar) ?>,
                                                    <?php echo tampil_tanggal_lahir_siswa_byid($data->id_daftar) ?>
                                                </td>
                                                <td>
                                                    <?php echo tampil_alamat_siswa_byid($data->id_daftar) ?>
                                                </td>
                                                <?php
                                                $pindah = tampil_pindah_siswa_byid($data->id_daftar); 
                                                $lulus = tampil_lulus_siswa_byid($data->id_daftar);
                                                if ($lulus != null) {
                                                    $format_lulus = format_indo($lulus);
                                                } 
                                                if( $this->session->userdata('id_select') == "1")
                                                echo "<td>$pindah</td>"; 
                                                elseif( $this->session->userdata('id_select') == "2")
                                                echo "<td>$format_lulus</td>"?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div> <!-- row -->
                    </form>
                </div>
        </section>
    </div>
    </div>
    <?php $this->load->view('akademik/style/js') ?>
    <script>
    $('.selectall').click(function() {
        if ($(this).is(':checked')) {
            $('div input').attr('checked', true);
        } else {
            $('div input').attr('checked', false);
        }
    });
    </script>
</body>

</html>