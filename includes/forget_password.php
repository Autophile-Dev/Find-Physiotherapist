<?php
    session_start();
    // Initializing variables
    $phone_num = "";
    $role = "";
    $errors = array();
    // Connecting to database 
    include('db/conn.php');
    // Forgetting password by Patient/Admin/Physiotherapist
    if(isset($_POST['forget'])){
        $role = mysqli_real_escape_string($con, $_POST['role']);
        $newPassword = mysqli_real_escape_string($con, $_POST['pass']);
        $confirmNewPassword = mysqli_real_escape_string($con, $_POST['cpass']);
        $phone_num = mysqli_real_escape_string($con, $_POST['pno']);
        if(empty($phone_num)){array_push($errors, "Phone number is required"); echo '<script>alert("Phone number is required... Please enter the valid phone number")</script>';}
        if(empty($role)){array_push($errors, "Select the following role");echo '<script>alert("Select the following role")</script>';}
        if(empty($newPassword)){array_push($errors, "New password is required");echo '<script>alert("New password is required... Please enter the new password")</script>';}
        if($newPassword != $confirmNewPassword){array_push($errors, "Your New password didn't match with new confirm password... plz re-type your both passwords");echo '<script>alert("Your New password is not match with new confirm password... plz re-type your both passwords")</script>'; }
        // Check database for make sure a user/patient/physiotherapist/admin exist with same phone number 
        if($role === 'admin'){
            $adminCheck = "SELECT * FROM `admin` WHERE `Admin_phone` = '$phone_num' LIMIT 1";
            $adminResult = mysqli_query($con, $adminCheck);
            $admin = mysqli_fetch_assoc($adminResult);
            if($admin){
                // If admin exists
                if($admin['Admin_phone'] === $phone_num){
                    if(count($errors) == 0){
                        // $adminResetPassword = md5($newPassword);
                        $adminUpdatePassword = "UPDATE `admin` SET `Admin_password` = '$newPassword' WHERE `Admin_phone` = '$phone_num'";
                        mysqli_query($con, $adminUpdatePassword);
                        echo '<script>alert("Your password is updated successfully..Go to login page and login yourself")</script>';
                    }
                }
            }
            // If admin with the same phone number is not existing
            else{
                echo '<script>alert("Incorrect Phone Number... Did not found any record")</script>';
            }
        }
        else if($role === 'physiotherapist'){
            $physiotherapistCheck = "SELECT * FROM `physiotherapist` WHERE `Physio_phone` = '$phone_num' LIMIT 1";
            $physiotherapistResult = mysqli_query($con, $physiotherapistCheck);
            $physiotherapist = mysqli_fetch_assoc($physiotherapistResult);
            if($physiotherapist){
                // If Physiotherapist exists
                if($physiotherapist['Physio_phone'] === $phone_num){
                    if(count($errors) == 0){
                        $physioResetPassword = md5($newPassword);
                        $physiotherapistUpdatePassword = "UPDATE `physiotherapist` SET `Physio_password` = '$physioResetPassword' WHERE `Physio_phone` = '$phone_num'";
                        mysqli_query($con, $physiotherapistUpdatePassword);
                        echo '<script>alert("Your password is updated successfully..Go to login page and login yourself")</script>';
                    }
                }
            }
            else{
                echo '<script>alert("Incorrect Phone Number...Did not found any record")</script>';
            }
        }
        else if($role === 'patient'){
            $patientCheck = "SELECT * FROM `patient` WHERE `Patient_phone` = '$phone_num' LIMIT 1";
            $patientResult = mysqli_query($con, $patientCheck);
            $patient = mysqli_fetch_assoc($patientResult);
            if($patient){
                // If patient exists
                if($patient['Patient_phone'] === $phone_num){
                    if(count($errors) == 0){
                        $patientResetPassword = md5($newPassword);
                        $patientUpdatePassword = "UPDATE `patient` SET `Patient_password` = '$patientResetPassword' WHERE `Patient_phone` = '$phone_num'";
                        mysqli_query($con, $patientUpdatePassword);
                        echo '<script>alert("Your password is updated successfully..Go to login page and login yourself")</script>';
                    }
                }
            }
            else{
                echo '<script>alert("Incorrect Phone Number...Did not found any record go and register yourself as a patient first")</script>';
            }
        }
        else{
            array_push($errors, "Invalid Selection");
            echo '<script>alert("Invalid Selection")</script>';
        }
    }
?>