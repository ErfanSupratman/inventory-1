<?php echo get_header(); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Data Pelanggan</h3>
        <div class="input-append pull-right" style="margin: 5px;">
            <form id="frm_search_anggota" action="<?php echo site_url("master/anggota/search"); ?>" method="get" id="form_search">
                <input class="span3" type="text" name="q" placeholder="Cari Nama...">
                <button type="submit" class="btn" type="button">Refresh</button>
            </form>
        </div>

        <a href="<?php echo site_url('master/pelanggan/tambah'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Tambah</a>
    </div>
    <div class="widget-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>                    
                    <th width="100">Kode Plg</th>
                    <th>Nama Perusahaan</th>
                    <th>Nama Pemilik</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Kode Pos</th>
                    <th>Tlp</th>
                    <th>HP</th>
                    <th>Fax</th>
                    <th>Email</th>                    
                    <th width="50"></th>
                </tr>
            </thead>
            <tbody id="data_gologan">
                <?php foreach ($data_pelanggan as $row) {
                ?>
                    <tr>
                        <td><?php echo $row->kode_plg; ?></td>
                        <td><?php echo $row->nama_perusahaan; ?></td>
                        <td><?php echo $row->nama_pemilik; ?></td>
                        <td><?php echo $row->alamat; ?></td>
                        <td><?php echo $row->kota; ?></td>
                        <td><?php echo $row->kode_pos; ?></td>
                        <td><?php echo $row->telp; ?></td>
                        <td><?php echo $row->hp; ?></td>
                        <td><?php echo $row->fax; ?></td>
                        <td><?php echo $row->email; ?></td>                        
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><?php echo anchor('master/pelanggan/edit/' . $row->kode_plg, '<i class="icon-pencil"></i> Koreksi'); ?></li>
                                    <li><a href="<?php echo site_url('master/pelanggan/hapus/' . $row->kode_plg); ?>" onclick="javascript: return confirm('Apakah anda yakin akan menghapus data?')"><i class="icon-trash"></i> Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo get_footer(); ?>