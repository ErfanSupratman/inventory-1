$(function() {
    $('#tgl_bayar').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    $('#no_bukti').change(function(evt) {
        var val = $('#no_bukti option:selected').val();
        var url = $('#no_bukti').attr('data-url');
        ShowOrHideLoading(true);
        $.getJSON(url + '/' + val, function(result) {
            $.each(result, function(key, val) {
                $('#nama_psk').val(val.nama_psk);
                $('#jml_hutang').val(val.sisa);
                $('#angsuran_ke').val(val.angsuran_ke);
                riwayat_hutang();
                ShowOrHideLoading(false);
            });
        });
    });
})

function riwayat_hutang() {
    var no_bukti = $('#no_bukti option:selected').val();
    var url = $('#riwayat_kredit').attr('data-url');
    $('#riwayat_kredit').html('');
    $.get(url + '/' + no_bukti, function(result) {
        $('#riwayat_kredit').append(result);
    });
}