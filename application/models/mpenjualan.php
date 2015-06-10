<?php

class MPenjualan extends DataMapper {

    public $table = "penjualan";

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

    function list_drop_kredit() {
        $rs = $this->where('cara_bayar', 'kredit')->get();
        $data = array();
        foreach ($rs as $row) {
            $data[''] = 'Pilih No Bukti';
            $data[$row->no_bukti] = $row->no_bukti;
        }
        return $data;
    }

    function auto_number() {
        $Digit_Count = 4;
        $Parse = date('ymd');
        $NOL = "0";
        $sql = mysql_query("SELECT no_bukti FROM penjualan WHERE no_bukti like '$Parse%' order by no_bukti DESC");
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

    function simpan_transaksi($data) {
        $rs = $this->db->insert($this->table, $data);
        return $rs;
    }

}

?>
