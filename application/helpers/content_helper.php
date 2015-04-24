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

function get_data_barang($kode_brg, $field){
    $mb = new MBarang();
    $rs = $mb->get_record($kode_brg, $field);
    return $rs;
}
?>
