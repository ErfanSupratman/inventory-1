<?php
if ($result->count()) {
    foreach ($result as $row) {
?>
        <tr>
            <td>
                <div class="btn-group">
                    <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                        <i class="icon-cog"></i>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li><?php echo anchor('users/edit/' . $row->id, '<i class="icon-pencil"></i> Koreksi'); ?></li>
                        <li><a href="javascript: delete_row_record('<?php echo site_url('master/anggota/hapus/' . $row->nasabah_id); ?>', '#daftar_anggota')"><i class="icon-trash"></i> Hapus</a></li>
                        <li class="divider" role="presentation"></li>
                        <li><a href="javascript: alert('Verifikasi');"><i class="icon-thumbs-up"></i> Verifikasi</a></li>
                    </ul>
                </div>
            </td>

            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->full_name; ?></td>
            <td><?php echo $row->jabatan; ?></td>
            <td><?php echo $row->username; ?></td>
            <td><?php echo $row->tgl_register; ?></td>
            <td><?php echo $row->tgl_expired; ?></td>
    <?php
    }
} else {
    ?>

<?php } ?>
    }