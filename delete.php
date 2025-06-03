<?php
// delete.php
include 'config/db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM contacts WHERE id=$id");
?>

