<?php
// session_start();
if(!isset($_SESSION['pno'])){
    header("location: ../login.php");
}
else{
    $phone_num = $_SESSION['pno'];
}
?>
<?php
// Connecting to database 
include("../db/conn.php");
// Initializing error variable
$errors = array();
$getIdQuery = mysqli_query($con, "SELECT `Physio_id` FROM `physiotherapist` WHERE `Physio_phone` = '$phone_num'");
$getID=mysqli_fetch_assoc($getIdQuery);
$physioID = $getID['Physio_id'];
if(isset($_POST['add-time'])){
    // Receiving all inputs from physio-add-time-slots.php
    $slotDate = mysqli_real_escape_string($con, $_POST['date']);
    $slotTime = mysqli_real_escape_string($con, $_POST['time']);
    if(empty($slotDate)){array_push($errors, "Slot Date is required"); echo '<script>alert("Slot Date is required")</script>';}
    if(empty($slotTime)){array_push($errors, "Slot Time is required"); echo '<script>alert("Slot Time is required")</script>';}
    if(count($errors) == 0){
        $addTimeQuery = "INSERT INTO `time-slots` (`Slot_date`, `Slot_time`, `Physio_phone`, `Physio_id`)
        VALUES ('$slotDate', '$slotTime', '$phone_num', '$physioID')";
        mysqli_query($con, $addTimeQuery);
        header("Location: ../PhysiotherapistPanel/physio-add-time-slots.php");
        $_SESSION['up-message']="Record Added Successfully";
    }
}
?>