<?php

namespace Config;

class View
{
  public static function show($view, $data)
  {

    // Encuentra si esta trabajando en con localhost o serverless
    $getLocalServer = 'localhost';
    $myServer = $_SERVER['SERVER_NAME'];

    return ($view, $data);
  }
}