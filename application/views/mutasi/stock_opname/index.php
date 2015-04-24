<?php echo get_header(); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Stock Opname</h3>
        <div class="input-append pull-right" style="margin: 5px;">
            <form id="frm_search_anggota" action="<?php echo site_url("master/anggota/search"); ?>" method="get" id="form_search">
                <input class="span3" type="text" name="q" placeholder="Cari Nama...">
                <button type="submit" class="btn" type="button">Refresh</button>
            </form>
        </div>

        <a href="<?php echo site_url('master/golongan/tambah'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Tambah</a>
    </div>
    <div class="widget-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>                    
                    <th width="100">Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Nama Pemasok</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th width="50"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<?php echo get_footer(); ?>