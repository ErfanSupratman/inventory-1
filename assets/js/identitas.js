$(document).ready(function() {
    var url = $('#id_modal_identitas').attr('data-url');
    $.getJSON(url, function(result){
        $.each(result, function(key, val) {
            $( '#id_id').val(val.id);
            $( '#id_nama').val(val.nama);
            $( '#id_alamat').val(val.alamat);
            $( '#id_kota').val(val.kota);
            $( '#id_kode_pos').val(val.kode_pos);
            $( '#id_tlp').val(val.tlp);
            $( '#id_fax').val(val.fax);
            $( '#id_email').val(val.email);
            $( '#id_website').val(val.website);
        });
    });

    $('#btn_simpan_identitas').click(function(event) {
        var data = $('#frm_identitas').serialize();
        var form_action = $('#frm_identitas').attr('action');

        ShowOrHideLoading(true);
        $.ajax({
            url: form_action,
            type: "POST",
            data: data,
            cache: false,
            success: function(html) {
                if (html == 1) {
                    ShowOrHideLoading(false);
                    alert('Data Berhasil Disimpan.');
                }
            }
        });
        return false;
    });
});

