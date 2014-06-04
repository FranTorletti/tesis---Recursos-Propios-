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

    function ActivityType() {
        $activityTypes = Model::getEM()->getRepository("ActivityType")->findAll();
        $this->data["activityTypes"] = $activityTypes;
        $this->return_html("ActivityType.tpl");
    }

    function ViewActivityType($id) {
        $activityType = Model::getEM()->getRepository("ActivityType")->getById($id);
        $this->data["activityType"] = $activityType;
        $this->return_html("ViewActivityType.tpl");
    }

    function EditActivityType($id) {
        //get Activity Type objet
        $activityType = Model::getEM()->getRepository("ActivityType")->getById($id);
        //get form data
        $req = Controller::$router->request();
        $code = $req->params("code");
        $description = $req->params("description");
        $note = $req->params("note");
        if ($code != "" && $description != "" && $note != ""){
            $activityType->setCode($code);
            $activityType->setDescription($description);
            $activityType->setNote($note);
            //update database
            Model::getEM()->merge($activityType);
            Model::getEM()->flush();
            // alert 
            FlashMsgView::add(MsgType::Successful, "El tipo de actividad se ha actualizado correctamente!");
        } else
            FlashMsgView::add(MsgType::Error, "No puede puede actualizar el tipo de actividad, hay casilleros en blanco.");
        // redirect to view activity Type
        $this->data["activityType"] = $activityType;
        $this->redirect(Router::url("/home/admin/activityType/view/".$id));
    }
}

?>