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
        <div class="content-wrapper p-3">
            <div class="container-fluid">
                <div class="badge">
                    <p>
                        Periksa Pasien: 
                        <strong>
                            <?php if(!empty($periksa['siswa_id'])) {
                                echo JoinOne('periksa', 'siswa', 'siswa_id', 'id','periksa.id',$periksa['id'], 'nama_siswa');
                            } else if(!empty($periksa['guru_id'])) {
                                echo JoinOne('periksa', 'guru', 'guru_id', 'id','periksa.id',$periksa['id'], 'nama_guru');
                            } else if(!empty($periksa['karyawan_id'])) {
                                echo JoinOne('periksa', 'karyawan', 'karyawan_id', 'id','periksa.id',$periksa['id'], 'nama_karyawan');
                            }
                            ?>
                        </strong>
                    </p>
                </div>
                <div class="theback" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 8px 16px 0px">
                    <form action="<?php echo base_url('Periksa/add_penanganan') ?>" enctype="multipart/form-data" method="post">
                        <div class="row clearfix">
                            <div class="col-lg-6">
                                <label class="d-block">Nama Pasien</label>
                                <input type="text" 
                                value="<?php if(!empty($periksa['siswa_id'])) {
                                        echo JoinOne('periksa', 'siswa', 'siswa_id', 'id','periksa.id',$periksa['id'], 'nama_siswa');
                                    } else if(!empty($periksa['guru_id'])) {
                                        echo JoinOne('periksa', 'guru', 'guru_id', 'id','periksa.id',$periksa['id'], 'nama_guru');
                                    } else if(!empty($periksa['karyawan_id'])) {
                                        echo JoinOne('periksa', 'karyawan', 'karyawan_id', 'id','periksa.id',$periksa['id'], 'nama_karyawan');
                                    }
                            ?>" name="name" class="form-control" disabled>
                            </div>
                            <div class="col-lg-6">
                                <label class="d-block">Status Pasien</label>
                                <input type="text" value="<?php echo $periksa['pasien_status']?>" name="name" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="row clearfix my-1">
                            <div class="col-lg-12">
                                <label class="d-block">Keluhan Pasien</label>
                                <textarea class="form-control" disabled><?php echo $periksa['keluhan']?></textarea>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-3">
                                <label class="d-block">Penyakit Pasien</label>
                                <select name="diagnosa_penyakit_id" class="form-control select2">
                                    <option value="">Pilih Penyakit</option>
                                    <?php foreach($diagnosa as $diagnosa):?>
                                        <option value="<?php echo $diagnosa->id; ?>"><?php echo $diagnosa->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="d-block">Penanganan Pertama</label>
                                <select name="penanganan_pertama_id" class="form-control select2">
                                    <option value="">Pilih Penanganan</option>
                                    <?php foreach($penanganan as $penanganan):?>
                                        <option value="<?php echo $penanganan->id; ?>"><?php echo $penanganan->nama_penanganan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label class="d-block">Tindakan</label>
                                <select name="tindakan_id" class="form-control select2">
                                    <option value="">Pilih Tindakan</option>
                                    <?php foreach($tindakan as $tindakan):?>
                                        <option value="<?php echo $tindakan->id; ?>"><?php echo $tindakan->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
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
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Tindakan</th>
                                    <th>Penanganan Pertama</th>
                                    <th>Catatan</th>
                                    <th style="width: 2%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id=0; foreach($dataperiksa as $data): $id++;?>
                                    <tr>
                                        <td><?php echo $id?></td>
                                        <td><?php echo JoinOne('penanganan_periksa', 'periksa', 'periksa_id', 'id','penanganan_periksa.id',$data->id, 'keluhan')?></td>
                                        <td><?php echo JoinOne('penanganan_periksa', 'diagnosa', 'diagnosa_penyakit_id', 'id','penanganan_periksa.id',$data->id, 'nama')?></td>
                                        <td><?php echo JoinOne('penanganan_periksa', 'tindakan', 'tindakan_id', 'id','penanganan_periksa.id',$data->id, 'nama')?></td>
                                        <td><?php echo JoinOne('penanganan_periksa', 'penanganan_pertama', 'penanganan_pertama_id', 'id','penanganan_periksa.id',$data->id, 'nama_penanganan')?></td>
                                        <td><?php echo $data->catatan?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('Periksa/delete_stat/'.$data->id)?>">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    style="width:24px; height: 24px; color: #F87171; font-weight: 700;"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                >
                                                    <path
                                                    strokeLinecap="round"
                                                    strokeLinejoin="round"
                                                    strokeWidth="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                    />
                                                </svg>
                                            </a>
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
</body>
</html>