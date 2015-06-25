<?php

use Doctrine\ORM\EntityRepository;

class TransactionRepository extends EntityRepository {

    function getById($id) {
        $criterio = array("id" => $id);
        $return = Model::getEM()->getRepository("Transaction")->findOneBy($criterio);

        return ($return);
    }

    function getByCode($code) {
        $criterio = array("code" => $code);
        $return = Model::getEM()->getRepository("Transaction")->findOneBy($criterio);

        return ($return);
    }

    function getByService($service) {
        $criterio = array("service" => $service);
        $return = Model::getEM()->getRepository("Transaction")->findBy($criterio);
       
        return $return;
    }
}

?>