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
              <div class="box-header with-border">
                <center><b><h3 class="box-title">Edit Buku</h3></b></center>
              </div>
              <?php foreach($data_buku as $row ):?>
              <!-- /.box-header -->
              <!-- form start -->
              <form action="<?php echo base_url('Perpustakaan/update_buku')?>" method="post">
                <div class="box-body">
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Judul Buku</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->judul_buku?>" name="judul_buku" class="form-control" placeholder="Masukan Judul Buku"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Penerbit Buku</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->penerbit_buku?>" name="penerbit_buku" class="form-control" placeholder="Masukan Penerbit Buku"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Penulis Buku</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->penulis_buku?>" name="penulis_buku" class="form-control" placeholder="Masukan Penulis Buku"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Tahun Terbit</label>
                  <div class="col-sm-10">
                    <input type="number" value="<?php echo $row->tahun_terbit?>" name="tahun_terbit" class="form-control" placeholder="Masukan Tahun Terbit"><br>
                  </div>
                </div>
                <div class="form-group col-sm-12">
                  <label class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" value="<?php echo $row->keterangan?>" name="keterangan" class="form-control" placeholder="Masukan Keterangan"><br>
                  </div>
                </div>
              </div>
                
                <!-- /.box-body -->
                <div class="box-footer">
                  <input type="hidden" value="<?php echo $row->id_buku?>" name="id_buku">
                  <button type="submit" class="btn btn-primary">update</button>
                  <button type="button" class="btn btn-primary" onclick="kembali()">Kembali</button>
                </div>
                <!-- /.box-footer -->
              </form>
            <?php endforeach;?>
           
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