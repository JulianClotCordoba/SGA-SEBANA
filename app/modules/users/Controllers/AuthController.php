<?php

namespace App\Modules\Users\Controllers;

use App\Core\ControllerBase;
use App\Modules\Users\Models\User;
use App\Modules\Users\Models\Bitacora;
use App\Modules\Users\Helpers\SecurityHelper;

/**
 * AuthController - Handles authentication (login/logout)
 */
class AuthController extends ControllerBase
{
    private User $userModel;
    private Bitacora $bitacora;

    public function __construct()
    {
        $this->userModel = new User();
        $this->bitacora = new Bitacora();
    }

    /**
     * Show login form
     */
    public function showLogin(): void
    {
        // If already authenticated, redirect to home
        if (SecurityHelper::isAuthenticated()) {
            $this->redirect('/SGA-SEBANA/public/home');
            return;
        }

        $this->view('auth/login', [
            'title' => 'Iniciar Sesión - SGA-SEBANA',
            'csrf_token' => SecurityHelper::getCsrfToken(),
            'error' => $_SESSION['login_error'] ?? null,
        ]);

        // Clear error after displaying
        unset($_SESSION['login_error']);
    }

    /**
     * Process login form
     */
    public function login(): void
    {
        // Validate CSRF token
        $csrfToken = $_POST['_csrf_token'] ?? '';
        if (!SecurityHelper::validateCsrfToken($csrfToken)) {
            $_SESSION['login_error'] = 'Token de seguridad inválido. Por favor, intente de nuevo.';
            $this->redirect('/SGA-SEBANA/public/login');
            return;
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        // Basic validation
        if (empty($username) || empty($password)) {
            $_SESSION['login_error'] = 'Por favor, complete todos los campos.';
            $this->redirect('/SGA-SEBANA/public/login');
            return;
        }

        // Find user by username
        $user = $this->userModel->findByUsername($username);

        // User not found
        if (!$user) {
            $this->bitacora->logFailedLogin(null, $username, 'Usuario no encontrado');
            $_SESSION['login_error'] = 'Credenciales inválidas.';
            $this->redirect('/SGA-SEBANA/public/login');
            return;
        }

        // Check if user is blocked
        if ($user['bloqueado'] || $user['estado'] === 'bloqueado') {
            $this->bitacora->logFailedLogin($user['id'], $username, 'Usuario bloqueado');
            $_SESSION['login_error'] = 'Su cuenta está bloqueada. Contacte al administrador.';
            $this->redirect('/SGA-SEBANA/public/login');
            return;
        }

        // Check if user is inactive
        if ($user['estado'] === 'inactivo') {
            $this->bitacora->logFailedLogin($user['id'], $username, 'Usuario inactivo');
            $_SESSION['login_error'] = 'Su cuenta está inactiva. Contacte al administrador.';
            $this->redirect('/SGA-SEBANA/public/login');
            return;
        }

        // Validate password
        if (!password_verify($password, $user['contrasena'])) {
            $attempts = $this->userModel->incrementFailedAttempts($user['id']);
            $this->bitacora->logFailedLogin($user['id'], $username, 'Contraseña incorrecta');

            if ($attempts >= 5) {
                $_SESSION['login_error'] = 'Su cuenta ha sido bloqueada por múltiples intentos fallidos.';
            } else {
                $remaining = 5 - $attempts;
                $_SESSION['login_error'] = "Contraseña incorrecta. Intentos restantes: {$remaining}";
            }

            $this->redirect('/SGA-SEBANA/public/login');
            return;
        }

        // Successful login
        // Regenerate session ID for security
        SecurityHelper::regenerateSession();

        // Reset failed attempts
        $this->userModel->resetFailedAttempts($user['id']);

        // Update last access
        $this->userModel->updateLastAccess($user['id']);

        // Get user with role info
        $userWithRole = $this->userModel->findWithRole($user['id']);

        // Set session data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_authenticated'] = true;
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['correo'],
            'nombre_completo' => $user['nombre_completo'],
            'rol_id' => $user['rol_id'],
            'rol_nombre' => $userWithRole['rol_nombre'] ?? 'Sin rol',
            'nivel_acceso' => $userWithRole['nivel_acceso'] ?? 'basico',
        ];

        // Log successful login
        $this->bitacora->logLogin($user['id'], $user['username']);

        // Check if user must change password
        if ($user['debe_cambiar_contrasena']) {
            $_SESSION['must_change_password'] = true;
            $this->redirect('/SGA-SEBANA/public/users/' . $user['id'] . '/edit');
            return;
        }

        // Redirect to home
        $this->redirect('/SGA-SEBANA/public/home');
    }

    /**
     * Logout user
     */
    public function logout(): void
    {
        $userId = SecurityHelper::getAuthUserId();
        $user = SecurityHelper::getAuthUser();

        if ($userId && $user) {
            $this->bitacora->logLogout($userId, $user['username']);
        }

        SecurityHelper::destroySession();

        $this->redirect('/SGA-SEBANA/public/login');
    }
}
