<?php

use Doctrine\ORM\EntityRepository;

class ServiceTypeRepository extends EntityRepository {

    function getById($id) {
        $criterio = array("id" => $id);
        $return = Model::getEM()->getRepository("ServiceType")->findOneBy($criterio);

        return ($return);
    }

    function getByCode($code) {
        $criterio = array("code" => $code);
        $return = Model::getEM()->getRepository("ServiceType")->findOneBy($criterio);

        return ($return);
    }
}

?>