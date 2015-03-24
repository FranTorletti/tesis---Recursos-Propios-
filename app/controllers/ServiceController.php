<?php

class ServiceController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function Service() {
        $this->data["services"] = Model::getEM()->getRepository("Service")->findAll();
        $this->return_html("service/Service.tpl");
    }

    
    function ViewService($id) {
        $this->data["service"] = Model::getEM()->getRepository("Service")->getById($id);
        $serviceTypes = Model::getEM()->getRepository("ServiceType")->findAll();
        $resourceOrigins = Model::getEM()->getRepository("ResourceOrigin")->findAll();
        $dependences = Model::getEM()->getRepository("Dependence")->findAll();
        $this->return_html("service/ViewService.tpl");
    }

    function CreateService(){
        $this->data["serviceTypes"] = Model::getEM()->getRepository("ServiceType")->findAll();
        $this->data["resourceOrigins"] = Model::getEM()->getRepository("ResourceOrigin")->findAll();
        $this->data["dependences"] = Model::getEM()->getRepository("Dependence")->findAll();
        $this->return_html("service/CreateService.tpl");
    }

    function SaveService(){
        $req = Controller::$router->request();
        $dependence = $req->params("dependence");
        $resourceOrigin = $req->params("resourceOrigin");
        $serviceType = $req->params("serviceType");
        $designation = $req->params("designation");
        $serviceType = Model::getEM()->getRepository("ServiceType")->getByCode($serviceType);
        $resourceOrigin = Model::getEM()->getRepository("ResourceOrigin")->getByCode($resourceOrigin);
        $dependence = Model::getEM()->getRepository("Dependence")->getByCode($dependence);
        
        $serviceRecord = Model::getEM()->getRepository("ServiceRecord")->getServiceRecord($serviceType->getId(),$resourceOrigin->getId(),$dependence->getId());

        // create and set service
        $service = new Service();
        $code = $service->generateCode($serviceRecord);
        $service->setCode($code);
        $service->setDesignation($designation);
        $service->setDependence($dependence);
        $service->setServiceType($serviceType);
        $service->setResourceOrigin($resourceOrigin);
        // create and set service record
        if ($serviceRecord) {
            $serviceRecord->setCode($code);    
        } else {
            $serviceRecord = new ServiceRecord();
            $serviceRecord->setCode($code);
            $serviceRecord->setDependence($dependence);
            $serviceRecord->setServiceType($serviceType);
            $serviceRecord->setResourceOrigin($resourceOrigin);
        }

        //update database
        Model::getEM()->persist($serviceRecord);
        Model::getEM()->persist($service);
        Model::getEM()->flush();
        
        // alert
        FlashMsgView::add(MsgType::Successful, "El servicio se ha creado correctamente!");
        // redirect to view resource origin
        $this->data["services"] = Model::getEM()->getRepository("Service")->findAll();
        
        $this->redirect(Router::url("/home/admin/service"));
        
    }
    /**
    function EditResourceOrigin($id) {
        //get resource origin objet
        $resourceOrigin = Model::getEM()->getRepository("ResourceOrigin")->getById($id);
        //get form data
        $req = Controller::$router->request();
        $code = $req->params("code");
        $description = $req->params("description");
        $note = $req->params("note");
        // set resource origin
        $resourceOrigin->setCode($code);
        $resourceOrigin->setDescription($description);
        $resourceOrigin->setNote($note);
        //update database
        Model::getEM()->merge($resourceOrigin);
        Model::getEM()->flush();
        // alert 
        FlashMsgView::add(MsgType::Successful, "El origen de los recursos se ha actualizado correctamente!");
        // redirect to view resource origin
        $this->data["resourceOrigin"] = $resourceOrigin;
        $this->redirect(Router::url("/home/admin/resourceOrigin/view/".$id));
    }

    function CreateResourceOrigin(){
        $this->return_html("resourceOrigin/CreateResourceOrigin.tpl");
    }

    function SaveResourceOrigin(){
        $req = Controller::$router->request();
        $code = $req->params("code");
        $description = $req->params("description");
        $note = $req->params("note");
        // create and set resource origin
        $resourceOrigin = new ResourceOrigin();
        $resourceOrigin->setCode($code);
        $resourceOrigin->setDescription($description);
        $resourceOrigin->setNote($note);
        //update database
        Model::getEM()->persist($resourceOrigin);
        Model::getEM()->flush();
        // alert
        FlashMsgView::add(MsgType::Successful, "El origen de los recursos se ha creado correctamente!");
        // redirect to view resource origin
        $this->data["resourceOrigins"] = Model::getEM()->getRepository("ResourceOrigin")->findAll();
        $this->redirect(Router::url("/home/admin/resourceOrigin"));
    }

    function DeleteResourceOrigin($id) {
        $resourceOrigin = Model::getEM()->getRepository("ResourceOrigin")->find($id);
        Model::getEM()->remove($resourceOrigin);
        Model::getEM()->flush();
        FlashMsgView::add(MsgType::Successful, "El origen de los recursos se ha borrado correctamente");
        $this->redirect(Router::url("/home/admin/resourceOrigin"));
    }
    **/
}

?>