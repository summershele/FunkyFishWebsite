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
    <link rel="stylesheet" type="text/css" href="Admin_CSS/admin-header.css">
    <link rel="stylesheet" type="text/css" href="../footerStyle.css">
</head>
<body>

<!--header -->
<div class="header">
          <h1>
              <a href="../index.html">
                  <img src="../funkyfishlogo.jpg" alt="Fish" class="home-logo"></a> 
              Funky Fish Swim Club
          </h1>
              
          <ul id="navbar" class="nav">
              <li><a href="Update_News/Update_News.html"></a>Update Photos</li>
              <li><a href="Update_Parents/Update_Parents.html">Update News</a></li>
              <li><a href="Schedule_Main/schedule.html">Update Schedule</a></li>
              <li><a href="TeamInfo_Main/teamInfo.html">Update Team Info</a></li>
              <li><a href="Pools_Main/pools.html">Update Pools</a></li>
              <li><a href="View_Registrations/View_Registrations.php">View Registrations</a></li>
              <li><a href="Parents_Main/parents.html">Update Parents</a></li>
          </ul>
      </div>        
    
      <!--end header--> 

    <h1>Welcome to the Admin Dashboard</h1>
    <p>You are logged in!</p>
    <a href="logout.php">Logout</a>

</body>
    <!--Start Footer-->
    <footer>
        <img src="../funkyFunLogo.jpg" alt="Funky Fun Logo!" width="150px">
        <p><a href="Admin_Handling/admin-login.php" title="Admin Login">©</a> 2023 Funky Fish LLC, All Rights Reserved</p>
    </footer>
    <!--End Footer-->
</html>