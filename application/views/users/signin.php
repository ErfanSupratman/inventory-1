<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo get_field_setting('NAMA_APLIKASI'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dikdik Tasdik Laksana">

        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap-responsive.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/bootstrap/css/docs.css') ?>" rel="stylesheet">

        <script src="<?php echo base_url('assets/bootstrap/js/jquery-1.9.1.js'); ?>"></script>
        <script src="<?php echo base_url('assets/jquery/js/jquery-ui-1.10.3.custom.js'); ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap-modal.js'); ?>"></script>

        <script src="<?php echo base_url('assets/choosen/chosen.jquery.js'); ?>"></script>
        <script src="<?php echo base_url('assets/jquery/js/jquery.currency.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/contents.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/signin.js'); ?>"></script>
    </head>

    <body>
        <?php echo notification('Notification'); ?>
        <div style="margin-top: 20px; text-align: center;">
            <div class="widget stacked" style="width: 600px; margin: auto;">
                <div class="widget-header">
                    <h3><?php echo get_field_setting('NAMA_APLIKASI'); ?></h3>
                </div>
                <div class="widget-content">
                    <form action="<?php echo site_url('users/check_signin'); ?>" method="GET" id="frm_signin" data-url="<?php echo site_url('welcome'); ?>">
                        <?php echo form_input($username); ?>
                        <?php echo form_password($password); ?>
                        <?php echo form_submit($button); ?>
                    </form>
                    <div class="hide" id="loading_signin"><?php echo img( 'assets/images/ajax-loader.gif');?></div>
                    &copy; Copyright
                </div>
            </div>
        </div>
    </body>
</html>