function ShowOrHideLoading(status) {
    status == true ? $('#loading_signin').show() : $('#loading_signin').hide();
}

$(function() {    
    $('#frm_signin').submit(function(event) {
        var username = $('#username');
        var password = $('#password');
        var form_action = $(this).attr('action');
        var redirect_url = $(this).attr('data-url');
        var data = $(this).serialize();
        
        if (username.val() == '' && password.val() == '') {
            var msg = '<div class="alert alert-error text-center"><p>Username dan Password Tidak Boleh Kosong.</p></div>';
            MyNotification(msg);
            return false;
        }
        ShowOrHideLoading(true);
        $.ajax({
            url: form_action,
            type: "POST",
            data: data,
            cache: false,
            success: function(html) {
                if (html == 1) {
                    window.location = redirect_url;
                } else {
                    ShowOrHideLoading(false);
                    MyNotification('<div class="alert alert-error text-center"><p>Silahkan Periksa Username dan Password anda.</p></div>');
                }
            }
        });
        return false;
    });
});

