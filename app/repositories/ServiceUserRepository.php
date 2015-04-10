<?php

use Doctrine\ORM\EntityRepository;

class ServiceUserRepository extends EntityRepository {

    function getById($id) {
        $criterio = array("id" => $id);
        $return = Model::getEM()->getRepository("ServiceUser")->findOneBy($criterio);

        return ($return);
    }

    function getByService($service) {
        $criterio = array("service" => $service);
        $return = Model::getEM()->getRepository("ServiceUser")->findBy($criterio);
       
        return $return;
    }

    
}

?>