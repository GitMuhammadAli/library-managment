<?php
include 'db.php';

$sql = "SELECT * FROM reader";
$result = $conn->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["reader_id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td> <a href='Readerupdate.php?id=" . $row['reader_id'] . "'>Edit</a> | <a href='Readerdelete.php?id=" . $row['reader_id'] . "' onclick=\"return confirm('Are you sure you want to delete this reader?');\">Delete</a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='7'>No readers found</td></tr>";
        }
        ?>