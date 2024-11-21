<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\StudentController;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
// $routes->get('/home', [StudentController::class,'index']);
$routes->get('/students', 'StudentController::index');
$routes->get('/students/create', 'StudentController::create');
$routes->post('/students/store', 'StudentController::store');
$routes->get('/students/edit/(:num)', 'StudentController::edit/$1');
$routes->post('/students/update/(:num)', 'StudentController::update/$1');
$routes->get('/students/delete/(:num)', 'StudentController::delete/$1');
$routes->post('/students/check_email', 'StudentController::check_email');
