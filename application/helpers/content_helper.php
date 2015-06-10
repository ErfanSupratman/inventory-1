<?php

function get_header() {
    $ci = &get_instance();
    return $ci->load->view("header");
}

function get_footer() {
    $ci = &get_instance();
    return $ci->load->view("footer");
}

function get_field_setting($key) {
    $msetting = new MSetting();
    $rs = $msetting->get_val($key);
    return $rs;
}

function get_session_name($field) {
    $ci = &get_instance();
    return $ci->session->userdata($field);
}

function rupiah($var = '') {
    $x = number_format($var, 0, ",", ".");
    return $x;
}

function notification($title) {
    $html = '<div id="myModalNotification" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">' . $title . '</h3>
                </div>
                <div class="modal-body">        
                </div>
           </div>';
    return $html;
}

function daftar_users() {
    $muser = new MUser();
    $user_id = get_session_name('user_id');
    $data = form_dropdown('user_id', $muser->list_users_trans($user_id), '');
    return $data;
}

function get_pagination($posts, $url) {
    $html = '';
    if ($posts->paged->has_previous) {

        $html .= '<li class="previous"><a href="' . site_url($url) . '">First</a></li>';
        $html .= '<li class="previous"><a href="' . site_url($url . $posts->paged->previous_page) . '">Prev</a></li>';
    }
    if ($posts->paged->has_next) {
        $html .= '<li class="next"><a href="' . site_url($url . $posts->paged->next_page) . '">Next</a></li>';
        $html .= '<li class="next"><a href="' . site_url($url . $posts->paged->total_pages) . '">Last</a></li>';
    }

    return $html;
}

function get_data_barang($kode_brg, $field) {
    $mb = new MBarang();
    $rs = $mb->get_record($kode_brg, $field);
    return $rs;
}

function replace($search, $subject) {
    $str = str_replace($search, '', $subject);
    return $str;
}

function sum_penjualan($no_bukti) {
    $mdp = new MDPenjualan();
    $rs = $mdp->sum_penjualan($no_bukti);
    return rupiah($rs);
}

function sum_pembelian($no_bukti) {
    $mdp = new MDetail();
    $rs = $mdp->select_sum('harga_beli')->where('no_bukti', $no_bukti)->get();
    return rupiah($rs->harga_beli);
}

function get_name_customer($val, $field) {
    $mp = new MPelanggan();
    $rs = $mp->get_record($val, $field);
    return $rs;
}

function get_name_suplier($val, $field) {
    $mp = new MPemasok();
    $rs = $mp->get_record($val, $field);
    return $rs;
}

function cetak_kartu_barang($kode_produk) {
    $mb = new MBarang();
    $html = '';
    $x = 0;
    $result = $mb->where('kode_prd', $kode_produk)->get();
    foreach ($result as $row) {
        $x++;
        $html .= '
                    <tr>
                        <td>' . $x . '</td>
                        <td>' . $row->kode_brg . '</td>
                        <td>' . $row->nama_brg . '</td>
                        <td>' . $row->spec . '</td>
                        <td>' . $row->isi1 . ' Karton</td>
                        <td>' . $row->isi2 . ' Dosin</td>
                        <td>' . $row->isi3 . ' Biji</td>
                        <td>' . $row->stock_awal1 . ' Karton</td>
                        <td>' . $row->stock_awal2 . ' Dosin</td>
                        <td>' . $row->stock_awal3 . ' Biji</td>
                        <td>' . $row->stock_minimal . '</td>
                        <td>' . $row->stock_maximal . '</td>
                    </tr>            
                    ';
    }
    echo $html;
}

function dropdown_tahun() {
    $now = date("Y");
    $x = 2010;
    while ($x <= $now) {
        $data[$x] = $x;
        $x++;
    }
    return $data;
}

function dropdown_bulan() {
    $bulan = array(
        "" => "[ Bulan ]",
        "1" => "Januari",
        "2" => "Februari",
        "3" => "Maret",
        "4" => "April",
        "5" => "Mei",
        "6" => "Juni",
        "7" => "Juli",
        "8" => "Agustus",
        "9" => "September",
        "10" => "Oktober",
        "11" => "November",
        "12" => "Desember"
    );

    foreach ($bulan as $key => $value) {
        $data[$key] = $value;
    }
    return $data;
}

?>
