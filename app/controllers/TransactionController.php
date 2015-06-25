<?php

class TransactionController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function Transaction($id) {
        $this->data["transactions"] = Model::getEM()->getRepository("Transaction")->findAll();
        $this->return_html("transaction/Transaction.tpl");
    }

    function CreateTransaction($id){
        $this->data["service"] = $id;
        $this->data["income"] = Model::getEM()->getRepository("TransactionType")->getByType('ingress');
        $this->data["expenses"] = Model::getEM()->getRepository("TransactionType")->getByType('egress');
        $this->return_html("transaction/CreateTransaction.tpl");
    }

        function SaveTransaction($id){
        $req = Controller::$router->request();
        $type = $req->params("type");
        $transactionType = ($type == 'ingress') ? $req->params("classIngress") : $req->params("classEgress");
        
        date_default_timezone_set('America/Buenos_Aires');
        $date = getdate(); 
        $date = $date['mday'].'-'.$date['mon'].'-'.$date['year'];
        
        $code = $req->params("code");
        $description = $req->params("description");
        $amount = $req->params("amount");
        $service = Model::getEM()->getRepository("Service")->getById($id);
        $user = Model::getEM()->getRepository("User")->getById(Session::get('id'));
        // create and set transaction
        $transaction = new Transaction();
        $transaction->setType($type);
        $transaction->setTransactionType($transactionType);
        $transaction->setDate(new \DateTime($date));
        $transaction->setCode($code);
        $transaction->setDescription($description);
        $transaction->setAmount($amount);
        $transaction->setUniRetention($service->getServiceType()->getUniRetention());
        $transaction->setFacRetention($service->getServiceType()->getFacRetention());
        $transaction->setUser($user);
        
        //update database
        Model::getEM()->persist($transaction);
        Model::getEM()->flush();

        // alert
        FlashMsgView::add(MsgType::Successful, "La transferencia se ha creado correctamente!");
        
        // redirect to view service type
        $this->data["transactions"] = Model::getEM()->getRepository("Transaction")->findAll();
        $this->return_html("transaction/Transaction.tpl");
    }
}

?>