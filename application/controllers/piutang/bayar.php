<?php

class Bayar extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $mp = new MPelanggan();
        $mpj = new MPenjualan();

        $kode_plg = $mp->list_drop();
        $no_bukti = $mpj->list_drop_kredit();

        $data['no_bukti'] = form_dropdown('no_bukti', $no_bukti, '', 'id="no_bukti" class="chosen-select input-block-level" required="required" data-url="' . site_url('piutang/bayar/periksa_piutang') . '"');
        $data['nama_plg'] = array('name' => 'nama_plg', 'class' => 'input-block-level', 'id' => 'nama_plg', 'readonly' => 'readonly');
        $data['jml_piutang'] = array('name' => 'jml_piutang', 'class' => 'span2', 'id' => 'jml_piutang', 'readonly' => 'readonly');
        $data['angsuran_ke'] = array('name' => 'angsuran_ke', 'class' => 'input-mini', 'id' => 'angsuran_ke', 'readonly' => 'readonly');
        $data['jml_bayar'] = array('name' => 'jml_bayar', 'class' => 'input-small', 'id' => 'jml_bayar', 'required' => 'required');
        $data['jml_sisa'] = array('name' => 'jml_sisa', 'class' => 'span2', 'id' => 'jml_sisa', 'required' => 'required');
        $data['tgl_bayar'] = array('name' => 'tgl_bayar', 'class' => 'input-small', 'id' => 'tgl_bayar', 'value' => date('Y-m-d'));
        $this->load->view('piutang/bayar', $data);
    }

    function periksa_piutang($no_bukti) {
        $data = array();
        $query = $this->db->query("SELECT pelanggan.nama_perusahaan, piutang.sisa, piutang.jatuh_tempo FROM pelanggan 
            INNER JOIN piutang ON pelanggan.kode_plg = piutang.kode_plg WHERE piutang.no_bukti = '$no_bukti'");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $data[] = array(
                'nama_plg' => $row->nama_perusahaan,
                'sisa' => rupiah($row->sisa),
                'angsuran_ke' => $row->jatuh_tempo
            );
            echo json_encode($data);
        } else {
            echo false;
        }
    }

}

?>
