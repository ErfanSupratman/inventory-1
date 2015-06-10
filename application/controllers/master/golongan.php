<?php

class Golongan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
    }

    function index() {
        $m = new MGolongan();
        $data['data_gol'] = $m->get();
        $this->load->view('master/golongan/index', $data);
    }

    function tambah() {
        $data['form_action'] = site_url('master/golongan/simpan');
        $data['kode_gol'] = array('name' => 'kode_gol', 'maxlength' => '5');
        $data['nama_gol'] = array('name' => 'nama_gol');
        $data['keterangan'] = array('name' => 'keterangan');
        $this->load->view('master/golongan/tambah', $data);
    }

    function simpan() {
        $m = new MGolongan();
        $m->kode_gol = $_POST['kode_gol'];
        $m->nama_gol = $_POST['nama_gol'];
        $m->keterangan = $_POST['keterangan'];
        $m->save();
        redirect('master/golongan/tambah');
    }

    function edit($kode) {
        $m = new MGolongan();
        $rs = $m->where('kode_gol', $kode)->get();
        $data['form_action'] = site_url('master/golongan/update');
        $data['kode_gol'] = array('name' => 'kode_gol', 'maxlength' => '5', 'readonly' => 'readonly', 'value' => $rs->kode_gol);
        $data['nama_gol'] = array('name' => 'nama_gol', 'value' => $rs->nama_gol);
        $data['keterangan'] = array('name' => 'keterangan', 'value' => $rs->keterangan);
        $this->load->view('master/golongan/tambah', $data);
    }

    function update() {
        $m = new MGolongan();
        $m->where('kode_gol', $_POST['kode_gol'])
                ->update(array(
                    'kode_gol' => $_POST['kode_gol'],
                    'nama_gol' => $_POST['nama_gol'],
                    'keterangan' => $_POST['keterangan']
                        )
        );
        redirect('master/golongan');
    }

    function hapus($kode) {
        $this->db->query("DELETE FROM golongan_barang WHERE kode_gol = '$kode'");
        redirect('master/golongan');
    }

}

?>
