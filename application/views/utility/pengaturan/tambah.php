<?php echo get_header('admin'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            "code table"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
<?php echo $this->session->flashdata('message'); ?>
<div class="widget stacked">
    <div class="widget-header">
        <h3>Form Settings</h3>
    </div> <!-- /widget-header -->
    <div class="widget-content">
        <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data">
            <?php echo form_input($name) . form_hidden('id', $id); ?>
            <select name="status" id="status_setting">
                <option value="empty">Type for content</option>
                <option value="text" <?php echo $status == 'text' ? 'selected' : '' ?> >Text</option>
                <option value="images" <?php echo $status == 'images' ? 'selected' : '' ?>>Images</option>
            </select>
            <div id="content_image">
                <input type="file" name="content"/>
            </div>
            <div id="content_text">
                <?php echo form_textarea($content); ?>
            </div>
            <div class="form-actions">
                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                <a href="<?php echo $btn_back; ?>" class="btn">Back</a>
            </div>
        </form>
    </div> <!-- /widget-content -->
</div>

<?php echo get_footer('admin'); ?>
                <script>
                    $(function() {
<?php
                if ($status == 'text') {
                    $f = '$("#content_text").show(); $("#content_image").hide();';
                } else if ($status == 'images') {
                    $f = '$("#content_text").hide(); $("#content_image").show();';
                } else {
                    $f = '$("#content_text").hide(); $("#content_image").hide();';
                }

                echo $f;
?>

               
        
    $("#status_setting").change(function () {
        var str = "";
        $("select option:selected").each(function () {
            str += $(this).text() + " ";
            var x = str.indexOf("Text");
            var val = $(this).val();
            //                if(x > -1) {                
            if(val == 'text') {
                $("#content_image").hide();
                $("#content_text").show();
            }else if(val == 'images'){
                $("#content_text").hide();
                $("#content_image").show();
            }else if(val == 'empty'){
                $("#content_text").hide();
                $("#content_image").hide();
            }
        });
    });
});
</script>
