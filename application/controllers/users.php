<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('users/index');
    }

    public function tambah() {
        $mperkiraan = new MPerkiraan();

        $option_setting = array(
            '0' => 'User',
            '1' => 'Teller',
            '2' => 'Otorisator'
        );

        $data['full_name'] = array('name' => 'full_name', 'id' => 'full_name', 'class' => 'span3');
        $data['jabatan'] = array('name' => 'jabatan', 'id' => 'jabatan', 'class' => 'span3');
        $data['tgl_register'] = array('name' => 'tgl_register', 'class' => 'input-small', 'id' => 'tgl_register', 'value' => date('Y-m-d'), 'readonly' => 'readonly');
        $data['tgl_expired'] = array('name' => 'tgl_expired', 'class' => 'input-small', 'id' => 'tgl_expired');
        $data['username'] = array('name' => 'username', 'class' => 'span3', 'id' => 'username');
        $data['password'] = array('name' => 'password_user', 'class' => 'span3', 'id' => 'password');
        $data['kode_perk'] = form_dropdown('kode_perk', $mperkiraan->list_drop(), '', 'class="chosen-select span3"');
        $data['set_user'] = form_dropdown('set_user', $option_setting, '0');

        $data['max_penerimaan_tunai'] = array('name' => 'max_penerimaan_tunai', 'class' => 'span3 decimal text-right', 'id' => 'max_penerimaan_tunai', 'value' => 0);
        $data['max_pengeluaran_tunai'] = array('name' => 'max_pengeluaran_tunai', 'class' => 'span3 decimal text-right', 'id' => 'max_pengeluaran_tunai', 'value' => 0);
        $data['max_penerimaan_ob'] = array('name' => 'max_penerimaan_ob', 'class' => 'span3 decimal text-right', 'id' => 'max_penerimaan_ob', 'value' => 0);
        $data['max_pengeluaran_ob'] = array('name' => 'max_pengeluaran_ob', 'class' => 'span3 decimal text-right', 'id' => 'max_pengeluaran_ob', 'value' => 0);

        $data['button'] = array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Simpan');
        $this->load->view('users/new', $data);
    }

    public function edit($id) {
        $muser = new MUser();
        $mperkiraan = new MPerkiraan();

        $rs = $muser->where('id', $id)->get();

        $option_setting = array(
            '0' => 'User',
            '1' => 'Teller',
            '2' => 'Otorisator'
        );

        $data['full_name'] = array('name' => 'full_name', 'id' => 'full_name', 'class' => 'span3', 'value' => $rs->full_name);
        $data['jabatan'] = array('name' => 'jabatan', 'id' => 'jabatan', 'class' => 'span3', 'value' => $rs->jabatan);
        $data['tgl_register'] = array('name' => 'tgl_register', 'class' => 'input-small', 'id' => 'tgl_register', 'value' => $rs->tgl_register, 'readonly' => 'readonly');
        $data['tgl_expired'] = array('name' => 'tgl_expired', 'class' => 'input-small', 'id' => 'tgl_expired', 'value' => $rs->tgl_expired);
        $data['username'] = array('name' => 'username', 'class' => 'span3', 'id' => 'username', 'value' => $rs->username);
        $data['password'] = array('name' => 'password_user', 'class' => 'span3', 'id' => 'password');
        $data['kode_perk'] = form_dropdown('kode_perk', $mperkiraan->list_drop(), $rs->kode_perk, 'class="chosen-select span3"');
        $data['set_user'] = form_dropdown('set_user', $option_setting, $rs->set_user);

        $data['max_penerimaan_tunai'] = array('name' => 'max_penerimaan_tunai', 'class' => 'span3 decimal text-right', 'id' => 'max_penerimaan_tunai', 'value' => $rs->max_penerimaan_tunai);
        $data['max_pengeluaran_tunai'] = array('name' => 'max_pengeluaran_tunai', 'class' => 'span3 decimal text-right', 'id' => 'max_pengeluaran_tunai', 'value' => $rs->max_pengeluaran_tunai);
        $data['max_penerimaan_ob'] = array('name' => 'max_penerimaan_ob', 'class' => 'span3 decimal text-right', 'id' => 'max_penerimaan_ob', 'value' => $rs->max_penerimaan_ob);
        $data['max_pengeluaran_ob'] = array('name' => 'max_pengeluaran_ob', 'class' => 'span3 decimal text-right', 'id' => 'max_pengeluaran_ob', 'value' => $rs->max_pengeluaran_ob);

        $data['button'] = array('name' => 'submit', 'class' => 'btn btn-primary', 'value' => 'Simpan');
        $this->load->view('users/new', $data);
    }

    public function simpan() {
        $muser = new MUser();
        if ($muser->exists_record('username', $_GET['username'])) {
            echo false;
        } else {
            $muser->save_user(
                    $this->external->replace_string($_GET['max_penerimaan_tunai']), 
                    $this->external->replace_string($_GET['max_pengeluaran_tunai']), 
                    $this->external->replace_string($_GET['max_penerimaan_ob']), 
                    $this->external->replace_string($_GET['max_pengeluaran_ob']), 
                    $this->external->get_session_name('user_id')
            );
            echo true;
        }
    }

    public function reload() {
        $muser = new MUser();
        $data['result'] = $muser->get();
        $this->load->view('users/ajax/index', $data);
    }

    public function signin() {
        $data['username'] = array('name' => 'username', 'id' => 'username', 'style' => 'width: 262px;', 'placeholder' => 'Username');
        $data['password'] = array('name' => 'password', 'id' => 'password', 'style' => 'width: 262px;', 'placeholder' => 'Password');
        $data['button'] = array('name' => 'submit', 'class' => 'btn btn-primary span6', 'value' => 'Login');

        $this->load->view('users/signin', $data);
    }

    public function check_signin() {
        $muser = new MUser();
        sleep(2);
        # Periksa Login Untuk Administrator #
        if ($muser->check_user($_POST['username'], $_POST['password']) == TRUE) {
            $rs = $muser->where('username', $_POST['username'])->get();
            $userdata = array(
                'user_id' => $rs->id,
                'full_name' => $rs->full_name,
                'jabatan' => $rs->jabatan,
                'email' => $rs->email,
                'username' => $rs->username,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($userdata);
            echo true;
        } else {
            echo false;
        }
    }

    public function sign_out() {
        $this->session->sess_destroy();
        redirect('users/signin');
    }

    public function update_password() {
        $muser = new MUser();
        $muser->update_password($this->external->get_session_name('user_id'));
    }

}
