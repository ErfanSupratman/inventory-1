<?php echo get_header(); ?>
<script>
    $(function(){
        $('#kode_gol').change(function() {
            var kode = $(this).val();
            var url = $(this).attr('data-url');
            ShowOrHideLoading(true);
            $.get(url + '?kode_gol=' + kode, function(result) {
                $('#kode_jenis').val(result);
                ShowOrHideLoading(false);
            });
        });

    })
</script>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Jenis</h3>
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" id="frm_golongan">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label">Kode Gol *</label>
                    <div class="controls">
                        <?php echo $kode_gol; ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Kode Jenis</label>
                    <div class="controls">
                        <?php echo form_input($kode_jenis); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Jenis</label>
                    <div class="controls">
                        <?php echo form_input($nama_jenis); ?>
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
                        <a href="<?php echo site_url('master/jenis/'); ?>" class="btn btn-info">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php echo get_footer(); ?>