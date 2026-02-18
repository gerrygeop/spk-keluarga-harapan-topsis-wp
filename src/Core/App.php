<?php

namespace App\Core;

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // Controller
        if (isset($url[0])) {
            $controllerName = 'App\\Controllers\\' . ucfirst($url[0]);
            if (class_exists($controllerName)) {
                $this->controller = $controllerName;
                unset($url[0]);
            }
        } else {
             // Default controller if no URL provided
             $this->controller = 'App\\Controllers\\' . $this->controller;
        }

        // Initialize Controller
        // Check if class exists before instantiating to avoid fatal error if default controller is missing
        if (class_exists($this->controller)) {
            $this->controller = new $this->controller;
        } else {
            // Fallback or 404
            die("Controller not found: " . $this->controller);
        }

        // Method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // Params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // Run
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
