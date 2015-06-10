<?php echo get_header(); ?>
<script src="<?php echo base_url('assets/js/pembelian.js'); ?>"></script>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Repacking Barang</h3>
    </div>
    <div class="widget-content">
        <form action="" method="post" class="form-horizontal">
            <div class="span5 pull-left">
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">No Bukti</label>
                    <div class="controls">
                        <?php echo form_input($no_bukti); ?>
                        <?php echo form_input($tgl_bukti); ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: -1px;">
                    <label class="control-label">Nama Operator</label>
                    <div class="controls">
                        <?php echo $kode_psk; ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Stock Gudang</label>
                    <div class="controls">
                        <?php echo form_input($keterangan); ?>
                    </div>
                </div>
                <hr/>
        </form>
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" id="frm_add_barang" data-url="<?php echo site_url('mutasi/pembelian/load_data_barang');?>">
            <div class="control-group" style="margin-bottom: -1px;">
                <div class="controls">
                    <?php echo $kode_brg; ?>
                </div>
            </div>
            <div class="control-group" style="margin-bottom: 6px;">
                <label class="control-label">Jumlah</label>
                <div class="controls">
                    <?php echo form_input($jumlah); ?>
                    <?php echo $satuan; ?>
                </div>
            </div>
            <button class="btn btn-success btn-large" name="btn_add" id="btn_add">Add</button>
        </form>
    </div>
    <div class="span7 pull-right">
        <div style="height: 200px;">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Disc</th>
                        <th>Exp Date</th>
                    </tr>
                </thead>
                <tbody id="tbody_data_barang">
                    <tr>
                        <td colspan="8"><center>[ Daftar Barang Kosong ]</center></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="well alert-info">
            Catatan *
            <ul>
                <li>Tombol Proses</li>
                <li>Tombol Batal</li>
                <li>Tombol Cetak</li>
                <li>Tombol Simpan</li>
            </ul>
        </div>
    </div>
</div>
<div style="margin: 20px;" class="pull-right">

    <input type="submit" name="submit" value="Batal" class="btn btn-info btn-large">
    <button class="btn btn-warning btn-large"><i class="icon-print"></i> Cetak </button>
    <input type="submit" name="submit" value="Simpan" class="btn btn-danger btn-large">
</div>

</div>

<?php echo get_footer(); ?>