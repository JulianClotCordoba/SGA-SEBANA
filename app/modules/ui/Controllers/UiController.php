<?php

namespace App\Modules\Ui\Controllers;

use App\Core\ControllerBase;

class UiController extends ControllerBase
{
    public function show($page)
    {
        // Sanitize page name to prevent Directory Traversal
        $page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);
        
        $viewPath = dirname(__DIR__) . '/Views/' . $page . '.php';
        
        if (file_exists($viewPath)) {
            $this->view($page, ['title' => ucfirst($page) . ' - SGA-SEBANA']);
        } else {
            // 404
            http_response_code(404);
            echo "Page not found: " . htmlspecialchars($page);
        }
    }
}
