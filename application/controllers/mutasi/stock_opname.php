<?php

class Stock_Opname extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('mutasi/stock_opname/index');
    }

}

?>
