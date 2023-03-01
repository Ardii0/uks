<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $this->load->view('perpustakaan/style/head')?>
    <style>
      .width-modal{
        width: 1000px;
      }
    </style>
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
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peminjaman Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('Perpustakaan/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                    <li class="breadcrumb-item active">Peminjaman Buku</li>
                    </ol>
                </div>
                </div>
            </div>
            </section>

            <section class="content">
                <div class="container-fluid bg-white">
                    <div class="row mx-2 pt-3 d-flex justify-content-end">
                        <div class="col-md-3 d-flex justify-content-end align-self-start">
                            <a href="<?php echo base_url('Perpustakaan/input_peminjaman') ?>">
                                <button type="button" class="btn btn-success"><i class="fa fa-plus pr-2"></i>Tambah</button>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="perpustakaan-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="bg-secondary">
                                            <th>No</th>
                                            <th>No-Peminjaman</th>
                                            <th>Nama Siswa</th>
                                            <th>Rombel</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $id = 0; foreach ($data_peminjam as $data): $id++ ?>
                                        <tr>
                                          <td><?php echo $id ?></td>
                                          <td><?php echo $data->no_pinjaman ?></td>
                                          <td><?php echo $data->id_anggota ?></td>
                                          <td><?php echo $data->id_anggota ?></td>
                                          <td><?php echo $data->tgl_pinjaman ?></td>
                                          <td><?php echo $data->tgl_kembali ?></td>
                                          <td><?php echo $data->status ?></td>
                                          <td class="text-center">
                                            <a href="<?php echo base_url('Perpustakaan/peminjam_id/'.$data->id_pinjaman)?>">
                                              <button type="button" class="btn btn-primary btn-sm">
                                                  <i class="fa fa-eye"></i> 
                                              </button>
                                            </a>
                                              <button onClick="hapus(<?php echo $data->id_pinjaman?>)" class="btn btn-danger btn-sm">
                                                  <i class="fa fa-trash"></i> 
                                              </button>
                                          </td>
                                        </tr>
                                      <?php endforeach ?>
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
<?php $this->load->view('perpustakaan/style/js')?>
<script>
    function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('Perpustakaan/hapus_peminjaman_id/')?>" + id;
            }
        }
</script>
</body>
</html>