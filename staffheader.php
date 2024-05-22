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
        <a href="staffheader.php">Staff List</a> 
        <a href="Staffcreate.php">Add New Staff</a>
    </nav>
    <hr>
<h2>Staff</h2>
    <?php
    include 'StaffView.php';
    ?>
<?php include 'footer.php'; ?>
