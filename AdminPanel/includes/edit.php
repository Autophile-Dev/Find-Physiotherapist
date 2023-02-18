<?php
// Connecting to database
include("../db/conn.php");
// $id = $_GET['edit'];
// Initializing variables 
$errors = array();
if(isset($_POST['update_physio'])){
    // Receiving all inputs from edit-therapist.php page
    $physioName = mysqli_real_escape_string($con, $_POST['pname']);
    $physioMail = mysqli_real_escape_string($con, $_POST['pmail']);
    $physioAddress = mysqli_real_escape_string($con, $_POST['paddress']);
    $physioPhone = mysqli_real_escape_string($con, $_POST['physiotherapist_phone']);
    $physioQualification = mysqli_real_escape_string($con, $_POST['pqualification']);
    $physioExperience = mysqli_real_escape_string($con, $_POST['pexperience']);
    $physioPassword_1 = mysqli_real_escape_string($con, $_POST['ppassword']);
    $physioPassword_2 = mysqli_real_escape_string($con, $_POST['cpassword']);
    $physioGender = mysqli_real_escape_string($con, $_POST['gender']);
    if(empty($physioName)){array_push($errors, "Physiotherapist name is required"); echo '<script>alert("Name is required... Please enter the name")</script>';}
    if(empty($physioMail)){array_push($errors, "Physiotherapist email is required");echo '<script>alert("Email is required... Please enter the valid email")</script>';}
    if(empty($physioAddress)){array_push($errors, "Physiotherapist address is required");echo '<script>alert("Address is required... Please enter the address")</script>';}
    if(empty($physioPhone)){array_push($errors, "Physiotherapist phone is required");echo '<script>alert("Phone number is required... Please enter the valid Phone number")</script>';}
    if(empty($physioQualification)){array_push($errors, "Physiotherapist qualification is required");echo '<script>alert("Qualification is required... Please enter the qualification")</script>';}
    if(empty($physioExperience)){array_push($errors, "Physiotherapist Experience is required");echo '<script>alert("Experience is required... Please enter the Experience")</script>';}
    if(empty($physioPassword_1)){array_push($errors, "Password is required");echo '<script>alert("Password is required... Please enter the Password")</script>';}
    if(empty($physioGender)){array_push($errors, "Physiotherapist gender name is required");echo '<script>alert("Gender is required... Please select the gender")</script>';}
    if($physioPassword_1 != $physioPassword_2){array_push($errors, "Patient name is required");echo '<script>alert("Password is not matched with confirm password")</script>';}
    // Check database for make sure that the physiotherapist is existing or not if existing then update the record else show the error
    $physioCheck = "SELECT * FROM `physiotherapist` WHERE `Physio_phone` = '$physioPhone'";
    $result =  mysqli_query($con, $physioCheck);
    $physio = mysqli_fetch_assoc($result);
    if($physio){
        if($physio['Physio_phone'] === $physioPhone){
            if(count($errors) == 0){
                $r_password = md5($physioPassword_1);
                $update_Physio_query = "UPDATE `physiotherapist` SET `Physio_name` = '$physioName', `Physio_address` = '$physioAddress', `Physio_email` = '$physioMail', `Physio_gender` = '$physioGender', `Physio_qualification` = '$physioQualification', `Physio_experience` = '$physioExperience', `Physio_password` = '$r_password'
                WHERE `Physio_phone` = '$physioPhone'";
                mysqli_query($con, $update_Physio_query);
                echo '<script>alert("Record Updated successfully")</script>';
                header("location: ../AdminPanel/admin-view-therapist.php");
                $_SESSION['edt-message'] = "Record Updated Successfully";
            }
        }
    }
}
?>