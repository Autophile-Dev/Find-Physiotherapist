<?php
include("../db/conn.php");
session_start();
if(!isset($_SESSION['pno'])){
    header("location: ../login.php");
}
else{
    $phone_num = $_SESSION['pno'];
}
// Variables required for storing patient info (Request send by the patient) in request table
$patientID = '';
$patientName = '';
$patientPhone = '';
// Variables required for storing time slot information (Selected schedule) in request table
$slotID = '';
$slotDate = '';
$slotTime = '';
// Variables required for storing physiotherapist info (Request sended to the physiotherapist)
$physioID = '';
$physioName = '';
$physioPhone = '';
$buttonText = "Request";
if(isset($_GET['request'])){
    $buttonText = "Requested";
    $slotID = $_GET['request'];
    $resultSlot = mysqli_query($con, "SELECT * FROM `time-slots` WHERE `Slot_id` = '$slotID'");
    $checkSlot = mysqli_fetch_array($resultSlot);
    $slotDate = $checkSlot['Slot_date'];
    $slotTime = $checkSlot['Slot_time'];
    // For getting physiotherapist values
    $physioID = $checkSlot['Physio_id'];
    $resultPhysio = mysqli_query($con, "SELECT * FROM `physiotherapist` WHERE `Physio_id` = '$physioID'");
    $checkPhysio = mysqli_fetch_array($resultPhysio);
    $physioName = $checkPhysio['Physio_name'];
    $physioPhone = $checkPhysio['Physio_phone'];
    // For getting patient values
    $resultPatient = mysqli_query($con, "SELECT * FROM `patient` WHERE `Patient_phone` = '$phone_num'");
    $checkPatient = mysqli_fetch_array($resultPatient);
    $patientID = $checkPatient['Patient_id'];
    $patientName = $checkPatient['Patient_name'];
    $patientPhone = $checkPatient['Patient_phone'];
    // Check record of request in request table 
    $checkRecord = "SELECT * FROM `request` WHERE `Patient_id` = '$patientID' AND `Slot_id` = '$slotID' AND `Physio_id` = '$physioID' AND `Request_status` = 'Pending'";
    $request = mysqli_query($con, $checkRecord);
    $record = mysqli_fetch_assoc($request);
    if($record){
        if($record['Patient_id'] === $patientID && $record['Slot_id'] === $slotID && $record['Physio_id'] === $physioID){
         echo '<script>alert("Requested")</script>';
         $_SESSION['exist'] = "Already Requested";
         header("Location: ../UserPanel/physiotherapist-view.php");
         
    }
}
    else{
    // Insert Values in request table when clicking on send request button
    $insertRequest = mysqli_query($con, "INSERT INTO `request` (`Patient_id`, `Patient_name`, `Patient_phone`, 
    `Slot_id`, `Slot_time`, `Slot_date`, `Physio_id`, `Physio_name`, `Physio_phone`, `Request_status`)
    VALUES ('$patientID', '$patientName', '$patientPhone', '$slotID', '$slotTime', '$slotDate',
    '$physioID', '$physioName', '$physioPhone', 'Pending')");
    header("Location: ../UserPanel/physiotherapist-view.php");
    $_SESSION['sent'] = "Your request is sended";
}
}
?>