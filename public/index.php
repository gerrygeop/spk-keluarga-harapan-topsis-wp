<?php

if (!session_id()) session_start();

require_once __DIR__ . '/../vendor/autoload.php';

// Load Environment Variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

// Define Constants (Ideally move to a Config class or ENV)
if (!defined('BASEURL')) define('BASEURL', $_ENV['APP_URL'] ?? 'http://localhost');

// Initialize App
$app = new App\Core\App();