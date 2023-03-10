<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Keuangan</title>
    <?php $this->load->view('akademik/style/head') ?>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('keuangan/style/navbar') ?>
        <?php $this->load->view('keuangan/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Pembayaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                    href="<?php echo base_url('Keuangan/') ?>"><?php echo $this->session->userdata('level') ?></a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                    href="<?php echo base_url('Keuangan/pembayaran') ?>">Pembayaran</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Pembayaran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid bg-white shadow p-3">
                    <div class="row">
                        <!-- <div class="col-5"> -->
                        <!-- <form class="col-5" action="<?php echo base_url('Keuangan/form_tambah_pembayaran/') ?>" enctype="multipart/form-data" method="post"> -->
                        <?php echo form_open('Keuangan/direct', array('class' => 'col-5', 'id' => 'form')); ?>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Kelas</div>
                                <div class="col-8">
                                    <select id="kelas" class="custom-select custom-select-md">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach($kelas as $kelas): ?>
                                            <option value="<?php echo $kelas->id_kelas ?>"><?php echo $kelas->nama_kelas ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Rombel</div>
                                <div class="col-8">
                                    <select id="rombel" class="custom-select custom-select-md">
                                        <option value="">Pilih Rombel</option>
                                        <?php foreach($rombel as $rombel): ?>
                                            <option value="<?php echo $rombel->id_rombel ?>"><?php echo $rombel->nama_rombel ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-right font-weight-bold mt-1">Nama Siswa</div>
                                <div class="col-8">
                                    <select name="id_siswa" id="siswa" class="custom-select custom-select-md">
                                        <option value="">Pilih Siswa</option>
                                        <?php foreach($siswa as $siswa): ?>
                                            <option value="<?php echo $siswa->id_siswa ?>"><?php echo tampil_namadaftar_ByIdSiswa($siswa->id_siswa) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-4 text-right font-weight-bold">
                                </div>
                                <div class="col-8">
                                    <button type="submit" class="btn btn-primary">Input</button>
                                </div>
                            </div>
                        <!-- </div> -->
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view('keuangan/style/js') ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#kelas').change(function(){ 
                var id_kelas=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('keuangan/get_rombelByIdKelas');?>",
                    method : "POST",
                    data : {id_kelas: id_kelas},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        html += '<option>Pilih Rombel</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_rombel+'>'+data[i].nama_rombel+'</option>';
                        }
                        $('#rombel').html(html);
 
                    }
                });
                return false;
            }); 
             
            $('#rombel').change(function(){ 
                var id_rombel=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('keuangan/get_siswaByIdRombel');?>",
                    method : "POST",
                    data : {id_rombel: id_rombel},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        html += '<option>Pilih Siswa</option>';
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_siswa+'>'+data[i].id_siswa+'</option>';
                        }
                        $('#siswa').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
    </script>
</body>

</html>