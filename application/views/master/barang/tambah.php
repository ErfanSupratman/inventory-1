<?php echo get_header(); ?>
<script>
    $(function() {
        $('#nama_prd').focus();
        $('#kode_prd').change(function() {
            var kode = $(this).val();
            var url = $(this).attr('data-url');
            ShowOrHideLoading(true);
            $.get(url + '?kode_prd=' + kode, function(result) {
                $('#kode_brg').val(result);
                $('#nama_brg').focus();
                ShowOrHideLoading(false);
            });
        });

    })
</script>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Master Barang</h3>
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" id="frm_golongan">
            <div class="span6">
                <div class="control-group" style="margin-bottom: -1px;">
                    <label class="control-label">Kode Produk</label>
                    <div class="controls">
                        <?php echo $kode_prd; ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Kode Barang</label>
                    <div class="controls">
                        <?php echo form_input($kode_brg); ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Nama Barang</label>
                    <div class="controls">
                        <?php echo form_input($nama_brg); ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Spesifikasi</label>
                    <div class="controls">
                        <?php echo form_textarea($spec); ?>
                    </div>
                </div>

            </div>

            <div class="span6">
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Satuan</label>
                    <div class="controls">
                        <table>
                            <tr>
                                <td><?php echo $satuan1; ?></td>
                                <td><?php echo $satuan2; ?></td>
                                <td><?php echo $satuan3; ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Isi</label>
                    <div class="controls">
                        <table>
                            <tr>
                                <td><?php echo form_input($isi1); ?></td>
                                <td><?php echo form_input($isi2); ?></td>
                                <td><?php echo form_input($isi3); ?></td>
                            </tr>
                        </table>                        
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Stock Awal</label>
                    <div class="controls">
                        <table>
                            <tr>
                                <td><?php echo form_input($stock_awal1); ?></td>
                                <td><?php echo form_input($stock_awal2); ?></td>
                                <td><?php echo form_input($stock_awal3); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Stock Minimal</label>
                    <div class="controls">
                        <?php echo form_input($stock_minimal); ?> Karton
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Stock Maximal</label>
                    <div class="controls">
                        <?php echo form_input($stock_maximal); ?> Karton
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                        <a href="<?php echo site_url('master/barang/'); ?>" class="btn btn-info">Batal</a>
                    </div>
                </div>
            </div>            
        </form>
    </div>
</div>

<?php echo get_footer(); ?>