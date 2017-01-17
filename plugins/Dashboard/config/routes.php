<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::connect(
    '/dashboard',
    ['plugin' => 'Dashboard', 'controller' => 'Main', 'action' => 'index'],
    ['_name' => 'Dashboard']
);
Router::plugin(
    'Dashboard',
    ['path' => '/dashboard'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
// Router::extensions(['json']);