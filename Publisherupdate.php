<?php include 'header.php'; ?>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $publisher_id = $_POST['publisher_id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $stmt = $conn->prepare("UPDATE publisher SET name = ?, address = ?, phone = ?, email = ? WHERE publisher_id = ?");
  $stmt->bind_param("ssssi", $name, $address, $phone, $email, $publisher_id);

  if ($stmt->execute() === TRUE) {
    echo "<p>Publisher updated successfully</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
} else {
  if (isset($_GET['id'])) {
    $publisher_id = $_GET['id'];

    $sql = "SELECT * FROM publisher WHERE publisher_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $publisher_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $publisher = $result->fetch_assoc();
    } else {
      echo "<p>No publisher found with ID " . $publisher_id . "</p>";
    }

    $stmt->close();
  }
}
?>

<?php if (isset($publisher)): ?>
    <form method="post" action="update_publisher.php">
        <input type="hidden" name="publisher_id" value="<?php echo $publisher['publisher_id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $publisher['name']; ?>" required><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $publisher['address']; ?>" required><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $publisher['phone']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $publisher['email']; ?>" required><br>
        <input type="submit" value="Update Publisher">
    </form>
<?php endif; ?>

<?php include 'footer.php'; ?>
