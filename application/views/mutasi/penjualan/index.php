<?php echo get_header(); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Daftar Transaksi Penjualan</h3>
        <div class="input-append pull-right" style="margin: 5px;">
            <form id="frm_search_anggota" action="<?php echo site_url("master/anggota/search"); ?>" method="get" id="form_search">
                <input class="span3" type="text" name="q" placeholder="Cari Nama...">
                <button type="submit" class="btn" type="button">Refresh</button>
            </form>
        </div>

        <a href="<?php echo site_url('mutasi/penjualan/tambah'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Tambah</a>
    </div>
    <div class="widget-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>                    
                    <th width="100">No Bukti</th>
                    <th>Tgl Trans</th>
                    <th>Pelanggan</th>
                    <th>Cara Bayar</th>
                    <th>Total Penjualan</th>
                    <th width="50"></th>
                </tr>
            </thead>
            <tbody id="data_gologan">
                <?php foreach ($data_penjualan as $row) {
                ?>
                    <tr>
                        <td><?php echo $row->no_bukti; ?></td>
                        <td><?php echo $row->tgl_bukti; ?></td>
                        <td><?php echo get_name_customer($row->kode_plg, 'nama_perusahaan'); ?></td>
                        <td><?php echo strtoupper($row->cara_bayar);?></td>
                        <td style="text-align: right;"><?php echo sum_penjualan($row->no_bukti);?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><?php echo anchor('mutasi/penjualan/detail/' . $row->kode_gol, '<i class="icon-zoom-in"></i> Detail'); ?></li>
                                    <li><a href="<?php echo site_url('mutasi/penjualan/hapus/' . $row->kode_gol); ?>" onclick="javascript: return confirm('Apakah anda yakin akan menghapus data?')"><i class="icon-trash"></i> Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo get_footer(); ?>