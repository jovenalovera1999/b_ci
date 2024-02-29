<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/users', 'UserController::listUsers');
$routes->get('/user/add', 'UserController::addUser');

$routes->post('/storeUser', 'UserController::addUser');