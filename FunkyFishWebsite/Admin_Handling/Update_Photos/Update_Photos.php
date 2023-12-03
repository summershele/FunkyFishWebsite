<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin-login.php");
    exit;
}
// Function to get list of photos
function getPhotoList() {
    $photoDir = '../../Rotating_Photos';
    return array_diff(scandir($photoDir), array('..', '.'));
}

// Check if a delete request was made
if (isset($_GET['delete'])) {
    $fileToDelete = '../../Rotating_Photos/' . $_GET['delete'];
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete); // Delete the file
        header("Location: Update_Photos.php"); // Redirect to avoid resubmission
    }
}

// Check if a file is being uploaded
if (isset($_FILES['photoUpload'])) {
    $targetDir = '../../Rotating_Photos/';
    $targetFile = $targetDir . basename($_FILES['photoUpload']['name']);
    move_uploaded_file($_FILES['photoUpload']['tmp_name'], $targetFile);
    header("Location: Update_Photos.php");
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
    <link rel="stylesheet" type="text/css" href="Update_Photos.css">
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


<!-- Display photos -->
<h2>Photo Gallery</h2>
<div class="gallery-grid">
    <?php
    $photos = getPhotoList();
    foreach ($photos as $photo) {
        echo '<div class="gallery-item">';
        echo '<img src="../../Rotating_Photos/' . htmlspecialchars($photo) . '" alt="Gallery Image">';
        echo '<div class="remove-button"><a href="?delete=' . urlencode($photo) . '">Remove</a></div>';
        echo '</div>';
    }
    ?>
</div>

    <!-- Upload new photo -->
<div>
    <h2>Upload New Photo</h2>
    <form action="Update_Photos.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <div class="remove-button">
            <input type="file" name="photoUpload" id="photoUpload">
        </div>
        <div class="remove-button">
            <input type="submit" value="Upload Image" name="submit">
        </div>
        </div>
    </form>
</div>


</body>
    <!--Start Footer-->
    <footer>
        <img src="../../funkyFunLogo.jpg" alt="Funky Fun Logo!" width="150px">
        <p><a href="Admin_Handling/admin-login.php" title="Admin Login">©</a> 2023 Funky Fish LLC, All Rights Reserved</p>
    </footer>
    <!--End Footer-->
</html>