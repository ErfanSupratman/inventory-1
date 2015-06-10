<?php

class Produk extends CI_Controller {

    private $m;

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
        $this->m = new MProduk();
    }

    function index($page = 1) {
        $data['data_produk'] = $this->m->get_paged($page, 10);
        $this->load->view('master/produk/index', $data);
    }

    function tambah() {
        $mj = new MJenis();
        $kode_jenis = $mj->list_drop_gol();
        $data['form_action'] = site_url('master/produk/simpan');
        $data['kode_prd'] = array('name' => 'kode_prd', 'id' => 'kode_prd');
//        $data['kode_gol'] = array();
        $data['kode_jenis'] = form_dropdown('kode_jenis', $kode_jenis, '', 'id ="kode_jenis" data-url=" ' . site_url('master/produk/get_kode_produk/') . '"');
        $data['nama_produk'] = array('name' => 'nama_produk');
        $data['keterangan'] = array('name' => 'keterangan');
        $this->load->view('master/produk/tambah', $data);
    }

    function get_kode_produk() {
        echo $this->m->auto_number($_GET['kode_jenis']);
    }

    function simpan() {
        $this->m->kode_prd = $_POST['kode_prd'];
        $this->m->kode_gol = substr($_POST['kode_jenis'], 0, -3);
        $this->m->kode_jenis = $_POST['kode_jenis'];
        $this->m->nama_produk = $_POST['nama_produk'];
        $this->m->keterangan = $_POST['keterangan'];
        $this->m->save();
        redirect('master/produk/tambah');
    }

    function edit($kode) {
        $mj = new MJenis();
        $kode_jenis = $mj->list_drop_gol();
        $rs = $this->m->where('kode_prd', $kode)->get();
        $data['form_action'] = site_url('master/produk/update');
        $data['kode_prd'] = array('name' => 'kode_prd', 'id' => 'kode_prd', 'value' => $rs->kode_prd);
        $data['kode_jenis'] = form_dropdown('kode_jenis', $kode_jenis, $rs->kode_jenis, 'id ="kode_jenis" data-url=" ' . site_url('master/produk/get_kode_produk/') . '"');
        $data['nama_produk'] = array('name' => 'nama_produk', 'value' => $rs->nama_produk);
        $data['keterangan'] = array('name' => 'keterangan', 'value' => $rs->keterangan);
        $this->load->view('master/produk/tambah', $data);
    }

    function update() {
        $this->m->where('kode_prd', $_POST['kode_prd'])
                ->update(
                        array(
                            'kode_prd' => $_POST['kode_prd'],
                            'kode_gol' => substr($_POST['kode_jenis'], 0, -3),
                            'kode_jenis' => $_POST['kode_jenis'],
                            'nama_produk' => $_POST['nama_produk'],
                            'keterangan' => $_POST['keterangan'],
                        )
        );
        redirect('master/produk');
    }

    function reorder_link_table() {
        $this->db->query("UPDATE produk SET kode_gol = LEFT(kode_brg,3), kode_jenis = LEFT(kode_brg,6)");
        redirect('master/produk');
    }

}

?>
