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
Controller::$router->get('/home/admin/dependence', 'AdminController', 'Dependence');
Controller::$router->get('/home/admin/dependence/view/:id', 'AdminController', 'ViewDependence');
Controller::$router->post('/home/admin/dependence/edit/:id', 'AdminController', 'EditDependence');
Controller::$router->get('/home/admin/dependence/create', 'AdminController', 'CreateDependence');
Controller::$router->post('/home/admin/dependence/save', 'AdminController', 'SaveDependence');

// Admin - Activity Type
Controller::$router->get('/home/admin/activityType', 'AdminController', 'ActivityType');
Controller::$router->get('/home/admin/activityType/view/:id', 'AdminController', 'ViewActivityType');
Controller::$router->post('/home/admin/activityType/edit/:id', 'AdminController', 'EditActivityType');

//run server
Controller::$router->run();