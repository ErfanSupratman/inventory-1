<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->external->redirect_logged_in();
        $this->load->dbforge();
    }

    public function index() {

        $this->load->view('welcome_message');
    }

    function install() {
        $file_content = file('DB/inventory.sql');
        $query = "";
        foreach ($file_content as $sql_line) {
            if (trim($sql_line) != "" && strpos($sql_line, "--") === false) {
                $query .= $sql_line;
                if (substr(rtrim($query), -1) == ';') {
                    echo $query;
                    $result = mysql_query($query)or die(mysql_error());
                    $query = "";
                }
            }
        }
    }

}
