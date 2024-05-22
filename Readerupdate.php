<?php
include 'header.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $reader_id = $_POST['reader_id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $stmt = $conn->prepare("UPDATE reader SET first_name = ?, last_name = ?, email = ?, phone = ?, address = ? WHERE reader_id = ?");
  $stmt->bind_param("sssssi", $first_name, $last_name, $email, $phone, $address, $reader_id);

  if ($stmt->execute() === TRUE) {
    echo "<p>Reader updated successfully</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
} else {
  if (isset($_GET['id'])) {
    $reader_id = $_GET['id'];

    $sql = "SELECT * FROM reader WHERE reader_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $reader_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $reader = $result->fetch_assoc();
    } else {
      echo "<p>No reader found with ID " . $reader_id . "</p>";
    }

    $stmt->close();
  }
}
?>

<?php if (isset($reader)): ?>
          <form method="post" action="Readerupdate.php">
              <input type="hidden" name="reader_id" value="<?php echo $reader['reader_id']; ?>">
              <label for="first_name">First Name:</label>
              <input type="text" id="first_name" name="first_name" value="<?php echo $reader['first_name']; ?>" required><br>
              <label for="last_name">Last Name:</label>
              <input type="text" id="last_name" name="last_name" value="<?php echo $reader['last_name']; ?>" required><br>
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" value="<?php echo $reader['email']; ?>" required><br>
              <label for="phone">Phone:</label>
              <input type="text" id="phone" name="phone" value="<?php echo $reader['phone']; ?>" required><br>
              <label for="address">Address:</label>
              <input type="text" id="address" name="address" value="<?php echo $reader['address']; ?>"><br>
              <input type="submit" value="Update Reader">
          </form>
<?php endif; ?>

<?php include 'footer.php'; ?>
