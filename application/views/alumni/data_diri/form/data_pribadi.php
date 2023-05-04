<div class="row mx-2">
    <div class="col-12">
        <div class="mt-1 mx-1">
            <h4 class="">Data Pribadi</h4>
        </div>
        <hr>
    </div>
<?php if($this->db->get_where('data_diri', array('id_level' => $this->session->userdata('id_level')))->num_rows()) {?>
    <div class="col-12">
        <div class="alert alert-info d-flex justify-content-between" role="alert">
            <div>
                <i class="fas fa-info-circle"></i> Untuk mengubah nama dan alamat email anda dapat melakukkannya di menu akun.
            </div>
            <div class="d-flex align-items-center">
                <i class="fas fa-times" data-dismiss="alert" aria-label="Close"></i>
            </div>
        </div>
    </div>
</div>
<div class="row mx-2">
    <div class="col-12">
        <?php foreach($readydata as $ready): ?>
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
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <select id="enter" name="id_daftar" class="form-control select2" required="">
                                <option selected value="<?php echo $ready->id_daftar ?>">
                                    <?php echo tampil_nisn_siswa_byid($ready->id_daftar) ?>
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
                            <input type="text" class="form-control" value="<?php echo tampil_nama_siswa_byid($ready->id_daftar) ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Jurusan *</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                    <div class="form-group">
                        <div class="form-line">
                            <select name="jurusan_sekolah" class="form-control select2" required="">
                                <option selected value="<?php echo $ready->jurusan_sekolah ?>">
                                    <?php echo $ready->jurusan_sekolah ?>
                                </option>
                                <option value="AKL">AKL</option>
                                <option value="TKJ">TKJ</option>
                                <option value="TB">TB</option>
                                <option value="TBSM">TBSM</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Jenis Kelamin *</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                    <div class="form-group">
                        <div class="form-line">
                            <select id="showdata_jekel" class="form-control select2" disabled>
                                <option selected disabled>
                                    <?php echo tampil_jekel_siswa_byid($ready->id_daftar) ?>
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
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                    <div class="form-group">
                        <div class="form-line" id="showdata_tempat">
                            <input type="text" class="form-control" value="<?php echo tampil_tempat_lahir_siswa_byid($ready->id_daftar) ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                    <div class="form-group">
                        <div class="form-line" id="showdata_tgl_lahir">
                            <input type="text" name="tanggal_lahir" value="<?php echo tampil_tanggal_lahir_siswa_byid($ready->id_daftar) ?>" class="form-control" disabled>
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
                            <input type="number" name="nik" class="form-control" placeholder="Masukan Nomor NIK" value="<?php echo $ready->nik ?>" required>
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
                            <textarea name="alamat" class="form-control" rows="4" placeholder="Masukan Alamat Domisili Sekarang" required><?php echo $ready->alamat ?></textarea>
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
                            <input type="number" name="no_telp" class="form-control" placeholder="Masukan Nomor Telephone/Handphone yang dapat dihubungi"
                                value="<?php echo $ready->no_telp ?>">
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
                                <option selected value="<?php echo $ready->tahun_lulus ?>">
                                    <?php echo $ready->tahun_lulus ?>
                                </option>
                                <?php foreach(array_reverse($years) as $year) : ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
<?php } else {?>
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
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
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
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                <div class="form-group">
                    <div class="form-line">
                        <select name="jurusan_sekolah" class="form-control select2" required>
                            <option selected disabled>
                                Pilih Jurusan
                            </option>
                            <option value="AKL">AKL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="TB">TB</option>
                            <option value="TBSM">TBSM</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Jenis Kelamin *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
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
            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-6">
                <div class="form-group">
                    <div class="form-line" id="showdata_tempat">
                        <input type="text" class="form-control" placeholder="Masukan Tempat Lahir" disabled>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-6">
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
<?php }?>
</div>