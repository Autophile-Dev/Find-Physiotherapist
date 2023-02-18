<?php
//     if($_REQUEST['del']){
//     $id = $_GET['del'];
//     mysqli_query($con, "DELETE FROM `physiotherapist` WHERE `Physio_id` = '$id'");
//     header("location: admin-view-therapist.php");
//     $_SESSION['message'] = "Record Deleted Successfully";
// }
include("../db/conn.php");
// include("includes/delete.php");
        // Displayed selected user data based on id
        // Getting ID of Physiotherapist from url
        if(isset($_GET['del'])){
        $id = $_GET['del'];
        // Fetch user data based on id
        $result = mysqli_query($con, "SELECT * FROM `physiotherapist` WHERE `Physio_id` = '$id'");
        $resultCheck = mysqli_fetch_array($result);
        mysqli_query($con, "DELETE FROM `physiotherapist` WHERE `Physio_id` = '$id'");
        header("location: admin-view-therapist.php");
        $_SESSION['del-message'] = "Record Deleted Successfully";
        
    }
?>