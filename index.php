<?php

// Variables de Conexion
require './config/Dbconfig.php';
require './config/Helper.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

// Conexion
//require __DIR__ . '/app/config/conn.php';

//$app = new \Core\Bootstrap();

require __DIR__ . '/config/Router.php';

//$app->run();