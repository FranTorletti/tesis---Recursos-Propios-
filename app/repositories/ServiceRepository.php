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

    function getLastService($dependence,$resourceOrigin,$serviceType){
        $pdo = Model::getPDO();
        $result = $pdo->query("select max(code) as code from service where ($dependence = dependence_id and $resourceOrigin = resourceOrigin_id and $serviceType = serviceType_id)");
        $temp = $result->fetch();
        return $temp[0];
    }

    function getService($activityTypeCode,$resourceOriginCode,$dependenceCode,$serviceCode){
        $criterio = array("activityType" => $activityTypeCode,"resourceOrigin" => $resourceOriginCode,
            "dependence" => $dependenceCode, "code" => $serviceCode);
        $return = Model::getEM()->getRepository("Service")->findOneBy($criterio);

        return ($return);
    }
}

?>