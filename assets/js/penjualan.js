$(function() {
    $("#kode_brg").autocomplete({
        minLength: 3,
        maxRow: 10,
        source: $('#kode_brg').attr('data-url'),
        select: function(event, ui) {
            $('#nama_brg').val(ui.item.label);
            $('#jumlah').focus();
        }
    });

    $('#satuan').change(function(evt) {
        var url = $(this).attr('data-url');
        var val = $('#satuan option:selected').val();
        var kode_brg = $('#kode_brg').val();
        $.get(url + '?satuan=' + val + '&kode_brg=' + kode_brg, function(result) {
            $('#harga').val(result);
        });
    });
})