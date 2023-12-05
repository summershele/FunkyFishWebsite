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

// Flag to track registration status
$registrationSuccessful = false;

//sanitize the input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function removeSpecialChars($data) {
    // Removes < and > characters
    $data = str_replace("<", "", $data);
    $data = str_replace(">", "", $data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Apply sanitization and remove special characters
    $parentName = removeSpecialChars(sanitizeInput($_POST['parentName']));
    $parentEmail = removeSpecialChars(sanitizeInput($_POST['parentEmail']));
    $parentPhone = removeSpecialChars(sanitizeInput($_POST['parentPhone']));
    $childName = removeSpecialChars(sanitizeInput($_POST['childName']));

    // SQL query to insert data
    $sql = "INSERT INTO registrations (parent_name, parent_email, parent_phone, child_name)
            VALUES ('$parentName', '$parentEmail', '$parentPhone', '$childName')";

    // Execute query and check for success
    if ($conn->query($sql) === TRUE) {
        $registrationSuccessful = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

// Redirect after successful registration
if ($registrationSuccessful) {
    echo "<script>alert('Registration successful!');</script>";
    header("Refresh:3; url=../index.html");
}
?>
