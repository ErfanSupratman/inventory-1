<?php

class MPemasok extends DataMapper {

    public $table = 'pemasok';

    function __construct($id = NULL) {
        parent::__construct($id);
    }

    function list_drop() {
        $rs = $this->get();
        foreach ($rs as $row) {
            $data[''] = 'Pilih Pemasok';
            $data[$row->kode_psk] = $row->nama_psk;
        }
        return $data;
    }

    function auto_number() {
        $Digit_Count = 3;
        $Parse = "SP-";
        $NOL = "0";
        $sql = mysql_query("SELECT kode_psk FROM pemasok WHERE kode_psk like '$Parse%' order by kode_psk DESC");
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

    function get_record($val, $field) {
        $rs = $this->where('kode_psk', $val)->get();
        return $rs->$field;
    }

}

?>
