
<?php
// edit.php
include 'config/db.php';
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$notes = $_POST['notes'];
$conn->query("UPDATE contacts SET name='$name', phone='$phone', email='$email', notes='$notes' WHERE id=$id");
?>
