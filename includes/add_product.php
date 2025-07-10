<?php
session_start();
include 'dbh.inc.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs (ensure to do this properly for production)
    $name = $_POST['name'];
    $description = $_POST['description'];
    $ogprice = $_POST['ogprice'];
    $price = $_POST['price'];

    // Prepare SQL statement
    $sql = "INSERT INTO products (prdname, description, original_price, selling_price) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->execute([$name, $description, $ogprice, $price]);

    // Respond with success message or handle errors
    echo json_encode(array("message" => "Product added successfully"));
} else {
    // Handle invalid request
    http_response_code(400);
    echo json_encode(array("message" => "Invalid request"));
}
?>

