<?php

class TransactionController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function CreateTransaction($id){
        $this->data["service"] = $id;
        print_r($id);
        die();
        $this->return_html("transaction/CreateTransaction.tpl");
    }
}

?>