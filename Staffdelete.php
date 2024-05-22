<?php include 'header.php'; ?>

<?php
include 'db.php';

if (isset($_GET['id'])) {
  $staff_id = $_GET['id'];

  $stmt = $conn->prepare("DELETE FROM staff WHERE staff_id = ?");
  $stmt->bind_param("i", $staff_id);

  if ($stmt->execute() === TRUE) {
    echo "<p>Staff member deleted successfully</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
} else {
  echo "<p>No staff ID specified</p>";
}
?>

<?php include 'footer.php'; ?>
