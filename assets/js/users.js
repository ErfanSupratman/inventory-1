$(document).ready(function() {
    $('#tgl_expired').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    $('#frm_user').submit(function(event) {
        var full_name = $('#full_name');
        var jabatan = $('#jabatan');
        var tgl_expired = $('#tgl_expired');
        var username = $('#username');
        var password = $('#password');
        var data = $(this).serialize();
        var form_action = $(this).attr('action');

        if (full_name.val() == '' && jabatan.val() == '' && tgl_expired.val() == '' && username.val() == '' && password.val() == '') {
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
                    $('#frm_user').trigger('reset');
                    ShowOrHideLoading(false);
                    MyNotification('<p>Data User Sudah Tersimpan</p>');
                } else if (html == 0) {
                    ShowOrHideLoading(false);
                    MyNotification('<p>Username Sudah Terdaftar, Silahkan diulangin.</p>');
                } else {
                    ShowOrHideLoading(false);
                    MyNotification('<p>Penyimpanan Data User Gagal!!</p>');
                }
            }
        });
        return false;
    });


    $('#btn_check_nasabah_id').click(function() {
        var url = $(this).attr('data-url');
        ShowOrHideLoading(true);
        $.get(url, function(result) {
            ShowOrHideLoading(false);
            $('#nasabah_id').val(result);
        });
    });

    $('#btn_reload_data').click(function() {
        var url = $(this).attr('data-url');
        var daftar_users = $('#daftar_users');
        ShowOrHideLoading(true);
        daftar_users.empty();
        daftar_users.append('<tr><td colspan="10"><center>Silahkan Tunggu Sedang Proses Data.</center></td></tr>');
        $.get(url, function(result) {
            daftar_users.empty();
            ShowOrHideLoading(false);
            daftar_users.append(result);
        });
    });

});

