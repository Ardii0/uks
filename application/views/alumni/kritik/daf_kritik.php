<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kritik</title>
    <?php $this->load->view('alumni/style/head')?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('alumni/style/navbar') ?>
        <?php $this->load->view('alumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid pl-4">
                    <div class="">
                        <h1>Kritik</h1>
                        <p>Masukan berupa kritik adalah sesuatu yang bersifat membangun.</p>
                    </div>
                    <div class="bg-white">
                        <div class="border-bottom">
                            <div class="p-3">
                            <a href="<?php echo base_url('alumni/form_kritik') ?>">
                                    <button class="btn btn-info"><i class="fa fa-plus"></i> <b>Tambah kritik</b></button>
                                </a>
                            </div>
                        </div>
                        <div>
                            <div class="p-3">
                                <table id="table" class="table table-bordered">
                                    <thead class="bg-info">
                                        <tr class="">
                                            <th>Tanggal Posting</th>
                                            <th>Kritik </th>
                                            <th>Tanggapan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0; foreach($kritik as $data ): $no++; ?>
                                        <tr>
                                            <td style="width: 20%">
                                                <?php echo indonesian_date($data->tanggal_posting) ?>
                                            </td>
                                            <td>
                                                <?php echo $data->kritik ?>
                                            </td>
                                            <td>
                                                <?php echo (empty($data->respon) ? 
                                            '<div class="text-center w-50" style="">
                                            <p class="bg-danger text-bold">belum ditanggapi</p>
                                        </div>' :
                                            '<div class="text-center w-50" style="">
                                            <p class="bg-success text-bold">telah ditanggapi</p>
                                        </div>'); ?>
                                            </td>
                                            <td class="d-flex ">
                                            <div>
                                                    <a href="<?php echo base_url('Alumni/detail_kritik/'.$data->id_kritik)?>" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye"></i> </a>
                                                </div>
                                                <div class="mx-1">
                                                    <button class="btn btn-danger btn-sm" onclick="hapus(<?php echo $data->id_kritik ;?>)">
                                                        <i class="fa fa-trash"></i> </button>
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
<?php $this->load->view('alumni/style/js')?>
<script>
    function hapus(id_kritik) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Alumni/hapus_kritik/')?>" + id_kritik;
        }
    }
    </script>

</html>