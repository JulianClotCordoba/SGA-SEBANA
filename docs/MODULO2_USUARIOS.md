# Módulo 2: Usuarios, Roles y Permisos

**Fecha de implementación:** 29 de enero, 2026  
**Autor:** Equipo de Desarrollo SGA-SEBANA

---

## Índice

1. [Resumen del Módulo](#resumen-del-módulo)
2. [Arquitectura de Archivos](#arquitectura-de-archivos)
3. [Configuración del Entorno](#configuración-del-entorno)
4. [Componentes Implementados](#componentes-implementados)
5. [Flujo de Autenticación](#flujo-de-autenticación)
6. [Seguridad Implementada](#seguridad-implementada)
7. [Rutas Disponibles](#rutas-disponibles)
8. [Uso del Módulo](#uso-del-módulo)
9. [Limpieza de Archivos Obsoletos](#limpieza-de-archivos-obsoletos)

---

## Resumen del Módulo

Este módulo implementa el sistema completo de **autenticación y gestión de usuarios** para SGA-SEBANA, incluyendo:

- ✅ Login/Logout con sesiones seguras
- ✅ CRUD completo de usuarios
- ✅ Gestión de roles
- ✅ Bitácora de auditoría (log de acciones)
- ✅ Protección CSRF en todos los formularios
- ✅ Bloqueo automático por intentos fallidos
- ✅ Validación de contraseñas seguras

---

## Arquitectura de Archivos

```
SGA-SEBANA/
├── app/
│   ├── config/
│   │   ├── config.php              # Selector de entorno (local/remote)
│   │   ├── database.local.php      # Config BD local
│   │   └── database.remote.php     # Config BD remota
│   │
│   ├── core/
│   │   ├── Database.php            # Conexión dinámica según entorno
│   │   ├── ControllerBase.php
│   │   ├── ModelBase.php
│   │   └── Router.php
│   │
│   └── modules/
│       └── users/                  # ★ NUEVO MÓDULO ★
│           ├── routes.php          # Definición de rutas
│           │
│           ├── Helpers/
│           │   └── SecurityHelper.php  # CSRF, passwords, sesiones
│           │
│           ├── Models/
│           │   ├── User.php        # Modelo de usuarios
│           │   ├── Role.php        # Modelo de roles
│           │   └── Bitacora.php    # Modelo de auditoría
│           │
│           ├── Controllers/
│           │   ├── AuthController.php   # Login/Logout
│           │   └── UsersController.php  # CRUD usuarios
│           │
│           └── Views/
│               ├── auth/
│               │   └── login.php       # Formulario login
│               ├── users/
│               │   ├── list.php        # Lista de usuarios
│               │   ├── form.php        # Crear/Editar usuario
│               │   └── show.php        # Detalle de usuario
│               └── bitacora/
│                   └── list.php        # Log de auditoría
│
├── public/
│   ├── index.php                   # Front Controller (con .env loader)
│   └── templates/
│       ├── base.html.php           # Layout principal (con auth check)
│       └── auth.html.php           # Layout para login
│
└── .env                            # Variables de entorno (credenciales BD)
```

---

## Configuración del Entorno

### Selector de Base de Datos

El archivo `app/config/config.php` ahora incluye un selector de entorno:

```php
<?php
return [
    'app_name' => 'SGA-SEBANA',
    'debug' => true,
    'base_url' => 'http://localhost/SGA-SEBANA/public',
    
    // Selector de entorno de base de datos
    'db_environment' => 'local'  // Opciones: 'local' | 'remote'
];
```

### Funcionamiento

1. `Database.php` lee el valor de `db_environment`
2. Carga dinámicamente `database.local.php` o `database.remote.php`
3. No requiere cambiar múltiples archivos para alternar entornos

### Cambiar entre entornos

Para desarrollo local:
```php
'db_environment' => 'local'
```

Para conectar al servidor remoto:
```php
'db_environment' => 'remote'
```

---

## Componentes Implementados

### 1. SecurityHelper (`Helpers/SecurityHelper.php`)

Clase estática con métodos de seguridad:

| Método | Descripción |
|--------|-------------|
| `generateCsrfToken()` | Genera token CSRF y lo guarda en sesión |
| `validateCsrfToken($token)` | Valida token (expira en 1 hora) |
| `csrfField()` | Genera input hidden con token |
| `validatePasswordStrength($password)` | Valida política de contraseñas |
| `hashPassword($password)` | Hash con BCRYPT (cost 12) |
| `verifyPassword($password, $hash)` | Verifica contraseña |
| `sanitize($string)` | Escapa HTML (previene XSS) |
| `getClientIp()` | Obtiene IP real del cliente |
| `getUserAgent()` | Obtiene User-Agent |
| `isAuthenticated()` | Verifica si hay sesión activa |
| `getAuthUser()` | Obtiene datos del usuario logueado |
| `requireAuth()` | Redirige a login si no autenticado |
| `destroySession()` | Destruye sesión completamente |
| `regenerateSession()` | Regenera ID de sesión |

### 2. Modelo User (`Models/User.php`)

Extiende `ModelBase` con métodos específicos:

| Método | Descripción |
|--------|-------------|
| `findByUsername($username)` | Busca usuario por nombre |
| `findByEmail($email)` | Busca usuario por correo |
| `validateCredentials($username, $password)` | Valida login |
| `isActive($id)` | Verifica si usuario está activo |
| `isBlocked($id)` | Verifica si usuario está bloqueado |
| `updateLastAccess($id)` | Actualiza último acceso |
| `incrementFailedAttempts($id)` | Incrementa intentos fallidos |
| `blockUser($id)` | Bloquea usuario |
| `unblockUser($id)` | Desbloquea usuario |
| `existsUsername($username, $excludeId)` | Verifica duplicados |
| `existsEmail($email, $excludeId)` | Verifica duplicados |
| `getAllWithRoles()` | Lista usuarios con nombres de rol |
| `findWithRole($id)` | Obtiene usuario con info de rol |
| `toggleStatus($id)` | Alterna activo/inactivo |

### 3. Modelo Role (`Models/Role.php`)

| Método | Descripción |
|--------|-------------|
| `getActive()` | Obtiene roles activos para dropdowns |
| `findByName($nombre)` | Busca rol por nombre |
| `countActive()` | Cuenta roles activos |
| `getAllWithUserCount()` | Lista roles con cantidad de usuarios |

### 4. Modelo Bitacora (`Models/Bitacora.php`)

| Método | Descripción |
|--------|-------------|
| `log($data)` | Registra acción genérica |
| `logLogin($userId, $username)` | Registra login exitoso |
| `logFailedLogin($userId, $username, $reason)` | Registra login fallido |
| `logLogout($userId, $username)` | Registra logout |
| `getRecent($limit)` | Obtiene entradas recientes |
| `getByUser($userId, $limit)` | Filtra por usuario |
| `getByModule($module, $limit)` | Filtra por módulo |
| `getByDateRange($start, $end, $limit)` | Filtra por fechas |

### 5. AuthController (`Controllers/AuthController.php`)

| Método | Ruta | Descripción |
|--------|------|-------------|
| `showLogin()` | GET /login | Muestra formulario login |
| `login()` | POST /login | Procesa login |
| `logout()` | GET /logout | Cierra sesión |

### 6. UsersController (`Controllers/UsersController.php`)

| Método | Ruta | Descripción |
|--------|------|-------------|
| `index()` | GET /users | Lista usuarios |
| `create()` | GET /users/create | Formulario nuevo usuario |
| `store()` | POST /users | Guarda nuevo usuario |
| `show($id)` | GET /users/{id} | Detalle de usuario |
| `edit($id)` | GET /users/{id}/edit | Formulario editar |
| `update($id)` | POST /users/{id} | Actualiza usuario |
| `toggleStatus($id)` | POST /users/{id}/toggle | Activa/Desactiva |
| `bitacora()` | GET /bitacora | Vista de auditoría |

---

## Flujo de Autenticación

```
┌─────────────────────────────────────────────────────────────┐
│                    FLUJO DE LOGIN                            │
├─────────────────────────────────────────────────────────────┤
│                                                              │
│  1. Usuario accede a cualquier página                        │
│           ↓                                                  │
│  2. base.html.php verifica: SecurityHelper::isAuthenticated()│
│           ↓                                                  │
│  3. Si NO autenticado → Redirige a /login                    │
│           ↓                                                  │
│  4. Usuario ingresa credenciales + token CSRF                │
│           ↓                                                  │
│  5. AuthController::login() valida:                          │
│      ├─ Token CSRF válido                                   │
│      ├─ Usuario existe                                       │
│      ├─ Usuario no bloqueado                                 │
│      ├─ Usuario activo                                       │
│      └─ Contraseña correcta                                  │
│           ↓                                                  │
│  6. Si TODO OK:                                              │
│      ├─ Regenera ID de sesión                               │
│      ├─ Resetea intentos fallidos                           │
│      ├─ Actualiza último acceso                              │
│      ├─ Guarda datos en $_SESSION                            │
│      ├─ Registra en bitácora                                 │
│      └─ Redirige a /home                                     │
│           ↓                                                  │
│  7. Si FALLA:                                                │
│      ├─ Incrementa intentos fallidos                        │
│      ├─ Bloquea después de 5 intentos                        │
│      ├─ Registra en bitácora                                 │
│      └─ Muestra error                                        │
│                                                              │
└─────────────────────────────────────────────────────────────┘
```

---

## Seguridad Implementada

### 1. Protección CSRF

Todos los formularios POST incluyen un token CSRF:

```php
<form method="post">
    <input type="hidden" name="_csrf_token" value="<?= SecurityHelper::getCsrfToken() ?>">
    ...
</form>
```

El controlador valida el token:

```php
if (!SecurityHelper::validateCsrfToken($_POST['_csrf_token'] ?? '')) {
    // Rechazar petición
}
```

### 2. Política de Contraseñas

Las contraseñas deben cumplir:

- ✅ Mínimo 8 caracteres
- ✅ Al menos una mayúscula
- ✅ Al menos una minúscula
- ✅ Al menos un número
- ✅ Al menos un carácter especial (!@#$%^&*...)

### 3. Hash de Contraseñas

```php
// Guardar
$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

// Verificar
password_verify($password, $hash);
```

### 4. Prevención XSS

Todas las salidas usan `htmlspecialchars()`:

```php
<?= SecurityHelper::e($user['nombre']) ?>
// o directamente:
<?= htmlspecialchars($valor, ENT_QUOTES, 'UTF-8') ?>
```

### 5. Bloqueo por Intentos Fallidos

- Después de 5 intentos fallidos → Usuario bloqueado
- Estado cambia a `bloqueado`
- Registrado en bitácora
- Requiere desbloqueo manual por admin

### 6. Regeneración de Sesión

Al hacer login exitoso:

```php
session_regenerate_id(true);
```

Previene ataques de fijación de sesión.

---

## Rutas Disponibles

| Método | Ruta | Controlador | Requiere Auth |
|--------|------|-------------|---------------|
| GET | /login | AuthController::showLogin | ❌ No |
| POST | /login | AuthController::login | ❌ No |
| GET | /logout | AuthController::logout | ✅ Sí |
| GET | /users | UsersController::index | ✅ Sí |
| GET | /users/create | UsersController::create | ✅ Sí |
| POST | /users | UsersController::store | ✅ Sí |
| GET | /users/{id} | UsersController::show | ✅ Sí |
| GET | /users/{id}/edit | UsersController::edit | ✅ Sí |
| POST | /users/{id} | UsersController::update | ✅ Sí |
| POST | /users/{id}/toggle | UsersController::toggleStatus | ✅ Sí |
| GET | /bitacora | UsersController::bitacora | ✅ Sí |

---

## Uso del Módulo

### Probar Login

1. Iniciar XAMPP (Apache + MySQL)
2. Importar `db.sql` en phpMyAdmin
3. Navegar a: `http://localhost/SGA-SEBANA/public/login`
4. Credenciales por defecto: `admin` / `password`

### Gestionar Usuarios

1. Después de login, ir al menú lateral → Usuarios
2. Ver lista de usuarios con acciones
3. Crear nuevos usuarios con el botón "Nuevo Usuario"
4. Editar o cambiar estado de usuarios existentes

### Ver Bitácora

1. Menú lateral → Usuarios → Bitácora
2. Vista de solo lectura con todas las acciones del sistema
3. Muestra: fecha, usuario, acción, módulo, resultado, IP

---

## Limpieza de Archivos Obsoletos

Los siguientes archivos fueron eliminados o vaciados por estar obsoletos:

### Eliminados:

| Archivo | Razón |
|---------|-------|
| `app/modules/auth/` | Módulo reemplazado por `users/` |
| `app/modules/ui/Views/login.php` | Demo reemplazado por login real |
| `app/modules/ui/Views/register.php` | Demo sin implementar |
| `app/modules/ui/Views/forget-pass.php` | Demo sin implementar |

### Conservados:

| Archivo | Razón |
|---------|-------|
| `public/templates/auth.html.php` | Usado por el nuevo login |
| `app/modules/ui/Views/*` (resto) | Demos de componentes UI |

---

## Próximos Pasos (Módulo 3)

- [ ] Implementar permisos granulares por rol
- [ ] Página de recuperación de contraseña
- [ ] Registro de usuarios (si aplica)
- [ ] Gestión completa de roles (CRUD)
- [ ] Exportación de bitácora a PDF/Excel

---

**Documentación creada por el Equipo de Desarrollo SGA-SEBANA**
