<?php
session_start();

// Database connection details
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

// Check if the delete request is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // SQL query to delete the registration
    $deleteSql = "DELETE FROM registrations WHERE id=?";

    // Prepare and bind
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $delete_id);

    // Execute the query
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

// Redirect back to the previous page or the main page after deletion
header("Location: View_Registrations.php");
exit;
?>
