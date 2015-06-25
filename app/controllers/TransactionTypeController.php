<?php

class TransactionTypeController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function TransactionType() {
        $this->data["transactionTypes"] = Model::getEM()->getRepository("TransactionType")->findAll();
        $this->return_html("transactionType/TransactionType.tpl");
    }

    function ViewTransactionType($id) {
        $this->data["transactionType"] = Model::getEM()->getRepository("TransactionType")->getById($id);
        $this->return_html("transactionType/ViewTransactionType.tpl");
    }

    function EditTransactionType($id) {
        //get dependence objet
        $transactionType = Model::getEM()->getRepository("TransactionType")->getById($id);
        //get form data
        $req = Controller::$router->request();
        $type = $req->params("type");
        $name = $req->params("name");
        $description = $req->params("description");
        
        // set transactionType
        $transactionType->setType($type);
        $transactionType->setName($name);
        $transactionType->setDescription($description);
        //update database
        Model::getEM()->merge($transactionType);
        Model::getEM()->flush();
        // alert 
        FlashMsgView::add(MsgType::Successful, "El tipo de ingreso se ha actualizado correctamente!");
        // redirect to view dependence
        $this->data["transactionType"] = $transactionType;
        $this->redirect(Router::url("/home/admin/transactionType/view/".$id));
    }

    function CreateTransactionType(){
        $this->return_html("transactionType/CreateTransactionType.tpl");
    }

    function SaveTransactionType(){
        $req = Controller::$router->request();
        $type = $req->params("type");
        $name = $req->params("name");
        $description = $req->params("description");
        // create and set dependence
        $transactionType = new TransactionType();
        $transactionType->setType($type);
        $transactionType->setName($name);
        $transactionType->setDescription($description);
        //update database
        Model::getEM()->persist($transactionType);
        Model::getEM()->flush();
        // alert
        FlashMsgView::add(MsgType::Successful, "El tipo de transaccion se ha creado correctamente!");
        // redirect to view dependence
        $this->data["transactionTypes"] = Model::getEM()->getRepository("TransactionType")->findAll();
        $this->redirect(Router::url("/home/admin/transactionType"));
    }

    function DeleteTransactionType($id) {
        $transactionType = Model::getEM()->getRepository("TransactionType")->find($id);
        Model::getEM()->remove($transactionType);
        Model::getEM()->flush();
        FlashMsgView::add(MsgType::Successful, "El tipo de transaccion se ha borrado correctamente");
        $this->redirect(Router::url("/home/admin/transactionType"));
    }
}

?>