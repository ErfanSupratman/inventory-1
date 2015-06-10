<?php echo get_header(); ?>
<style>
    .css_pembelian{
        margin-bottom: 6px;
    }
</style>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Transaksi Retur Penjualan</h3>
    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" id="frm_golongan">
            <div class="span5 pull-left">
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">No Retur</label>
                    <div class="controls">
                        <?php echo form_input($no_bukti); ?>
                        <?php echo form_input($tgl_bukti); ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: -1px;">
                    <label class="control-label">Pelanggan</label>
                    <div class="controls">
                        <?php echo $kode_psk; ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Keterangan</label>
                    <div class="controls">
                        <?php echo form_textarea($keterangan); ?>
                    </div>
                </div>
                <hr/>
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
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Harga Satuan</label>
                    <div class="controls">
                        <?php echo form_input($harga); ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Jumlah Harga</label>
                    <div class="controls">
                        <?php echo form_input($harga); ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Kondisi Barang</label>
                    <div class="controls">
                        <?php echo $kondisi_barang; ?>
                    </div>
                </div>
            </div>
            <div class="span7 pull-right">
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
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>MKN001002001</td>
                            <td>Mie Sedap</td>
                            <td>10</td>
                            <td>Dos</td>
                            <td>450000</td>
                            <td>0</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>ATK001002001</td>
                            <td>Buku Tulis Bobo 35 Lembar</td>
                            <td>10</td>
                            <td>Dos</td>
                            <td>450000</td>
                            <td>0</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>MIN001002001</td>
                            <td>Coca - Cola 1 Liter</td>
                            <td>10</td>
                            <td>Dos</td>
                            <td>450000</td>
                            <td>0</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <div style="margin: 20px;" class="pull-right">
        <input type="submit" name="submit" value="Proses" class="btn btn-success btn-large">
        <input type="submit" name="submit" value="Batal" class="btn btn-info btn-large">
        <button class="btn btn-warning btn-large"><i class="icon-print"></i> Cetak </button>
        <input type="submit" name="submit" value="Simpan" class="btn btn-danger btn-large">
    </div>

</div>

<?php echo get_footer(); ?>