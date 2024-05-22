<?php include 'header.php'; ?>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $position = $_POST['position'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $stmt = $conn->prepare("INSERT INTO staff (first_name, last_name, position, phone, email) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $first_name, $last_name, $position, $phone, $email);

  if ($stmt->execute() === TRUE) {
    echo "<p>New staff member created successfully</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
}
?>

<form method="post" action="Staffcreate.php">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br>
    <label for="position">Position:</label>
    <input type="text" id="position" name="position" required><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <input type="submit" value="Add Staff">
</form>

<?php include 'footer.php'; ?>
