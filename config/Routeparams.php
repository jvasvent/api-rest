<?php

namespace Config;

use Buki\Router\Router;

class Routeparams{

  public $router;  

  public function __construct()
  {
    $this->router = new Router([
      'paths' => [
        'controllers' => 'app/Controllers',
        'middlewares' => 'app/Middlewares'   
      ],
      'namespaces' => [
        'controllers' => 'App\Controllers',
        'middlewares' => 'App\Middlewares'   
      ]
    ]);
  }

  public function run()
  {
      $this->router->run();
  }

}