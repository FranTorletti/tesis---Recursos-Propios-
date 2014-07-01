<?php

class DependenceController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function Dependence() {
        $this->data["dependences"] = Model::getEM()->getRepository("Dependence")->findAll();
        $this->return_html("dependence/Dependence.tpl");
    }

    function ViewDependence($id) {
        $this->data["dependence"] = Model::getEM()->getRepository("Dependence")->getById($id);
        $this->return_html("dependence/ViewDependence.tpl");
    }

    function EditDependence($id) {
        //get dependence objet
        $dependence = Model::getEM()->getRepository("Dependence")->getById($id);
        //get form data
        $req = Controller::$router->request();
        $code = $req->params("code");
        $description = $req->params("description");
        $note = $req->params("note");
        // set dependence
        $dependence->setCode($code);
        $dependence->setDescription($description);
        $dependence->setNote($note);
        //update database
        Model::getEM()->merge($dependence);
        Model::getEM()->flush();
        // alert 
        FlashMsgView::add(MsgType::Successful, "La dependencia se ha actualizado correctamente!");
        // redirect to view dependence
        $this->data["dependence"] = $dependence;
        $this->redirect(Router::url("/home/admin/dependence/view/".$id));
    }

    function CreateDependence(){
        $this->return_html("dependence/CreateDependence.tpl");
    }

    function SaveDependence(){
        $req = Controller::$router->request();
        $code = $req->params("code");
        $description = $req->params("description");
        $note = $req->params("note");
        // create and set dependence
        $dependence = new Dependence();
        $dependence->setCode($code);
        $dependence->setDescription($description);
        $dependence->setNote($note);
        //update database
        Model::getEM()->persist($dependence);
        Model::getEM()->flush();
        // alert
        FlashMsgView::add(MsgType::Successful, "La dependencia se ha creado correctamente!");
        // redirect to view dependence
        $this->data["dependences"] = Model::getEM()->getRepository("Dependence")->findAll();
        $this->redirect(Router::url("/home/admin/dependence"));
    }

    function DeleteDependence($id) {
        $dependence = Model::getEM()->getRepository("Dependence")->find($id);
        Model::getEM()->remove($dependence);
        Model::getEM()->flush();
        FlashMsgView::add(MsgType::Successful, "La dependencia se ha borrado correctamente");
        $this->redirect(Router::url("/home/admin/dependence"));
    }
}

?>