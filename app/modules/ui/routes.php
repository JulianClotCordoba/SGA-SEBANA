<?php

use App\Modules\Ui\Controllers\UiController;

// Catch-all route for UI pages
// e.g. /ui/form will load form.php View
$router->get('/ui/{page}', [UiController::class, 'show']);
