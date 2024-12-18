<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['GET', 'POST'], '/register', 'Register::Register');
$routes->match(['GET', 'POST'], '/logout', 'Logout::Logout');
$routes->match(['GET', 'POST'], '/login', 'Login::Login');
$routes->match(['GET', 'POST'], '/dashboard', 'Dashboard::Dashboard');
$routes->post('/update-user', 'Dashboard::updateUser');

$routes->get('/delete-user/(:num)', 'Dashboard::deleteUser/$1');
$routes->delete('/delete-user/(:num)', 'Dashboard::deleteUser/$1');

$routes->get('/campaign', 'Dashboard::addCampaign');
$routes->post('/campaign/store', 'Dashboard::storeCampaign');
$routes->get('/showCampaign', 'Dashboard::showCampaign');

