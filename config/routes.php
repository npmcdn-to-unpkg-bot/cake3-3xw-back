<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');
Router::scope('/', function ($routes) {
    $routes->connect('/', ['controller' => 'pages', 'action' => 'display', 'home']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    //$routes->extensions(['json']);
    $routes->fallbacks('DashedRoute');
});

Router::prefix('admin', function ($routes) {
    // Toutes les routes ici seront préfixées avec `/admin` et auront
    // l'élément de route prefix => admin ajouté.
    $routes->extensions(['json']);

    $routes->fallbacks('DashedRoute');
});

Plugin::routes();
