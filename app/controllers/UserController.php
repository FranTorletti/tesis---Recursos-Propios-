<?php

class UserController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function login() {
        $d = Controller::$router->request();
        $email = $d->params("inputEmail");
        $password = $d->params("inputPassword");
        $u = Model::getEM()->getRepository("User")->isValidUser($email, $password);
        if ($u) {
            $user = Model::getEM()->getRepository("User")->getByEmail($email);
            // set session
            Session::set('id', $user->getId());
            Session::set('nombre', $user->getName());
            Session::set('apellido', $user->getSurname());
            Session::set('type', $user->getType());
            // if is admin    
            if ($user->getType() == 'admin') 
                    Session::set('isAdmin', true);
            $this->redirect(Router::url("/"));

        } else {
            FlashMsgView::add(MsgType::Error, "Escriba bien su Email o Contraseña");
            $this->redirect(Router::url("/home/signup"));
        }
    }

    function logout() {
        Session::del('id');
        Session::del('nombre');
        Session::del('apellido');
        Session::del('isAdmin');
        Session::set('type', "offline");

        $this->redirect(Router::url("/"));
    }

}

?>