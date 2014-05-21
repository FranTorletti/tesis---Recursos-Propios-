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
        
            Session::set('id', $user->getId());
            Session::set('nombre', $user->getName());
            Session::set('apellido', $user->getSurname());
            Session::set('user', $user->getUser());
            Session::set('systemtype', $user->getSystemType());
                
                
                if(Session::get('systemtype') == "BiddingMarketplace"){
                    Session::set('currentSystem','decontrader');
                }

                if ($user->getType() == 'admin') {
                    Session::set('isAdmin', true);
                }
                if (Session::get('systemtype') == "Bidding") {
                    $this->redirect(Router::url("/econtrata"));
                } else {
                    $this->redirect(Router::url("/decontrader"));
                }
            } else {
                FlashMsgView::add(MsgType::Error, "Usuario Bloqueado o Cuenta no validada. Contactese con el Administrador");
                $this->redirect(Router::url("/home/signup"));
            }
        } else {
            FlashMsgView::add(MsgType::Error, "Escriba bien su Email o Contraseña");
            $this->redirect(Router::url("/home/signup"));
        }
    }

    function logout() {
        Session::del('id');
        Session::del('nombre');
        Session::del('apellido');
        Session::del('user');
        Session::del('isAdmin');
        Session::set('systemtype', "offline");

        $this->redirect(Router::url("/home"));
    }

}

?>