<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin-login.php");
    exit;
}

<!-- Display Embedded PDFs -->
$pdfFolder = 'path/to/pdf/folder/';
$pdfs = glob($pdfFolder . '*.pdf');

foreach ($pdfs as $pdf) {
    echo '<embed src="' . $pdf . '" type="application/pdf" width="600" height="400">';
}

if ($_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
    $pdfFolder = 'path/to/pdf/folder/';
    $pdfName = $_FILES['pdfFile']['name'];
    $pdfPath = $pdfFolder . $pdfName;

    // Move the uploaded PDF to the designated folder
    move_uploaded_file($_FILES['pdfFile']['tmp_name'], $pdfPath);

    // Update database or any other relevant tracking logic
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

    <!-- Admin Page for Uploading/Updating PDFs -->
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="pdfFile">Upload/Update PDF:</label>
    <input type="file" name="pdfFile" id="pdfFile">
    <input type="submit" value="Upload/Update">
</form>

</body>
    <!--Start Footer-->
    <footer>
        <img src="../funkyFunLogo.jpg" alt="Funky Fun Logo!" width="150px">
        <p><a href="Admin_Handling/admin-login.php" title="Admin Login">©</a> 2023 Funky Fish LLC, All Rights Reserved</p>
    </footer>
    <!--End Footer-->
</html>