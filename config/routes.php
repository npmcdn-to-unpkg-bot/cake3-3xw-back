<?php

use Cake\Core\Plugin;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');
Router::scope('/', function ($routes) {
    $routes->connect('/', ['controller' => 'pages', 'action' => 'homepage']);
    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->connect(
        '/:slug', // E.g. /blog/3-CakePHP_Rocks
        ['controller' => 'Pages', 'action' => 'view'],
        [
            // Défini les éléments de route dans le template de route
            // à passer en tant qu'arguments à la fonction. L'ordre est
            // important car cela fera simplement correspondre ":id" avec
            // articleId dans votre action.
            'pass' => [ 'slug']
            // Défini un modèle auquel `id` doit correspondre
         ]
    );
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
