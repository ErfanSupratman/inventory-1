<?php

class Jenis extends CI_Controller {

    private $m;

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
        $this->m = new MJenis();
    }

    function index($page = 1) {        
        $data['data_jenis'] = $this->m->get_paged($page, 10);
        $this->load->view('master/jenis/index', $data);
    }

    function tambah() {
        $mg = new MGolongan();
        $kode_gol = $mg->list_drop_gol();
        $data['form_action'] = site_url('master/jenis/simpan');
        $data['kode_gol'] = form_dropdown('kode_gol', $kode_gol, '', 'id ="kode_gol" data-url=" ' . site_url('master/jenis/get_kode_jenis/') . '"');
        $data['kode_jenis'] = array('name' => 'kode_jenis', 'id' => 'kode_jenis', 'readonly' => 'readonly');
        $data['numerator'] = array('name' => 'numerator');
        $data['nama_jenis'] = array('name' => 'nama_jenis');
        $data['keterangan'] = array('name' => 'keterangan');
        $this->load->view('master/jenis/tambah', $data);
    }

    function simpan() {        
        $this->m->kode_jenis = $_POST['kode_jenis'];
        $this->m->kode_gol = $_POST['kode_gol'];
//        $this->m->numerator = $_POST['numerator'];
        $this->m->nama_jenis = $_POST['nama_jenis'];
        $this->m->keterangan = $_POST['keterangan'];
        $this->m->save();
        redirect('master/jenis/tambah');
    }

    function get_kode_jenis() {        
        echo $this->m->auto_number($_GET['kode_gol']);
    }

    function edit($kode) {        
        $mg = new MGolongan();
        $rs = $this->m->where('kode_jenis', $kode)->get();

        $kode_gol = $mg->list_drop_gol();
        $data['form_action'] = site_url('master/jenis/update');
        $data['kode_gol'] = form_dropdown('kode_gol', $kode_gol, $rs->kode_gol, 'id ="kode_gol" data-url=" ' . site_url('master/jenis/get_kode_jenis/') . '"');
        $data['kode_jenis'] = array('name' => 'kode_jenis', 'id' => 'kode_jenis', 'readonly' => 'readonly', 'value' => $rs->kode_jenis);
        $data['numerator'] = array('name' => 'numerator', 'value' => $rs->numerator);
        $data['nama_jenis'] = array('name' => 'nama_jenis', 'value' => $rs->nama_jenis);
        $data['keterangan'] = array('name' => 'keterangan', 'value' => $rs->keterangan);
        $this->load->view('master/jenis/tambah', $data);
    }

    function update() {        
        $this->m->where('kode_jenis', $_POST['kode_jenis'])
                ->update(array(
                    'kode_jenis' => $_POST['kode_jenis'],
                    'kode_gol' => $_POST['kode_gol'],
                    'nama_jenis' => $_POST['nama_jenis'],
                    'keterangan' => $_POST['keterangan']
                        )
        );
        redirect('master/jenis');
    }

    function hapus($kode) {
        $this->db->query("DELETE FROM jenis_barang WHERE kode_jenis = '$kode'");
        redirect('master/jenis');
    }

    function cari_nama_jenis() {        
        $list = $this->m
                ->like('nama_jenis', '%' . $this->input->get('term') . '%')
                ->get();
        foreach ($list as $row) {
            $results[] = array('label' => strtoupper($row->nama_jenis), 'value' => $row->kode_jenis);
        }
        echo json_encode($results);
    }

}

?>
