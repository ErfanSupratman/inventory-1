<?php

class MPelanggan extends DataMapper {

    public $table = 'pelanggan';

    function __construct($id = NULL) {
        parent::__construct($id);
    }

    function list_drop() {
        $rs = $this->get();
        foreach ($rs as $row) {
            $data[''] = 'Pilih Pelanggan';
            $data[$row->kode_plg] = $row->nama_perusahaan;
        }
        return $data;
    }

    function auto_number() {
        $Digit_Count = 3;
        $Parse = "PLG-";
        $NOL = "0";
        $sql = mysql_query("SELECT kode_plg FROM pelanggan WHERE kode_plg like '$Parse%' order by kode_plg DESC");
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
        $rs = $this->where('kode_plg', $val)->get();
        return $rs->$field;
    }

}

?>
