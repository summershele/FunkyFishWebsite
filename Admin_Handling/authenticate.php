
<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "admintasks";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM admins WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            if (password_verify($password, $admin['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['admin_id'] = $admin['id'];
                header("Location: admin-dashboard.php"); // Redirect to admin dashboard
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "No admin with that username found.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

