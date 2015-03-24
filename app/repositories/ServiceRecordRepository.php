<?php

use Doctrine\ORM\EntityRepository;

class ServiceRecordRepository extends EntityRepository {

    function getServiceRecord($serviceType,$resourceOrigin,$dependence){
        $criterio = array("serviceType" => $serviceType,"resourceOrigin" => $resourceOrigin,
            "dependence" => $dependence);
        $return = Model::getEM()->getRepository("ServiceRecord")->findOneBy($criterio);

        return ($return);
    }
}

?>