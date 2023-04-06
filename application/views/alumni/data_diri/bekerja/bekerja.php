<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Alumni</title>
    <?php $this->load->view('alumni/style/head') ?>
</head>

<body class="hold-transition skin-blue sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('alumni/style/navbar') ?>
        <?php $this->load->view('alumni/style/sidebar') ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Diri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('Alumni/') ?>"><?php echo $this->session->userdata('level') ?></a></li>
                                <li class="breadcrumb-item active">Data Diri</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <form action="<?php echo base_url('Alumni/tambah_datadiri') ?>"
                      enctype="multipart/form-data" method="post" class="container-fluid bg-white shadow mb-5">
                    <div class="row mx-2 pt-3">
                        <div class="col">
                            <div class="mt-2 mx-1">
                                <h4>Lengkapi Data Diri Anda Dengan Niat, Bismillah</h4>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row mx-2">
                        <div class="col-12">
                            <div class="mt-1 mx-1">
                                <h4 class="">Data Pribadi</h4>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12">
                            <div class="alert alert-info d-flex justify-content-between" role="alert">
                                <div>
                                    <i class="fas fa-exclamation-triangle"></i> Menu akan tampil jika anda telah mengisi dan melengkapi data diri.
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-times" data-dismiss="alert" aria-label="Close"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-2">
                        <div class="col-12">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Nama</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <?php foreach ($user as $user): ?>
                                            <?php echo $user->username?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Alamat Email</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <?php echo $user->email?>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Masukan NISN *</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select id="enter" name="id_daftar" class="form-control select2" required>
                                                <option selected disabled>
                                                    Masukan NISN
                                                </option>
                                                <?php foreach($data as $data):?>
                                                    <option value="<?php echo $data->id_daftar ?>" required><?php echo $data->nisn?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Nama Lengkap *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line" id="showdata_nama">
                                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Jurusan *</label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select name="jurusan_sekolah" class="form-control select2" required>
                                                <option selected disabled>
                                                    Pilih Jurusan
                                                </option>
                                                <option value="Akl">Akl</option>
                                                <option value="Tkj">Tkj</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Jenis Kelamin *</label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select id="showdata_jekel" class="form-control select2" disabled>
                                                <option selected disabled>
                                                    Pilih Jenis Kelamin
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Tempat/Tanggal Lahir *</label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line" id="showdata_tempat">
                                            <input type="text" class="form-control" placeholder="Masukan Tempat Lahir" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line" id="showdata_tgl_lahir">
                                            <input type="date" name="tanggal_lahir" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Nomor NIK *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="nik" class="form-control" placeholder="Masukan Nomor NIK" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="alamat">Alamat *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line" id="showdata_alamat">
                                            <textarea name="alamat" class="form-control" rows="4" placeholder="Masukan Alamat Domisili Sekarang" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Nomor Telp/Handphone *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line" id="showdata_telephone">
                                            <input type="number" name="no_telp" class="form-control" placeholder="Masukan Nomor Telephone/Handphone yang dapat dihubungi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Tahun Lulus *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php $years = range(1900, strftime("%Y", time())); ?>
                                            <select name="tahun_lulus" class="form-control select2" required>
                                                <option selected disabled>Pilih Tahun</option>
                                                <?php foreach(array_reverse($years) as $year) : ?>
                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row mx-2 mb-5">
                        <div class="col-12">
                            <div class="mt-1 mx-1">
                                <h4 class="">Data Status *</h4>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="border-top my-3"></div>
                        </div>
                        <div class="col-12">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Status *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            Bekerja
                                            <input type="hidden" name="status" class="form-control" value="Bekerja">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Nama Instansi *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_instansi" class="form-control" placeholder="Masukan Nama Instansi" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Jabatan *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jabatan" class="form-control" placeholder="Masukan Jabatan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Tanggal Mulai Kerja *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="tanggal_kerja" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Bidang Usaha Yang Dijalankan Perusahaan *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="bidang_instansi" class="form-control" placeholder="Masukan Bidang Usaha/Kegiatan Yang Dijalankan Perusahaan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Lokasi Instansi *</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="lokasi_instansi" class="form-control" placeholder="Masukan Lokasi Instansi/Perusahaan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Nama Instansi 2</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_instansi2" class="form-control" placeholder="Masukan Nama Instansi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Jabatan 2</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jabatan2" class="form-control" placeholder="Masukan Jabatan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label>Tanggal Mulai Kerja 2</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" name="tanggal_kerja2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <?php $this->load->view('alumni/style/js') ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#enter').change(function(){ 
                var id_daftar=$(this).val();
                $.ajax({
                    url : "<?php echo base_url('alumni/get_daftarByNisn');?>",
                    method : "POST",
                    data : {id_daftar: id_daftar},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var nama = '<p style="background-color: #EEEEEE" class="form-control">'+data[0].nama+'</p>';
                        $('#showdata_nama').html(nama);

                        var jekel = '<option class="form-control select2">'+data[0].jekel+'</option>';
                        $('#showdata_jekel').html(jekel);

                        var tempat = '<p style="background-color:  #EEEEEE" class="form-control">'+data[0].tempat_lahir+'</p>';
                        $('#showdata_tempat').html(tempat);
 
                        var tgl_lahir = '<input type="text" class="form-control" value='+data[0].tgl_lahir+' disabled>';
                        $('#showdata_tgl_lahir').html(tgl_lahir);
                        
                        var alamat = '<textarea name="alamat" class="form-control" rows="4" placeholder="Masukan Alamat Domisili Sekarang" required>'+data[0].alamat+'</textarea>';
                        $('#showdata_alamat').html(alamat);
                        
                        var telephone = '<input name="no_telp" type="number" class="form-control" placeholder="Masukan Nomor Telephone/Handphone yang dapat dihubungi" value='+data[0].telepon+' required>';
                        $('#showdata_telephone').html(telephone);
 
                    }
                });
                return false;
            }); 

        });
    </script>
</body>

</html>