<?php

use Doctrine\ORM\EntityRepository;

class ServiceUserRepository extends EntityRepository {

    function getById($id) {
        $criterio = array("id" => $id);
        $return = Model::getEM()->getRepository("ServiceUser")->findOneBy($criterio);

        return ($return);
    }
}

?>