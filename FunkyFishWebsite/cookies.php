<?php
// Set a cookie
$cookieName = "username";
$cookieValue = "John";
$expirationDate = time() + 3600; // Expires in 1 hour

setcookie($cookieName, $cookieValue, $expirationDate, "/");

// Retrieve a cookie
if (isset($_COOKIE["username"])) {
    $cookieValue = $_COOKIE["username"];
    echo "Welcome back, $cookieValue!";
} else {
    echo "No cookie found.";
}

// Rest of your PHP code
// ...
?>
