<?php

$host = 'localhost';      
$dbname = 'signup_db';    // Your database name
$dbuser = 'root';         // Your MySQL username
$dbpass = '';             // Your MySQL password (leave empty for local setup)

try {
    //(connect to the database)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);

    // Set error mode to exceptions to handle errors properly
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();  // Stop further execution if connection fails
}
?>
