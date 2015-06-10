$(function() {
    $('#singkronisasi').click(function() {
        var url = $(this).attr('data-url');
        ShowOrHideLoading(true);
        $.get(url, function(result) {
            ShowOrHideLoading(false);
            if (result == true) {
                alert(result);
            } else {
                alert(result);
            }
        });
    });
})