<?php
$target_dir = "../../Schedule_Main/";
$target_file = $target_dir . "FunkyFishSchedule.pdf";
$uploadOk = 1;

// Check if file is a PDF
$fileType = strtolower(pathinfo($_FILES["scheduleFile"]["name"],PATHINFO_EXTENSION));
if($fileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["scheduleFile"]["tmp_name"], $target_file)) {
        $_SESSION['message'] = "Schedule Successfully Updated";
    } else {
        $_SESSION['message'] = "Sorry, there was an error uploading your file.";
    }
}

header('Location: Update_Schedule.php');
exit;
?>
