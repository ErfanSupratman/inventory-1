<?php echo get_header(); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Laporan Kartu Barang</h3>
        <a href="javascript:alert('Cetak Print JS');" class="btn btn-info pull-right" style="margin: 5px;"><i class="icon-print"></i> Cetak</a>
    </div>
    <div class="widget-content">
        <?php
        foreach ($data_produk as $row) {
            ?>
            <div style="font-size: 15px; font-weight: bold;"><?php echo $row->nama_produk; ?></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="20">No</th>
                        <th width="100">Kode Barang</th>
                        <th width="350">Nama Barang</th>
                        <th width="100">Ukuran (Spec)</th>
                        <th colspan="3">Isi Satuan</th>
                        <th colspan="3">Jumlah Stock</th>
                        <th>Min</th>
                        <th>Max</th>
                    </tr>
                </thead>
                <tbody><?php echo cetak_kartu_barang($row->kode_prd); ?></tbody>
            </table>
        <?php } ?>
    </div>
    <nav>
        <ul class="pager">
            <?php echo get_pagination($data_produk, 'laporan/kartu_barang/') ?>
        </ul>
    </nav>        

</div>

<?php echo get_footer(); ?>