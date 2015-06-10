<?php
$x = 0;
foreach ($data_barang as $row) {
    $x++;
    ?>
    <tr>
        <td><?php echo $x ?></td>
        <td><?php echo $row->kode_brg;?></td>
        <td><?php echo $row->nama_brg;?></td>
        <td><?php echo $row->jumlah;?></td>
        <td><?php echo $row->satuan;?></td>
        <td><?php echo $row->harga;?></td>
        <td><?php echo $row->diskon;?></td>
        <td><?php echo $row->exp_date;?></td>
    </tr>
<?php } ?>