<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');

// PUBLIC FRONT
Router::scope('/', function (RouteBuilder $routes)
{
  $routes->extensions(['json']);

  $routes->connect('/',['controller' => 'Pages', 'action' => 'display', 'home', 'lang' => 'fr_CH']);
  $routes->connect('/',['controller' => 'Pages', 'action' => 'display', 'home'],['routeClass' => 'ADmad/I18n.I18nRoute']);
  $routes->connect('/pages/*',['controller' => 'Pages', 'action' => 'display'],['routeClass' => 'ADmad/I18n.I18nRoute']);

  // INDEX Exhibitions
  $routes->connect('/fr_CH/expositions',['controller' => 'pois', 'action' => 'exhibitionsIndex', 'lang' => 'fr_CH']);
  $routes->connect('/de_CH/ausstellungen',['controller' => 'pois', 'action' => 'exhibitionsIndex', 'lang' => 'de_CH']);
  $routes->connect('/en_GB/exhibitions',['controller' => 'pois', 'action' => 'exhibitionsIndex', 'lang' => 'en_GB']);

  // INDEX Exhibitions
  $routes->connect('/fr_CH/exposition/*',['controller' => 'pois', 'action' => 'exhibitionsView', 'lang' => 'fr_CH']);
  $routes->connect('/de_CH/ausstellung/*',['controller' => 'pois', 'action' => 'exhibitionsView', 'lang' => 'de_CH']);
  $routes->connect('/en_GB/exhibition/*',['controller' => 'pois', 'action' => 'exhibitionsView', 'lang' => 'en_GB']);

  // INDEX MUSEUMS
  //$routes->connect('/fr_CH/musees',['controller' => 'pois', 'action' => 'museumsIndex', 'lang' => 'fr_CH']);
  $routes->connect('/de_CH/museen',['controller' => 'pois', 'action' => 'museumsIndex', 'lang' => 'de_CH']);
  $routes->connect('/en_GB/museums',['controller' => 'pois', 'action' => 'museumsIndex', 'lang' => 'en_GB']);

  // VIEW
  $routes->connect('/fr_CH/musee/*',['controller' => 'pois', 'action' => 'museumsView', 'lang' => 'fr_CH']);
  $routes->connect('/de_CH/museum/*',['controller' => 'pois', 'action' => 'museumsView', 'lang' => 'de_CH']);
  $routes->connect('/en_GB/museum/*',['controller' => 'pois', 'action' => 'museumsView', 'lang' => 'en_GB']);

  $routes->connect('/fr_CH/musees',['controller' => 'pages', 'action' => 'display', 'index' ,'lang' => 'fr_CH']);
  $routes->connect('/fr_CH/',['controller' => 'pages', 'action' => 'display', 'home' ,'lang' => 'fr_CH']);
  $routes->connect('/fr_CH/carte',['controller' => 'pages', 'action' => 'display', 'map' ,'lang' => 'fr_CH']);
  $routes->connect('/fr_CH/agenda',['controller' => 'pages', 'action' => 'display', 'agenda' ,'lang' => 'fr_CH']);


  //$routes->connect('/:controller',['action' => 'index'],['routeClass' => 'ADmad/I18n.I18nRoute']);
  //$routes->connect('/:controller/:action/*',[], ['routeClass' => 'ADmad/I18n.I18nRoute'] );
});

// PUBLIC API
Router::prefix('api', function ($routes) {
  $routes->extensions(['json']);
  $routes->fallbacks('DashedRoute');
});

// ADMIN SECTION
Router::prefix('admin', function ($routes) {
  //$routes->connect('/admin/users/profile',['controller' => 'users', 'action' => 'profile', 'prefix' => 'admin', 'plugin' => false]);
  $routes->extensions(['json']);
  $routes->fallbacks('DashedRoute');
});

// CURATOR SECTION
Router::prefix('curator', function ($routes) {
  $routes->extensions(['json']);
  $routes->fallbacks('DashedRoute');
});


Plugin::routes();
