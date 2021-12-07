<?php

namespace Config;



class Controller extends Routeparams
{
  public $conexion;

  public function __construct()
  {
      //$this->conexion = new Conexion();
      return 'index';
  }

    public function loadModel($fileName)
    {
        $path = './app/Models/' . ($fileName).'Model.php';

        if (file_exists($path)){
            require_once './app/Models/' . ($fileName).'Model.php';

            $modelName = $fileName.'Model';
            //$objModel = App\Models\UserModel;
            $objModel = new $modelName();
            return $objModel;
        }
    }

}