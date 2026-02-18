<?php
// Simulate public/index.php behavior
define('BASEURL', 'http://test.local');

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Mock Session
session_start();
$_SESSION['user_id'] = 1; // Simulate logged in

try {
    echo "Testing Perhitungan Controller (Index)...\n";
    $calc = new \App\Controllers\Perhitungan();
    $calc->index();

    echo "\nTesting Perhitungan TOPSIS Detail...\n";
    $calc->topsis();

    echo "\nTesting Perhitungan WP Detail...\n";
    $calc->wp();
} catch (Throwable $e) {
    echo "CRITICAL ERROR: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . " on line " . $e->getLine() . "\n";
    echo $e->getTraceAsString();
}
