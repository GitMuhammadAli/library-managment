<?php
include 'db.php';

$sql = "SELECT * FROM staff";
$result = $conn->query($sql);
?>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["staff_id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["position"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td> <a href='Staffupdate.php?id=" . $row['staff_id'] . "'>Edit</a> | <a href='Staffdelete.php?id=" . $row['staff_id'] . "' onclick=\"return confirm('Are you sure you want to delete this staff member?');\">Delete</a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='7'>No staff members found</td></tr>";
        }
        ?>
    </tbody>
</table>

