<?php

class MUser extends DataMapper {

    public $table = "users";

    function __construct() {
        parent::__construct();
    }

    function check_user($username, $password) {
        $query = $this->db->get_where($this->table, array(
                    'username' => $username,
                    'password' => md5($password)
                ))->row();

        return $query;
    }

    function save_user($max_in_cash, $max_out_cash, $max_in_ob, $max_out_ob, $user_id) {
        $this->username = $_GET['username'];
        $this->password = md5($_GET['password_user']);
        $this->tgl_register = $_GET['tgl_register'];
        $this->tgl_expired = $_GET['tgl_expired'];
        $this->full_name = $_GET['full_name'];
        $this->jabatan = $_GET['jabatan'];
        $this->max_penerimaan_tunai = $max_in_cash;
        $this->max_pengeluaran_tunai = $max_out_cash;
        $this->max_penerimaan_ob = $max_in_ob;
        $this->max_pengeluaran_ob = $max_out_ob;
        $this->kode_perk = $_GET['kode_perk'];
        $this->set_user = $_GET['set_user'];
        $this->user_id = $user_id;
        if ($this->save()) {
            return true;
        } else {
            return false;
        }
    }

    function exists_record($field, $value) {
        $query = $this->db->get_where($this->table, array($field => $value))->row();

        if ($query)
            return $query;
        else
            return false;
    }

    function _delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function update_password($id) {
        $result = $this->where('id', $id)
                ->update(
                array(
                    'password' => md5($_GET['password_baru'])
                )
        );
        if ($result)
            return true;
        else
            return false;
    }

    function list_users_trans($user_id) {
        $rs = $this->where('id', $user_id)->get();
        if ($rs->username == 'superuser') {
            $rs = $this->get();
        } else {
            $rs = $this->where('id', $user_id)->get();
        }
        foreach ($rs as $row) {
            $data[$row->id] = $row->id . ' -- ' . $row->username;
        }
        return $data;
    }

}

?>