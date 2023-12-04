<!-- admin-login.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="../headerStyle.css">
    <link rel="stylesheet" type="text/css" href="../footerStyle.css">
    <link rel="stylesheet" type="text/css" href="Admin_CSS/admin-login.css">
</head>
<body>

<div class="header">
    <h1>
        <a href="../index.html">
            <img src="../funkyfishlogo.jpg" alt="Fish" class="home-logo"></a> 
        Funky Fish Swim Club Admin Login
    </h1>
</div>

<form action="authenticate.php" method="post">
    Username: <input type="text" name="username" required>
    Password: <input type="password" name="password" required>
 <!--  <a href="new-admin.php"> Create a new admin! </a> -->
    <input type="submit" value="Login">
</form>

</body>
    <!--Start Footer-->
    <footer>
        <img src="../funkyFunLogo.jpg" alt="Funky Fun Logo!" width="150px">
        <p><a href="admin-login.php" title="Admin Login">©</a> 2023 Funky Fish LLC, All Rights Reserved</p>
    </footer>
      <!--End Footer-->
</html>