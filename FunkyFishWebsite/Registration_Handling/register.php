<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $parentName = $conn->real_escape_string($_POST['parentName']);
    $parentEmail = $conn->real_escape_string($_POST['parentEmail']);
    $parentPhone = $conn->real_escape_string($_POST['parentPhone']);
    $childName = $conn->real_escape_string($_POST['childName']);

    // SQL query to insert data
    $sql = "INSERT INTO registrations (parent_name, parent_email, parent_phone, child_name)
            VALUES ('$parentName', '$parentEmail', '$parentPhone', '$childName')";

    // Execute query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>