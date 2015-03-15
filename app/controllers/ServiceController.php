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
        $this->return_html("service/ViewService.tpl");
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