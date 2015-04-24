<?php echo get_header(); ?>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Pelanggan</h3>
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" id="frm_pemasok">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label">Kode Pelanggan</label>
                    <div class="controls">
                        <?php echo form_input($kode_plg); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Perusahaan</label>
                    <div class="controls">
                        <?php echo form_input($nama_perusahaan); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Pemilik</label>
                    <div class="controls">
                        <?php echo form_input($nama_pemilik); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Alamat</label>
                    <div class="controls">
                        <?php echo form_textarea($alamat); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Kota</label>
                    <div class="controls">
                        <?php echo form_input($kota); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Kode Pos</label>
                    <div class="controls">
                        <?php echo form_input($kode_pos); ?>
                    </div>
                </div>

            </div>

            <div class="span6">
                <div class="control-group">
                    <label class="control-label">Telp</label>
                    <div class="controls">
                        <?php echo form_input($telp); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">HP</label>
                    <div class="controls">
                        <?php echo form_input($hp); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Fax</label>
                    <div class="controls">
                        <?php echo form_input($fax); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <?php echo form_input($email); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a href="<?php echo site_url('master/pelanggan/'); ?>" class="btn btn-info">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php echo get_footer(); ?>