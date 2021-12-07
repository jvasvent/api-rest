<?php

namespace App\Controllers;

// use App\Middlewares\CheckAuth;
use Config\Controller;

use App\Models\UserModel;

class Home extends Controller{

    public $user;

    public function __construct()
    {
        $this->user = $this->loadModel('User');
    }

    public function index(){
        $result = $this->user->CreateUser([
            'ruc' => '1234567',
            'razon_social' => 'example',
            'nombre_comercial' => 'example',
            'direccion' => 'example',
            'telefono' => 'example',
            'celular' => 'example',
            'correo' => 'example',
            'web' => 'example',
            'logo' => 'example',
            'estado' => 'example'
        ]);
        //$result = $this->user->list();
        //echo "<pre>";

        //return $response->setContent(json_encode($result));
        //return $response->setContent('Hello World')->send();
        //echo "</pre>";
        return (array)$result;
    }

}