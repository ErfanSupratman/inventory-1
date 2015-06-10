<?php

class MBarang extends DataMapper {

    public $table = 'master_barang';

    function __construct($id = NULL) {
        parent::__construct($id);
    }

    function list_drop() {
        $rs = $this->get();
        foreach ($rs as $row) {
            $data[''] = 'Pilih Barang';
            $data[$row->kode_brg] = $row->nama_brg;
        }
        return $data;
    }

    function get_record($val, $field) {
        $rs = $this->where('kode_brg', $val)->get();
        return $rs->$field;
    }

    function auto_number($kode_prd) {
        $Digit_Count = 6;
        $Parse = $kode_prd;
        $NOL = "0";
        $sql = mysql_query("SELECT kode_brg FROM master_barang WHERE kode_brg like '$Parse%' order by kode_brg DESC");
        $counter = 2;
        if (mysql_num_rows($sql) == 0) {
            while ($counter < $Digit_Count) {
                $NOL = "0" . $NOL;
                $counter++;
            }
            return $Parse . $NOL . "1";
        } else {
            $R = mysql_fetch_array($sql);
            $K = sprintf("%d", substr($R[0], -$Digit_Count));
            $K = $K + 1;
            $L = $K;
            while (strlen($L) != $Digit_Count) {
                $L = $NOL . $L;
            }
            return $Parse . $L;
        }
    }

    function update_status_stock_barang($kode_brg, $satuan, $isi, $status) {
        if ($status == 'pembelian') {
            if ($satuan == 'karton') {
                $this->db->query("UPDATE " . $this->table . " SET isi1=isi1 + '$isi' WHERE kode_brg= '$kode_brg' AND satuan1 = 'karton'");
            } elseif ($satuan == 'dosin') {
                $this->db->query("UPDATE " . $this->table . " SET isi2=isi2 + '$isi' WHERE kode_brg= '$kode_brg' AND satuan2 = 'dosin'");
            } else {
                $this->db->query("UPDATE " . $this->table . " SET isi3=isi3 + '$isi' WHERE kode_brg= '$kode_brg' AND satuan3 = 'biji'");
            }
        } else {
            if ($satuan == 'karton') {
                $this->db->query("UPDATE " . $this->table . " SET isi1=isi1 - '$isi' WHERE kode_brg= '$kode_brg' AND satuan1 = 'karton'");
            } elseif ($satuan == 'dosin') {
                $this->db->query("UPDATE " . $this->table . " SET isi2=isi2 - '$isi' WHERE kode_brg= '$kode_brg' AND satuan2 = 'dosin'");
            } else {
                $this->db->query("UPDATE " . $this->table . " SET isi3=isi3 - '$isi' WHERE kode_brg= '$kode_brg' AND satuan3 = 'biji'");
            }
        }
    }

}

?>
