
<?php
include 'db.php';

$sql = "SELECT * FROM publisher";
$result = $conn->query($sql);
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
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
            echo "<td>" . $row["publisher_id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td> <a href='Publisherupdate.php?id=" . $row['publisher_id'] . "'>Edit</a> | <a href='Publisherdelete.php?id=" . $row['publisher_id'] . "' onclick=\"return confirm('Are you sure you want to delete this publisher?');\">Delete</a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No publishers found</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>
