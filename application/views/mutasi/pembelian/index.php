<?php echo get_header(); ?>
<script src="<?php echo base_url('assets/js/pembelian.js'); ?>"></script>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Data Transaksi Pembelian</h3>
        <div class="input-append pull-right" style="margin: 5px;">
            <form id="frm_search_anggota" action="<?php echo site_url("master/anggota/search"); ?>" method="get" id="form_search">
                <input class="span3" type="text" name="q" placeholder="Cari Nama...">
                <button type="submit" class="btn" type="button">Refresh</button>
            </form>
        </div>

        <a href="<?php echo site_url('mutasi/pembelian/tambah'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Tambah</a>
    </div>
    <div class="widget-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>                    
                    <th>No Bukti</th>
                    <th>Tgl Bukti</th>
                    <th>Cara Bayar</th>
                    <th>Nama Pemasok</th>
                    <th>Jatuh Tempo</th>
                    <th>Tgl Jatuh Tempo</th>
                    <th>Uraian</th>
                    <th width="50"></th>
                </tr>
            </thead>
            <tbody id="data_gologan">
                <?php
                foreach ($data_pembelian as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row->no_bukti; ?></td>
                        <td><?php echo $row->tgl_bukti; ?></td>
                        <td><?php echo strtoupper($row->cara_bayar); ?></td>
                        <td><?php echo $row->kode_psk; ?></td>
                        <td><?php echo $row->jatuh_tempo; ?></td>
                        <td><?php echo $row->tgl_jt; ?></td>
                        <td><?php echo strtoupper($row->uraian); ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                    <i class="icon-cog"></i>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu pull-right">                                                                        
                                    <li><a href="javascript: show_detail_pembelian('<?php echo site_url('mutasi/pembelian/detail_pembelian/'.$row->no_bukti);?>')" id="id_modal_identitas"><i class="icon-zoom-in"></i> Lihat Detail</a></li>
                                    <li><a href="<?php echo site_url('mutasi/pembelian/hapus/' . $row->no_bukti); ?>" onclick="javascript: return confirm('Apakah anda yakin akan menghapus data?')"><i class="icon-trash"></i> Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div id="modal_detail_barang" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <h3 id="myModalLabel">Daftar Detail Pembelian</h3>
        </div>
        <div class="modal-body">
            <table class="table table-bordered" style="font-size: 9px;">
                <thead>
                <tr>
                    <td>No</td>
                    <td>Kode Brg</td>
                    <td>Nama Brg</td>
                    <td>Jml</td>                    
                    <td>Satuan</td>
                    <td>Harga</td>
                    <td>Disc</td>
                    <td>Exp Date</td>
                </tr>
                </thead>
                <tbody id="tbl_detail_barang"></tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>
</div>

<?php echo get_footer(); ?>