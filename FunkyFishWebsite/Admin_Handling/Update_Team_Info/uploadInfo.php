<?php
// session_start();

// // Check if the user is logged in, if not redirect to login page
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header("Location: admin-login.php");
//     exit;
// }

$pdfFolder = '../../TeamInfo_Main/records';
$pdfs = glob($pdfFolder . '*.pdf');

foreach ($pdfs as $pdf) {
    echo '<embed src="' . $pdf . '" type="application/pdf" width="600" height="400">';
}

if ($_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
    $pdfFolder = '../../TeamInfo_Main/records/';
    $pdfName = $_FILES['pdfFile']['name'];
    $pdfPath = $pdfFolder . $pdfName;

    // Move the uploaded PDF to the designated folder
    move_uploaded_file($_FILES['pdfFile']['tmp_name'], $pdfPath);

    // Update database or any other relevant tracking logic
}
?>