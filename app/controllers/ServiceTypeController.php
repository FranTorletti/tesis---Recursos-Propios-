<?php

class ServiceTypeController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function ServiceType() {
        $this->data["serviceTypes"] = Model::getEM()->getRepository("ServiceType")->findAll();
        $this->return_html("serviceType/ServiceType.tpl");
    }

    function ViewServiceType($id) {
        $this->data["serviceType"] = Model::getEM()->getRepository("ServiceType")->getById($id);
        $this->return_html("serviceType/ViewServiceType.tpl");
    }

    function EditServiceType($id) {
        //get service type objet
        $serviceType = Model::getEM()->getRepository("ServiceType")->getById($id);
        //get form data
        $req = Controller::$router->request();
        $code = $req->params("code");
        $description = $req->params("description");
        $note = $req->params("note");
        $facRetention = $req->params("facRetention");
        $uniRetention = $req->params("uniRetention");
        // set service type
        $serviceType->setDescription($description);
        $serviceType->setCode($code);
        $serviceType->setFacRetention($facRetention);
        $serviceType->setUniRetention($uniRetention);
        $serviceType->setNote($note);
        //update database
        Model::getEM()->merge($serviceType);
        Model::getEM()->flush();
        // alert 
        FlashMsgView::add(MsgType::Successful, "El tipo de servicio se ha actualizado correctamente!");
        // redirect to view service type
        $this->data["serviceType"] = $serviceType;
        $this->redirect(Router::url("/home/admin/serviceType/view/".$id));
    }

    function CreateServiceType(){
        $this->return_html("serviceType/CreateServiceType.tpl");
    }

    function SaveServiceType(){
        $req = Controller::$router->request();
        $code = $req->params("code");
        $description = $req->params("description");
        $note = $req->params("note");
        $facRetention = $req->params("facRetention");
        $uniRetention = $req->params("uniRetention");
        // create and set service type
        $serviceType = new ServiceType();
        $serviceType->setDescription($description);
        $serviceType->setCode($code);
        $serviceType->setFacRetention($facRetention);
        $serviceType->setUniRetention($uniRetention);
        $serviceType->setNote($note);
        //update database
        Model::getEM()->persist($serviceType);
        Model::getEM()->flush();
        // alert
        FlashMsgView::add(MsgType::Successful, "El tipo de servicio se ha creado correctamente!");
        // redirect to view service type
        $this->data["serviceTypes"] = Model::getEM()->getRepository("ServiceType")->findAll();
        $this->redirect(Router::url("/home/admin/serviceType"));
    }

    function DeleteServiceType($id) {
        $serviceType = Model::getEM()->getRepository("ServiceType")->find($id);
        Model::getEM()->remove($serviceType);
        Model::getEM()->flush();
        FlashMsgView::add(MsgType::Successful, "El tipo de servicio se ha borrado correctamente");
        $this->redirect(Router::url("/home/admin/serviceType"));
    }
}

?>