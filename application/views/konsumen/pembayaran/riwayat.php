
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WO Putri Hanastari</title>
    <?php $this->load->view('konsumen/style/head')?>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('Konsumen') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>WO</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>WO Putri Hanastari</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <?php $this->load->view('konsumen/style/navbar')?>
    </header>
    <?php $this->load->view('konsumen/style/sidebar')?>

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
                            <center><b><h3 class="box-title">Riwayat Pembayaran</h3></b></center>
                            <br/><br/>
                            <a href="<?php echo base_url('Konsumen/pembayaran');?>" class="btn btn-success" >Tagihan</a>
                            <a href="<?php echo base_url('Konsumen/riwayat');?>" class="btn btn-success">Riwayat</a>
                            <br>   
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahap</th>
                                    <th>Tagihan</th>
                                    <th>Di Bayar</th>
                                    <th>Total</th>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <th>Uang Muka (DP)</th>
                                    <th><?php echo $dt->dp_pw?></th>
                                    <th><?php echo $dt->bayar_dp?></th>
                                    <th><?php echo $dt->bayar_dp?></th>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <th>Uang Pelunasan</th>
                                    <th><?php echo $dt->pelunasan_pw?></th>
                                    <th><?php echo $dt->bayar_pelunasan?></th>
                                    <th><?php echo $dt->bayar_pelunasan?></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Total</th>
                                    <th><?php
                                    $bayar_dp = $dt->bayar_dp;
                                    $bayar_pelunasan = $dt->bayar_pelunasan;
                                    $total = $bayar_dp + $bayar_pelunasan;
                                    echo $total ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Sub Total</th>
                                    <th><?php echo $dt->harga_pw?></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Kurang</th>
                                    <th><?php
                                    $bayar_dp = $dt->bayar_dp;
                                    $bayar_pelunasan = $dt->bayar_pelunasan;
                                    $harga_pw = $dt->harga_pw;
                                    $total = $bayar_dp + $bayar_pelunasan;
                                    $kurang = $harga_pw - $total;
                                    echo $kurang ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php $this->load->view('konsumen/style/footer')?>
    <?php $this->load->view('konsumen/paket_wedding/modal_detail_paket_wedding')?>
</div>
<?php $this->load->view('konsumen/style/js')?>
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
            window.location.href="<?php echo base_url('Admin/hapus_penerimaan_bank/')?>"+"/"+id;
        }
    }

    function detail_paket_wedding(id,judul,harga,deskripsi,dekorasi,makeup,dokumentasi,catering,entertainment,efek,exclusive) {
      $("#form_paket_wedding").attr('action',"<?php echo base_url('Admin/aksi_spesialis'); ?>");
      $('#form_paket_wedding')[0].reset();
      $('[name="id_paket_wedding"]').val(id);
      $('[name="judul_pw"]').val(judul);
      $('[name="harga_pw"]').val(harga);
      $('[name="deskripsi_pw"]').val(deskripsi);
      $('[name="decoration_pw"]').val(dekorasi);
      $('[name="makeup_artist_pw"]').val(makeup);
      $('[name="documentation_pw"]').val(dokumentasi);
      $('[name="catering_pw"]').val(catering);
      $('[name="entertainment_pw"]').val(entertainment);
      $('[name="efek_flashmob_pw"]').val(efek);
      $('[name="exclusive_pw"]').val(exclusive);
      $('#modal_detail_paket_wedding').modal('show');
    }
    
</script>
</body>
</html>
