<?php
// export.php
include 'config/db.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="contacts.csv"');
$output = fopen('php://output', 'w');
fputcsv($output, ['Name', 'Phone', 'Email', 'Notes']);
$result = $conn->query("SELECT * FROM contacts");
while ($row = $result->fetch_assoc()) {
  fputcsv($output, [$row['name'], $row['phone'], $row['email'], $row['notes']]);
}
fclose($output);
?>