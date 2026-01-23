<?php

namespace App\Core;

class ControllerBase
{
    protected function view($viewPath, $data = [])
    {
        extract($data);

        $reflector = new \ReflectionClass($this);
        $fn = $reflector->getFileName();
        $moduleDir = dirname(dirname($fn)); // Up from Controllers to Module root
        
        $file = $moduleDir . '/Views/' . $viewPath . '.php';
        
        if (file_exists($file)) {
            require $file;
        } else {
            // Fallback or error
            if (file_exists($viewPath)) {
                require $viewPath;
            } else {
                echo "View not found: " . $viewPath;
            }
        }
    }

    protected function json($data, $status = 200)
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
    }
    
    protected function redirect($url)
    {
        header("Location: " . $url);
        exit;
    }
}
