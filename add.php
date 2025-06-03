<?php
// add.php
include 'config/db.php';
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$notes = $_POST['notes'];
$conn->query("INSERT INTO contacts (name, phone, email, notes) VALUES ('$name', '$phone', '$email', '$notes')");
?>
