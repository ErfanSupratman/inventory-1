<?php echo get_header(); ?>
<script>
    $(function(){
        $('#kode_jenis').change(function() {
            var kode = $(this).val();
            var url = $(this).attr('data-url');
            ShowOrHideLoading(true);
            $.get(url + '?kode_jenis=' + kode, function(result) {
                $('#kode_prd').val(result);
                ShowOrHideLoading(false);
            });
        });

    })
</script>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Produk</h3>
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" id="frm_produk">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label">Jenis Barang</label>
                    <div class="controls">
                        <?php echo $kode_jenis; ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Kode Produk</label>
                    <div class="controls">
                        <?php echo form_input($kode_prd); ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Nama Produk</label>
                    <div class="controls">
                        <?php echo form_input($nama_produk); ?>
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
                        <a href="<?php echo site_url('master/produk/'); ?>" class="btn btn-info">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php echo get_footer(); ?>