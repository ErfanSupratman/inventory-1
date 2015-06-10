<?php

class MJenis extends DataMapper {

    public $table = "jenis_barang";

    function __construct($id = NULL) {
        parent::__construct($id);
    }

    function list_drop_gol() {
        $rs = $this->get();
        foreach ($rs as $row) {
            $data[''] = 'Pilih Jenis';
            $data[$row->kode_jenis] = $row->nama_jenis;
        }
        return $data;
    }

    function auto_number($kode_gol) {
        $Digit_Count = 3;
        $Parse = $kode_gol;
        $NOL = "0";
        $sql = mysql_query("SELECT kode_jenis FROM jenis_barang WHERE kode_jenis like '$Parse%' order by kode_jenis DESC");
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
