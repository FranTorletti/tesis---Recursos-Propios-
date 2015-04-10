<?php

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {

    function isValidUser($email, $password) {
        $criteria = array("email" => $email, "password" => $password);
        $return = Model::getEM()->getRepository("User")->findOneBy($criteria);

        return !empty($return);
    }

    function getByEmail($email) {
        $criterio = array("email" => $email);
        $return = Model::getEM()->getRepository("User")->findOneBy($criterio);

        return ($return);
    }

    function getById($idUser) {
        $criterio = array("id" => $idUser);
        $return = Model::getEM()->getRepository("User")->findOneBy($criterio);

        return ($return);
    }

    function getUsers() {
        $criterio = array("type" => 'user');
        $return = Model::getEM()->getRepository("User")->findBy($criterio);
       
        return $return;
    }
}

?>