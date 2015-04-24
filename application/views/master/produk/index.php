<?php echo get_header(); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Data Produk</h3>
        <div class="input-append pull-right" style="margin: 5px;">
            <form id="frm_search_anggota" action="<?php echo site_url("master/anggota/search"); ?>" method="get" id="form_search">
                <input class="span3" type="text" name="q" placeholder="Cari Nama...">
                <button type="submit" class="btn" type="button">Refresh</button>
            </form>
        </div>

        <a href="<?php echo site_url('master/produk/tambah'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Tambah</a>
        <a href="<?php echo site_url('master/produk/reorder_link_table'); ?>" onclick="return confirm('Apakah Benar akan melakukan singkronisasi? (Tab Gol, Tab Jenis)')" class="btn btn-danger pull-right" style="margin: 5px;">Singkronisasi</a>
    </div>
    <div class="widget-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>                    
                    <th width="100">Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Keterangan</th>
                    <th width="50"></th>
                </tr>
            </thead>
            <tbody id="data_gologan">
                <?php foreach ($data_produk as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->kode_prd; ?></td>
                        <td><?php echo $row->nama_produk; ?></td>
                        <td><?php echo $row->keterangan; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><?php echo anchor('master/produk/edit/' . $row->kode_prd, '<i class="icon-pencil"></i> Koreksi'); ?></li>
                                    <li><a href="<?php echo site_url('master/produk/hapus/' . $row->kode_prd); ?>" onclick="javascript: return confirm('Apakah anda yakin akan menghapus data?')"><i class="icon-trash"></i> Hapus</a></li>
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
            <?php echo get_pagination($data_produk, 'master/produk/index/') ?>
        </ul>
    </nav>        

</div>

<?php echo get_footer(); ?>