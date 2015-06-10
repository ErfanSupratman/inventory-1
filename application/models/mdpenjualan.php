<?php

class MDPenjualan extends DataMapper {

    public $table = 'trans_detail_penjualan';

    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    function sum_penjualan($no_bukti){
        $rs = $this->select_sum('harga')->where('no_bukti', $no_bukti)->get();
        return $rs->harga;
    }

}

?>
