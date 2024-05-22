<?php include 'C:\xampp\htdocs\Web-Assighn3\header.php'; ?>

<?php
include 'C:\xampp\htdocs\Web-Assighn3\db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $stmt = $conn->prepare("INSERT INTO publisher (name, address, phone, email) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $address, $phone, $email);

  if ($stmt->execute() === TRUE) {
    echo "<p>New publisher created successfully</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
}
?>

<form method="post" action="Publishercreate.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <input type="submit" value="Add Publisher">
</form>

<?php include 'C:\xampp\htdocs\Web-Assighn3\footer.php'; ?>
