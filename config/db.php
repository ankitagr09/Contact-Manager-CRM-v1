<?php
// db.php
$host = 'localhost';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass);
// condition if database not exist to create it
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS contact_manager";
if (mysqli_query($conn, $sql)) {
    mysqli_select_db($conn, "contact_manager");
} else {
    die("Error creating database: " . mysqli_error($conn));
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  phone VARCHAR(50),
  email VARCHAR(100),
  notes TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!mysqli_query($conn, $sql)) {
    die("Error creating table: " . mysqli_error($conn));
}
// Set character set to utf8mb4
if (!mysqli_set_charset($conn, "utf8mb4")) {
    die("Error loading character set utf8mb4: " . mysqli_error($conn));
}


?>
