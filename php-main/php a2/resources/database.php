<?php
// Database credentials
$host = '172.31.22.43';
$db   = 'Aryan200544014';
$user = 'Aryan200544014';
$pass = 'IqdPHo3iQ3';

// Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db";

// PDO options
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Create PDO instance
$pdo = new PDO($dsn, $user, $pass, $opt);
?>
