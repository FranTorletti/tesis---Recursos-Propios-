<?php
/*
   to install dependencies php composer.phar install
   if add a new controller or model then run $ php composer.phar dump-autoload
   if add or modified model then run $ php vendor/bin/doctrine orm:schema-tool:update --force
*/

require 'vendor/autoload.php';
require 'app/config/config.php';

Controller::$router = new Router();

Session::init();

//  ------  Home  ------
Controller::$router->get('/', 'HomeController', 'Index');
Controller::$router->get('/home/signup', 'HomeController', 'ShowLogin');
Controller::$router->post('/home/login', 'UserController', 'Login');
Controller::$router->get('/home/logout', 'UserController', 'Logout');
Controller::$router->get('/home/faq', 'HomeController', 'Faq');

//  ------  Admin  ------
// Panel
Controller::$router->get('/home/admin/panelAdmin', 'AdminController', 'PanelAdmin');
// Admin - Dependence
Controller::$router->get('/home/admin/dependence', 'DependenceController', 'Dependence');
Controller::$router->get('/home/admin/dependence/view/:id', 'DependenceController', 'ViewDependence');
Controller::$router->post('/home/admin/dependence/edit/:id', 'DependenceController', 'EditDependence');
Controller::$router->get('/home/admin/dependence/create', 'DependenceController', 'CreateDependence');
Controller::$router->post('/home/admin/dependence/save', 'DependenceController', 'SaveDependence');
Controller::$router->get('/home/admin/dependence/delete/:id', 'DependenceController', 'DeleteDependence');

// Admin - Resource Origin
Controller::$router->get('/home/admin/resourceOrigin', 'ResourceOriginController', 'ResourceOrigin');
Controller::$router->get('/home/admin/resourceOrigin/view/:id', 'ResourceOriginController', 'ViewResourceOrigin');
Controller::$router->post('/home/admin/resourceOrigin/edit/:id', 'ResourceOriginController', 'EditResourceOrigin');
Controller::$router->get('/home/admin/resourceOrigin/create', 'ResourceOriginController', 'CreateResourceOrigin');
Controller::$router->post('/home/admin/resourceOrigin/save', 'ResourceOriginController', 'SaveResourceOrigin');
Controller::$router->get('/home/admin/resourceOrigin/delete/:id', 'ResourceOriginController', 'DeleteResourceOrigin');

// Admin - User
Controller::$router->get('/home/admin/user', 'UserController', 'User');
Controller::$router->get('/home/admin/user/view/:id', 'UserController', 'ViewUser');
Controller::$router->post('/home/admin/user/edit/:id', 'UserController', 'EditUser');
Controller::$router->get('/home/admin/user/create', 'UserController', 'CreateUser');
Controller::$router->post('/home/admin/user/save', 'UserController', 'SaveUser');
Controller::$router->post('/home/admin/user/delete/:id', 'UserController', 'DeleteUser');

// Admin - ServiceType
Controller::$router->get('/home/admin/serviceType', 'ServiceTypeController', 'ServiceType');
Controller::$router->get('/home/admin/serviceType/view/:id', 'ServiceTypeController', 'ViewServiceType');
Controller::$router->post('/home/admin/serviceType/edit/:id', 'ServiceTypeController', 'EditServiceType');
Controller::$router->get('/home/admin/serviceType/create', 'ServiceTypeController', 'CreateServiceType');
Controller::$router->post('/home/admin/serviceType/save', 'ServiceTypeController', 'SaveServiceType');
Controller::$router->get('/home/admin/serviceType/delete/:id', 'ServiceTypeController', 'DeleteServiceType');

// Admin - Service
Controller::$router->get('/home/admin/service', 'ServiceController', 'Service');
/**
Controller::$router->get('/home/admin/service/view/:id', 'ServiceController', 'ViewService');
Controller::$router->post('/home/admin/service/edit/:id', 'ServiceController', 'EditService');
Controller::$router->get('/home/admin/service/create', 'ServiceController', 'CreateService');
Controller::$router->post('/home/admin/service/save', 'ServiceController', 'SaveService');
Controller::$router->get('/home/admin/service/delete/:id', 'ServiceController', 'DeleteService');
**/
//run server
Controller::$router->run();