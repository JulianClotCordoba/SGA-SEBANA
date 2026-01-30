<?php
/**
 * User Form View (Create/Edit) - SGA-SEBANA
 * Uses base.html.php template
 */

use App\Modules\Users\Helpers\SecurityHelper;

$isEdit = $action === 'edit';
$formAction = $isEdit ? "/SGA-SEBANA/public/users/{$user['id']}" : '/SGA-SEBANA/public/users';

ob_start();
?>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <!-- Page Header -->
        <div class="overview-wrap mb-4">
            <h2 class="title-1">
                <?= $isEdit ? 'Editar Usuario' : 'Nuevo Usuario' ?>
            </h2>
            <a href="/SGA-SEBANA/public/users" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-arrow-left"></i> Volver
            </a>
        </div>

        <?php if (!empty($mustChangePassword)): ?>
            <div class="alert alert-warning" role="alert">
                <strong>¡Atención!</strong> Debe cambiar su contraseña antes de continuar.
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" role="alert">
                <strong>Por favor corrija los siguientes errores:</strong>
                <ul class="mb-0 mt-2">
                    <?php foreach ($errors as $error): ?>
                        <li>
                            <?= SecurityHelper::e($error) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- User Form -->
        <div class="card">
            <div class="card-header">
                <strong>
                    <?= $isEdit ? 'Editar' : 'Crear' ?>
                </strong> Usuario
            </div>
            <div class="card-body card-block">
                <form action="<?= $formAction ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="_csrf_token" value="<?= SecurityHelper::e($csrf_token ?? '') ?>">

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="username" class="form-control-label">Usuario <span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="username" name="username"
                                class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>"
                                placeholder="Nombre de usuario"
                                value="<?= SecurityHelper::e($old['username'] ?? $user['username'] ?? '') ?>" required
                                minlength="3">
                            <small class="form-text text-muted">Mínimo 3 caracteres, sin espacios.</small>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="correo" class="form-control-label">Email <span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" id="correo" name="correo"
                                class="form-control <?= isset($errors['correo']) ? 'is-invalid' : '' ?>"
                                placeholder="correo@ejemplo.com"
                                value="<?= SecurityHelper::e($old['correo'] ?? $user['correo'] ?? '') ?>" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="nombre_completo" class="form-control-label">Nombre Completo <span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nombre_completo" name="nombre_completo"
                                class="form-control <?= isset($errors['nombre_completo']) ? 'is-invalid' : '' ?>"
                                placeholder="Nombre y apellidos"
                                value="<?= SecurityHelper::e($old['nombre_completo'] ?? $user['nombre_completo'] ?? '') ?>"
                                required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="telefono" class="form-control-label">Teléfono</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="8888-8888"
                                value="<?= SecurityHelper::e($old['telefono'] ?? $user['telefono'] ?? '') ?>">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="rol_id" class="form-control-label">Rol <span
                                    class="text-danger">*</span></label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="rol_id" id="rol_id"
                                class="form-control <?= isset($errors['rol_id']) ? 'is-invalid' : '' ?>" required>
                                <option value="">-- Seleccione un rol --</option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?= $role['id'] ?>" <?= ($old['rol_id'] ?? $user['rol_id'] ?? '') == $role['id'] ? 'selected' : '' ?>>
                                        <?= SecurityHelper::e($role['nombre']) ?>
                                        (
                                        <?= SecurityHelper::e($role['nivel_acceso']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <h5 class="mb-3">
                        <?= $isEdit ? 'Cambiar Contraseña (opcional)' : 'Contraseña' ?>
                    </h5>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="password" class="form-control-label">
                                Contraseña
                                <?= !$isEdit ? '<span class="text-danger">*</span>' : '' ?>
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="password" name="password"
                                class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                                placeholder="<?= $isEdit ? 'Dejar vacío para mantener actual' : 'Contraseña segura' ?>"
                                <?= !$isEdit ? 'required' : '' ?>
                            minlength="8">
                            <small class="form-text text-muted">
                                Mínimo 8 caracteres, incluir mayúsculas, minúsculas, números y caracteres especiales.
                            </small>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="password_confirm" class="form-control-label">
                                Confirmar Contraseña
                                <?= !$isEdit ? '<span class="text-danger">*</span>' : '' ?>
                            </label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="password_confirm" name="password_confirm"
                                class="form-control <?= isset($errors['password_confirm']) ? 'is-invalid' : '' ?>"
                                placeholder="Confirmar contraseña" <?= !$isEdit ? 'required' : '' ?>>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <a href="/SGA-SEBANA/public/users" class="btn btn-secondary">
                            <i class="fa fa-ban"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i>
                            <?= $isEdit ? 'Actualizar' : 'Crear Usuario' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Client-side password validation
    document.getElementById('password').addEventListener('input', function () {
        const password = this.value;
        const confirmField = document.getElementById('password_confirm');

        if (password.length > 0) {
            confirmField.setAttribute('required', 'required');
        } else if (<?= $isEdit ? 'true' : 'false' ?>) {
            confirmField.removeAttribute('required');
        }
    });

    document.querySelector('form').addEventListener('submit', function (e) {
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('password_confirm').value;

        if (password && password !== confirm) {
            e.preventDefault();
            alert('Las contraseñas no coinciden.');
        }
    });
</script>

<?php
$content = ob_get_clean();
require $_SERVER['DOCUMENT_ROOT'] . '/SGA-SEBANA/public/templates/base.html.php';
?>