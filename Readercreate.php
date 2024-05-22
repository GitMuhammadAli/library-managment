<?php
include 'header.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $stmt = $conn->prepare("INSERT INTO reader (first_name, last_name, email, phone, address) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $address);

  if ($stmt->execute() === TRUE) {
    echo "<p>New reader created successfully</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
}
?>

<form method="post" action="Readercreate.php">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br>
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address"><br>
    <input type="submit" value="Add Reader">
</form>

<?php include 'footer.php'; ?>
