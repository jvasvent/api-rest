<?php

namespace App\Controllers;

use Config\Controller;

class Auth extends Controller
{
    public function index()
    {
        $usuario = '';
        return json_encode($usuario);
    }
    public function login()
		{
			return $this->view('auth/login');
		}
}