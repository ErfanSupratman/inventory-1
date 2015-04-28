<?php echo get_header(); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Data Barang</h3>
        <div class="input-append pull-right" style="margin: 5px;">
            <form id="frm_search_anggota" action="<?php echo site_url("master/anggota/search"); ?>" method="get" id="form_search">
                <input class="span3" type="text" name="q" placeholder="Cari Nama...">
                <button type="submit" class="btn" type="button">Refresh</button>
            </form>
        </div>

        <a href="<?php echo site_url('master/barang/tambah'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Tambah</a>
        <a href="<?php echo site_url('master/barang/reorder_link_table'); ?>" onclick="return confirm('Apakah Benar akan melakukan singkronisasi? (Tab Gol, Tab Jenis)')" class="btn btn-danger pull-right" style="margin: 5px;">Singkronisasi</a>
    </div>
    <div class="widget-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>                    
                    <th width="100">Kode Brg</th>
                    <th>Nama Barang</th>
                    <th>Spesifikasi</th>
                    <th>Satuan1</th>
                    <th>Satuan2</th>
                    <th>Satuan3</th>
                    <th>Isi 1</th>
                    <th>Isi 2</th>
                    <th>Isi 3</th>
                    <th>Stock Awal 1</th>
                    <th>Stock Awal 2</th>
                    <th>Stock Awal 3</th>
                    <th>Stock Minimal</th>
                    <th>Stock Maximal</th>
                    <th width="50"></th>
                </tr>
            </thead>
            <tbody id="data_gologan">
                <?php foreach ($data_barang as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->kode_brg; ?></td>
                        <td><?php echo $row->nama_brg; ?></td>
                        <td><?php echo $row->spec; ?></td>
                        <td><?php echo strtoupper($row->satuan1); ?></td>
                        <td><?php echo strtoupper($row->satuan2); ?></td>
                        <td><?php echo strtoupper($row->satuan3); ?></td>
                        <td><?php echo $row->isi1; ?></td>
                        <td><?php echo $row->isi2; ?></td>
                        <td><?php echo $row->isi3; ?></td>
                        <td><?php echo $row->stock_awal1; ?></td>
                        <td><?php echo $row->stock_awal2; ?></td>
                        <td><?php echo $row->stock_awal3; ?></td>
                        <td><?php echo $row->stock_minimal; ?></td>
                        <td><?php echo $row->stock_maximal; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><?php echo anchor('master/barang/edit/' . $row->kode_brg, '<i class="icon-pencil"></i> Koreksi'); ?></li>
                                    <li><a href="<?php echo site_url('master/barang/hapus/' . $row->kode_brg); ?>" onclick="javascript: return confirm('Apakah anda yakin akan menghapus data?')"><i class="icon-trash"></i> Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php echo($data_barang->result_count() . ' Barang ditemukan.');?>
    <nav>
        <ul class="pager">
            <?php echo get_pagination($data_barang, 'master/barang/index/') ?>
        </ul>
    </nav>        
</div>

<?php echo get_footer(); ?>