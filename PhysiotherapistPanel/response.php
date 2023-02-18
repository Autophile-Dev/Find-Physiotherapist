<?php
session_start();
if(!isset($_SESSION['pno'])){
    header("location: ../login.php");
}
else{
    $phone_num = $_SESSION['pno'];
}
include("../db/conn.php");
        $requestID = '';
        if(isset($_GET['accept'])){
        $requestID = $_GET['accept'];
        // echo $requestID;
        // echo "Accepted";
    
        $responseResult = mysqli_query($con, "SELECT * FROM `request` WHERE `Request_id` = '$requestID'");
        $result = mysqli_fetch_assoc($responseResult);
        $slotID = $result['Slot_id'];
        $slotTime = $result['Slot_time'];
        $slotDate = $result['Slot_date'];
        $patientID = $result['Patient_id'];
        $patientName = $result['Patient_name'];
        $patientPhone = $result['Patient_phone'];
        $physioID = $result['Physio_id'];
        $physioName = $result['Physio_name'];
        $checkRecord = "SELECT * FROM `request-response` WHERE `Slot_id` = '$slotID' AND
        `Patient_id` = '$patientID' AND `Physio_id` = '$physioID' AND `Slot_time` = '$slotTime' AND 
        `Slot_date` = '$slotDate' AND `Physio_phone` = '$phone_num'";
        $recResult = mysqli_query($con, $checkRecord);
        $rec = mysqli_fetch_assoc($recResult);
        if($rec){
            header("Location: ../PhysiotherapistPanel/physio-view-patients.php");
            $_SESSION['already'] = "Already Accepted";
            $delRecord = "DELETE FROM `request` WHERE `Request_id` = '$requestID'";
            mysqli_query($con, $delRecord);
        }
        else if(!$rec){
            header("Location: ../PhysiotherapistPanel/physio-request-response");
            $insertRec = "INSERT INTO `request-response`(`Request_id`, `Patient_id`, `Physio_id`, `Slot_id`,
            `Slot_date`, `Slot_time`, `Patient_name`, `Patient_phone`, `Physio_name`, `Physio_phone`, `Request_status`)
            VALUES ('$requestID', '$patientID', '$physioID', '$slotID', '$slotDate', '$slotTime',
            '$patientName', '$patientPhone', '$physioName', '$phone_num', 'Accepted')";
            mysqli_query($con, $insertRec);
            // Insert record in meeting table after accepting request
            $insertMeeting = "INSERT INTO `meeting` (`Request_id`, `Patient_id`, `Physio_id`, `Slot_id`, `Slot_date`, 
            `Slot_time`, `Patient_name`, `Patient_phone`, `Physio_name`, `Physio_phone`) VALUES ('$requestID', '$patientID', '$physioID', 
            '$slotID', '$slotDate', '$slotTime', '$patientName', '$patientPhone', '$physioName', '$phone_num')";
            mysqli_query($con, $insertMeeting);
            $delRequest = "DELETE FROM `request` WHERE `Request_id` = '$requestID'";
            mysqli_query($con, $delRequest);
            header("Location: ../PhysiotherapistPanel/physio-view-patients.php");
            $_SESSION['accept-req'] = "Request Accepted";
        }
        else{
            echo '<script>alert("Something went wrong in the system")</script>';
        }
    }

    elseif(isset($_GET['reject'])){
    $requestID = $_GET['reject'];
    // echo $requestID;
    // echo "Rejected";
    $responseResult = mysqli_query($con, "SELECT * FROM `request` WHERE `Request_id` = '$requestID'");
    $result = mysqli_fetch_assoc($responseResult);
    $slotID = $result['Slot_id'];
    $slotTime = $result['Slot_time'];
    $slotDate = $result['Slot_date'];
    $patientID = $result['Patient_id'];
    $patientName = $result['Patient_name'];
    $patientPhone = $result['Patient_phone'];
    $physioID = $result['Physio_id'];
    $physioName = $result['Physio_name'];
    $checkRecord = "SELECT * FROM `request-response` WHERE `Slot_id` = '$slotID' AND
    `Patient_id` = '$patientID' AND `Physio_id` = '$physioID' AND `Slot_time` = '$slotTime' AND 
    `Slot_date` = '$slotDate' AND `Physio_phone` = '$phone_num'";
    $recResult = mysqli_query($con, $checkRecord);
    $rec = mysqli_fetch_assoc($recResult);
    if($rec){
        header("Location: ../PhysiotherapistPanel/physio-view-patients.php");
        $_SESSION['already-reject'] = "Already Rejected";
        $delRecord = "DELETE FROM `request` WHERE `Request_id` = '$requestID'";
        mysqli_query($con, $delRecord);
    }
    else if(!$rec){
        $insertRec = "INSERT INTO `request-response`(`Request_id`, `Patient_id`, `Physio_id`, `Slot_id`,
        `Slot_date`, `Slot_time`, `Patient_name`, `Patient_phone`, `Physio_name`, `Physio_phone`, `Request_status`)
        VALUES ('$requestID', '$patientID', '$physioID', '$slotID', '$slotDate', '$slotTime',
        '$patientName', '$patientPhone', '$physioName', '$phone_num', 'Rejected')";
        mysqli_query($con, $insertRec);
        $delRequest = "DELETE FROM `request` WHERE `Request_id` = '$requestID'";
        mysqli_query($con, $delRequest);
        header("Location: ../PhysiotherapistPanel/physio-view-patients.php");
        $_SESSION['reject-req'] = "Request Rejected";
    }
    else{
        echo '<script>alert("Something went wrong in the system")</script>';
    }
}

?>