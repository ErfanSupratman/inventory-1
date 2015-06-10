<?php

class MGudang extends DataMapper {

    public $table = 'gudang_standart';

    function __construct($id = NULL) {
        parent::__construct($id);
    }

    function get_record($val, $field) {
        $rs = $this->where('kode_brg', $val)->get();
        return $rs->$field;
    }
    
    function get_data_barang_by_kode_brg_and_satuan($kode_brg, $field, $satuan, $satuan_val) {
        $rs = $this->where('kode_brg', $kode_brg)->where($satuan, $satuan_val)->get();
        return $rs->$field;
    }

    function exists_record($field, $value) {
        $query = $this->db->get_where($this->table, array($field => $value))->row();
        return $query;
    }

    function update_or_insert_barang($kode_brg, $satuan, $jm_stock, $harga_jual, $harga_beli, $kode_psk) {
        $rs = $this->exists_record('kode_brg', $kode_brg);

        if ($rs == true) {
            if ($satuan == 'karton') {
                $this->db->query("UPDATE `" . $this->table . "` SET jml_stock1=jml_stock1 + '$jm_stock', harga_jual1='$harga_jual',harga_beli1='$harga_beli' WHERE kode_brg= '$kode_brg' AND satuan1 = 'karton'");
            } elseif ($satuan == 'dosin') {
                $this->db->query("UPDATE `" . $this->table . "` SET jml_stock2=jml_stock2 + '$jm_stock', harga_jual2='$harga_jual',harga_beli2='$harga_beli' WHERE kode_brg= '$kode_brg' AND satuan2 = 'dosin'");
            } else {
                $this->db->query("UPDATE `" . $this->table . "` SET jml_stock3=jml_stock3 + '$jm_stock', harga_jual3='$harga_jual',harga_beli3='$harga_beli' WHERE kode_brg= '$kode_brg' AND satuan3 = 'biji'");
            }
        } else {
            if ($satuan == 'karton') {
                $this->db->query("INSERT INTO " . $this->table . " (kode_brg, satuan1, satuan2, satuan3, jml_stock1, harga_jual1, harga_beli1, kode_psk) 
                    VALUES ('$kode_brg', '$satuan', 'dosin', 'biji', '$jm_stock', '$harga_jual', '$harga_beli', '$kode_psk')");
            } elseif ($satuan == 'dosin') {
                $this->db->query("INSERT INTO " . $this->table . " (kode_brg, satuan1, satuan2, satuan3, jml_stock2, harga_jual2, harga_beli2, kode_psk) 
                    VALUES ('$kode_brg', 'karton', '$satuan', 'biji', '$jm_stock', '$harga_jual', '$harga_beli', '$kode_psk')");
            } else {
                $this->db->query("INSERT INTO " . $this->table . " (kode_brg, satuan1, satuan2, satuan3, jml_stock3, harga_jual3, harga_beli3, kode_psk) 
                    VALUES ('$kode_brg', 'karton', 'dosin', '$satuan', '$jm_stock', '$harga_jual', '$harga_beli', '$kode_psk')");
            }
        }
    }

}

?>
