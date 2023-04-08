<?php if($this->db->get_where('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Wirausaha'))->num_rows()) {?>
    <?php foreach($readystatus as $status): ?>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Status *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        Wirausaha
                        <input type="hidden" name="status" class="form-control" value="Wirausaha">
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Nama Usaha *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="nama_usaha" class="form-control" placeholder="Masukan Nama Usaha" required
                            value="<?php echo $status->nama_usaha?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Jenis Usaha *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input type="text" name="jenis_usaha" class="form-control" placeholder="Masukan Jenis Usaha" required
                            value="<?php echo $status->jenis_usaha?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Tahun Mulai Usaha *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                        <div class="form-line">
                            <?php $years = range(1900, strftime("%Y", time())); ?>
                            <select name="tahun_usaha" class="form-control select2" required>
                                <option selected value="<?php echo $status->tahun_usaha ?>">
                                    <?php echo $status->tahun_usaha ?>
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
                    Wirausaha
                    <input type="hidden" name="status" class="form-control" value="Wirausaha">
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label>Nama Usaha *</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="nama_usaha" class="form-control" placeholder="Masukan Nama Usaha" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label>Jenis Usaha *</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="jenis_usaha" class="form-control" placeholder="Masukan Jenis Usaha" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label>Tahun Mulai Usaha *</label>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
                    <div class="form-line">
                        <?php $years = range(1900, strftime("%Y", time())); ?>
                        <select name="tahun_usaha" class="form-control select2" required>
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