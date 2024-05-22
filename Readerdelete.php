<?php include 'header.php'; ?>

<?php
include 'db.php';

if (isset($_GET['id'])) {
  $reader_id = $_GET['id'];

  $stmt = $conn->prepare("DELETE FROM reader WHERE reader_id = ?");
  $stmt->bind_param("i", $reader_id);

  if ($stmt->execute() === TRUE) {
    echo "<p>Reader deleted successfully</p>"
      . "<a href='readerheader.php'>View Readers</a>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
} else {
  echo "<p>No Reader ID specified</p>";
}
?>

<?php include 'footer.php'; ?>
