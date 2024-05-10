<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "sign up");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $branch = $_POST['branch'];
    $year = $_POST['year'];

    // SQL query to insert data into the table
    $sql = "INSERT INTO $title (name, rollno, branch, year) 
            VALUES ('$name', '$rollno', '$branch', '$year')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Successfully registered";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
