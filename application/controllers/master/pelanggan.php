<?php

class Pelanggan extends CI_Controller {

    private $m;

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
        $this->m = new MPelanggan();
    }

    function index() {
        $data['data_pelanggan'] = $this->m->get();
        $this->load->view('master/pelanggan/index', $data);
    }

    function tambah() {
        $kode_plg = $this->m->auto_number();
        $data['form_action'] = site_url('master/pelanggan/simpan');
        $data['kode_plg'] = array('name' => 'kode_plg', 'value' => $kode_plg, 'readonly' => 'readonly');
        $data['nama_perusahaan'] = array('name' => 'nama_perusahaan');
        $data['nama_pemilik'] = array('name' => 'nama_pemilik');
        $data['alamat'] = array('name' => 'alamat', 'rows' => '3');
        $data['kota'] = array('name' => 'kota');
        $data['kode_pos'] = array('name' => 'kode_pos');
        $data['telp'] = array('name' => 'telp');
        $data['hp'] = array('name' => 'hp');
        $data['fax'] = array('name' => 'fax');
        $data['email'] = array('name' => 'email');
        $data['kontak'] = array('name' => 'kontak');
        $this->load->view('master/pelanggan/tambah', $data);
    }

    function simpan() {
        $this->m->kode_plg = $_POST['kode_plg'];
        $this->m->nama_perusahaan = $_POST['nama_perusahaan'];
        $this->m->nama_pemilik = $_POST['nama_pemilik'];
        $this->m->alamat = $_POST['alamat'];
        $this->m->kota = $_POST['kota'];
        $this->m->kode_pos = $_POST['kode_pos'];
        $this->m->telp = $_POST['telp'];
        $this->m->hp = $_POST['hp'];
        $this->m->fax = $_POST['fax'];
        $this->m->email = $_POST['email'];
        $this->m->kontak = $_POST['kontak'];
        $this->m->save();
        redirect('master/pelanggan/tambah');
    }

    function edit($kode) {
        $rs = $this->m->where('kode_plg', $kode)->get();
        $data['form_action'] = site_url('master/pelanggan/update');
        $data['kode_plg'] = array('name' => 'kode_plg', 'value' => $rs->kode_plg, 'readonly' => 'readonly');
        $data['nama_perusahaan'] = array('name' => 'nama_perusahaan', 'value' => $rs->nama_perusahaan);
        $data['nama_pemilik'] = array('name' => 'nama_pemilik', 'value' => $rs->nama_pemilik);
        $data['alamat'] = array('name' => 'alamat', 'rows' => '3', 'value' => $rs->alamat);
        $data['kota'] = array('name' => 'kota', 'value' => $rs->kota);
        $data['kode_pos'] = array('name' => 'kode_pos', 'value' => $rs->kode_pos);
        $data['telp'] = array('name' => 'telp', 'value' => $rs->telp);
        $data['hp'] = array('name' => 'hp', 'value' => $rs->hp);
        $data['fax'] = array('name' => 'fax', 'value' => $rs->fax);
        $data['email'] = array('name' => 'email', 'value' => $rs->email);
        $this->load->view('master/pelanggan/tambah', $data);
    }

    function update() {
        $this->m->where('kode_plg', $_POST['kode_plg'])
                ->update(
                        array(
                            'nama_perusahaan' => $_POST['nama_perusahaan'],
                            'nama_pemilik' => $_POST['nama_pemilik'],
                            'alamat' => $_POST['alamat'],
                            'kota' => $_POST['kota'],
                            'kode_pos' => $_POST['kode_pos'],
                            'telp' => $_POST['telp'],
                            'hp' => $_POST['hp'],
                            'fax' => $_POST['fax'],
                            'email' => $_POST['email']
                        )
        );

        redirect('master/pelanggan');
    }

}

?>
