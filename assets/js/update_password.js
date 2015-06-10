$(function(){
    $('#frm_update_password').submit(function(event) {
        var password_lama = $('#password_lama');
        var password_baru = $('#password_baru');
        var konfirmasi_password_baru = $('#konfirmasi_password_baru');
        var data = $(this).serialize();
        var form_action = $(this).attr('action');

        if (password_lama.val() == '' || password_baru.val() == '' || konfirmasi_password_baru.val()== '') {
            var msg = '<p>Kolom yang diberi tanda bintang "*" tidak boleh kosong Jika masih terdapat pemberitahuan hubungi admin.</p>';
            MyNotification(msg);
            return false;
        }
        ShowOrHideLoading(true);
        $.ajax({
            url: form_action,
            type: "GET",
            data: data,
            cache: false,
            success: function(html) {
                if (html == 1) {
                    $('#frm_update_password').trigger('reset');
                    ShowOrHideLoading(false);
                    MyNotification('<p>Password Sudah diupdate secara otomatis anda akan logout.</p>');
                } else{
                    ShowOrHideLoading(false);
                    MyNotification('<p>Update Password Gagal!!</p>');
                }
            }
        });
        return false;
    });
});