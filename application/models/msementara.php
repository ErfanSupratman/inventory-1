<?php

class MSementara extends DataMapper {

    public $table = 'sementara';

    function __construct($id = NULL) {
        parent::__construct($id);
    }

    function form_insert($data) {
        $this->db->insert($this->table, $data);
    }
    
    function delete_transaksi($user_id){
        $this->db->query("DELETE FROM ".$this->table." WHERE user_id = '$user_id'");
    }

}

?>
