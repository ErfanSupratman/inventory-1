$(function() {
    $('#tgl_bukti, #exp_date').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    //default jatuh tempo disable
    $('#jatuh_tempo').prop('readonly', true);
    $('#no_bukti').focus();

    $("#no_bukti").keypress(function(evt) {
        var charCode = evt.charCode || evt.keyCode;
        if (charCode == 13) { //Enter key's keycode            
            $('#kode_psk').focus();
            return false;
        }
    });
    $('#kode_psk').change(function() {
        $('#keterangan').focus();
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
    $("#harga").keypress(function(evt) {
        var charCode = evt.charCode || evt.keyCode;
        if (charCode == 13) { //Enter key's keycode
            $('#diskon').focus();
            return false;
        }
    });
    $('#cara_bayar').change(function() {
        var cara_bayar = $('#cara_bayar option:selected').text();
        if (cara_bayar == 'Tunai') {
            $('#jatuh_tempo').prop('readonly', true);
            $('#kode_brg').focus();
        } else {
            $('#jatuh_tempo').prop('readonly', false);
            $('#jatuh_tempo').focus();
            alert('Masukan jumlah hari pada kolom jatuh tempo.');
        }
    });
    $('#kode_brg').keypress(function(evt) {
        var charCode = evt.charCode || evt.keyCode;
        if (charCode == 13) { //Enter key's keycode
            $('#jumlah').focus();
            return false;
        }

    });
    $('#diskon').keypress(function(evt) {
        var charCode = evt.charCode || evt.keyCode;
        if (charCode == 13) { //Enter key's keycode
            $('#exp_date').focus();
            return false;
        }

    });

    $('#diskon').keyup(function(evt) {
        var diskon = $(this).val();
        var harga = $('#harga').val();
        var stld = (harga * diskon) / 100;
        var total = diskon == 0 ? '' : (harga - stld);
        $('#harga_stl_diskon').val(total);
    });

    $('#btn_add').click(function() {
        var form_action = $('#frm_add_barang').attr('action');
        var data = $('#frm_add_barang').serialize();
        var url = $('#frm_add_barang').attr('data-url');

        $('#loading_add_product').show();
        
        $.ajax({
            url: form_action,
            type: "POST",
            data: data,
            cache: false,
            success: function(html){
                total_pembelian();
                load_data_barang(url);
                $('#frm_add_barang').trigger('reset');
                $('#kode_brg').focus();
                $('#loading_add_product').hide();
            }
        });        
        return false;
    });
    $('#btn_simpan_pembelian').click(function() {
        var form_action = $('#frm_pembelian').attr('action');
        var data = $('#frm_pembelian').serialize();
        var url = $('#frm_pembelian').attr('data-url');
        var url_brg = $('#frm_add_barang').attr('data-url');
        var no_bukti = $('#no_bukti').val();
        var tgl_bukti = $('#tgl_bukti').val();
        var kode_psk = $('#kode_psk').val();        

        if (no_bukti == '' && kode_psk == '' && tgl_bukti == '') {
            alert('No Bukti, Tanggal Bukti dan Pemasok tidak boleh kosong.');
            return false;
        }
        if (no_bukti == '') {
            alert('No Bukti tidak boleh kosong.');
            return false;
        }
        if (kode_psk == '') {
            alert('Pemasok tidak boleh kosong.');
            return false;
        }
        if (tgl_bukti == '') {
            alert('Tanggal Bukti tidak boleh kosong.');
            return false;
        }


        ShowOrHideLoading(true);
        $.ajax({
            url: form_action,
            type: "POST",
            data: data,
            cache: false,
            success: function(html) {
                $('#frm_pembelian').trigger('reset');
                $('#frm_add_barang').trigger('reset');
                load_data_barang(url_brg);
                ShowOrHideLoading(false);
            }
        });
        return false;
    });

    $("#kode_brg").autocomplete({
        minLength: 3,
        maxRow: 10,
        source: $('#kode_brg').attr('data-url'),
        select: function(event, ui) {
            $('#nama_brg').val(ui.item.label);
            $('#jumlah').focus();
        }
    });

});

function load_data_barang(url) {
    $('#tbody_data_barang').html('');
    $('#tbody_data_barang').append('<tr><td colspan="8"><center>Loading...</center></td></tr>');
    $.get(url, function(result) {
        $('#tbody_data_barang').html('');
        $('#tbody_data_barang').append(result);
    });
}

function show_detail_pembelian(url) {
    $('#modal_detail_barang').modal('show');
    $('#tbl_detail_barang').html('');
    $('#tbl_detail_barang').html('<tr><td colspan="8"><center>Loading...</center></td></tr>');
    $.get(url, function(html) {
        $('#tbl_detail_barang').html('');
        $('#tbl_detail_barang').append(html);
    });
}

function total_pembelian() {
    var no_bukti = $('#no_bukti').val();
    var url = $('#total_pembelian').attr('data-url');
    $.get(url + '/' + no_bukti, function(result) {
        $('#total_pembelian').val(result);
    })
}