<?php echo get_header(); ?>
<script src="<?php echo base_url('assets/js/penjualan.js'); ?>"></script>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Transaksi Penjualan</h3>
        <div style="margin-top: -35px; margin-right: 5px;">
            <button class="btn btn-warning pull-right"><i class="icon-print"></i> Cetak </button>
            <button id="btn_simpan_pembelian" class="btn btn-danger pull-right" style="margin-right: 5px;"><i class="icon-briefcase"></i> Simpan</button>        
            <a href="<?php echo site_url('mutasi/penjualan'); ?>" style="margin-right: 5px;" class="btn btn-primary pull-right">Kembali</a>
        </div>

    </div>
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" class="form-horizontal" id="frm_golongan">
            <div class="span5 pull-left">
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">No Bukti</label>
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
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Cara Bayar</label>
                    <div class="controls">
                        <?php echo $cara_bayar; ?>
                        <?php echo form_input($jatuh_tempo); ?>
                    </div>
                </div>
                <hr/>
                <div class="control-group" style="margin-bottom: 6px;">
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
                    <label class="control-label">Jumlah</label>
                    <div class="controls">
                        <?php echo form_input($jumlah); ?>
                        <?php echo $satuan; ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">Harga</label>
                    <div class="controls">
                        <?php echo form_input($harga); ?>
                    </div>
                </div>
                <div class="control-group" style="margin-bottom: 6px;">
                    <label class="control-label">% Disc</label>
                    <div class="controls">
                        <?php echo form_input($diskon); ?>
                        <?php echo form_input($stl_disc); ?>
                    </div>
                </div>
                <button class="btn btn-success btn-large input-block-level" name="btn_add" id="btn_add">Add</button>
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
                    <tbody id="tbody_data_barang">
                        <?php if ($data_barang->count() > 0) { ?>
                            <?php
                            $x = 0;
                            foreach ($data_barang as $row) {
                                $x++;
                                ?>
                                <tr>
                                    <td><?php echo $x ?></td>
                                    <td><?php echo $row->kode_brg; ?></td>
                                    <td><?php echo $row->nama_brg; ?></td>
                                    <td><?php echo $row->jumlah; ?></td>
                                    <td><?php echo $row->satuan; ?></td>
                                    <td><?php echo $row->harga; ?></td>
                                    <td><?php echo $row->diskon; ?></td>
                                    <td><?php echo $row->exp_date; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="8"><center>[ Daftar Barang Kosong ]</center></td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<?php echo get_footer(); ?>