<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Register::Register');
$routes->post('/register', 'Register::Register');
// $routes->get('/login', 'Login::Login');
// $routes->post('/login', 'Login::Login');
$routes->get('/logout', 'Logout::Logout');
$routes->post('/logout', 'Logout::Logout');
$routes->match(['GET', 'POST'], '/login', 'Login::Login');
$routes->match(['GET', 'POST'], '/dashboard', 'Dashboard::Dashboard');
$routes->match(['GET', 'POST'], '/tables', 'Dashboard::tables');

// $routes->get('/auctions/(:num)', 'Auction::details/$1'); // Auction details by ID
// $routes->post('/auctions/bid', 'Auction::placeBid'); // Place a bid
// $routes->get('/auctions/chat/(:num)', 'ChatController::auctionChat/$1'); // 