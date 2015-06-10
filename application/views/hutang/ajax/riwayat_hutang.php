<?php
$x = 0;
foreach ($query->result() as $row) {
    $x++;
    ?>

    <tr>
        <td><?php echo $row->tgl_bayar; ?></td>
        <td><?php echo $x; ?></td>
        <td><?php echo rupiah($row->jml_bayar); ?></td>        
        <td><?php echo rupiah($row->sisa); ?></td>        
    </tr>

    <?php
}
?>