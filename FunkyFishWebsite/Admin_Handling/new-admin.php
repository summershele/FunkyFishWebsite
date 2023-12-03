<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "admintasks";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Replace with your desired admin username and password
$newAdminUsername = "jgillis1";
$newAdminPassword = "password";

// Hash the password
$hashedPassword = password_hash($newAdminPassword, PASSWORD_DEFAULT);

// Prepare and execute the SQL statement
$sql = "INSERT INTO admin_users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $newAdminUsername, $hashedPassword);

if ($stmt->execute()) {
    echo "New admin user added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>