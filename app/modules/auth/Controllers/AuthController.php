<?php

namespace App\Modules\Auth\Controllers;

use App\Core\ControllerBase;

class AuthController extends ControllerBase
{
    public function login()
    {
        $this->view('login', ['title' => 'Login - SGA-SEBANA']);
    }

    public function authenticate()
    {
        // Implement authentication logic
        // For now, just redirect to home
        $this->redirect('/SGA-SEBANA/public/home');
    }

    public function logout()
    {
        // Implement logout
        $this->redirect('/SGA-SEBANA/public/login');
    }
}
