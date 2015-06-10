<?php echo get_header(); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Laporan Gudang</h3>
        <a href="javascript:alert('Cetak Print JS');" class="btn btn-info pull-right" style="margin: 5px;"><i class="icon-print"></i> Cetak</a>
    </div>
    <div class="widget-content">        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="20">No</th>
                    <th width="100">Kode Barang</th>
                    <th width="450">Nama Barang</th>
                    <th width="100">Ukuran (Spec)</th>
                    <th colspan="3">Isi Satuan</th>
                    <th colspan="3">Jumlah Stock</th>
                    <th>Min</th>
                    <th>Max</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x = 0;
                foreach ($data_gudang as $row) {
                    $x++;
                    ?>
                    <tr>
                        <td><?php echo $x; ?></td>
                        <td><?php echo $row->kode_brg;?></td>
                        <td><?php echo get_data_barang($row->kode_brg, 'nama_brg');?></td>
                        <td><?php echo get_data_barang($row->kode_brg, 'spec');?></td>
                        <td width="50" style="text-align: center; background-color: #9999ff;"><?php echo strtoupper($row->satuan1);?></td>
                        <td width="50" style="text-align: center; background-color: #ffcc99;"><?php echo strtoupper($row->satuan2);?></td>
                        <td width="50" style="text-align: center; background-color: #99ff99"><?php echo strtoupper($row->satuan3);?></td>
                        <td width="50" style="font-weight: bold; text-align: center; background-color: #9999ff;"><?php echo $row->jml_stock1;?></td>
                        <td width="50" style="font-weight: bold; text-align: center; background-color: #ffcc99;"><?php echo $row->jml_stock2;?></td>
                        <td width="50" style="font-weight: bold; text-align: center; background-color: #99ff99"><?php echo $row->jml_stock3;?></td>
                        <td><?php echo get_data_barang($row->kode_brg, 'stock_minimal');?></td>
                        <td><?php echo get_data_barang($row->kode_brg, 'stock_maximal');?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <nav>
        <ul class="pager">
            <?php echo get_pagination($data_gudang, 'laporan/gudang/') ?>
        </ul>
    </nav>        

</div>

<?php echo get_footer(); ?>