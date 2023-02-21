<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $this->load->view('perpustakaan/style/head')?>
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
    <div class="container-fluid">
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <center><b><h3 class="box-title">Tambah Buku</h3></b></center>
            </div>
            <!-- /.box-header -->
            <form action="<?php echo base_url('Perpustakaan/aksi_tambah_buku') ?>" enctype="multipart/form-data" method="post">
              <div class="box-body">
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Judul Buku</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul_buku" class="form-control" placeholder="Masukan Judul Buku"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Penerbit</label>
                  <div class="col-sm-10">
                    <input type="text" name="penerbit_buku" class="form-control" placeholder="Masukan Penerbit Buku"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Rak Buku</label>
                  <div class="col-sm-10">
                  <select name="rak_buku_id" class="custom-select custom-select-lg mb-3">
                    <option selected>-- Pilih Rak --</option>
                    <?php $no = 0;foreach ($data_rak_buku as $row): $no++;?>
	                        <option value="<?php echo $row->nama_rak_buku ?>"><?php echo $row->nama_rak_buku ?></option>
	                    <?php endforeach;?>
                  </select>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Kategori Buku</label>
                  <div class="col-sm-10">
                  <select name="kategori_id" class="custom-select custom-select-lg mb-3">
                    <option selected>-- Pilih Kategori --</option>
                    <?php $no = 0;foreach ($data_kategori_buku as $row): $no++;?>
	                        <option value="<?php echo $row->nama_kategori_buku ?>"><?php echo $row->nama_kategori_buku ?></option>
	                    <?php endforeach;?>
                  </select>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Penulis</label>
                  <div class="col-sm-10">
                    <input type="text" name="penulis_buku" class="form-control" placeholder="Masukan Penulis Buku"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Tahun Terbit</label>
                  <div class="col-sm-10">
                    <input type="number" name="tahun_terbit" class="form-control" placeholder="Masukan Tahun Terbit"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan"><br>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-primary" onclick="kembali()">Kembali</button>
              </div>
            </form>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>
<?php $this->load->view('perpustakaan/style/js')?>

<script>
  function kembali()
    {
      window.history.go(-1);
    }

</script>

</body>
</html>