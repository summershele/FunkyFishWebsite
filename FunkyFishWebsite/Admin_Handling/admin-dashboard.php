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
    <link rel="stylesheet" type="text/css" href="../headerStyle.css">
    <link rel="stylesheet" type="text/css" href="../footerStyle.css">
</head>
<body>

<div class="header">
    <h1>
        <a href="../index.html">
            <img src="../funkyfishlogo.jpg" alt="Fish" class="home-logo"></a> 
        Administration Page
    </h1>
</div>


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