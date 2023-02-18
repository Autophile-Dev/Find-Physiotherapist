<?php
include("../db/conn.php");
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $result = mysqli_query($con, "SELECT * FROM `exercise` WHERE `Exercise_id` = '$id'");
    $resultCheck = mysqli_fetch_array($result);
    mysqli_query($con, "DELETE FROM `exercise` WHERE `Exercise_id` = '$id'");
    header("location: physio-view-exercise.php");
}
?>