$(function() {
    $('#no_bukti').focus();
    $('#tgl_bukti, #exp_date').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    //default jatuh tempo disable
    $('#jatuh_tempo').prop('disabled', true);



    $("#no_bukti").keypress(function(evt) {        
        var charCode = evt.charCode || evt.keyCode;
        if (charCode == 13) { //Enter key's keycode
            $('#kode_psk').focus();
            return false;
        }
    });
    
    $("#kode_psk").keypress(function(evt) {
        var charCode = evt.charCode || evt.keyCode;
        if (charCode == 13) { //Enter key's keycode
            $('#keterangan').focus();
            return false;
        }
    });
    
    $("#keterangan").keypress(function(evt) {
        var charCode = evt.charCode || evt.keyCode;
        if (charCode == 13) { //Enter key's keycode
            $('#cara_bayar').focus();
            return false;
        }
    });

    $("#jumlah").keypress(function(evt) {
        var charCode = evt.charCode || evt.keyCode;
        if (charCode == 13) { //Enter key's keycode
            $('#satuan').focus();
            return false;
        }
    });

    $("#satuan").keypress(function(evt) {
        var charCode = evt.charCode || evt.keyCode;
        if (charCode == 13) { //Enter key's keycode
            $('#harga').focus();
            return false;
        }
    });

    $('#cara_bayar').change(function() {
        var cara_bayar = $('#cara_bayar option:selected').text();
        if (cara_bayar == 'Tunai') {
            $('#jatuh_tempo').prop('disabled', true);
        } else {
            $('#jatuh_tempo').prop('disabled', false);
            $('#jatuh_tempo').focus();
            alert('Masukan jumlah hari pada kolom jatuh tempo.');
        }
    });

    $('#kode_brg').change(function() {
        $('#jumlah').focus();
    });

    $('#btn_add').click(function() {
        var form_action = $('#frm_add_barang').attr('action');
        var data = $('#frm_add_barang').serialize();
        var url = $('#frm_add_barang').attr('data-url');

        $.ajax({
            url: form_action,
            type: "POST",
            data: data,
            cache: false,
            success: function(html) {
                $('#frm_add_barang').trigger('reset');
                load_data_barang(url);
            }
        });
        return false;
    });
})

function load_data_barang(url) {
    $('#tbody_data_barang').html('');
    $('#tbody_data_barang').append('<tr><td colspan="8"><center>Loading...</center></td></tr>');
    $.get(url, function(result) {
        $('#tbody_data_barang').html('');
        $('#tbody_data_barang').append(result);
    });
}