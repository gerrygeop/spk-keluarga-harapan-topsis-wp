<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Database;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Minimal Database class for migration script if Core/Database not autoadable yet or different
// But since we have autoload, we can try to use App\Core\Database if we fix the index.php/env loading first.
// Let's use raw PDO here to be safe and standalone.

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_DATABASE'];

try {
    $dbh = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Starting Migration...\n";

    // 1. Create alternatives table (new version) if not exists, or we use existing one and just drop columns later.
    // Better strategy: Create `alternatif_values` table first.

    $sql = "CREATE TABLE IF NOT EXISTS alternatif_nilai (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_alternatif INT NOT NULL,
        id_kriteria INT NOT NULL,
        nilai FLOAT NOT NULL,
        INDEX (id_alternatif),
        INDEX (id_kriteria)
    )";
    $dbh->exec($sql);
    echo "Table `alternatif_nilai` created.\n";

    // 2. Ensure kriteria has a way to map c1..c11. 
    // We assume c1 maps to the 1st criteria ordered by ID, c2 to 2nd, etc.
    // Let's fetch all kriteria ID ordered.
    $stmt = $dbh->query("SELECT id_ktr FROM kriteria ORDER BY id_ktr ASC");
    $kriteriaIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (empty($kriteriaIds)) {
        die("No criteria found in `kriteria` table. Cannot migrate.\n");
    }
    
    echo "Found " . count($kriteriaIds) . " criteria.\n";

    // 3. Migrate Data
    // Fetch all confirm data
    $stmt = $dbh->query("SELECT * FROM alternatif");
    $alternatifs = $dbh->query("SELECT * FROM alternatif")->fetchAll(PDO::FETCH_ASSOC);

    $count = 0;
    foreach ($alternatifs as $alt) {
        $id_alt = $alt['id_alt']; // Assuming PK is id_alt based on AlternatifModel
        
        // Loop through c1..c11
        for ($i = 1; $i <= 11; $i++) {
            $colName = "c" . $i;
            if (isset($alt[$colName])) {
                $nilai_raw = $alt[$colName];
                
                // Map c$i to kriteria ID
                // $kriteriaIds is 0-indexed array. so c1 -> index 0.
                if (isset($kriteriaIds[$i-1])) {
                    $id_ktr = $kriteriaIds[$i-1];
                    
                    // Check if already exists to avoid dupes
                    $check = $dbh->prepare("SELECT COUNT(*) FROM alternatif_nilai WHERE id_alternatif = ? AND id_kriteria = ?");
                    $check->execute([$id_alt, $id_ktr]);
                    if ($check->fetchColumn() == 0) {
                         $ins = $dbh->prepare("INSERT INTO alternatif_nilai (id_alternatif, id_kriteria, nilai) VALUES (?, ?, ?)");
                         $ins->execute([$id_alt, $id_ktr, (float)$nilai_raw]);
                    }
                }
            }
        }
        $count++;
    }
    echo "Migrated values for $count alternatives.\n";

    // 4. (Optional) Drop columns c1..c11
    // We will comment this out for safety, user can uncomment if satisfied.
    /*
    $alterSql = "ALTER TABLE alternatif ";
    for ($i = 1; $i <= 11; $i++) {
        $alterSql .= "DROP COLUMN c$i";
        if ($i < 11) $alterSql .= ", ";
    }
    // $dbh->exec($alterSql);
    // echo "Dropped old columns c1..c11.\n";
    */

} catch (PDOException $e) {
    echo "Migration failed: " . $e->getMessage();
}
