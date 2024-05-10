<?php
$conn = new mysqli("localhost", "root", "", "sign up");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$description = $_POST['description'];

// Create table query
$tableQuery = "CREATE TABLE IF NOT EXISTS `$title` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255),
    `rollno` VARCHAR(255),
    `branch` VARCHAR(255),
    `year` INT(10)
)";

// Insert event details
$sql = "INSERT INTO events (title, description) VALUES ('$title', '$description')";

// Execute table creation query
if ($conn->query($tableQuery) === TRUE) {
    // Execute insert query if table creation is successful
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Event added successfully</h1>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
