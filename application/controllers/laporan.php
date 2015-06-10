<?php

class Laporan extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function kartu_barang($page = 1) {
        $mp = new MProduk();
        $data['data_produk'] = $mp->get_paged($page, 2);
        $this->load->view('laporan/kartu_barang', $data);
    }

    function gudang($page = 1) {
        $mg = new MGudang();
        $data['data_gudang'] = $mg->get_paged($page, 10);
        $this->load->view('laporan/gudang', $data);
    }

    function buku_pembelian($page = 1) {
        $mg = new MGudang();
        $data['data_gudang'] = $mg->get_paged($page, 10);
        $this->load->view('laporan/buku_pembelian', $data);
    }

    function buku_penjualan($page = 1) {
        $mg = new MGudang();
        $data['data_gudang'] = $mg->get_paged($page, 10);

        $this->load->view('laporan/buku_penjualan', $data);
    }

}

?>
