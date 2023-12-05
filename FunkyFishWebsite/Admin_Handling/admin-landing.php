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
    <link rel="stylesheet" type="text/css" href="../headerStyle.css">
    <link rel="stylesheet" type="text/css" href="../footerStyle.css">
    <link rel="icon" href="../funkyFunLogo.jpg" type="image/ico">
    <title>Admin Landing</title>
    
    <title>Admin Dashboard</title>
</head>
<body>
    
    <h1>Welcome to the Admin Dashboard</h1>
    <p>You are logged in!</p>
    <a href="logout.php">Logout</a>
</body>


</html>