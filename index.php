<?php
use Phroute\Phroute\RouteCollector;

require(__DIR__ . '/config.php');
require(__DIR__ . '/./vendor/autoload.php');

$router = new RouteCollector();

$router->get('/{id}', function($id){
  $shorts_path = __DIR__ . '/shorts/' . $id . '.php';
  if (file_exists($shorts_path)) {
    header("Status: 200 OK", false, 200);
    require($shorts_path);
    die();
  } else {
    header('Bad Request', true, 404);
    header('Content-Type: application/json');
    echo json_encode(array('error'=> "Le shortcut $id n'existe pas."));
  }
});

// $router->get('/cut/{url:(http\:\/\/)?[a-zA-Z0-9+_\-\.]+\.[a-zA-Z]{2,3}}', function($uri){
//   require(__DIR__ . '/shorten.php');
// });

// $router->get('/cut/{url}/{shortid}', function($uri, $short_id){
//   require(__DIR__ . '/shorten.php');
// });

$router->any('/', function(){
  return 'Hello :) ';
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

echo $response;