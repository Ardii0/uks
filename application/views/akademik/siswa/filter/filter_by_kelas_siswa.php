<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Akademik</title>
    <?php $this->load->view('akademik/style/head')?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('akademik/style/navbar')?>
        <?php $this->load->view('akademik/style/sidebar')?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <?php foreach ($filter as $data): ?>
                            <h1>Data Siswa Kelas <?php echo tampil_kelas_byid($data->id_kelas) ?></h1>
                            <?php endforeach ?>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="<?php echo base_url('Akademik/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active">Data Siswa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="row pt-3 d-flex justify-content-between">
                        <div class="col-7 ml-3 p-2 border rounded-lg">
                            <form action="<?php echo base_url('Akademik/finter_by_kelas_siswa') ?>" method="post">
                                <div class="mx-2">
                                    <h4>Filter Data Siswa</h4>
                                </div>
                                <div class="row mt-3 mx-2">
                                    <div class="col-1 text-left font-weight-bold mt-1">Tingkat</div>
                                    <div class="col-11">
                                        <select id="tingkat" class="custom-select custom-select-md" require>
                                            <option value="">Pilih Tingkat</option>
                                            <?php foreach($tingkat as $data): ?>
                                            <option value="<?php echo $data->id_tingkat ?>">
                                                <?php echo $data->nama_tingkat ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3 mx-2">
                                    <div class="col-1 text-left font-weight-bold mt-1">Kelas</div>
                                    <div class="col-11">
                                        <select id="kelas" name="id_kelas" class="custom-select custom-select-md"
                                            require>
                                            <option>Pilih Kelas</option>
                                            <?php $id = 0;foreach ($kelas as $data): $id++;?>
                                            <option value="<?php echo $data->id_kelas ?>">
                                            <?php echo tampil_namatingkat_ByIdkelas($data->id_kelas)?> <?php echo $data->nama_kelas ?>
                                            </option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3 mx-2">
                                    <div class="col-12 text-right">
                                        <button type="submit" class="btn bg-info"
                                            style="height: 38px; width: auto">Tampilkan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-4">
                            <?php foreach ($filter as $data): ?>
                            <div class="form-group d-flex justify-content-end">
                                <div class="mt-2 mx-1">
                                    <a
                                        href="<?php echo base_url('Akademik/export_siswa_kelas_to_excel/').$data->id_kelas; ?>">
                                        <button type="button" class="btn btn-success mr-1"><i
                                                class="fa fa-download pr-2"></i>Export Data Siswa</button>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="datasiswa-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $id=0; foreach($siswa as $data ): $id++;?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td>
                                                <div class="row">
                                                    <div>
                                                        <?php echo tampil_namatingkat_ByIdkelas($data->id_kelas)?>
                                                    </div>
                                                    <div class="ml-1">
                                                        <?php echo tampil_kelas_byid($data->id_kelas)?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-truncate" style="max-width: 150px;">
                                                <?php echo tampil_nama_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_jekel_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_tempat_lahir_siswa_byid($data->id_daftar)?></td>
                                            <td><?php echo tampil_tanggal_lahir_siswa_byid($data->id_daftar)?></td>
                                            <td class="text-truncate" style="max-width: 150px;">
                                                <?php echo tampil_alamat_siswa_byid($data->id_daftar) ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('Akademik/detail_siswa/'.$data->id_siswa)?>"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa fa-eye"></i></a>
                                                <button onClick="hapus(<?php echo $data->id_siswa?>)"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i></button>
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
    </div>
    <script>
    function hapus(id) {
        var yes = confirm('Yakin Di Hapus?');
        if (yes == true) {
            window.location.href = "<?php echo base_url('Akademik/hapus_siswa/')?>" + id;
        }
    }
    </script>

    <?php $this->load->view('akademik/style/js')?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#tingkat').change(function() {
            var id_tingkat = $(this).val();
            
            $.ajax({
                url: "<?php echo site_url('Akademik/get_kelasByIdTingkat');?>",
                method: "POST",
                data: {
                    id_tingkat: id_tingkat
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    html += '<option>Pilih Kelas</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_kelas + '>' + data[i].nama_kelas + '</option>';
                    }
                    $('#kelas').html(html);

                }
            });
            return false;
        });
    });
    </script>
</body>

</html>