<?php include 'C:\xampp\htdocs\Web-Assighn3\header.php'; ?>

<?php
include 'C:\xampp\htdocs\Web-Assighn3\db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM books WHERE book_id=$id";
  $result = $conn->query($sql);
  $book = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $genre = $_POST['genre'];
  $publication_year = $_POST['publication_year'];

  $sql = "UPDATE books SET title='$title', author='$author', genre='$genre', publication_year='$publication_year' WHERE book_id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<p>Book updated successfully</p>";
  } else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }
}
?>

<form method="post" action="Bookupdate.php">
    <input type="hidden" name="id" value="<?php echo $book['book_id']; ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo $book['title']; ?>" required><br>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" value="<?php echo $book['author']; ?>" required><br>
    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre" value="<?php echo $book['genre']; ?>" required><br>
    <label for="published_year">Published Year:</label>
    <input type="text" id="published_year" name="published_year" value="<?php echo $book['publication_year']; ?>" required><br>
    <input type="submit" value="Update Book">
</form>

<?php include 'C:\xampp\htdocs\Web-Assighn3\footer.php'; ?>
