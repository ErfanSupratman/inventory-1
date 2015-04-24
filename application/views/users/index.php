<?php echo get_header(); ?>
<script src="<?php echo base_url('assets/js/contents.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/users.js'); ?>"></script>

<div class="widget stacked">
    <div class="widget-header">
        <h3>Daftar Users</h3>
        <div class="pull-right" style="margin: 5px;">
            <input class="span4" type="text" name="q" placeholder="Searching...">
        </div>

        <a href="<?php echo site_url('users/tambah'); ?>" class="btn btn-success pull-right" style="margin: 5px;">Tambah</a>
    </div>
    <div class="widget-content">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="50"></th> 
                    <th>User ID</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Username</th>
                    <th>Tgl Register</th>
                    <th>Tgl Expired</th>                                                            
                </tr>
            </thead>            
            <tbody id="daftar_users">
                <tr>
                    <td colspan="10">
                        <span class="alert alert-success input-block-level text-center">
                            <button data-url="<?php echo site_url('users/reload') ?>" type="button" name="btn_reload_data" class="btn btn-large btn-primary" id="btn_reload_data">Refresh</button>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>    
</div>
<?php echo notification('Notification'); ?>
<?php get_footer('admin'); ?>