<?php

class HomeController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function Index() {
        $serviceType = Model::getEM()->getRepository("ServiceType")->getByCode("11");
        $resourceOrigin = Model::getEM()->getRepository("ResourceOrigin")->getByCode("AEW");
        $dependence = Model::getEM()->getRepository("Dependence")->getByCode("23");
        $service = new Service();
        $service->setCode($service->generateCode("11","AEW","23"));

        $service->setDesignation("designation");
        $service->setDependence($dependence);
        $service->setServiceType($serviceType);
        $service->setResourceOrigin($resourceOrigin);

        Model::getEM()->persist($service);
        Model::getEM()->flush();
        print_r($serviceType->getCode());
        print_r("-");
        print_r($resourceOrigin->getCode());
        print_r("-");
        print_r($service->getCode());
        print_r("-");
        print_r($dependence->getCode());
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