<?php

class Bayar extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $mp = new MPemasok();
        $mbeli= new MPembelian();
        
        $kode_psk = $mp->list_drop();
        $no_bukti = $mbeli->list_drop_kredit();
        $data['no_bukti'] = form_dropdown('no_bukti', $no_bukti, '', 'id="no_bukti" class="chosen-select input-block-level" required="required"');
        $data['kode_psk'] = array('name' => 'no_bukti', 'class' => 'input-block-level', 'id' => 'no_bukti', 'required' => 'required');
        $data['jml_hutang'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');
        $data['angsuran_ke'] = array('name' => 'no_bukti', 'class' => 'input-mini', 'id' => 'no_bukti', 'required' => 'required');
        $data['jml_bayar'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');
        $data['jml_sisa'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');
        $data['tgl_bayar'] = array('name' => 'no_bukti', 'class' => 'input-small', 'id' => 'no_bukti', 'required' => 'required');        
        $this->load->view('hutang/bayar', $data);
    }

}

?>
