<?php

class Pembelian extends CI_Controller {

    private $m, $user_id;

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
        $this->user_id = $this->external->get_session_name('user_id');
        $this->m = new MPembelian();
    }

    function index($page = 1) {
        $data['data_pembelian'] = $this->m->get_paged($page, 10);
        $this->load->view('mutasi/pembelian/index', $data);
    }

    function tambah() {
        $mp = new MPemasok();
        $mb = new MBarang();
        $ms = new MSementara();

        $data['data_barang'] = $ms->where('user_id', $this->user_id)->get();
        $kode_psk = $mp->list_drop();
        $kode_brg = $mb->list_drop();

        $option_cb = array(
            'tunai' => 'Tunai',
            'kredit' => 'Kredit'
        );
        $option_st = array(
            'karton' => 'Karton',
            'dosin' => 'Dos',
            'biji' => 'Biji'
        );
        $data['form_action'] = site_url('mutasi/pembelian/proses');
        $data['no_bukti'] = array('name' => 'no_bukti', 'class' => 'span2', 'id' => 'no_bukti', 'required' => 'required');
        $data['tgl_bukti'] = array('name' => 'tgl_bukti', 'class' => 'input-small', 'id' => 'tgl_bukti', 'value' => date('Y-m-d'), 'required' => 'required');
        $data['keterangan'] = array('name' => 'keterangan', 'class' => 'input-block-level', 'rows' => '2', 'id' => 'keterangan');
        $data['jatuh_tempo'] = array('name' => 'jatuh_tempo', 'class' => 'input-small', 'id' => 'jatuh_tempo', 'value' => '0');
        $data['harga'] = array('name' => 'harga', 'class' => 'input-block-level', 'id' => 'harga', 'required' => 'required');
        $data['jumlah'] = array('name' => 'jumlah', 'class' => 'input-mini', 'id' => 'jumlah', 'required' => 'required');
        $data['diskon'] = array('name' => 'diskon', 'class' => 'input-mini', 'value' => '0', 'id' => 'diskon');
        $data['harga_stl_diskon'] = array('name' => 'harga_stl_diskon', 'class' => 'span2', 'style' => 'width: 199px;', 'id' => 'harga_stl_diskon', 'readonly' => 'readonly');
        $data['exp_date'] = array('name' => 'exp_date', 'class' => 'input-small', 'id' => 'exp_date');
        $data['kode_psk'] = form_dropdown('kode_psk', $kode_psk, '', 'id="kode_psk" class="chosen-select input-block-level" required="required"');
        $data['kode_brg'] = array('name' => 'kode_brg', 'class' => 'span2', 'placeholder' => 'Masukan nama barang...', 'id' => 'kode_brg', 'data-url' => site_url('master/barang/nama_barang_auto'));
        $data['nama_brg'] = array('name' => 'nama_brg', 'id' => 'nama_brg', 'class' => 'input-block-level', 'readonly' => 'readonly');
        $data['cara_bayar'] = form_dropdown('cara_bayar', $option_cb, '', 'id="cara_bayar" class="input-small" required="required"');
        $data['satuan'] = form_dropdown('satuan', $option_st, '', 'id="satuan" class="span2" style="width: 213px;" required="required"');
        $this->load->view('mutasi/pembelian/tambah', $data);
    }

    function proses() {
        $ms = new MSementara();
        $mb = new MBarang();

        $data = array(
            'status' => 'PEMBELIAN',
            'kode_brg' => $_POST['kode_brg'],
            'nama_brg' => $mb->get_record($_POST['kode_brg'], 'nama_brg'),
            'jumlah' => $_POST['jumlah'],
            'satuan' => $_POST['satuan'],
            'harga' => $_POST['harga'],
            'exp_date' => $_POST['exp_date'],
            'diskon' => $_POST['diskon'],
            'harga_stl_diskon' => $_POST['harga_stl_diskon'],
            'user_id' => $this->user_id
        );
        $ms->form_insert($data);
    }

    function load_data_barang() {
        $ms = new MSementara();
        $data['data_barang'] = $ms->where('user_id', $this->user_id)->get();
        $this->load->view('mutasi/pembelian/ajax/data_barang', $data);
    }

    function simpan() {
        $this->external->simpan_transaksi_pembelian();
    }

    function detail_pembelian($no_bukti) {
        $md = new MDetail();
        $data['data_barang'] = $md->where('no_bukti', $no_bukti)->get();
        $this->load->view('mutasi/pembelian/ajax/data_detail_pembelian', $data);
    }

    function sum_pembelian($no_bukti) {
        $md = new MSementara();
        $rs = $md->select_sum('harga')->where('status', 'PEMBELIAN')->get();
        echo rupiah($rs->harga);
    }

}

?>
