<?php

class Bayar extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $mp = new MPelanggan();
        $kode_plg = $mp->list_drop();
        $data['no_bukti'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');
        $data['kode_psk'] = form_dropdown('kode_psk', $kode_plg, '', 'id="kode_psk" class="chosen-select input-block-level" required="required"');
        $data['jml_hutang'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');
        $data['angsuran_ke'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');
        $data['jml_bayar'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');
        $data['jml_sisa'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');
        $data['tgl_bayar'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');        
        $this->load->view('piutang/bayar', $data);
    }

}

?>
