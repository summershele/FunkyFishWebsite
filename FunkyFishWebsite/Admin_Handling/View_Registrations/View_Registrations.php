<?php
session_start();

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
</head>
<body>

<!--header -->
<div class="header">
          <h1>
              <a href="../../index.html">
                  <img src="../../funkyfishlogo.jpg" alt="Fish" class="home-logo"></a> 
              Funky Fish Swim Club
          </h1>
              
          <ul id="navbar" class="nav">
              <li><a href="index.html"></a>Update Photos</li>
              <li><a href="News_Main/news.html">Update News</a></li>
              <li><a href="Schedule_Main/schedule.html">Update Schedule</a></li>
              <li><a href="TeamInfo_Main/teamInfo.html">Update Team Info</a></li>
              <li><a href="Pools_Main/pools.html">Update Pools</a></li>
              <li><a href="JoinFFSC_Main/joinFFSC.html">View Registrations</a></li>
              <li><a href="Parents_Main/parents.html">Update Parents</a></li>
          </ul>
      </div>        
    
      <!--end header--> 

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
      
      // Query to fetch data
      $sql = "SELECT id, parent_name, parent_email, parent_phone, child_name FROM registrations";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
          // Output data of each row as a table
          echo "<table border='1'>";
          echo "<tr><th>ID</th><th>Parent Name</th><th>Parent Email</th><th>Parent Phone</th><th>Child Name</th></tr>";
          while($row = $result->fetch_assoc()) {
              echo "<tr><td>".$row["id"]."</td><td>".$row["parent_name"]."</td><td>".$row["parent_email"]."</td><td>".$row["parent_phone"]."</td><td>".$row["child_name"]."</td></tr>";
          }
          echo "</table>";
      } else {
          echo "0 results";
      }
      
      // Close connection
      $conn->close();
      ?>

</body>
    <!--Start Footer-->
    <footer>
        <img src="../../funkyFunLogo.jpg" alt="Funky Fun Logo!" width="150px">
        <p><a href="Admin_Handling/admin-login.php" title="Admin Login">©</a> 2023 Funky Fish LLC, All Rights Reserved</p>
    </footer>
    <!--End Footer-->
</html>