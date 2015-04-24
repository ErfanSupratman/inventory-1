<?php echo get_header(); ?>
<link href="<?php echo base_url('assets/fullcalendar/fullcalendar.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/fullcalendar/fullcalendar.js'); ?>"></script>
<script src="<?php echo base_url('assets/fullcalendar/fullcalendar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/contents.js'); ?>"></script>

<script type='text/javascript'>
    $(document).ready(function() {
        //        $('#calendar').fullCalendar({
        //            header: {
        //                left: 'prev,next today',
        //                center: 'title',
        //                right: 'month,basicWeek,basicDay'
        //            },
        //            events: '<?php echo site_url('transaksi/master_trans_proyek/get_end_date_master_trans/'); ?>',
        //            editable: true,
        //            eventDrop: function(event, delta) {
        //                alert(event.title + ' was moved ' + delta + ' days\n' +
        //                    '(should probably update your database)');
        //            }
        //        });

    });
</script>

<div class="span6">
    <div class = "widget stacked">
        <div class = "widget-header">
            <h3>Info</h3>
        </div>
        <div class = "widget-content" style = "font-size: 13px;">
            Selamat Datang Kembali, <?php echo get_session_name('username');?><br/>
            Login untuk tanggal transaksi <?php echo date('Y-m-d'); ?>. rendered page {elapsed_time}
        </div> <!-- /widget-content -->
    </div>
</div>


<?php echo get_footer(); ?>
