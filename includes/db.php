<?php
// db.php
require_once __DIR__ . '/../config/config.php';  // Config file ka path adjust karo apne project structure ke mutabiq

try {
    // PDO connection create karo
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

    // Error mode set karo to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // UTF-8 charset set karo
    $pdo->exec("set names utf8");

} catch (PDOException $e) {
    // Agar connection fail ho to message show karo
    die("Database connection failed: " . $e->getMessage());
}
?>
