
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
                            <center><b><h3 class="box-title">Petugas</h3></b></center>
                            <br><br>     
                            <a href="<?php echo base_url('Pemilik/tambah_petugas');?>" class="btn btn-success">Tambah Petugas</a>
                            <br>   
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table_1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telp</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Timestamp</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=0; foreach($data_petugas as $row ): $no++;?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><?php echo $row->nama?></td>
                                        <td><?php echo $row->username?></td>
                                        <td><?php echo $row->jenis_kelamin?></td>
                                        <td><?php echo $row->no_telp?></td>
                                        <td><?php echo $row->email?></td>
                                        <td><?php echo $row->alamat?></td>
                                        <td><?php echo $row->timestamp?></td>
                                        <td>
                                            <a href="<?php echo base_url('Pemilik/edit_petugas/'.$row->id_admin)?>" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="hapus(<?php echo $row->id_admin?>)" class="btn btn-danger btn-sm">
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
            window.location.href="<?php echo base_url('Pemilik/hapus_petugas/')?>"+"/"+id;
        }
    }
    
</script>
</body>
</html>
