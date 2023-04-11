<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Saran</title>
    <?php $this->load->view('petugasalumni/style/head')?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('petugasalumni/style/navbar') ?>
        <?php $this->load->view('petugasalumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid pl-4">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box ">
                                <span class="info-box-icon bg-danger" style="background-color:;"><i
                                        class="fas fa-newspaper"></i></span>
                                <div class="info-box-content ">
                                    <span class=" text-bold" style="font-size: 15px">TOTAL SARAN</span>
                                    <span class="text-bold" style="font-size: 24px"><?php echo $count_all; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class=" text-bold" style="font-size: 15px">DITANGGAPI</span>
                                    <span class="text-bold"
                                        style="font-size: 24px"><?php echo $count_ditanggapi; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon text-white" style="background-color: #e8e117"><i
                                        class="fas fa-minus"></i></span>

                                <div class="info-box-content">
                                    <span class=" text-bold" style="font-size: 15px">BELUM DITANGGAPI</span>
                                    <span class="text-bold"
                                        style="font-size: 24px"><?php echo $count_belum_ditanggapi; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class=" text-bold" style="font-size: 15px">TOTAL ALUMNI</span>
                                    <span class="text-bold"
                                        style="font-size: 24px"><?php echo $count_belum_ditanggapi; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white">
                        <div>
                            <div class="p-3">
                                <table id="table" class="table table-bordered">
                                    <thead class="bg-primary">
                                        <tr class="">
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Saran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0; foreach($saran as $data ): $no++; ?>
                                        <tr>
                                            <td style="">
                                                <?php echo $no ?>
                                            </td>
                                            <td>
                                                <?php echo tampil_emailuser($data->id_user) ?>
                                            </td>
                                            <td>
                                                <?php echo $data->saran ?>
                                            </td>
                                            <td>
                                                <?php echo (empty($data->respon) ? 
                                            '<div class="text-center w-50" style="">
                                            <p class="bg-danger text-sm text-bold">belum ditanggapi</p>
                                        </div>' :
                                            '<div class="text-center w-50" style="">
                                            <p class="bg-success text-sm text-bold">telah ditanggapi</p>
                                        </div>'); ?>
                                            </td>
                                            <td class="d-flex ">
                                                <div>
                                                    <a href="<?php echo base_url('Petugasalumni/tanggapan_saran/'.$data->id_saran)?>"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="fas fa-comments"></i> <b> Tanggapi </b></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
<?php $this->load->view('petugasalumni/style/js')?>
<script>
function hapus(id_saran) {
    var yes = confirm('Yakin Di Hapus?');
    if (yes == true) {
        window.location.href = "<?php echo base_url('Alumni/hapus_saran/')?>" + id_saran;
    }
}
</script>

</html>