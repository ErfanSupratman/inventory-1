<?php

class Penjualan extends CI_Controller {

    private $m, $user_id;

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
        $this->user_id = $this->external->get_session_name('user_id');
        $this->m = new MPenjualan();
    }
    
    function index(){
        $mp = new MPenjualan();
        $data['data_penjualan'] = $mp->get();
        $this->load->view('mutasi/penjualan/index', $data);
    }

    function tambah() {
        $mp = new MPelanggan();
        $mb = new MBarang();
        $ms = new MSementara();

        $data['data_barang'] = $ms->where('user_id', $this->user_id)->get();
        $no_bukti = $this->m->auto_number();
        $kode_plg = $mp->list_drop();
        $kode_brg = $mb->list_drop();

        $option_cb = array(
            'tunai' => 'Tunai',
            'kredit' => 'Kredit'
        );
        $option_st = array(
            '-' => '- Pilih -',
            'karton' => 'Karton',
            'dosin' => 'Dos',
            'biji' => 'Biji'
        );
        $data['form_action'] = site_url('mutasi/penjualan/proses');
        $data['no_bukti'] = array('name' => 'no_bukti', 'id' => 'no_bukti', 'class' => 'span2', 'value' => $no_bukti, 'readonly' => 'readonly');
        $data['tgl_bukti'] = array('name' => 'tgl_bukti', 'class' => 'input-small', 'id' => 'tgl1', 'value' => date('Y-m-d'));
        $data['keterangan'] = array('name' => 'keterangan', 'class' => 'input-block-level', 'rows' => '2', 'id' => 'keterangan');
        $data['jatuh_tempo'] = array('name' => 'jatuh_tempo', 'class' => 'input-small', 'id' => 'jatuh_tempo');
        $data['harga'] = array('name' => 'harga', 'class' => 'input-block-level', 'id' => 'harga');
        $data['jumlah'] = array('name' => 'jumlah', 'class' => 'input-mini', 'id' => 'jumlah');
        $data['diskon'] = array('name' => 'diskon', 'class' => 'input-mini', 'id' => 'diskon');
        $data['harga_stl_diskon'] = array('name' => 'harga_stl_diskon', 'class' => 'span2', 'style' => 'width: 199px;', 'id' => 'harga_stl_diskon', 'readonly' => 'readonly');
        $data['stl_disc'] = array('name' => 'stl_disc', 'class' => 'span2', 'style' => 'width: 199px;');
        $data['kode_plg'] = form_dropdown('kode_plg', $kode_plg, '', 'id="kode_plg" class="chosen-select input-block-level"');
        $data['kode_brg'] = array('name' => 'kode_brg', 'class' => 'span2', 'placeholder' => 'Masukan nama barang...', 'id' => 'kode_brg', 'data-url' => site_url('master/barang/nama_barang_auto'));
        $data['nama_brg'] = array('name' => 'nama_brg', 'id' => 'nama_brg', 'class' => 'input-block-level', 'readonly' => 'readonly');
        $data['cara_bayar'] = form_dropdown('cara_bayar', $option_cb, '', 'id="cara_bayar" class="input-small"');
        $data['satuan'] = form_dropdown('satuan', $option_st, '', 'id="satuan" class="span2" data-url="' . site_url('mutasi/penjualan/hpp') . '"');
        $this->load->view('mutasi/penjualan/tambah', $data);
    }

    function hpp() {
        $satuan = $_GET['satuan'];
        $kode_brg = $_GET['kode_brg'];
        $harga = 0;
        $harga = $this->external->harga_pokok($kode_brg, $satuan);
        echo $harga;
    }

    function proses() {
        $ms = new MSementara();
        $mb = new MBarang();

        $data = array(
            'status' => 'PENJUALAN',
            'kode_brg' => $_POST['kode_brg'],
            'nama_brg' => $mb->get_record($_POST['kode_brg'], 'nama_brg'),
            'jumlah' => $_POST['jumlah'],
            'satuan' => $_POST['satuan'],
            'harga' => $_POST['harga'],
            'diskon' => $_POST['diskon'],
            'harga_stl_diskon' => $_POST['harga_stl_diskon'],
            'user_id' => $this->user_id
        );
        $ms->form_insert($data);
    }

    function load_data_barang() {
        $ms = new MSementara();
        $data['data_barang'] = $ms->where('user_id', $this->user_id)->get();
        $this->load->view('mutasi/penjualan/ajax/data_barang', $data);
    }

    function sum_penjualan($no_bukti) {
        $md = new MSementara();
        $rs = $md->select_sum('harga')->where('status', 'PENJUALAN')->get();
        echo rupiah($rs->harga);
    }

    function simpan() {
        $ms = new MSementara();
        $mb = new MBarang();
        $tgl = strtotime('+' . $_POST['jatuh_tempo'] . ' day', strtotime($_POST['tgl_bukti']));
        $tgl_jt = date('Y-m-d', $tgl);

        $data = array(
            'tgl_bukti' => $_POST['tgl_bukti'],
            'no_bukti' => $_POST['no_bukti'],
            'kode_plg' => $_POST['kode_plg'],
            'cara_bayar' => $_POST['cara_bayar'],
            'jatuh_tempo' => $_POST['jatuh_tempo'],            
            'uraian' => $_POST['keterangan'],
            'user_id' => $this->user_id
        );
        //simpan ke table pembelian
        $this->m->simpan_transaksi($data);

        //simpan ke table hutang jika pembelian dengan cara bayar kredit
        if ($this->input->post('cara_bayar') == 'kredit') {
            $this->db->query("INSERT INTO piutang (tgl_bukti,no_bukti,kode_plg,nilai,jatuh_tempo, sisa) 
                VALUES ('" . $_POST['tgl_bukti'] . "', '" . $_POST['no_bukti'] . "', '" . $_POST['kode_plg'] . "', '" . replace('.', $_POST['total_pembelian']) . "','" . $_POST['jatuh_tempo'] . "','" . replace('.', $_POST['total_pembelian']) . "')");
        }

        //ambil data barang dari table sementara
        $rs = $ms->where('user_id', $this->user_id)->where('status', 'PENJUALAN')->get();
        foreach ($rs as $row) {
            $this->db->query("INSERT INTO trans_detail_penjualan (no_bukti, kode_brg, jumlah, satuan, harga, diskon, harga_stl_diskon, user_id) 
                VALUES ('" . $_POST['no_bukti'] . "', '$row->kode_brg', '$row->jumlah', '$row->satuan','$row->harga','$row->diskon', '$row->harga_stl_diskon', '$this->user_id')");

            //update stock master barang
            $mb->update_status_stock_barang($row->kode_brg, $row->satuan, $row->jumlah, 'penjualan');
        }

        $ms->delete_transaksi($this->user_id);
    }

}

?>
