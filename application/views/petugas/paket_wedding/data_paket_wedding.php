
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WO Putri Hanastari</title>
    <?php $this->load->view('petugas/style/head')?>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('Admin') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>WO</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>WO Putri Hanastari</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <?php $this->load->view('petugas/style/navbar')?>
    </header>
    <?php $this->load->view('petugas/style/sidebar')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <!--Text Editors-->
                Website Wedding Organizer Putri Hanastari
            </h1>
            <ol class="breadcrumb">
                <!--li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li-->
            </ol>
        </section>

        <section class="content">
           <?php if ($this->session->flashdata('pesan')) {
                echo $this->session->flashdata('pesan');
            } ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="box">
                        <div class="box-header">
                            <center><b><h1 class="box-title">Paket Wedding</h1></b></center>
                            <br><br>     
                            <a href="<?php echo base_url('Admin/tambah_paket_wedding');?>" class="btn btn-success">Tambah Paket Wedding</a>
                            <br>   
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table_1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Paket</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Wedding Decoration</th>
                                    <th>Make Up Artist</th>
                                    <th>Wedding Documentation</th>
                                    <th>Catering</th>
                                    <th>Entertainment</th>
                                    <th>Efek dan Flashmob</th>
                                    <th>Exclusive Give</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=0; foreach($data_paket_wedding as $row ): $no++;?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><img style="width: 130px;height: 100px; " src="<?php echo base_url('uploads/admin/paket_wedding')."/".$row->gambar_pw;?>"> </td>
                                        <td><?php echo $row->judul_pw?></td>
                                        <td><?php echo $row->harga_pw?></td>
                                        <td><?php echo $row->deskripsi_pw?></td>
                                        <td><?php echo $row->decoration_pw?></td>
                                        <td><?php echo $row->makeup_artist_pw?></td>
                                        <td><?php echo $row->documentation_pw?></td>
                                        <td><?php echo $row->catering_pw?></td>
                                        <td><?php echo $row->entertainment_pw?></td>
                                        <td><?php echo $row->efek_flashmob_pw?></td>
                                        <td><?php echo $row->exclusive_pw?></td>
                                        <td>
                                            <a href="<?php echo base_url('Admin/edit_paket_wedding/'.$row->id_paket_wedding)?>" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="hapus(<?php echo $row->id_paket_wedding?>)" class="btn btn-danger btn-sm">
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
    <?php $this->load->view('petugas/style/footer')?>
</div>
<?php $this->load->view('petugas/style/js')?>
<script>
    $(function () {
        $('#table_1').dataTable({
            "dom": 'T<"clear">lfrtip',
            "oTableTools": {
                "sSwfPath": " <?php echo base_url('assets/plugins/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') ?> ",
                "aButtons": [
                    "xls",
                    "pdf"
                ]
            }
        });  });
    function hapus(id)
    {
        var yes=confirm('Yakin Di Hapus?');
        if(yes == true)
        {
            window.location.href="<?php echo base_url('Admin/hapus_paket_wedding/')?>"+"/"+id;
        }
    }
    
</script>
</body>
</html>
