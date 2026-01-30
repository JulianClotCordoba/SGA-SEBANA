<?php

use App\Modules\Users\Controllers\AuthController;
use App\Modules\Users\Controllers\UsersController;

// =====================================================
// AUTH ROUTES
// =====================================================
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);

// =====================================================
// USERS CRUD ROUTES
// =====================================================
$router->get('/users', [UsersController::class, 'index']);
$router->get('/users/create', [UsersController::class, 'create']);
$router->post('/users', [UsersController::class, 'store']);
$router->get('/users/{id}', [UsersController::class, 'show']);
$router->get('/users/{id}/edit', [UsersController::class, 'edit']);
$router->post('/users/{id}', [UsersController::class, 'update']);
$router->post('/users/{id}/toggle', [UsersController::class, 'toggleStatus']);

// =====================================================
// BITACORA ROUTES
// =====================================================
$router->get('/bitacora', [UsersController::class, 'bitacora']);
