<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('dashboard', 'DashboardController::index');

$routes->resource('authors', ['controller' => 'AuthorController', 'except'=> ['new', 'edit']]);
$routes->resource('posts', ['controller' => 'PostController', 'except'=> ['new', 'edit']]);



service('auth')->routes($routes);