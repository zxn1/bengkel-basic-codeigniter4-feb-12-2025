<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\ProductController;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

//routes for index()
$routes->get('/', [ProductController::class, 'index']);
$routes->get('/create', [ProductController::class, 'create']);
$routes->post('/store', [ProductController::class, 'store']);