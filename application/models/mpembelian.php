<?php

class MPembelian extends DataMapper {

    public $table = "pembelian";

    function __construct() {
        parent::__construct();
    }

    function list_drop_kredit() {
        $data = array();
        $rs = $this->where('cara_bayar', 'kredit')->get();
        foreach ($rs as $row) {
            $data[''] = 'Cari No Bukti';
            $data[$row->no_bukti] = $row->no_bukti;
        }
        return $data;
    }

    function simpan_transaksi($data) {
        $rs = $this->db->insert($this->table, $data);
        return $rs;
    }

}

?>
