<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Book Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><a href="index.php"> Library Book Management</a></h1>
    <nav>
        <a href="index.php">Book List</a> |
        <a href="Bookcreate.php">Add New Book</a>
    </nav>
    <hr>

<h2>Books</h2>
    
<?php
include 'C:\xampp\htdocs\Web-Assighn3\db.php';

$sql = "
SELECT *
FROM books
JOIN publisher ON books.publisher_id = publisher.publisher_id
";
$result = $conn->query($sql);

if ($conn->error) {
    die("Query failed: " . $conn->error);
}
?>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Published Year</th>
            <th>Publisher</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo "<tr>";
                echo "<td>" . $row["book_id"] . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["author"] . "</td>";
                echo "<td>" . $row["genre"] . "</td>";
                echo "<td>" . $row["publication_year"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td><a href='Bookupdate.php?id=" . $row['book_id'] . "'>Edit</a> | <a href='Bookdelete.php?id=" . $row['book_id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>0 results</td></tr>";
        }
        ?>
    </tbody>
</table>

