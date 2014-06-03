<?php

use Doctrine\ORM\EntityRepository;

class ActivityTypeRepository extends EntityRepository {

    function getByCode($code) {
        $criterio = array("code" => $code);
        $return = Model::getEM()->getRepository("ActivityType")->findOneBy($criterio);

        return ($return);
    }

    function getById($id) {
        $criterio = array("id" => $id);
        $return = Model::getEM()->getRepository("ActivityType")->findOneBy($criterio);

        return ($return);
    }
}

?>