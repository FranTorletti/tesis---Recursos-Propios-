<?php

class HomeController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->return_html("index.tpl");
    }

    function showLogin(){
    	$this->return_html("Login.tpl");	
    }

    function fqa(){
    	$this->return_html("FQA.tpl");	
    }
}

?>