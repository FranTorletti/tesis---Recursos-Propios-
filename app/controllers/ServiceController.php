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
        $resp = Model::getEM()->getRepository("ServiceUser")->getByService($id);
        $this->data["items"] = count($resp);
        $responsibles = array();
        foreach ($resp as $key) {
            $item = array('id' => $key->getUser()->getId(), 'name' => $key->getUser()->getName(), 'surname' => $key->getUser()->getSurname());
            array_push($responsibles, $item);
        }
        $this->data["responsibles"] = $responsibles;
        $this->data["serviceTypes"] = Model::getEM()->getRepository("ServiceType")->findAll();
        $this->data["resourceOrigins"] = Model::getEM()->getRepository("ResourceOrigin")->findAll();
        $this->data["dependences"] = Model::getEM()->getRepository("Dependence")->findAll();
        $this->data["users"] = Model::getEM()->getRepository("User")->getUsers();
        $this->return_html("service/ViewService.tpl");
    }

    function CreateService(){
        $this->data["serviceTypes"] = Model::getEM()->getRepository("ServiceType")->findAll();
        $this->data["resourceOrigins"] = Model::getEM()->getRepository("ResourceOrigin")->findAll();
        $this->data["dependences"] = Model::getEM()->getRepository("Dependence")->findAll();
        $this->data["users"] = Model::getEM()->getRepository("User")->getUsers();
        $this->return_html("service/CreateService.tpl");
    }

    function SaveService(){
        $req = Controller::$router->request();
        $items = $req->params("numItem");
        $name = $req->params("name");
        $dependence = $req->params("dependence");
        $resourceOrigin = $req->params("resourceOrigin");
        $serviceType = $req->params("serviceType");
        
        $serviceType = Model::getEM()->getRepository("ServiceType")->getByCode($serviceType);
        $resourceOrigin = Model::getEM()->getRepository("ResourceOrigin")->getByCode($resourceOrigin);
        $dependence = Model::getEM()->getRepository("Dependence")->getByCode($dependence);
        
        $serviceRecord = Model::getEM()->getRepository("ServiceRecord")->getServiceRecord($serviceType->getId(),$resourceOrigin->getId(),$dependence->getId());

        // create and set service
        $service = new Service();
        $code = $service->generateCode($serviceRecord);
        $service->setName($name);
        $service->setState('active');
        $service->setCode($code);
        $service->setDependence($dependence);
        $service->setServiceType($serviceType);
        $service->setResourceOrigin($resourceOrigin);
        $service->setFacRetention($serviceType->getFacRetention());
        $service->setUniRetention($serviceType->getUniRetention());
        
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
        $items = array_unique($items);
        // create resposibles
        foreach ($items as $item) {
            $serviceUser = new ServiceUser();
            $user = Model::getEM()->getRepository("User")->getById($item);
            $serviceUser->setService($service);
            $serviceUser->setUser($user);
            Model::getEM()->persist($serviceUser);    
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
    
    function EditService($id) {
        //get resource origin objet
        $service = Model::getEM()->getRepository("Service")->getById($id);
        //get form data
        $req = Controller::$router->request();
        $items = $req->params("numItem");
        $name = $req->params("name");
        $dependence = $req->params("dependence");
        $resourceOrigin = $req->params("resourceOrigin");
        $serviceType = $req->params("serviceType");
        $resp = Model::getEM()->getRepository("ServiceUser")->getByService($id);
        
        $items = array_unique($items);
        $addUserServices = $items;
        
        foreach ($resp as $key) {
            $found = false;
            foreach ($items as $i) {
                if ($i == $key->getUser()->getId()) {
                    $found = true;
                };   
            }
            if ($found) { 
                $index = array_search($key->getUser()->getId(),$addUserServices);
                unset($addUserServices[$index]);
            } else {
                Model::getEM()->remove($key);
                Model::getEM()->flush();
            };    
        }

        foreach ($addUserServices as $id) {
            $serviceUser = new ServiceUser();
            $user = Model::getEM()->getRepository("User")->getById($id);
            $serviceUser->setService($service);
            $serviceUser->setUser($user);
            Model::getEM()->persist($serviceUser);    
        }
        Model::getEM()->flush();

        
        FlashMsgView::add(MsgType::Successful, "El origen de los recursos se ha actualizado correctamente!");
        // redirect to view service
        $this->data["service"] = $service;
        $resp = Model::getEM()->getRepository("ServiceUser")->getByService($id);
        $this->data["items"] = count($resp);
        $responsibles = array();
        foreach ($resp as $key) {
            $item = array('id' => $key->getUser()->getId(), 'name' => $key->getUser()->getName(), 'surname' => $key->getUser()->getSurname());
            array_push($responsibles, $item);
        }
        $this->data["responsibles"] = $responsibles;
        $this->data["serviceTypes"] = Model::getEM()->getRepository("ServiceType")->findAll();
        $this->data["resourceOrigins"] = Model::getEM()->getRepository("ResourceOrigin")->findAll();
        $this->data["dependences"] = Model::getEM()->getRepository("Dependence")->findAll();
        $this->data["users"] = Model::getEM()->getRepository("User")->getUsers();
        $this->return_html("service/ViewService.tpl");
    }

    function DeleteService($id) {
        //delete resposible by service
        $resp = Model::getEM()->getRepository("ServiceUser")->getByService($id);
        foreach ($resp as $key) {
            Model::getEM()->remove($key);
            Model::getEM()->flush(); 
        }
        //delete service
        $service = Model::getEM()->getRepository("Service")->find($id);
        Model::getEM()->remove($service);
        Model::getEM()->flush();
        FlashMsgView::add(MsgType::Successful, "El servicio se ha borrado correctamente");
        // redirect to view services
        $this->data["services"] = Model::getEM()->getRepository("Service")->findAll();
        
        $this->redirect(Router::url("/home/admin/service"));
    }
    
}

?>