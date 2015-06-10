<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <h3 id="myModalLabel">Message</h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>

<!-- Modal Cetak Laporan -->
<div id="myModalLaporan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <h3 id="myModalLabel">Cetak Laporan</h3>
    </div>
    <div class="modal-body">
        <form action="" class="form-horizontal">
            <table cellpadding="5" style="text-align: left;">
                <tr>
                    <th><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked></th>
                    <th>Pertanggal</th>
                    <th>
                        <input type="text" name="tgl1" id="tgl1" class="input-small">
                        <input type="text" name="tgl2" id="tgl2" class="input-small">
                    </th>
                </tr>
                <tr>
                    <th><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"></th>
                    <th>Perbulan</th>
                    <th><?php echo form_dropdown('bulan', dropdown_bulan(), '', 'id="bulan" class="input-small"')?></th>
                </tr>
                <tr>
                    <th><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1"></th>
                    <th>Pertahun</th>
                    <th><?php echo form_dropdown('tahun', dropdown_tahun(), '2014', 'id="tahun" class="input-small"');?></th>
                </tr>
            </table>
        </form>
    </div>
    <div class="modal-footer">        
        <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Cari</button>
        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Keluar</button>
    </div>
</div>

<!-- Modal Identitas -->
<div id="modal_identitas" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <h3 id="myModalLabel">Identitas Perusahaan</h3>
    </div>
    <div class="modal-body">
        <form id="frm_identitas" action="<?php echo site_url('master/identitas/update_data'); ?>">
            <input type="hidden" name="id" id="id_id">
            <table style="width: 100%;">
                <tr>
                    <td width="150"><label>Nama Perusahaan</label></td>
                    <td><input type="text" class="input-block-level" id="id_nama" name="nama"></td>
                </tr>
                <tr>
                    <td width="150" valign="top"><label>Alamat</label></td>
                    <td><textarea row="5" name="alamat" class="input-block-level" id="id_alamat"></textarea></td>
                </tr>
                <tr>
                    <td width="150"><label>Kota</label></td>
                    <td><input type="text" name="kota" class="input-block-level" id="id_kota"></td>
                </tr>
                <tr>
                    <td width="150"><label>Kode Pos</label></td>
                    <td><input type="text" name="kode_pos" class="input-block-level" id="id_kode_pos"></td>
                </tr>
                <tr>
                    <td width="150"><label>Telepon</label></td>
                    <td><input type="text" name="tlp" class="input-block-level" id="id_tlp"></td>
                </tr>
                <tr>
                    <td width="150"><label>Fax</label></td>
                    <td><input type="text" name="fax" class="input-block-level" id="id_fax"></td>
                </tr>
                <tr>
                    <td width="150"><label>Email</label></td>
                    <td><input type="text" name="email" class="input-block-level" id="id_email"></td>
                </tr>
                <tr>
                    <td width="150"><label>Website</label></td>
                    <td><input type="text" name="website" class="input-block-level" id="id_website"></td>
                </tr>
            </table>            
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn-primary btn" id="btn_simpan_identitas">Simpan</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
    </div>
</div>
<div id="update_password" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <h3 id="myModalLabel">Ganti Password</h3>
    </div>
    <div class="modal-body">
        <form action="<?php echo site_url('users/update_password'); ?>" id="frm_update_password">
            <div class="control-group">
                <label class="control-label">Password Lama</label>
                <div class="controls">
                    <input name="password_lama" id="password_lama" type="password" class="input-block-level">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password Baru</label>
                <div class="controls">
                    <input name="password_baru" id="password_baru" type="password" class="input-block-level">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Konfirmasi Password Baru</label>
                <div class="controls">
                    <input name="konfirmasi_password_baru" id="konfirmasi_password_baru" type="password" class="input-block-level">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" id="btn_submit_update_password">Update</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>


</div>
</div>

</body>
</html>