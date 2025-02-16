<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\ProductController; //<--- cara nak import
use App\Models\ProductModel;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

//routes for index()
$routes->get('/', [ProductController::class, 'index']);
$routes->get('/create', [ProductController::class, 'create']);
$routes->post('/store', [ProductController::class, 'store']);
$routes->get('/show/(:any)', [ProductController::class, 'show/$1']);
$routes->get('/edit/(:any)', [ProductController::class, 'edit/$1']);
$routes->post('/update/(:any)', [ProductController::class, 'update/$1']);
$routes->get('/destroy/(:any)', [ProductController::class, 'destroy/$1']);

//extra - example
$routes->get('/get-join-product', function() {
    $productModel = new ProductModel();
    dd($productModel->getRelationOrder()); //calling function that we declare in our model. //how to join statement.
});

$routes->group('grouping', function($routes) {
    $routes->get('test', function() {
        echo "hello";
    });
    
    $routes->get('play-with-params/(:any)/(:any)', [ProductController::class, 'playing_with_params']);
});