<?php

class HomeController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function Index() {
        $service = new Service();
        $service->generateCode("AL","A00","23");
        $this->return_html("index.tpl");
    }

    function ShowLogin(){
    	$this->return_html("Login.tpl");	
    }

    function Faq(){
    	$this->return_html("FAQ.tpl");	
    }
}

?>