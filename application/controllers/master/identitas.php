<?php

class Identitas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
    }

    function load_data_identitas() {
        $m = new MIdentitas();
        $data = array();
        $rs = $m->get();
        foreach ($rs as $row) {
            $data[] = array(
                'id' => $row->id,
                'nama' => $row->nama,
                'alamat' => $row->alamat,
                'kota' => $row->kota,
                'kode_pos' => $row->kode_pos,
                'tlp' => $row->tlp,
                'fax' => $row->fax,
                'email' => $row->email,
                'website' => $row->website
            );
        }

        echo json_encode($data);
    }

    function update_data() {
        $m = new MIdentitas();
        $result = $m->where('id', $_POST['id'])
                        ->update(
                                array(
                                    'nama' => strtoupper($this->input->post('nama')),
                                    'alamat' => strtoupper($this->input->post('alamat')),
                                    'kota' => strtoupper($this->input->post('kota')),
                                    'kode_pos' => strtoupper($this->input->post('kode_pos')),
                                    'tlp' => strtoupper($this->input->post('tlp')),
                                    'fax' => strtoupper($this->input->post('fax')),
                                    'email' => $this->input->post('email'),
                                    'website' => $this->input->post('website')
                                )
        );
        echo true;
    }

}

?>
