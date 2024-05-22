<?php include 'C:\xampp\htdocs\Web-Assighn3\header.php'; ?>


<?php
include 'C:\xampp\htdocs\Web-Assighn3\db.php';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM books WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<p>Book deleted successfully</p>";
  } else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }
}
?>

<a href="index.php">Back to Book List</a>

<?php include 'C:\xampp\htdocs\Web-Assighn3\footer.php'; ?>

