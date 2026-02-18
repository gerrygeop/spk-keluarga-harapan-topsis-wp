<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_DATABASE'];

try {
    $dbh = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Tables:\n";
    $stm = $dbh->query("SHOW TABLES");
    $tables = $stm->fetchAll(PDO::FETCH_COLUMN);
    print_r($tables);

    foreach ($tables as $table) {
        echo "\nSchema for $table:\n";
        $stm = $dbh->query("DESCRIBE $table");
        $columns = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($columns as $col) {
            echo $col['Field'] . " " . $col['Type'] . "\n";
        }
        
        echo "-- Data Sample --\n";
        $stm = $dbh->query("SELECT * FROM $table LIMIT 3");
        print_r($stm->fetchAll(PDO::FETCH_ASSOC));
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
