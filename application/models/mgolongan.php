<?php

class MGolongan extends DataMapper {

    public $table = "golongan_barang";

    function __construct() {
        parent::__construct();
    }

    function list_drop_gol() {
        $rs = $this->get();
        foreach ($rs as $row) {
            $data[''] = 'Pilih Golongan';
            $data[$row->kode_gol] = $row->nama_gol;
        }
        return $data;
    }

}

?>
