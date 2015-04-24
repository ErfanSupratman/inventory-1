<?php

class MPembelian extends DataMapper {

    public $table = "pembelian";

    function __construct() {
        parent::__construct();
    }

    function list_drop_gol() {
        $rs = $this->get();
        foreach ($rs as $row) {
            $data[''] = 'Pilih Golongan';
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
