<?php

class MPembelian extends DataMapper {

    public $table = "pembelian";    

    function __construct() {
        parent::__construct();        
    }

    function list_drop_kredit() {
        $data = array();
        $rs = $this->where('cara_bayar', 'kredit')->get();
        foreach ($rs as $row) {
            $data[''] = 'Cari No Bukti';
            $data[$row->no_bukti] = $row->no_bukti;
        }
        return $data;
    }

    function simpan_transaksi($user_id) {
        $tgl = strtotime('+' . $_POST['jatuh_tempo'] . ' day', strtotime($_POST['tgl_bukti']));
        $tgl_jt = date('Y-m-d', $tgl);

        $data = array(
            'tgl_bukti' => $_POST['tgl_bukti'],
            'no_bukti' => $_POST['no_bukti'],
            'kode_psk' => $_POST['kode_psk'],
            'cara_bayar' => $_POST['cara_bayar'],
            'jatuh_tempo' => $_POST['jatuh_tempo'],
            'tgl_jt' => $tgl_jt,
            'uraian' => $_POST['keterangan'],
            'user_id' => $user_id
        );

        $rs = $this->db->insert($this->table, $data);
        return $rs;
    }

}

?>
