<?php

class MProduk extends DataMapper {

    public $table = "produk";

    function __construct() {
        parent::__construct();
    }

    function list_drop_gol() {
        $rs = $this->get();
        foreach ($rs as $row) {
            $data[''] = 'Pilih Produk';
            $data[$row->kode_prd] = $row->nama_produk;
        }
        return $data;
    }

    function auto_number($kode_jenis) {
        $Digit_Count = 3;
        $Parse = $kode_jenis;
        $NOL = "0";
        $sql = mysql_query("SELECT kode_prd FROM produk WHERE kode_prd like '$Parse%' order by kode_prd DESC");
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

}

?>
