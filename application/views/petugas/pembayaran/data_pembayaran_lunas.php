
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
                            <center><b><h3 class="box-title">Data Pembayaran</h3></b></center>  
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table_1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No Invoice</th>
                                    <th>Paket</th>
                                    <th>DP</th>
                                    <th>Bukti DP</th>
                                    <th>Pelunasan</th>
                                    <th>Bukti Pelunasan</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=0; foreach($data_pembayaran as $row ): $no++;?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><?php echo $row->nama_pemesan?></td>
                                        <td>DP : <?php echo $row->no_invoice_dp?><br>
                                            Pelunasan : <?php echo $row->no_invoice_pelunasan?></td>
                                        <td><?php echo $row->judul_pw?></td>
                                        <td><?php echo $row->bayar_dp?></td>
                                        <td><img style="width: 130px;height: 100px; " src="<?php echo base_url('uploads/admin/bukti_transfer_dp')."/".$row->bukti_pembayaran_dp;?>"></td>
                                        <td><?php echo $row->bayar_pelunasan?></td>
                                        <td><img style="width: 130px;height: 100px; " src="<?php echo base_url('uploads/admin/bukti_transfer_pelunasan')."/".$row->bukti_pembayaran_pelunasan;?>"> </td>
                                        <td>
                                            Lunas
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
            window.location.href="<?php echo base_url('Admin/hapus_konsumen/')?>"+"/"+id;
        }
    }
    
</script>
</body>
</html>
