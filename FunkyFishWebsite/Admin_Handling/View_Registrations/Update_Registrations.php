<?php
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

      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        $id = $_POST['id'];
        $parent_name = $_POST['parent_name'];
        $parent_email = $_POST['parent_email'];
        $parent_phone = $_POST['parent_phone'];
        $child_name = $_POST['child_name'];
    
        //Debugging
        echo "Received values - ID: $id, Parent Name: $parent_name, Parent Email: $parent_email, Parent Phone: $parent_phone, Child Name: $child_name";
    

        // Prepare and bind
        $stmt = $conn->prepare("UPDATE registrations SET parent_name=?, parent_email=?, parent_phone=?, child_name=? WHERE id=?");
        $stmt->bind_param("ssssi", $parent_name, $parent_email, $parent_phone, $child_name, $id);
    
        // Execute the query
        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    
        // Close statement
        $stmt->close();
    }
    
// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin-login.php");
    exit;
}

?>