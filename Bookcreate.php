<?php include 'C:\xampp\htdocs\Web-Assighn3\header.php'; ?>

<?php
include 'C:\xampp\htdocs\Web-Assighn3\db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $genre = $_POST['genre'];
  $published_year = $_POST['published_year'];
  $publisher_id = $_POST['publisher_id'];

  $stmt = $conn->prepare("INSERT INTO books (title, author, genre, publication_year, publisher_id) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssii", $title, $author, $genre, $published_year, $publisher_id);

  if ($stmt->execute() === TRUE) {
    echo "<p>New book created successfully</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
}
?>

<form method="post" action="Bookcreate.php">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required><br>
    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" required><br>
    <label for="published_year">Published Year:</label>
    <input type="text" id="published_year" name="published_year" required><br>
    <label for="publisher_id">Publisher:</label>
    <select id="publisher_id" name="publisher_id" required>
        <?php
        $sql = "SELECT publisher_id, name FROM publisher";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["publisher_id"] . "'>" . $row["name"] . "</option>";
          }
        } else {
          echo "<option value=''>No publishers available</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="Add Book">
</form>

<?php include 'C:\xampp\htdocs\Web-Assighn3\footer.php'; ?>
