<?php

namespace App\Controllers;

use Config\Controller;

class DashboardController extends Controller
{
    public function index(){
        return $this->view('dashboard/index');
    }
}
