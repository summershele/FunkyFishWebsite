<?php
session_start();

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../Admin_CSS/admin-header.css">
    <link rel="stylesheet" type="text/css" href="../../footerStyle.css">
    <link rel="stylesheet" type="text/css" href="View_Registrations.css">
</head>
<body>

<!--header -->
<div class="header">
            <h1>    
              <a href="../admin-dashboard.php">
                  <img src="../../funkyfishlogo.jpg" alt="Fish" class="home-logo"></a> 
              Funky Fish Swim Club
          </h1>
              
          <ul id="navbar" class="nav">
              <li><a href="../Update_Photos/Update_Photos.php">Update Photos</a></li>
              <li><a href="../Update_News/Update_News.php">Update News</a></li>
              <li><a href="../Update_Schedule/Update_Schedule.php">Update Schedule</a></li>
              <li><a href="../Update_Team_Info/Update_Team_Info.php">Update Team Info</a></li>
              <li><a href="../Update_Pools/Update_Pools.php">Update Pools</a></li>
              <li><a href="../View_Registrations/View_Registrations.php">View Registrations</a></li>
          </ul>
      </div>        
    
      <!--end header--> 
      <a href="../logout.php">Logout</a>
      <?php
      // Query to fetch data
      $sql = "SELECT id, parent_name, parent_email, parent_phone, child_name FROM registrations";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
          // Output data of each row as a table
          echo "<table class='table-data'>";
          echo "<tr><th>ID</th><th>Parent Name</th><th>Parent Email</th><th>Parent Phone</th><th>Child Name</th><th>Remove</th></tr>";
          while($row = $result->fetch_assoc()) {
              echo "<tr><td>".$row["id"]."</td><td>".$row["parent_name"]."</td><td>".$row["parent_email"]."</td><td>".$row["parent_phone"]."</td><td>".$row["child_name"]."</td><td><form method='post' action='Delete_Registrations.php'><input type='hidden' name='delete_id' value='".$row["id"]."'><input type='submit' name='delete' value='Delete'></form></td></tr>";
          }
          echo "</table>";
      } else {
          echo "0 results";
      }  
      ?>

      <!-- Update Form -->
      
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="update-form">
    <h2>Update Registration</h2>
    Register ID: <input type="text" name="id" id="update_id"><br>
    Parent Name: <input type="text" name="parent_name" id="update_parent_name"><br>
    Parent Email: <input type="email" name="parent_email" id="update_parent_email"><br>
    Parent Phone: <input type="text" name="parent_phone" id="update_parent_phone"><br>
    Child Name: <input type="text" name="child_name" id="update_child_name"><br>
    <input type="submit" name="update" value="Update Registration">
    </form>
<!--Start Footer-->
    <footer>
        <img src="../../funkyFunLogo.jpg" alt="Funky Fun Logo!" width="150px">
        <p><a href="Admin_Handling/admin-login.php" title="Admin Login">©</a> 2023 Funky Fish LLC, All Rights Reserved</p>
    </footer>
    <!--End Footer-->
</body>
    
</html>