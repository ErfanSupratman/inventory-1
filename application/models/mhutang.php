<?php

class MHutang extends DataMapper {

    public $table = 'hutang';

    function __construct($id = NULL) {
        parent::__construct($id);
    }

    function simpan_transaksi() {
        $data = array(
            'tgl_bukti' => $_POST['tgl_bukti'],
            'no_bukti' => $_POST['no_bukti'],
            'kode_psk' => $_POST['kode_psk'],
            'nilai' => replace('.', $_POST['total_pembelian']),
            'jatuh_tempo' => $_POST['jatuh_tempo'],
            'sisa' => replace('.', $_POST['total_pembelian'])
        );

        $rs = $this->db->insert($this->table, $data);
        return $rs;
    }

}

?>
