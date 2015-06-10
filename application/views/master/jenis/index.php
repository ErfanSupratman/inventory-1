<?php echo get_header(); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Data Jenis Barang</h3>
        <div class="input-append pull-right" style="margin: 5px;">
            <form id="frm_search_anggota" action="<?php echo site_url("master/anggota/search"); ?>" method="get" id="form_search">
                <input class="span3" type="text" name="q" placeholder="Cari Nama...">
                <button type="submit" class="btn" type="button">Refresh</button>
            </form>
        </div>

        <a href="<?php echo site_url('master/jenis/tambah'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Tambah</a>
    </div>
    <div class="widget-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>                    
                    <th width="100">Kode Jenis</th>                    
                    <th>Nama Jenis</th>
                    <th>Keterangan</th>
                    <th width="50"></th>
                </tr>
            </thead>
            <tbody id="data_jenis">
                <?php foreach ($data_jenis as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->kode_jenis; ?></td>
                        <td><?php echo $row->nama_jenis; ?></td>
                        <td><?php echo $row->keterangan; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><?php echo anchor('master/jenis/edit/' . $row->kode_jenis, '<i class="icon-pencil"></i> Koreksi'); ?></li>
                                    <li><a href="<?php echo site_url('master/jenis/hapus/' . $row->kode_jenis); ?>" onclick="javascript: return confirm('Apakah anda yakin akan menghapus data?')"><i class="icon-trash"></i> Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <nav>
        <ul class="pager">
            <?php echo get_pagination($data_jenis, 'master/jenis/index/') ?>
        </ul>
    </nav>        

</div>

<?php echo get_footer(); ?>