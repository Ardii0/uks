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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
            <section class="content mt-4">
            <div class="container-fluid bg-white shadow p-4">
            <?php foreach($data_peminjam as $data ):?>
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman Buku</h5>
                     </div>
                     <div class="modal-body pb-1">
                         <div class="box">
                             <!-- /.box-header -->
                             <div class="d-flex justify-content-between">
                              <div>
                                <table>
                                 <tr>
                                   <th class="px-2">No Peminjaman</th>
                                   <td class="px-2"><?php echo $data->no_pinjaman ?></td>
                                 </tr>
                                 <tr>
                                   <th class="px-2">Nama Siswa</th>
                                   <td class="px-2"><?php echo tampil_namadaftar_ByIdAnggota($data->id_anggota) ?></td>
                                 </tr>
                                 <tr>
                                   <th class="px-2">Denda</th>
                                   <td class="px-2">0</td>
                                 </tr>
                                </table>
                              </div>
                              <div>
                                <table>
                                 <tr>
                                   <th class="px-2">ID Anggota</th>
                                   <td class="px-2"><?php echo $data->id_anggota ?></td>
                                 </tr>
                                 <tr>
                                   <th class="px-2">Tanggal Peminjaman</th>
                                   <td class="px-2"><?php echo $data->tgl_pinjaman ?></td>
                                 </tr>
                                 <tr>
                                   <th class="px-2">Tanggal Kembali</th>
                                   <td class="px-2"><?php echo $data->tgl_kembali ?></td>
                                 </tr>
                                </table>
                              </div>
                             </div>
                             <table id="akademik-table" class="table table-bordered table-striped mt-4">
                                    <thead>
                                        <tr class="bg-secondary">
                                            <th>ID-Buku</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Kategori</th>
                                            <th>Rak</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <td><?php echo $data->id_buku ?></td>
                                          <td><?php echo tampil_namabuku_byPeminjamanId($data->id_buku) ?></td>
                                          <td><?php echo tampil_pengarangbuku_byPeminjamanId($data->id_buku) ?></td>
                                          <td><?php echo tampil_kategoribuku_byPeminjamanId($data->id_buku) ?></td>
                                          <td><?php echo tampil_rakbuku_byPeminjamanId($data->id_buku) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                         </div>
                     </div>
                     <div class="modal-footer d-flex justify-content-end">
                      <button type="button" onClick="kembali()" class="btn btn-danger">
                        kembali
                      </button>
                     </div>
                 </div>
                </div>
              <?php endforeach ?>
            </div>
        </div>
        </section>
    </div>
<?php $this->load->view('perpustakaan/style/js')?>
<script>
        function kembali() {
            window.history.go(-1);
        }
        </script>
</body>
</html>