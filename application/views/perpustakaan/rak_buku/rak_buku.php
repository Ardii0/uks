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
                            <center><b><h3 class="box-title">Data Rak Buku</h3></b></center>
                            <a href="<?php echo base_url('Perpustakaan/tambah_rak_buku'); ?>" class="btn btn-success">Tambah Rak Buku</a>
                            <br>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table_1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Rak Buku</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 0;foreach ($data_rak_buku as $row): $no++;?>
	                                    <tr>
	                                        <td><?php echo $no ?></td>
	                                        <td><?php echo $row->nama_rak_buku ?></td>
	                                        <td>
	                                            <a href="<?php echo base_url('Perpustakaan/edit_rak_buku/' . $row->id_rak_buku) ?>" class="btn btn-primary btn-sm">
	                                            <i class="fa fa-edit"></i> Edit</a>
	                                            <button onclick="hapus(<?php echo $row->id_rak_buku ?>)" class="btn btn-danger btn-sm">
	                                            <i class="fa fa-trash-o"></i> Hapus</button>
	                                        </td>
	                                    </tr>
	                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
  </div>
<?php $this->load->view('perpustakaan/style/js')?>
<script>
    function hapus(id)
    {
        var yes=confirm('Yakin Di Hapus?');
        if(yes == true)
        {
            window.location.href="<?php echo base_url('Perpustakaan/hapus_rak_buku/')?>"+"/"+id;
        }
    }
</script>
</body>
</html>