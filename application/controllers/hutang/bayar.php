<?php

class Bayar extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $mp = new MPemasok();
        $mbeli = new MPembelian();

        $kode_psk = $mp->list_drop();
        $no_bukti = $mbeli->list_drop_kredit();
        $data['no_bukti'] = form_dropdown('no_bukti', $no_bukti, '', 'id="no_bukti" class="chosen-select input-block-level" required="required" data-url="' . site_url('hutang/bayar/periksa_hutang') . '"');
        $data['nama_psk'] = array('name' => 'nama_psk', 'class' => 'input-block-level', 'id' => 'nama_psk', 'readonly' => 'readonly');
        $data['jml_hutang'] = array('name' => 'jml_hutang', 'class' => 'span2', 'id' => 'jml_hutang', 'readonly' => 'readonly');
        $data['angsuran_ke'] = array('name' => 'angsuran_ke', 'class' => 'input-mini', 'id' => 'angsuran_ke', 'readonly' => 'readonly');
        $data['jml_bayar'] = array('name' => 'jml_bayar', 'class' => 'span2', 'id' => 'jml_bayar', 'required' => 'required');
        $data['jml_sisa'] = array('name' => 'jml_sisa', 'class' => 'span2', 'id' => 'jml_sisa', 'required' => 'required');
        $data['tgl_bayar'] = array('name' => 'tgl_bayar', 'class' => 'input-small', 'id' => 'tgl_bayar', 'value' => date('Y-m-d'));
        $this->load->view('hutang/bayar', $data);
    }

    function periksa_hutang($no_bukti) {
        $data = array();
        $query = $this->db->query("SELECT pemasok.nama_psk, hutang.nilai, hutang.jatuh_tempo FROM pemasok 
            INNER JOIN hutang ON pemasok.kode_psk = hutang.kode_psk WHERE hutang.no_bukti = '$no_bukti'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data[] = array(
                'nama_psk' => $row->nama_psk,
                'nilai' => rupiah($row->nilai),
                'angsuran_ke' => $row->jatuh_tempo
            );
            echo json_encode($data);
        } else {
            echo false;
        }
    }

    function simpan() {
        $angsuran = ($_POST['angsuran_ke'] - 1);
        //update data hutang
        $this->db->query("UPDATE hutang SET jatuh_tempo = (jatuh_tempo-1), sisa = (sisa-'" . $_POST['jml_bayar'] . "') WHERE no_bukti = '" . $_POST['no_bukti'] . "'");

        //simpan ke tabel bayar_hutang
        $this->db->query("INSERT INTO bayar_hutang (no_bukti, angsuran, jml_bayar, tgl_bayar) 
            VALUES ('".$_POST['no_bukti']."','".$angsuran."', '".$_POST['jml_bayar']."','".$_POST['tgl_bayar']."')");
    }

}

?>
