
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WO Putri Hanastari</title>
    <?php $this->load->view('pemilik/style/head')?>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('Pemilik') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>WO</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>WO Putri Hanastari</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <?php $this->load->view('pemilik/style/navbar')?>
    </header>
    <?php $this->load->view('pemilik/style/sidebar')?>

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
                            <center><b><h1 class="box-title">Menu Foto</h1></b></center>
                            <br>   
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table_1" class="table table-bordered table-striped">
                                <?php $no=0; foreach($menu_foto as $row ): $no++;?>
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Foto 1</td>
                                        <td><img style="width: 130px;height: 100px; " src="<?php echo base_url('uploads/admin/foto_frontend')."/".$row->foto1;?>"></td>
                                        <td>
                                            <a href="<?php echo base_url('Pemilik/edit_menu_foto1/'.$row->id_foto)?>" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Foto 2</td>
                                        <td><img style="width: 130px;height: 100px; " src="<?php echo base_url('uploads/admin/foto_frontend')."/".$row->foto2;?>"></td>
                                        <td>
                                            <a href="<?php echo base_url('Pemilik/edit_menu_foto2/'.$row->id_foto)?>" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Foto 3</td>
                                        <td><img style="width: 130px;height: 100px; " src="<?php echo base_url('uploads/admin/foto_frontend')."/".$row->foto3;?>"></td>
                                        <td>
                                            <a href="<?php echo base_url('Pemilik/edit_menu_foto3/'.$row->id_foto)?>" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endforeach;?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php $this->load->view('pemilik/style/footer')?>
</div>
<?php $this->load->view('pemilik/style/js')?>
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
