<?php echo get_header(); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Periksa Hutang</h3>
        <div class="input-append pull-right" style="margin: 5px;">
            <form id="frm_search_anggota" action="<?php echo site_url("master/anggota/search"); ?>" method="get" id="form_search">
                <input class="span3" type="text" name="q" placeholder="Cari Nama...">
                <button type="submit" class="btn" type="button">Refresh</button>
            </form>
        </div>

        <a href="<?php echo site_url('master/hutang/bayar'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Bayar</a>
    </div>
    <div class="widget-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>                    
                    <th width="100">No Bukti</th>
                    <th>Pemasok</th>
                    <th>Hutang</th>
                    <th>Sisa Angsuran</th>
                    <th>Sisa Hutang</th>
                    <th>Status</th>
                    <th width="50"></th>
                </tr>
            </thead>
            <tbody id="data_gologan">
                <?php foreach ($data_hutang as $row) {
                ?>
                    <tr>
                        <td><?php echo $row->no_bukti; ?></td>
                        <td><?php echo $row->kode_psk; ?></td>
                        <td style="text-align: right;"><?php echo rupiah($row->nilai); ?></td>
                        <td style="text-align: center;"><?php echo $row->jatuh_tempo; ?></td>
                        <td style="text-align: right;"><?php echo rupiah($row->sisa); ?></td>
                        <td></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><?php echo anchor('hutang/bayar/edit/' . $row->kode_gol, '<i class="icon-pencil"></i> Koreksi'); ?></li>
                                    <li><a href="<?php echo site_url('hutang/bayar/hapus/' . $row->kode_gol); ?>" onclick="javascript: return confirm('Apakah anda yakin akan menghapus data?')"><i class="icon-trash"></i> Hapus</a></li>
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