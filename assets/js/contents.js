$(function() {
    $(".decimal").priceFormat({
        prefix: '',
        centsSeparator: '',
        thousandsSeparator: '.',
        limit: false,
        centsLimit: 0
    });

    $('#tgl1, #tgl2').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });


    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {allow_single_deselect: true},
        '.chosen-select-no-single': {disable_search_threshold: 5},
        '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
        '.chosen-select-width': {width: "50%"},
        '.chosen-select': {max_selected_options: 5}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
});

function MyNotification(html) {
    $('.modal-body').empty();
    $('.modal-body').append(html);
    $('#myModalNotification').modal('show');
}

function ShowOrHideLoading(status) {
    status == true ? $('#custome-loading').show() : $('#custome-loading').hide();
}

function delete_row_record(url, div_id) {
    if (confirm("Apakah anda yakin akan menghapus data?")) {
        ShowOrHideLoading(true);
        $(div_id).empty();
        $(div_id).append('<tr><td colspan="10"><center>Silahkan Tunggu Sedang Proses Data.</center></td></tr>');
        $.get(url, function(result) {
            $(div_id).empty();
            ShowOrHideLoading(false);
            $(div_id).append(result);
        });
    }
}

function show_form_modal(url) {
    ShowOrHideLoading(true);
    $.get(url, function(html) {
        ShowOrHideLoading(false);
        MyNotification(html);
    });
}