<?php

namespace App\Core;

use App\Core\Flasher;

class Controller {
    public function view($view, $data = [])
    {
        // Adjust logic to find views. 
        // Assuming public/index.php is entry point and Views are in src/Views
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';
        
        if (file_exists($viewPath)) {
            // Make Flasher available to view without FQCN
            // But 'use' only works at compile time for the current file.
            // We can alias it manually if needed, or better:
            // The view file will be included here.
            // If the view uses 'Flasher::', it needs to be known.
            // Since 'use App\Core\Flasher' is in this file, does it carry over to include?
            // No, PHP include doesn't inherit alias.
            
            // Hacky but effective for legacy views:
            // We can class_alias if not exists, but that's global.
            if (!class_exists('Flasher')) {
                class_alias('App\Core\Flasher', 'Flasher');
            }

            require_once $viewPath;
        } else {
            // Fallback for development debugging
            die("View not found: " . $viewPath);
        }
    }

    public function model($model)
    {
        $modelClass = 'App\\Models\\' . $model;
        if (class_exists($modelClass)) {
            return new $modelClass();
        } else {
            die("Model not found: " . $modelClass);
        }
    }
}
