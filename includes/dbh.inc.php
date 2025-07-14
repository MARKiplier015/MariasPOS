<?php 
$host = 'nozomi.proxy.rlwy.net';
$dbname = 'railway'; // Ensure this is the correct database name
$dbusername = 'root';
$dbpassword = 'sBvjmATcWGBafojZaynYnauJPFWcAUYK';
$port = "28095"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
