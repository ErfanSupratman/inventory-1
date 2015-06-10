<?php get_header('admin') ?>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Pengaturan</h3>
        <div class="input-append pull-right" style="margin: 5px;">
            <input class="span4" type="text" name="q" placeholder="Searching...">
        </div>
        <a href="<?php echo site_url('utility/pengaturan/tambah'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Tambah</a>
    </div>
    <div class="widget-content">
        <table class="table table-hover">
            <thead>
                <tr>                    
                    <th>Nama</th>
                    <th>Value</th>
                    <th>Keterangan</th>
                    <th width="10"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data_pengaturan as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->value; ?></td>
                        <td><?php echo $row->description; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="<?php echo site_url('utility/pengaturan/edit/' . $row->id); ?>"><i class="icon-ok"></i> Edit</a></li>
                                    <li><a href="<?php echo site_url('utility/pengaturan/delete/' . $row->id); ?>"><i class="icon-trash"></i> Destroy</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php get_footer('admin') ?>