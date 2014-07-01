<?php

class UserController extends BaseController {

    function __construct() {
        parent::__construct();
    }

    function Login() {
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

    function Logout() {
        Session::del('id');
        Session::del('nombre');
        Session::del('apellido');
        Session::del('isAdmin');
        Session::set('type', "offline");

        $this->redirect(Router::url("/"));
    }

    function User() {
        $this->data["users"] = Model::getEM()->getRepository("User")->findAll();
        $this->return_html("user/User.tpl");
    }

    function ViewUser($id) {
        $this->data["user"] = Model::getEM()->getRepository("User")->getById($id);
        $this->return_html("user/ViewUser.tpl");
    }

    function EditUser($id) {
        //get user objet
        $user = Model::getEM()->getRepository("User")->getById($id);
        //get form data
        $req = Controller::$router->request();
        $name = $req->params("name");
        $surname = $req->params("surname");
        $documentType = $req->params("documentType");
        $document = $req->params("document");
        $email = $req->params("email");
        $password = $req->params("password");
        $type = $req->params("type");
        // set user
        $user->setName($name);
        $user->setSurname($surname);
        $user->setDocumentType($documentType);
        $user->setDocument($document);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setType($type);
        //update database
        Model::getEM()->merge($user);
        Model::getEM()->flush();
        // alert 
        FlashMsgView::add(MsgType::Successful, "El usuario se ha actualizado correctamente!");
        // redirect to view user
        $this->data["user"] = $user;
        $this->redirect(Router::url("/home/admin/user/view/".$id));
    }

    function CreateUser(){
        $this->return_html("user/CreateUser.tpl");
    }

    function SaveUser(){
        $req = Controller::$router->request();
        $name = $req->params("name");
        $surname = $req->params("surname");
        $documentType = $req->params("documentType");
        $document = $req->params("document");
        $email = $req->params("email");
        $password = $req->params("password");
        $type = $req->params("type");
        // create and set user
        $user = new User();
        $user->setName($name);
        $user->setSurname($surname);
        $user->setDocumentType($documentType);
        $user->setDocument($document);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setType($type);
        //update database
        Model::getEM()->persist($user);
        Model::getEM()->flush();
        // alert
        FlashMsgView::add(MsgType::Successful, "El usuario se ha creado correctamente!");
        // redirect to view users
        $this->data["users"] = Model::getEM()->getRepository("User")->findAll();
        $this->redirect(Router::url("/home/admin/user"));
    }
}

?>