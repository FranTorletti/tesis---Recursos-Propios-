<?php

use Doctrine\ORM\EntityRepository;

class ServiceRepository extends EntityRepository {

    function getByCode($code) {
        $criterio = array("code" => $code);
        $return = Model::getEM()->getRepository("Service")->findOneBy($criterio);

        return ($return);
    }

    function getById($id) {
        $criterio = array("id" => $id);
        $return = Model::getEM()->getRepository("Service")->findOneBy($criterio);

        return ($return);
    }

    function getLastService($activityTypeCode,$resourceOriginCode,$dependenceCode){
        $criteria = array("activityType" => $activityTypeCode, 
            "resourceOrigin" => $resourceOriginCode,"dependence" => $dependenceCode);
        $return = Model::getEM()->getRepository("Service")->findOneBy($criterio);

        return ($return);
    }

    function getService($activityTypeCode,$resourceOriginCode,$dependenceCode,$serviceCode){
        $criteria = array("activityType" => $activityTypeCode,"resourceOrigin" => $resourceOriginCode,
            "dependence" => $dependenceCode, "code" => $serviceCode);
        $return = Model::getEM()->getRepository("Service")->findOneBy($criterio);

        return ($return);
    }
}

?>