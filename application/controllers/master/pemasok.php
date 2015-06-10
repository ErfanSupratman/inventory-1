<?php

class Pemasok extends CI_Controller {

    private $m;

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
        $this->m = new MPemasok();
    }

    function index() {
        $data['data_pemasok'] = $this->m->get();
        $this->load->view('master/pemasok/index', $data);
    }

    function tambah() {
        $kode_psk = $this->m->auto_number();
        $data['form_action'] = site_url('master/pemasok/simpan');
        $data['kode_psk'] = array('name' => 'kode_psk', 'value' => $kode_psk, 'readonly' => 'readonly');
        $data['nama_psk'] = array('name' => 'nama_psk');
        $data['alamat'] = array('name' => 'alamat', 'rows' => '4');
        $data['kota'] = array('name' => 'kota');
        $data['kode_pos'] = array('name' => 'kode_pos');
        $data['telp'] = array('name' => 'telp');
        $data['hp'] = array('name' => 'hp');
        $data['fax'] = array('name' => 'fax');
        $data['email'] = array('name' => 'email');
        $data['kontak'] = array('name' => 'kontak');
        $this->load->view('master/pemasok/tambah', $data);
    }

    function simpan() {
        $this->m->kode_psk = $_POST['kode_psk'];
        $this->m->nama_psk = $_POST['nama_psk'];
        $this->m->alamat = $_POST['alamat'];
        $this->m->kota = $_POST['kota'];
        $this->m->kode_pos = $_POST['kode_pos'];
        $this->m->telp = $_POST['telp'];
        $this->m->hp = $_POST['hp'];
        $this->m->fax = $_POST['fax'];
        $this->m->email = $_POST['email'];
        $this->m->kontak = $_POST['kontak'];
        $this->m->save();
        redirect('master/pemasok/tambah');
    }

    function edit($kode) {
        $rs = $this->m->where('kode_psk', $kode)->get();
        $data['form_action'] = site_url('master/pemasok/update');
        $data['kode_psk'] = array('name' => 'kode_psk', 'value' => $rs->kode_psk, 'readonly' => 'readonly');
        $data['nama_psk'] = array('name' => 'nama_psk', 'value' => $rs->nama_psk);
        $data['alamat'] = array('name' => 'alamat', 'rows' => '4', 'value' => $rs->alamat);
        $data['kota'] = array('name' => 'kota', 'value' => $rs->kota);
        $data['kode_pos'] = array('name' => 'kode_pos', 'value' => $rs->kode_pos);
        $data['telp'] = array('name' => 'telp', 'value' => $rs->telp);
        $data['hp'] = array('name' => 'hp', 'value' => $rs->hp);
        $data['fax'] = array('name' => 'fax', 'value' => $rs->fax);
        $data['email'] = array('name' => 'email', 'value' => $rs->email);
        $data['kontak'] = array('name' => 'kontak', 'value' => $rs->kontak);
        $this->load->view('master/pemasok/tambah', $data);
    }

    function update() {
        $this->m->where('kode_psk', $_POST['kode_psk'])
                ->update(
                        array(
                            'nama_psk' => $_POST['nama_psk'],
                            'alamat' => $_POST['alamat'],
                            'kota' => $_POST['kota'],
                            'kode_pos' => $_POST['kode_pos'],
                            'telp' => $_POST['telp'],
                            'hp' => $_POST['hp'],
                            'fax' => $_POST['fax'],
                            'email' => $_POST['email'],
                            'kontak' => $_POST['kontak'],
                        )
        );

        redirect('master/pemasok');
    }

}

?>
