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
    <link rel="icon" href="../funkyFunLogo.jpg" type="image/ico">
    <title>Admin Dashboard</title>
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
            <li><a href="Update_Photos/Update_Photos.php">Update Photos</a></li>
            <li><a href="Update_News/Update_News.php">Update News</a></li>
            <li><a href="Update_Schedule/Update_Schedule.php">Update Schedule</a></li>
            <li><a href="Update_Team_Info/Update_Team_Info.php">Update Team Info</a></li>
            <li><a href="Update_Pools/Update_Pools.php">Update Pools</a></li>
            <li><a href="View_Registrations/View_Registrations.php">View Registrations</a></li>
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
        <p>© 2023 Funky Fish LLC, All Rights Reserved</p>
    </footer>
    <!--End Footer-->
</html>