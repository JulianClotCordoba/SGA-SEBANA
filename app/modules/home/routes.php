<?php

use App\Modules\Home\Controllers\HomeController;

$router->get('/', [HomeController::class, 'index']);
$router->get('/home', [HomeController::class, 'index']);
