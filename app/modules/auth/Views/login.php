<?php
ob_start();
?>

<div class="login-wrap">
    <div class="login-content">
        <div class="login-logo">
            <a href="#">
                <img src="/SGA-SEBANA/public/assets/img/icon/logo.png" alt="SGA-SEBANA">
            </a>
        </div>
        <div class="login-form">
            <form action="" method="post">
                <div class="form-group">
                    <label>Email Address</label>
                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                </div>
                <div class="login-checkbox">
                    <label>
                        <input type="checkbox" name="remember">Remember Me
                    </label>
                    <label>
                        <a href="#">Forgotten Password?</a>
                    </label>
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
// Note: Login page often uses a different template (no sidebar). 
// For now using base, but ideally should use a 'auth' template or similar.
// I'll leave it as requiring base for consistency but typically login page is standalone.
// Spec says "Usar public/templates/base.html.php para todas las vistas".
// So I will use it, but maybe I should add logic in base to hide sidebar if not logged in?
// Or just creating a `public/templates/auth.html.php` would be better if allowed?
// Spec says "NO duplicar la plantilla base por módulo". 
// But Login usually needs a different layout. 
// I will just use base for now to strictly follow "no duplicate" or maybe partials.
// Re-reading spec: "Usar public/templates/base.html.php para todas las vistas".
require BASE_PATH . '/public/templates/base.html.php';
?>
