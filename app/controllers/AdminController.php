<?php

class AdminController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function PanelAdmin() {
        $this->return_html("PanelAdmin.tpl");
    }   
}

?>