<?php echo get_header(); ?>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Golongan</h3>
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" id="frm_golongan">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label">Kode Golongan *</label>
                    <div class="controls">
                        <?php echo form_input($kode_gol); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Golongan</label>
                    <div class="controls">
                        <?php echo form_input($nama_gol); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Keterangan</label>
                    <div class="controls">
                        <?php echo form_input($keterangan); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a href="<?php echo site_url('master/golongan/'); ?>" class="btn btn-info">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php echo get_footer(); ?>