<?php
include("../db/conn.php");
    $id = $_GET['del'];
    $result = mysqli_query($con, "SELECT * FROM `saved-exercise` WHERE `Save_id` = '$id'");
    $resultCheck = mysqli_fetch_array($result);
    mysqli_query($con, "DELETE FROM `saved-exercise` WHERE `Save_id` = '$id'");
    header("location: patient-view-collection.php");
    $_SESSION['del-message'] = "Removed from your collection";
?>