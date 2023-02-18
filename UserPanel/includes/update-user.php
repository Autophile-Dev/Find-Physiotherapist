<?php
    // Initializing Variable
    $errors = array();
    // Connect database
    include("../db/conn.php");
    // Update User/patient Profile
    if(isset($_POST['update_profile'])){
        // Receiving all inputs from update-profile.php page
        // $newName = mysqli_real_escape_string($con, $_POST['user-name']);
        $newEmail = mysqli_real_escape_string($con, $_POST['user-email']);
        $diagnosis = mysqli_real_escape_string($con, $_POST['user-diagnosis']);
        $newAddress = mysqli_real_escape_string($con, $_POST['user-address']);
        $phone_num = mysqli_real_escape_string($con, $_POST['user-phone']);
        $password = mysqli_real_escape_string($con, $_POST['user-pass']);
        $new_password = mysqli_real_escape_string($con, $_POST['user-new-pass']);
        $confirm_new_password = mysqli_real_escape_string($con, $_POST['user-c-new-pass']);
        // Update form validation: ensure that the form is correctly filled...
        // by adding (array_push()) corresponding error into $errors array
        // if(empty($newName)){array_push($errors, "Patient name is required");echo '<script>alert("Patient name is required... Please enter the patient name")</script>';}
        if(empty($newEmail)){array_push($errors, "Email is required");echo '<script>alert("Email is required... Please enter the valid email")</script>';}
        if(empty($newAddress)){array_push($errors, "Address is required");echo '<script>alert("Patient address is required... Please enter the patient address")</script>';}
        if(empty($phone_num)){
            array_push($errors, "Phone number is required.. without phone number you can not update your profile");
            echo '<script>alert("Phone number is required.. without phone number you can not update your profile")</script>';
        }
        if(empty($password)){array_push($errors, "Current Password is required");
            echo '<script>alert("Current password is required")</script>';
        }
        if(empty($new_password)){array_push($errors, "New Password is required");
            echo '<script>alert("New Password is required")</script>';
        }
        if($new_password != $confirm_new_password){array_push($errors, "Your new password didn't match with new confirm password");
            echo '<script>alert("Your new password is not matched with new confirm password")</script>';  
        }
        // Check Database for make sure that the user/patient is existing or not
        $user_check = "SELECT * FROM patient WHERE Patient_phone = '$phone_num'";
        $result = mysqli_query($con, $user_check);
        $patient = mysqli_fetch_assoc($result);
        if($patient){
            if($patient['Patient_phone'] === $phone_num){
                if(count($errors) == 0){
                    $r_password = md5($new_password);
                    $update_profile_query = "UPDATE `patient` SET `Patient_address` = '$newAddress', `Patient_email` = '$newEmail', `Patient_password` = '$r_password', `Patient_diagnosis` ='$diagnosis'
                    WHERE `Patient_phone` = '$phone_num'";
                    mysqli_query($con, $update_profile_query);
                    echo '<script>alert("Your profile is updated successfully..Go to profile page and check")</script>';
                    // header("location:patient-profile.php");
                }
            }
        }
    }
?>