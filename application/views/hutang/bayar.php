<?php echo get_header(); ?>
<script src="<?php echo base_url('assets/js/hutang.js'); ?>"></script>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Pembayaran Hutang</h3>
        <div style="margin-top: -35px; margin-right: 5px;">
            <button class="btn btn-warning pull-right"><i class="icon-print"></i> Cetak </button>
            <button id="btn_simpan_pembelian" class="btn btn-danger pull-right" style="margin-right: 5px;"><i class="icon-briefcase"></i> Simpan</button>        
            <a href="<?php echo site_url('mutasi/pembelian'); ?>" style="margin-right: 5px;" class="btn btn-primary pull-right">Kembali</a>
        </div>
    </div>
    <div class="widget-content">
        <form action="<?php echo site_url('hutang/bayar/simpan'); ?>" method="post" class="form-horizontal" id="frm_pembelian">
            <div class="span5 pull-left">
                <div class="control-group" style="margin-bottom: -1px;">
                    <label class="control-label">No Bukti</label>
                    <div class="controls">
                        <?php echo $no_bukti; ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Pemasok</label>
                    <div class="controls">
                        <?php echo form_input($nama_psk); ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Jml Hutang</label>
                    <div class="controls">
                        <?php echo form_input($jml_hutang); ?>
                    </div>
                </div>
            </div>
            <div class="span5">
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Angsuran Ke</label>
                    <div class="controls">                        
                        <?php echo form_input($angsuran_ke); ?>
                    </div>
                </div>                
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Jml Bayar</label>
                    <div class="controls">                        
                        <?php echo form_input($jml_bayar); ?>
                    </div>
                </div>                
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Tgl Bayar</label>
                    <div class="controls">                        
                        <?php echo form_input($tgl_bayar); ?>
                    </div>
                </div>                
            </div>                
            <input type="submit" value="Simpan" name="Simpan">
        </form>
        <div class="span9" style="margin-top: 50px;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tgl Bayar</th>
                        <th>Angsuran Ke</th>
                        <th>Jml Angsuran</th>
                        <th>Sisa</th>
                    </tr>
                </thead>
                <tbody id="tbody_data_barang">
                    <tr><td colspan="8"><center>[ Daftar Pembayaran ]</center></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo get_footer(); ?>