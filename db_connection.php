<?php
$host = 'localhost';         // Database host
$db   = 'fitzone_db';        // Database name
$user = 'root';              // MySQL username (default for WAMP/XAMPP)
$pass = '';                  // MySQL password (default is empty)
$charset = 'utf8mb4';

// Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Return associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Disable emulated prepared statements
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Connected to FitZone DB successfully!";
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
