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
        /**
        $pdo = Model::getPDO();
        $result = $pdo->query("select * from service where $dependence = dependence_id and $resourceOrigin = resourceOrigin_id and $serviceType = serviceType_id");
        $temp = $result->fetchAll();
        return $temp;
        **/

        $qb = Model::getEm()->createQueryBuilder();
        $qb->select("s");
        $qb->from("Service", "s");
        $qb->andWhere("s.dependence=:dependenceId");
        $qb->andWhere("s.resourceOrigin=:resourceOriginId");
        $qb->andWhere("s.serviceType=:serviceTypeId");
        $qb->orderBy("s.id","DESC");

        $qb->setParameter("dependenceId", $dependence);
        $qb->setParameter("resourceOriginId", $resourceOrigin);
        $qb->setParameter("serviceTypeId", $serviceType);

        $query = $qb->getQuery();
        //die($query->getSql());
        $result = $query->getResult();
        $res = ($result == null) ? null : $result[0]->getCode() ;
        //    print_r($result == null);
        //print_r();
    //    die();
        //$res = array();
        //foreach ($result as $value) {
//            $res[] = $value[0];
  //      }
    return $res;
    }

    function getService($activityTypeCode,$resourceOriginCode,$dependenceCode,$serviceCode){
        $criterio = array("activityType" => $activityTypeCode,"resourceOrigin" => $resourceOriginCode,
            "dependence" => $dependenceCode, "code" => $serviceCode);
        $return = Model::getEM()->getRepository("Service")->findOneBy($criterio);

        return ($return);
    }
}

?>