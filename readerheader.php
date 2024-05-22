<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Book Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><a href="index.php"> Library Book Management</a></h1>

    
    <nav>
         <a href="Readerview.php">Reader List</a>
        <a href="Readercreate.php">Add New Reader</a>
    </nav>
    <hr>
    <h2>Reader</h2>

    <?php
    include 'ReaderView.php';
    ?>