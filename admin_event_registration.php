<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "sign up");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve title from the URL parameter
if(isset($_POST['title'])) {
    $title = $_POST['title'];
    // Fetch data from the specified table based on the title
    $sql = "SELECT * FROM `$title`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='event-table'>";
        echo "<h2>Event Name: $title</h2>";
        echo "<table class='styled-table'>";
        echo "<thead><tr>
                <th>S.NO</th>
               <th>Name</th>
               <th>Roll No</th>
               <th>Branch</th>
               <th>Year</th>
               </tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['rollno'] . "</td>";
            echo "<td>" . $row['branch'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='no-data'>No registrations found: $title</div>";
    }
} else {
    echo "<div class='error'>Title not found.</div>";
}
$conn->close();
?>
<html>
    <body>
        <style>
            /* CSS Styles */
.event-table {
    margin-top: 20px;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
}

.styled-table th, .styled-table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.styled-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.no-data, .error {
    padding: 10px;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
    margin-top: 20px;
}

            </style>
    </body>
    </html>