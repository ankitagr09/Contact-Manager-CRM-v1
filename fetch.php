<?php
// fetch.php
include 'config/db.php';
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$sql = "SELECT * FROM contacts WHERE name LIKE '%$search%' OR notes LIKE '%$search%'";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
  echo "<tr>
          <td class='name'>{$row['name']}</td>
          <td class='phone'>{$row['phone']}</td>
          <td class='email'>{$row['email']}</td>
          <td class='notes'>{$row['notes']}</td>
          <td>
            <button class='btn btn-sm btn-info editBtn' data-id='{$row['id']}'>Edit</button>
            <button class='btn btn-sm btn-danger deleteBtn' data-id='{$row['id']}'>Delete</button>
          </td>
        </tr>";
}
?>