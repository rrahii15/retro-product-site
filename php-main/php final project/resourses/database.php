<?php

// Database configuration
$host = '172.31.22.43'; // database host
$dbName = 'Aryan200544014'; // database name
$username = 'Aryan200544014'; //database username
$password = 'IqdPHo3iQ3'; // database password

// database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
