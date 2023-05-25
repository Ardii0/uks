<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKS SMPN1 SMG</title>
    <?php $this->load->view('style/head')?>
    <link rel="stylesheet" href="<?php echo base_url('builder/dist/css/penanganan.css'); ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <div class="wrapper">
        <?php $this->load->view('style/navbar')?>
        <?php $this->load->view('style/sidebar')?>
        <div class="content-wrapper p-2 py-3">
            <div class="container-fluid">
                <?php 
                    $nama_guru = JoinOne('periksa', 'guru', 'guru_id', 'id','periksa.id',$periksa['id'], 'nama_guru');
                    $nama_siswa = JoinOne('periksa', 'siswa', 'siswa_id', 'id','periksa.id',$periksa['id'], 'nama_siswa');
                    $nama_karyawan = JoinOne('periksa', 'karyawan', 'karyawan_id', 'id','periksa.id',$periksa['id'], 'nama_karyawan');
                ?>
                <div class="badge">
                    <p>
                        Periksa Pasien:
                        <strong>
                            <?php if(!empty($periksa['guru_id'])) {
                                echo $nama_guru;
                            } else if(!empty($periksa['siswa_id'])) {
                                echo $nama_siswa;
                            } else if(!empty($periksa['karyawan_id'])) {
                                echo $nama_karyawan;
                            } ?>
                        </strong>
                    </p>
                </div>
                <div class="theback" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 8px 16px 0px">
                    <form action="<?php echo base_url('periksa/add_penanganan') ?>" enctype="multipart/form-data"
                        method="post">
                        <div class="row clearfix">
                            <div class="col-lg-6">
                                <label class="d-block">Nama Pasien</label>
                                <input type="text" value="<?php if(!empty($periksa['guru_id'])) {
                                        echo $nama_guru;
                                    } else if(!empty($periksa['siswa_id'])) {
                                        echo $nama_siswa;
                                    } else if(!empty($periksa['karyawan_id'])) {
                                        echo $nama_karyawan;
                                    } ?>" class="form-control" disabled>
                            </div>
                            <div class="col-lg-6">
                                <label class="d-block">Status Pasien</label>
                                <input type="text" value="<?php echo $periksa['pasien_status']?>" class="form-control"
                                    disabled>
                            </div>
                        </div>
                        <div class="row clearfix my-1">
                            <div class="col-lg-12">
                                <label class="d-block">Keluhan Pasien</label>
                                <textarea class="form-control" disabled><?php echo $periksa['keluhan']?></textarea>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4">
                                <label class="d-block">Penyakit Pasien</label>
                                <select name="diagnosa_id" class="form-control select2">
                                    <option value="">Pilih Penyakit</option>
                                    <?php foreach($diagnosa as $diagnosa):?>
                                    <option value="<?php echo $diagnosa->id; ?>"><?php echo $diagnosa->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="d-block">Penanganan Pertama</label>
                                <select name="penanganan_pertama_id" class="form-control select2">
                                    <option value="">Pilih Penanganan</option>
                                    <?php foreach($penanganan as $penanganan):?>
                                    <option value="<?php echo $penanganan->id; ?>">
                                        <?php echo $penanganan->nama_penanganan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="d-block">Obat</label>
                                <select name="daftar_obat_id" class="form-control select2">
                                    <option value="">Pilih Obat</option>
                                    <?php foreach($daftar as $daftar):?>
                                    <option value="<?php echo $daftar->id; ?>"><?php echo $daftar->nama_obat; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row clearfix mt-2">
                            <div class="col-lg-4">
                                <label class="d-block">Tindakan</label>
                                <select name="tindakan_id" class="form-control select2">
                                    <option value="">Pilih Tindakan</option>
                                    <?php foreach($tindakan as $tindakan):?>
                                    <option value="<?php echo $tindakan->id; ?>"><?php echo $tindakan->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <label class="d-block">Tensi Systolic</label>
                                        <input type="text" name="tensi_systolic" class="form-control"
                                            autocomplete="off">
                                    </div>
                                    <div class="mt-auto" style="padding: 0;">
                                        /
                                    </div>
                                    <div class="col-lg-5">
                                        <label class="d-block">Tensi Diastolic</label>
                                        <input type="text" name="tensi_diastolic" class="form-control"
                                            autocomplete="off">
                                    </div>
                                    <div class="col-lg-1 mt-auto" style="padding: 0;">
                                        mmHG
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="d-block">Catatan</label>
                                <input type="text" name="catatan" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-lg-1 pt-2">
                                <button type="submit" class="btn btn-success mt-4" type="submit">Tambah</button>
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $periksa['id']?>" name="memperiksa" class="form-control">
                    </form>
                    <div class="mt-3">
                        <table id="data-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 2%;">No</th>
                                    <th>Diagnosa</th>
                                    <th>Penanganan Pertama</th>
                                    <th>Tindakan</th>
                                    <th>Obat</th>
                                    <th>Tensi</th>
                                    <th>Catatan</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id=0; foreach($dataperiksa as $data): $id++;?>
                                <tr>
                                    <td><?php echo $id?></td>
                                    <td><?php echo JoinOne('penanganan_periksa', 'diagnosa', 'diagnosa_id', 'id','penanganan_periksa.id',$data->id, 'nama')?>
                                    </td>
                                    <td><?php echo JoinOne('penanganan_periksa', 'penanganan_pertama', 'penanganan_pertama_id', 'id','penanganan_periksa.id',$data->id, 'nama_penanganan')?>
                                    </td>
                                    <td><?php echo JoinOne('penanganan_periksa', 'tindakan', 'tindakan_id', 'id','penanganan_periksa.id',$data->id, 'nama')?>
                                    </td>
                                    <td><?php echo JoinOne('penanganan_periksa', 'daftar_obat', 'daftar_obat_id', 'id','penanganan_periksa.id',$data->id, 'nama_obat')?>
                                    </td>
                                    <td><?php echo $data->tensi_systolic.'/'.$data->tensi_diastolic?> mmHG</td>
                                    <td><?php echo $data->catatan?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('periksa/edit_stat/'.$data->id)?>"
                                            class='btn btn-warning btn-sm text-white'>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button onclick="hapus(<?php echo $data->id ?>)" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('style/js')?>
    <script>
    <?php if ($this->session->flashdata('success')): ?>
    swal.fire({
        title: "<?php echo $this->session->flashdata('success')?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1250,
    });
    <?php if (isset($_SESSION['success'])) {
                unset($_SESSION['success']);
            }
        endif; ?>

    function hapus(id) {
        swal.fire({
            title: 'Yakin untuk menghapus data ini?',
            text: "Data ini akan terhapus permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil Dihapus',
                    showConfirmButton: false,
                    timer: 1250,

                }).then(function() {
                    window.location.href = "<?php echo base_url('periksa/delete_stat/')?>" + id;
                });
            }
        });
    }
    </script>
</body>

</html>