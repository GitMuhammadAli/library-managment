<?php include 'header.php'; ?>

<?php
include 'db.php';

if (isset($_GET['id'])) {
  $publisher_id = $_GET['id'];

  $stmt = $conn->prepare("DELETE FROM publisher WHERE publisher_id = ?");
  $stmt->bind_param("i", $publisher_id);

  if ($stmt->execute() === TRUE) {
    echo "<p>Publisher deleted successfully</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
} else {
  echo "<p>No publisher ID specified</p>";
}
?>

<?php include 'footer.php'; ?>
