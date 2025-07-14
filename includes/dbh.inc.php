<?php 
$host = 'mysql.railway.internal';
$dbname = 'mariaspostest'; // Ensure this is the correct database name
$dbusername = 'root';
$dbpassword = 'sBvjmATcWGBafojZaynYnauJPFWcAUYK';
$port = "3306"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
