<?php echo get_header(); ?>
<script src="<?php echo base_url('assets/js/contents.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/users.js'); ?>"></script>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Users</h3>
    </div>
    <div class="widget-content">
        <form class="form-horizontal" action="<?php echo site_url('users/simpan'); ?>" id="frm_user">
            <div class="row">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label">Nama Lengkap</label>
                        <div class="controls">
                            <?php echo form_input($full_name); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jabatan</label>
                        <div class="controls">
                            <?php echo form_input($jabatan); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tgl Regsiter</label>
                        <div class="controls">
                            <?php echo form_input($tgl_register); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tgl Expired</label>
                        <div class="controls">
                            <?php echo form_input($tgl_expired); ?>
                        </div>
                    </div>
                </div>
                <div class="span5">
                    <div class="control-group">
                        <label class="control-label">Set User</label>
                        <div class="controls">
                            <?php echo $set_user; ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <?php echo form_input($username); ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <?php echo form_password($password); ?>
                        </div>
                    </div>
                    <span class="badge badge-important">Kosongkan Password Jika tidak dikoreksi.</span>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <legend>Setting User</legend>
                    <fieldset>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label">Max Penerimaan Tunai</label>
                                <div class="controls">
                                    <?php echo form_input($max_penerimaan_tunai); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Max Pengeluaran Tunai</label>
                                <div class="controls">
                                    <?php echo form_input($max_pengeluaran_tunai); ?>
                                </div>
                            </div>
                        </div>
                        <div class="span5">
                            <div class="control-group">
                                <label class="control-label">Max Penerimaan OB</label>
                                <div class="controls">
                                    <?php echo form_input($max_penerimaan_ob); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Max Pengeluaran OB</label>
                                <div class="controls">
                                    <?php echo form_input($max_pengeluaran_ob); ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Kode Perkiraan</label>
                                <div class="controls">
                                    <?php echo $kode_perk; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <?php echo form_submit($button); ?>
                                    <a href="<?php echo site_url('users')?>" class="btn btn-danger">Batal</a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>


        </form>
    </div> <!-- /widget-content -->
</div>
<?php echo notification('Notification'); ?>
<?php echo get_footer(); ?>

