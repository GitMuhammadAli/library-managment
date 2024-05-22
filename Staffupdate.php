<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $staff_id = $_POST['staff_id'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $position = $_POST['position'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];

  $stmt = $conn->prepare("UPDATE staff SET first_name = ?, last_name = ?, position = ?, phone = ?, email = ? WHERE staff_id = ?");
  $stmt->bind_param("sssssi", $first_name, $last_name, $position, $phone, $email, $staff_id);

  if ($stmt->execute() === TRUE) {
    echo "<p>Staff member updated successfully</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
} else {
  if (isset($_GET['id'])) {
    $staff_id = $_GET['id'];

    $sql = "SELECT * FROM staff WHERE staff_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staff_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $staff = $result->fetch_assoc();
    } else {
      echo "<p>No staff member found with ID " . $staff_id . "</p>";
    }

    $stmt->close();
  }
}
?>

<?php include 'header.php'; ?>

<?php if (isset($staff)): ?>
          <form method="post" action="Staffupdate.php">
              <input type="hidden" name="staff_id" value="<?php echo $staff['staff_id']; ?>">
              <label for="first_name">First Name:</label>
              <input type="text" id="first_name" name="first_name" value="<?php echo $staff['first_name']; ?>" required><br>
              <label for="last_name">Last Name:</label>
              <input type="text" id="last_name" name="last_name" value="<?php echo $staff['last_name']; ?>" required><br>
              <label for="position">Position:</label>
              <input type="text" id="position" name="position" value="<?php echo $staff['position']; ?>" required><br>
              <label for="phone">Phone:</label>
              <input type="text" id="phone" name="phone" value="<?php echo $staff['phone']; ?>" required><br>
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" value="<?php echo $staff['email']; ?>" required><br>
              <input type="submit" value="Update Staff">
          </form>
<?php endif; ?>

<?php include 'footer.php'; ?>
