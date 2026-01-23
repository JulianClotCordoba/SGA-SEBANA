<?php

namespace App\Modules\Home\Controllers;

use App\Core\ControllerBase;

class HomeController extends ControllerBase
{
    public function index()
    {
        $this->view('index', ['title' => 'Dashboard - SGA-SEBANA']);
    }
}
