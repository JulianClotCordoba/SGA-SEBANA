<?php

use App\Modules\JuntaDirectiva\Controllers\JuntaDirectivaController;

$router->get('/junta', [JuntaDirectivaController::class, 'index']);