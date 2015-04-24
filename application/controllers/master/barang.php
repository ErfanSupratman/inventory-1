<?php

class Barang extends CI_Controller {

    private $m;

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
        $this->m = new Mbarang();
    }

    function index($page = 1) {
        $this->m = new MBarang();
        $data['data_barang'] = $this->m->get_paged($page, 10);
        $this->load->view('master/barang/index', $data);
    }

    function tambah() {
        $mp = new MProduk();
        $kode_prd = $mp->list_drop_gol();
        $opt_satuan1 = array(
            'karton' => 'Karton',
            'dosin' => 'Dos',
            'biji' => 'Biji'
        );
        $data['form_action'] = site_url('master/barang/simpan');
        $data['kode_prd'] = form_dropdown('kode_prd', $kode_prd, '', 'id="kode_prd" class="chosen-select input-block-level span4" data-url=" ' . site_url('master/barang/get_kode_brg/') . '"');
        $data['kode_brg'] = array('name' => 'kode_brg', 'id' => 'kode_brg', 'readonly' => 'readonly');
        $data['nama_brg'] = array('name' => 'nama_brg', 'id' => 'nama_brg');
        $data['spec'] = array('name' => 'spec');
        $data['satuan1'] = form_dropdown('satuan1', $opt_satuan1, 'karton', 'class="input-mini"');
        $data['satuan2'] = form_dropdown('satuan2', $opt_satuan1, 'dosin', 'class="input-mini"');
        $data['satuan3'] = form_dropdown('satuan3', $opt_satuan1, 'biji', 'class="input-mini"');
        $data['isi1'] = array('name' => 'isi1', 'class' => 'input-mini');
        $data['isi2'] = array('name' => 'isi2', 'class' => 'input-mini');
        $data['isi3'] = array('name' => 'isi3', 'class' => 'input-mini');
        $data['stock_awal1'] = array('name' => 'stock_awal1', 'class' => 'input-mini');
        $data['stock_awal2'] = array('name' => 'stock_awal2', 'class' => 'input-mini');
        $data['stock_awal3'] = array('name' => 'stock_awal3', 'class' => 'input-mini');
        $data['stock_minimal'] = array('name' => 'stock_minimal', 'class' => 'input-small');
        $data['stock_maximal'] = array('name' => 'stock_maximal', 'class' => 'input-small');
        $this->load->view('master/barang/tambah', $data);
    }

    function get_kode_brg() {
        echo $this->m->auto_number($_GET['kode_prd']);
    }

    function simpan() {
        $this->m->kode_prd = $_POST['kode_prd'];
        $this->m->kode_gol = substr($_POST['kode_prd'], 0, -3);
        $this->m->kode_jenis = substr($_POST['kode_prd'], 0, -6);
        $this->m->kode_brg = $_POST['kode_brg'];
        $this->m->nama_brg = $_POST['nama_brg'];
        $this->m->spec = $_POST['spec'];
        $this->m->satuan1 = $_POST['satuan1'];
        $this->m->satuan2 = $_POST['satuan2'];
        $this->m->satuan3 = $_POST['satuan3'];
        $this->m->isi1 = $_POST['isi1'];
        $this->m->isi2 = $_POST['isi2'];
        $this->m->isi3 = $_POST['isi3'];
        $this->m->stock_awal1 = $_POST['stock_awal1'];
        $this->m->stock_awal2 = $_POST['stock_awal2'];
        $this->m->stock_awal3 = $_POST['stock_awal3'];
        $this->m->stock_minimal = $_POST['stock_minimal'];
        $this->m->stock_maximal = $_POST['stock_maximal'];
        $this->m->save();
        redirect('master/barang/tambah');
    }

    function edit($kode) {
        $mp = new MProduk();
        $rs = $this->m->where('kode_brg', $kode)->get();

        $kode_prd = $mp->list_drop_gol();
        $opt_satuan1 = array(
            'karton' => 'Karton',
            'dosin' => 'Dos',
            'biji' => 'Biji'
        );
        $data['form_action'] = site_url('master/barang/simpan');
        $data['kode_prd'] = form_dropdown('kode_prd', $kode_prd, $rs->kode_prd, 'id ="kode_prd" data-url=" ' . site_url('master/barang/get_kode_brg/') . '"');
        $data['kode_brg'] = array('name' => 'kode_brg', 'id' => 'kode_brg', 'value' => $rs->kode_brg);
        $data['nama_brg'] = array('name' => 'nama_brg', 'value' => $rs->nama_brg);
        $data['spec'] = array('name' => 'spec', 'value' => $rs->spec);
        $data['satuan1'] = form_dropdown('satuan1', $opt_satuan1, $rs->satuan1, 'class="input-mini"');
        $data['satuan2'] = form_dropdown('satuan2', $opt_satuan1, $rs->satuan2, 'class="input-mini"');
        $data['satuan3'] = form_dropdown('satuan3', $opt_satuan1, $rs->satuan3, 'class="input-mini"');
        $data['isi1'] = array('name' => 'isi1', 'class' => 'input-mini', 'value' => $rs->isi1);
        $data['isi2'] = array('name' => 'isi2', 'class' => 'input-mini', 'value' => $rs->isi2);
        $data['isi3'] = array('name' => 'isi3', 'class' => 'input-mini', 'value' => $rs->isi3);
        $data['stock_awal1'] = array('name' => 'stock_awal1', 'class' => 'input-mini', 'value' => $rs->stock_awal1);
        $data['stock_awal2'] = array('name' => 'stock_awal2', 'class' => 'input-mini', 'value' => $rs->stock_awal2);
        $data['stock_awal3'] = array('name' => 'stock_awal3', 'class' => 'input-mini', 'value' => $rs->stock_awal3);
        $data['stock_minimal'] = array('name' => 'stock_minimal', 'class' => 'input-small', 'value' => $rs->stock_minimal);
        $data['stock_maximal'] = array('name' => 'stock_maximal', 'class' => 'input-small', 'value' => $rs->stock_maximal);
        $this->load->view('master/barang/tambah', $data);
    }

    function hapus($kode) {
        $this->db->query("DELETE FROM master_barang WHERE kode_brg = '$kode'");
        redirect('master/barang');
    }

    function reorder_link_table() {
        $this->db->query("UPDATE master_barang SET kode_gol = LEFT(kode_brg,3), kode_jenis = LEFT(kode_brg,6)");
        redirect('master/barang');
    }

    function nama_barang_auto() {        
        $list = $this->m
                ->like('nama_brg', '%' . $this->input->get('term') . '%')                                
                ->get();
        foreach ($list as $row) {
            $results[] = array('label' => strtoupper($row->nama_brg), 'value' => $row->kode_brg);
        }
        echo json_encode($results);
    }   
    

}

?>
