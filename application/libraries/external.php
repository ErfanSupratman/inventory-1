<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class External {

    function rupiah($var = '', $koma) {
        $x = number_format($var, $koma, ",", ".");
        return $x;
    }

    function replace_string($str) {
        $str = str_replace(',', '', $str);
        $str = str_replace('.', '', $str);
        return $str;
    }

    function get_session_name($field) {
        $ci = &get_instance();
        return $ci->session->userdata($field);
    }

    function redirect_logged_in() {
        $ci = &get_instance();
        $ci->session->userdata('logged_in') == true ? '' : redirect('users/signin');
    }

    function auto_increment_kretrans() {
        $mkretrans = new Mkretrans();
        return $mkretrans->auto_number();
    }

    function auto_increment_tabtrans() {
        $mtabtrans = new Mtabtrans();
        return $mtabtrans->auto_number();
    }

    function auto_increment_trans_detail() {
        $mtransd = new Mtrans_detail();
        return $mtransd->auto_number();
    }

    function auto_increment_trans_master() {
        $mtransm = new Mtrans_master();
        return $mtransm->auto_number();
    }

    function auto_number_trans($Digit_Count, $field_id, $table, $Parse) {
        /*
         * 101 => TABTRANS
         * 102 => KRETRANS
         * 103 => TRANSAKSI_MASTER
         * 104 => TRANSAKSI_DETAIL
         * 
         * BULAN HARI 3 DIGIT KODE TRANS 7 DIGIT URUTAN 
         */
        $Parse = date('d') . $Parse;
        $NOL = 0;
        $sql = mysql_query("SELECT " . $field_id . " FROM " . $table . " WHERE " . $field_id . " like '$Parse%' ORDER BY " . $field_id . " DESC");
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

    function delete_record($table, $field, $val, $link) {
        $ci = &get_instance();
        $ci->db->query('DELETE FROM ' . $table . ' WHERE ' . $field . '=' . $val);
        redirect($link);
    }

    function get_detail_anggota($nasabah_id, $field) {
        $manggota = new MAnggota();
        $rs = $manggota->where('nasabah_id', $nasabah_id)->get();

        if ($rs)
            return $rs->$field;
        else
            return false;
    }

    function hpp($harga) {
        $persen = get_field_setting('PERSENTASE_HARGA_JUAL');
        $nilai = ($harga * $persen) / 100;
        $hpp = ($harga + $nilai);
        return $hpp;
    }

    function harga_pokok($kode_brg, $satuan) {
        $md = new MDetail();
        $metode = get_field_setting('METODE_HARGA_POKOK');
        $sub_total = 0;
        $harga = 0;
        $jml = 0;
        $hpp = 0;
        $total = 0;

        if ($metode == 'AVG') {
            //HARGA = NILAI STOCK / JUMLAH STOOCK            
            $rs = $md->where('kode_brg', $kode_brg)->where('satuan', $satuan)->get();            
            if ($rs->exists()) {
                foreach ($rs as $row) {
                    $harga = ($row->jumlah * $row->harga_beli);
                    $sub_total = ($sub_total + $harga);
                    $jml = ($jml + $row->jumlah);
                }
                $total = ($sub_total / $jml);
                $hpp = $this->hpp($total);
                return number_format($hpp, 0, ",", "");
            } else {
                return '0';
            }
        } else {
            
        }

        /*
         * maka laba kotor (jml_penjualan * harga) - (sub_total * jml_penjualan)
         */
    }

}

?>
