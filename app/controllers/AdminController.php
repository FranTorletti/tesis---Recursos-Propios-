<?php

class AdminController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function PanelAdmin() {
        $this->return_html("PanelAdmin.tpl");
    }

    function Dependence() {
    	$dependences = Model::getEM()->getRepository("Dependence")->findAll();
    	$this->data["dependences"] = $dependences;
        $this->return_html("Dependence.tpl");
    }

    function ViewDependence($id) {
    	$dependence = Model::getEM()->getRepository("Dependence")->getById($id);
    	$this->data["dependence"] = $dependence;
        $this->return_html("ViewDependence.tpl");
    }

    function EditDependence($id) {
        //get dependence objet
        $dependence = Model::getEM()->getRepository("Dependence")->getById($id);
        //get form data
        $req = Controller::$router->request();
        $code = $req->params("code");
        $description = $req->params("description");
        $note = $req->params("note");
        if ($code != "" && $description != "" && $note != ""){
            $dependence->setCode($code);
            $dependence->setDescription($description);
            $dependence->setNote($note);
            //update database
            Model::getEM()->merge($dependence);
            Model::getEM()->flush();
            // alert 
            FlashMsgView::add(MsgType::Successful, "La dependencia se ha actualizado correctamente!");
        } else
            FlashMsgView::add(MsgType::Error, "No puede puede actualizar la dependencia, hay casilleros en blanco.");
        // redirect to view dependence
        $this->data["dependence"] = $dependence;
        $this->redirect(Router::url("/home/admin/dependence/view/".$id));
    }
}

?>