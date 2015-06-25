<?php

use Doctrine\ORM\EntityRepository;

class TransactionTypeRepository extends EntityRepository {

    function getByType($type) {
        $criterio = array("type" => $type);
        $return = Model::getEM()->getRepository("TransactionType")->findBy($criterio);

        return ($return);
    }

    function getById($id) {
        $criterio = array("id" => $id);
        $return = Model::getEM()->getRepository("TransactionType")->findOneBy($criterio);

        return ($return);
    }
}

?>