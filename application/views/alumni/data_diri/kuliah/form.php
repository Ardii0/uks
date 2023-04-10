<?php if($this->db->get_where('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Kuliah'))->num_rows()) {?>
    <?php foreach($readystatus as $status): ?>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Status *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        Kuliah
                        <input type="hidden" name="status" class="form-control" value="Kuliah">
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Nama Perguruan *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="nama_perguruan" class="form-control" placeholder="Masukan Nama Perguruan" required
                            value="<?php echo $status->nama_perguruan?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Jurusan *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required
                            value="<?php echo $status->jurusan?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Tahun Mulai Perguruan *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                        <div class="form-line">
                            <?php $years = range(1900, strftime("%Y", time())); ?>
                            <select name="tahun_perguruan" class="form-control select2" required>
                                <option selected value="<?php echo $status->tahun_perguruan ?>">
                                    <?php echo $status->tahun_perguruan ?>
                                </option>
                                <?php foreach(array_reverse($years) as $year) : ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php } else {?>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label>Status *</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    Kuliah
                    <input type="hidden" name="status" class="form-control" value="Kuliah">
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label>Nama Perguruan *</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="nama_perguruan" class="form-control" placeholder="Masukan Nama Perguruan" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label>Jurusan *</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label>Tahun Mulai Perguruan *</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                    <div class="form-line">
                        <?php $years = range(1900, strftime("%Y", time())); ?>
                        <select name="tahun_perguruan" class="form-control select2" required>
                            <option selected disabled>Pilih Tahun</option>
                            <?php foreach(array_reverse($years) as $year) : ?>
                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
        </div>
    </div>
<?php }?>