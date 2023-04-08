<?php if($this->db->get_where('data_diri', array('id_level' => $this->session->userdata('id_level'), 'status' => 'Lainnya'))->num_rows()) {?>
    <?php foreach($readystatus as $status): ?>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Status *</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        Lainnya
                        <input type="hidden" name="status" class="form-control" value="Lainnya">
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
                    Lainnya
                    <input type="hidden" name="status" class="form-control" value="Lainnya">
                </div>
            </div>
        </div>
    </div>
<?php }?>